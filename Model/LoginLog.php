<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Foggyline Sentinel LoginLog model - used for access logs
 *
 * @method \Foggyline\Sentinel\Model\ResourceModel\LoginLog _getResource()
 * @method \Foggyline\Sentinel\Model\ResourceModel\LoginLog getResource()
 */
class LoginLog extends \Magento\Framework\Model\AbstractModel
    implements \Foggyline\Sentinel\Api\Data\LoginLogInterface, IdentityInterface
{
    /**
     * LoginLog model cache tag
     */
    const CACHE_TAG = 'foggyline_sentinel_login_log';

    /**
     * @var string
     */
    protected $_cacheTag = 'foggyline_sentinel_login_log';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'foggyline_sentinel_login_log';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Foggyline\Sentinel\Model\ResourceModel\LoginLog');
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
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
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
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get store_id
     *
     * @return string|null
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Set store_id
     *
     * @param string $storeId
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setStoreId($storeId)
    {
        $this->setData(self::STORE_ID, $storeId);
        return $this;
    }

    /**
     * Get type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set type
     *
     * @param string $type
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setType($type)
    {
        $this->setData(self::TYPE, $type);
        return $this;
    }

    /**
     * Get identifier
     *
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setIdentifier($identifier)
    {
        $this->setData(self::IDENTIFIER, $identifier);
        return $this;
    }

    /**
     * Get login_status
     *
     * @return string|null
     */
    public function getLoginStatus()
    {
        return $this->getData(self::LOGIN_STATUS);
    }

    /**
     * Set login_status
     *
     * @param string $loginStatus
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setLoginStatus($loginStatus)
    {
        $this->setData(self::LOGIN_STATUS, $loginStatus);
        return $this;
    }
}
