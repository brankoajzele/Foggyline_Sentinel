<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;


/**
 * Foggyline Sentinel AccessLog entity interface.
 * @api
 */
interface QueryLogInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'entity_id';
    const REQUEST_ID = 'request_id';
    const CREATED_AT = 'created_at';
    const TYPE = 'type';
    const TIME = 'time';
    const SQL = 'sql';
    const BIND = 'bind';
    const ROW_COUNT = 'row_count';
    const BACKTRACE = 'backtrace';

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
     * Get type
     *
     * @return int|null
     */
    public function getType();

    /**
     * Set type
     *
     * @param int $type
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setType($type);

    /**
     * Get time
     *
     * @return string|null
     */
    public function getTime();

    /**
     * Set type
     *
     * @param string $time
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setTime($time);

    /**
     * Get sql
     *
     * @return string|null
     */
    public function getSql();

    /**
     * Set sql
     *
     * @param string $sql
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setSql($sql);

    /**
     * Get bind
     *
     * @return string|null
     */
    public function getBind();

    /**
     * Set bind
     *
     * @param string $bind
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setBind($bind);

    /**
     * Get row_count
     *
     * @return string|null
     */
    public function getRowCount();

    /**
     * Set row_count
     *
     * @param string $rowCount
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setRowCount($rowCount);

    /**
     * Get backtrace
     *
     * @return string|null
     */
    public function getBacktrace();

    /**
     * Set backtrace
     *
     * @param string $backtrace
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface
     */
    public function setBacktrace($backtrace);
}
