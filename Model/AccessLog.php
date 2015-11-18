<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Foggyline Sentinel AccessLog model - used for access logs
 *
 * @method \Foggyline\Sentinel\Model\ResourceModel\AccessLog _getResource()
 * @method \Foggyline\Sentinel\Model\ResourceModel\AccessLog getResource()
 */
class AccessLog extends \Magento\Framework\Model\AbstractModel
    implements \Foggyline\Sentinel\Api\Data\AccessLogInterface, IdentityInterface
{
    /**
     * AccessLog model cache tag
     */
    const CACHE_TAG = 'foggyline_sentinel_log';

    /**
     * @var string
     */
    protected $_cacheTag = 'foggyline_sentinel_log';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'foggyline_sentinel_log';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Foggyline\Sentinel\Model\ResourceModel\AccessLog');
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
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get user_id
     *
     * @return int|null
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * Set user_id
     *
     * @param string $userId
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserId($userId)
    {
        $this->setData(self::USER_ID, $userId);
        return $this;
    }

    /**
     * Get user_username
     *
     * @return string|null
     */
    public function getUserUsername()
    {
        return $this->getData(self::USER_USERNAME);
    }

    /**
     * Set user_username
     *
     * @param string $userUsername
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserUsername($userUsername)
    {
        $this->setData(self::USER_USERNAME, $userUsername);
        return $this;
    }

    /**
     * Get user_email
     *
     * @return string|null
     */
    public function getUserEmail()
    {
        return $this->getData(self::USER_EMAIL);
    }

    /**
     * Set user_email
     *
     * @param string $userEmail
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserEmail($userEmail)
    {
        $this->setData(self::USER_EMAIL, $userEmail);
        return $this;
    }

    /**
     * Get user_name
     *
     * @return string|null
     */
    public function getUserName()
    {
        return $this->getData(self::USER_NAME);
    }

    /**
     * Set user_name
     *
     * @param string $userName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserName($userName)
    {
        $this->setData(self::USER_NAME, $userName);
        return $this;
    }

    /**
     * Get action_name
     *
     * @return string|null
     */
    public function getActionName()
    {
        return $this->getData(self::ACTION_NAME);
    }

    /**
     * Set action_name
     *
     * @param string $actionName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setActionName($actionName)
    {
        $this->setData(self::ACTION_NAME, $actionName);
        return $this;
    }

    /**
     * Get full_action_name
     *
     * @return string|null
     */
    public function getFullActionName()
    {
        return $this->getData(self::FULL_ACTION_NAME);
    }

    /**
     * Set full_action_name
     *
     * @param string $fullActionName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setFullActionName($fullActionName)
    {
        $this->setData(self::FULL_ACTION_NAME, $fullActionName);
        return $this;
    }

    /**
     * Get client_ip
     *
     * @return string|null
     */
    public function getClientIp()
    {
        return $this->getData(self::CLIENT_IP);
    }

    /**
     * Set client_ip
     *
     * @param string $clientIp
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setClientIp($clientIp)
    {
        $this->setData(self::CLIENT_IP, $clientIp);
        return $this;
    }

    /**
     * Get country_by_geo_ip
     *
     * @return string|null
     */
    public function getCountryByGeoIp()
    {
        return $this->getData(self::COUNTRY_BY_GEO_IP);
    }

    /**
     * Set country_by_geo_ip
     *
     * @param string $countryByGeoIp
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setCountryByGeoIp($countryByGeoIp)
    {
        $this->setData(self::COUNTRY_BY_GEO_IP, $countryByGeoIp);
        return $this;
    }

    /**
     * Get request_string
     *
     * @return string|null
     */
    public function getRequestString()
    {
        return $this->getData(self::REQUEST_STRING);
    }

    /**
     * Set request_string
     *
     * @param string $requestString
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRequestString($requestString)
    {
        $this->setData(self::REQUEST_STRING, $requestString);
        return $this;
    }

    /**
     * Get request_method
     *
     * @return string|null
     */
    public function getRequestMethod()
    {
        return $this->getData(self::REQUEST_METHOD);
    }

    /**
     * Set request_method
     *
     * @param string $requestMethod
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRequestMethod($requestMethod)
    {
        $this->setData(self::REQUEST_METHOD, $requestMethod);
        return $this;
    }

    /**
     * Get http_get_params
     *
     * @return string|null
     */
    public function getHttpGetParams()
    {
        return unserialize($this->getData(self::HTTP_GET_PARAMS));
    }

    /**
     * Set http_get_params
     *
     * @param string $httpGetParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpGetParams($httpGetParams)
    {
        $this->setData(self::HTTP_GET_PARAMS, serialize($httpGetParams));
        return $this;
    }

    /**
     * Get http_post_params
     *
     * @return string|null
     */
    public function getHttpPostParams()
    {
        return unserialize($this->getData(self::HTTP_POST_PARAMS));
    }

    /**
     * Set http_post_params
     *
     * @param string $httpPostParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpPostParams($httpPostParams)
    {
        $this->setData(self::HTTP_POST_PARAMS, serialize($httpPostParams));
        return $this;
    }

    /**
     * Get http_files_params
     *
     * @return string|null
     */
    public function getHttpFilesParams()
    {
        return unserialize($this->getData(self::HTTP_FILES_PARAMS));
    }

    /**
     * Set http_files_params
     *
     * @param string $httpFilesParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpFilesParams($httpFilesParams)
    {
        $this->setData(self::HTTP_FILES_PARAMS, serialize($httpFilesParams));
        return $this;
    }

    /**
     * Get module_name
     *
     * @return string|null
     */
    public function getModuleName()
    {
        return $this->getData(self::MODULE_NAME);
    }

    /**
     * Set module_name
     *
     * @param string $moduleName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setModuleName($moduleName)
    {
        $this->setData(self::MODULE_NAME, $moduleName);
        return $this;
    }

    /**
     * Get controller_module
     *
     * @return string|null
     */
    public function getControllerModule()
    {
        return $this->getData(self::CONTROLLER_MODULE);
    }

    /**
     * Set controller_module
     *
     * @param string $controllerModule
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setControllerModule($controllerModule)
    {
        $this->setData(self::CONTROLLER_MODULE, $controllerModule);
        return $this;
    }

    /**
     * Get area
     *
     * @return string|null
     */
    public function getArea()
    {
        return $this->getData(self::AREA);
    }

    /**
     * Set area
     *
     * @param string $area
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setArea($area)
    {
        $this->setData(self::AREA, $area);
        return $this;
    }
}
