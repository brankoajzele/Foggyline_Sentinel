<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;


/**
 * Foggyline Sentinel LoginLog entity interface.
 * @api
 */
interface LoginLogInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'entity_id';
    const REQUEST_ID = 'request_id';
    const CREATED_AT = 'created_at';
    const STORE_ID = 'store_id';
    const TYPE = 'type';
    const IDENTIFIER = 'identifier';
    const LOGIN_STATUS = 'login_status';

    const TYPE_CUSTOMER = 'customer';
    const TYPE_USER = 'user';

    const LOGIN_STATUS_SUCCESS = 'success';
    const LOGIN_STATUS_FAIL = 'fail';
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
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
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
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get store_id
     *
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store_id
     *
     * @param string $storeId
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setStoreId($storeId);

    /**
     * Get type
     *
     * @return string|null
     */
    public function getType();

    /**
     * Set type
     *
     * @param string $type
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setType($type);

    /**
     * Get identifier
     *
     * @return string|null
     */
    public function getIdentifier();

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setIdentifier($identifier);

    /**
     * Get login_status
     *
     * @return string|null
     */
    public function getLoginStatus();

    /**
     * Set login_status
     *
     * @param string $loginStatus
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface
     */
    public function setLoginStatus($loginStatus);

}