<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Foggyline Sentinel QueryLog model - used for access logs
 *
 * @method \Foggyline\Sentinel\Model\ResourceModel\QueryLog _getResource()
 * @method \Foggyline\Sentinel\Model\ResourceModel\QueryLog getResource()
 */
class QueryLog extends \Magento\Framework\Model\AbstractModel
    implements \Foggyline\Sentinel\Api\Data\QueryLogInterface, IdentityInterface
{
    /**
     * QueryLog model cache tag
     */
    const CACHE_TAG = 'foggyline_sentinel_query_log';

    /**
     * @var string
     */
    protected $_cacheTag = 'foggyline_sentinel_query_log';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'foggyline_sentinel_query_log';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Foggyline\Sentinel\Model\ResourceModel\QueryLog');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get request_id
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->getData(self::REQUEST_ID);
    }

    /**
     * Set request_id
     *
     * @param string $requestId
     * @return \Foggyline\Sentinel\Api\Data\QueryLogInterface
     */
    public function setRequestId($requestId)
    {
        $this->setData(self::REQUEST_ID, $requestId);
        return $this;
    }

    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     *
     * @param string $createdAt
     * @return \Foggyline\Sentinel\Api\Data\QueryLogInterface
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get type
     *
     * @return int|null
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set type
     *
     * @param int $type
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setType($type)
    {
        $this->setData(self::TYPE, $type);
        return $this;
    }

    /**
     * Get time
     *
     * @return string|null
     */
    public function getTime()
    {
        return $this->getData(self::TIME);
    }

    /**
     * Set type
     *
     * @param string $time
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setTime($time)
    {
        $this->setData(self::TIME, $time);
        return $this;
    }

    /**
     * Get sql
     *
     * @return string|null
     */
    public function getSql()
    {
        return $this->getData(self::SQL);
    }

    /**
     * Set sql
     *
     * @param string $sql
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setSql($sql)
    {
        $this->setData(self::SQL, $sql);
        return $this;
    }

    /**
     * Get bind
     *
     * @return string|null
     */
    public function getBind()
    {
        return $this->getData(self::BIND);
    }

    /**
     * Set bind
     *
     * @param string $bind
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setBind($bind)
    {
        $this->setData(self::BIND, $bind);
        return $this;
    }

    /**
     * Get row_count
     *
     * @return string|null
     */
    public function getRowCount()
    {
        return $this->getData(self::ROW_COUNT);
    }

    /**
     * Set row_count
     *
     * @param string $rowCount
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRowCount($rowCount)
    {
        $this->setData(self::ROW_COUNT, $rowCount);
        return $this;
    }

    /**
     * Get backtrace
     *
     * @return string|null
     */
    public function getBacktrace()
    {
        return $this->getData(self::BACKTRACE);
    }

    /**
     * Set backtrace
     *
     * @param string $backtrace
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setBacktrace($backtrace)
    {
        $this->setData(self::BACKTRACE, $backtrace);
        return $this;
    }
}
