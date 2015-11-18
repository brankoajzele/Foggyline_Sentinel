<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

class Cron
{
    /**
     * @var \Foggyline\Sentinel\Helper\Data
     */
    protected $helper;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Framework\App\Resource
     */
    protected $resource;

    /**
     * @param \Foggyline\Sentinel\Helper\Data $helper
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Framework\App\ResourceConnection $resource
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Foggyline\Sentinel\Helper\Data $helper,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\ResourceConnection $resource,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->helper = $helper;
        $this->logger = $logger;
        $this->resource = $resource;
    }

    /**
     * Cleanup old logs so that the database table foggyline_sentinel_log does not get cluttered.
     *
     * @return $this
     */
    public function cleanup()
    {
        try {
            /* Here we do a fast cleanup, directly on database, no individual objects */
            $connection = $this->resource->getConnection();
            $connection->beginTransaction();

            $condition = ['created_at < (NOW() - INTERVAL ? HOUR)' => $this->helper->getCleanAfterHours()];

            $connection->delete($this->resource->getTableName('foggyline_sentinel_log'), $condition);

            $connection->commit();

            $this->logger->info('Cron job foggyline_sentinel_cleanup executed');
        } catch (\Exception $e) {
            $connection->rollBack();
            $this->logger->critical($e);
        }

        return $this;
    }
}
