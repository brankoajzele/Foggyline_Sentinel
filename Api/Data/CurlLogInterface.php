<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;


/**
 * Foggyline Sentinel CurlLog entity interface.
 * @api
 */
interface CurlLogInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'entity_id';
    const REQUEST_ID = 'request_id';
    const CREATED_AT = 'created_at';
    const STORE_ID = 'store_id';
    const RESULT = 'result';
    const METHOD = 'method';
    const URL = 'url';
    const HTTP_VER = 'http_ver';
    const HEADERS = 'headers';
    const BODY = 'body';
    const HTTP_CODE = 'http_code';
        const TOTAL_TIME = 'total_time';
    const NAMELOOKUP_TIME = 'name_lookup_time';
    const PRIMARY_IP = 'primary_ip';
    const PRIMARY_PORT = 'primary_port';
    const LOCAL_IP = 'local_ip';
    const LOCAL_PORT = 'local_port';
    const SIZE_UPLOAD = 'size_upload';
    const SIZE_DOWNLOAD = 'size_download';
    const SPEED_DOWNLOAD = 'speed_download';
    const SPEED_UPLOAD = 'speed_upload';
    const CONTENT_TYPE = 'content_type';
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
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
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
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
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
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setStoreId($storeId);

    /**
     * Get result
     *
     * @return string|null
     */
    public function getResult();

    /**
     * Set result
     *
     * @param string $result
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setResult($result);

    /**
     * Get method
     *
     * @return string|null
     */
    public function getMethod();

    /**
     * Set method
     *
     * @param string $method
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setMethod($method);

    /**
     * Get url
     *
     * @return string|null
     */
    public function getUrl();

    /**
     * Set url
     *
     * @param string $url
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setUrl($url);

    /**
     * Get http_ver
     *
     * @return string|null
     */
    public function getHttpVer();

    /**
     * Set http_ver
     *
     * @param string $httpVer
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHttpVer($httpVer);

    /**
     * Get headers
     *
     * @return string|null
     */
    public function getHeaders();

    /**
     * Set headers
     *
     * @param string $headers
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHeaders($headers);

    /**
     * Get body
     *
     * @return string|null
     */
    public function getBody();

    /**
     * Set body
     *
     * @param string $body
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setBody($body);

    /**
     * Get http_code
     *
     * @return string|null
     */
    public function getHttpCode();

    /**
     * Set http_code
     *
     * @param string $httpCode
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHttpCode($httpCode);

    /**
     * Get total_time
     *
     * @return string|null
     */
    public function getTotalTime();

    /**
     * Set total_time
     *
     * @param string $totalTime
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setTotalTime($totalTime);

    /**
     * Get name_lookup_time
     *
     * @return string|null
     */
    public function getNameLookupTime();

    /**
     * Set name_lookup_time
     *
     * @param string $nameLookupTime
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setNameLookupTime($nameLookupTime);

    /**
     * Get primary_ip
     *
     * @return string|null
     */
    public function getPrimaryIp();

    /**
     * Set primary_ip
     *
     * @param string $primaryIp
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setPrimaryIp($primaryIp);

    /**
     * Get primary_port
     *
     * @return string|null
     */
    public function getPrimaryPort();

    /**
     * Set primary_port
     *
     * @param string $primaryPort
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setPrimaryPort($primaryPort);

    /**
     * Get local_ip
     *
     * @return string|null
     */
    public function getLocalIp();

    /**
     * Set local_ip
     *
     * @param string $localIp
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setLocalIp($localIp);

    /**
     * Get local_port
     *
     * @return string|null
     */
    public function getLocalPort();

    /**
     * Set local_port
     *
     * @param string $localPort
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setLocalPort($localPort);

    /**
     * Get size_upload
     *
     * @return string|null
     */
    public function getSizeUpload();

    /**
     * Set size_upload
     *
     * @param string $sizeUpload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSizeUpload($sizeUpload);

    /**
     * Get size_download
     *
     * @return string|null
     */
    public function getSizeDownload();

    /**
     * Set size_download
     *
     * @param string $sizeDownload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSizeDownload($sizeDownload);

    /**
     * Get speed_download
     *
     * @return string|null
     */
    public function getSpeedDownload();

    /**
     * Set speed_download
     *
     * @param string $speedDownload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSpeedDownload($speedDownload);

    /**
     * Get speed_upload
     *
     * @return string|null
     */
    public function getSpeedUpload();

    /**
     * Set speed_upload
     *
     * @param string $speedUpload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSpeedUpload($speedUpload);

    /**
     * Get content_type
     *
     * @return string|null
     */
    public function getContentType();

    /**
     * Set content_type
     *
     * @param string $contentType
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setContentType($contentType);
}