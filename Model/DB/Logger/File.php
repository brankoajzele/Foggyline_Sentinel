<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model\DB\Logger;

/**
 * Logging to file
 */
class File implements \Magento\Framework\DB\LoggerInterface
{
    protected static $counter = 0;
    /**
     * @var int
     */
    private $timer;

    protected $queryLogs = [];

    /**
     * @var \Foggyline\Sentinel\Helper\Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\App\DeploymentConfig
     */
    private $deploymentConfig;

    public function __construct(
        \Foggyline\Sentinel\Helper\Data $helper,
        \Magento\Framework\App\DeploymentConfig $deploymentConfig
    )
    {
        $this->helper = $helper;
        $this->deploymentConfig = $deploymentConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function log($str)
    {
    }

    /**
     *
     * {@inheritdoc}
     */
    public function logStats($type, $sql, $bind = [], $result = null)
    {
        $log = [];

        //Change approach to "around" and then break return string into MySQL columns
        //  as right now we cannot get time of query execution

        //Problem remains how to pass the YES/NO on time and full backtrace
        // maybe its best to simply record all and then remove it from __destruct
        // as in __destruct we have access to helper
        // trace log and all log simply kill the database size, thus we need them as config

        self::$counter++;
        \Magento\Framework\Profiler::start('foggyline_sentinel_logStats_'.self::$counter);

        $log['type'] = $type;
        $log['time'] = sprintf('%.4f', microtime(true) - $this->timer);
        $log['sql'] = $sql;
        $log['bind'] = var_export($bind, true);

        if ($result instanceof \Zend_Db_Statement_Pdo) {
            $log['row_count'] = $result->rowCount();
        }


        /**
         * When backtrace is assigned, it consumes roughly:
         *  - 0.3 seconds on homepage,
         *  - 0.5 seconds on admin product page
         *
         * Problem here is that we cannot control Debug::backtrace via Magento admin config, so we have to leave it
         * either running or comment it out. If we leave it running, we can add some minor tome to overhead but we
         * can then use $this->helper->getQueryLogCallStack(); to either save it in database or not.
         *
         * Backtrace adds enormous amount of data to database. We are talking MB of data just in 3-4 page requests.
         * Thus it is highly important be very careful with full log stack (backtrace) loging to dataabse.
         */
        $log['backtrace'] = \Magento\Framework\Debug::backtrace(true, false);

        $this->queryLogs[] = $log;

        \Magento\Framework\Profiler::stop('foggyline_sentinel_logStats_'.self::$counter);
    }

    /**
     * {@inheritdoc}
     */
    public function critical(\Exception $e)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function startTimer()
    {
        $this->timer = microtime(true);
    }

    /**
     * As per http://php.net/manual/en/language.oop5.decon.php:
     * The destructor method will be called as soon as there are no other references to a particular object,
     * or in any order during the shutdown sequence.
     *
     * As randomly tested accross the code, triggering exist and exceptions, the __destruct is called in cases of:
     *  - successful execution
     *  - exit() being called anywhere later on
     *  - exception being thrown anywhere later on
     *
     * This is a nice example of catching all query logs, which we populated first within the logStats method.
     *
     * Within the __destruct we initiate the new Database connection, from DB parameters read from config.
     * This new DB connection is using the DB\Logger\Quiet so we don't fall into a loop of logging the
     * SQL queries for SQL query logger :)
     *
     * This way, we agregated all of the individual query logs on request, and did one insertMultiple.
     */
    public function __destruct()
    {
        try {

            /**
             * Note, logStats still executes. It is not possible to include DB read config in there as it executes
             * right after first DB connection, and Magento does not have config value just yet.
             * Thus we check here. Hopefully the performance impact is not too big within the logStats.
             */
            if (!$this->helper->isQueryLogActive()) {
                return;
            }

            $config = $this->deploymentConfig->get(
                \Magento\Framework\Config\ConfigOptionsListConstants::CONFIG_PATH_DB_CONNECTION_DEFAULT
            );

            $connection = new \Magento\Framework\Model\ResourceModel\Type\Db\Pdo\Mysql(
                new \Magento\Framework\Stdlib\StringUtils(),
                new \Magento\Framework\Stdlib\DateTime(),
                $config
            );

            /*
             * Here we init the new DB connection with
             * Magento config and directly set the dummy Quiet logger to it.
             */
            $connection = $connection->getConnection(
                new \Magento\Framework\DB\Logger\Quiet()
            );

            $uniqueId = $this->helper->getHttpRequestUniqueId();
            $logCallStack = $this->helper->getQueryLogCallStack();
            $logQueryTime = $this->helper->getQueryLogQueryTime();
            $logAllQueries = $this->helper->getQueryLogAllQueries();
            $logQueryChunks = $this->helper->getQueryLogQueryChunks();

            $this->queryLogs = array_map(create_function('$arr', '$arr["request_id"] = "'.$uniqueId.'"; return $arr;'), $this->queryLogs);

            $queryLogChunks = array_chunk($this->queryLogs, $logQueryChunks); /* Breaks in between 80 & 90 */

            foreach ($queryLogChunks as $queryLogChunk) {

                if (!$logCallStack) {
                    $queryLogChunk = array_map(create_function('$arr', 'unset($arr["backtrace"]); return $arr;'), $queryLogChunk);
                }

                $queryLogChunk = array_map(create_function('$arr', 'unset($arr["backtrace"]); return $arr;'), $queryLogChunk);

                if ($logQueryTime && !$logAllQueries) {
                    $queryLogChunk = array_map(create_function('$arr', 'if($arr["time"] >= ' . $logQueryTime . ') { return $arr; }'), $queryLogChunk);
                }

                /* @todo Exclude the foggyline_sentinel_query_log table from logging itself */
                /* $queryLogChunk = array_map(create_function('$arr', 'if (!strstr($arr["sql"], "foggyline_sentinel_query_log")) { return $arr; }'), $queryLogChunk); */

                if ($queryLogChunk = array_filter($queryLogChunk)) {
                    /* @todo There is a bug here, DB name is without possible prefix/suffix, needs proper handling */
                    $connection->insertMultiple('foggyline_sentinel_query_log', $queryLogChunk);
                }
            }

            /**
                CREATE TABLE `foggyline_sentinel_query_log` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `type` text,
                `time` decimal(12,4) DEFAULT NULL,
                `sql` text,
                `bind` text,
                `row_count` int(11) DEFAULT NULL,
                `request_id` text,
                `backtrace` text,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
             */

        } catch (\Exception $e) {
            //Silently do nothing :)
            //var_dump($e->getMessage());
        }
    }
}
