<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;


/**
 * Foggyline Sentinel AccessLog entity interface.
 * @api
 */
interface AccessLogInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'entity_id';
    const REQUEST_ID = 'request_id';
    const CREATED_AT = 'created_at';
    const USER_ID = 'user_id';
    const USER_USERNAME = 'user_username';
    const USER_EMAIL = 'user_email';
    const USER_NAME = 'user_name';
    const ACTION_NAME = 'action_name';
    const FULL_ACTION_NAME = 'full_action_name';
    const CLIENT_IP = 'client_ip';
    const COUNTRY_BY_GEO_IP = 'country_by_geo_ip';
    const REQUEST_STRING = 'request_string';
    const REQUEST_METHOD = 'request_method';
    const HTTP_GET_PARAMS = 'http_get_params';
    const HTTP_POST_PARAMS = 'http_post_params';
    const HTTP_FILES_PARAMS = 'http_files_params';
    const MODULE_NAME = 'module_name';
    const CONTROLLER_MODULE = 'controller_module';
    const AREA = 'area';
    /**#@-*/

    /**
     * Get $entityId
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Set $entityId
     *
     * @param int $entityId
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setEntityId($entityId);

    /**
     * Get request_id
     *
     * @return int|null
     */
    public function getRequestId();

    /**
     * Set request_id
     *
     * @param int $requestId
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRequestId($requestId);

    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     *
     * @param string $createdAt
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get user_id
     *
     * @return int|null
     */
    public function getUserId();

    /**
     * Set user_id
     *
     * @param string $userId
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserId($userId);

    /**
     * Get user_username
     *
     * @return string|null
     */
    public function getUserUsername();

    /**
     * Set user_username
     *
     * @param string $userUsername
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserUsername($userUsername);

    /**
     * Get user_email
     *
     * @return string|null
     */
    public function getUserEmail();

    /**
     * Set user_email
     *
     * @param string $userEmail
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserEmail($userEmail);

    /**
     * Get user_name
     *
     * @return string|null
     */
    public function getUserName();

    /**
     * Set user_name
     *
     * @param string $userName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setUserName($userName);

    /**
     * Get action_name
     *
     * @return string|null
     */
    public function getActionName();

    /**
     * Set action_name
     *
     * @param string $actionName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setActionName($actionName);

    /**
     * Get full_action_name
     *
     * @return string|null
     */
    public function getFullActionName();

    /**
     * Set full_action_name
     *
     * @param string $fullActionName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setFullActionName($fullActionName);

    /**
     * Get client_ip
     *
     * @return string|null
     */
    public function getClientIp();

    /**
     * Set client_ip
     *
     * @param string $clientIp
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setClientIp($clientIp);

    /**
     * Get country_by_geo_ip
     *
     * @return string|null
     */
    public function getCountryByGeoIp();

    /**
     * Set country_by_geo_ip
     *
     * @param string $countryByGeoIp
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setCountryByGeoIp($countryByGeoIp);

    /**
     * Get request_string
     *
     * @return string|null
     */
    public function getRequestString();

    /**
     * Set request_string
     *
     * @param string $requestString
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRequestString($requestString);

    /**
     * Get request_method
     *
     * @return string|null
     */
    public function getRequestMethod();

    /**
     * Set request_method
     *
     * @param string $requestMethod
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRequestMethod($requestMethod);

    /**
     * Get http_get_params
     *
     * @return string|null
     */
    public function getHttpGetParams();

    /**
     * Set http_get_params
     *
     * @param string $httpGetParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpGetParams($httpGetParams);

    /**
     * Get http_post_params
     *
     * @return string|null
     */
    public function getHttpPostParams();

    /**
     * Set http_post_params
     *
     * @param string $httpPostParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpPostParams($httpPostParams);

    /**
     * Get http_files_params
     *
     * @return string|null
     */
    public function getHttpFilesParams();

    /**
     * Set http_files_params
     *
     * @param string $httpFilesParams
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setHttpFilesParams($httpFilesParams);

    /**
     * Get module_name
     *
     * @return string|null
     */
    public function getModuleName();

    /**
     * Set module_name
     *
     * @param string $moduleName
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setModuleName($moduleName);

    /**
     * Get controller_module
     *
     * @return string|null
     */
    public function getControllerModule();

    /**
     * Set controller_module
     *
     * @param string $controllerModule
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setControllerModule($controllerModule);

    /**
     * Get area
     *
     * @return string|null
     */
    public function getArea();

    /**
     * Set area
     *
     * @param string $area
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setArea($area);
}