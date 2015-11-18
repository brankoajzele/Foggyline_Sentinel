<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Foggyline Sentinel CurlLog model - used for access logs
 *
 * @method \Foggyline\Sentinel\Model\ResourceModel\CurlLog _getResource()
 * @method \Foggyline\Sentinel\Model\ResourceModel\CurlLog getResource()
 */
class CurlLog extends \Magento\Framework\Model\AbstractModel
    implements \Foggyline\Sentinel\Api\Data\CurlLogInterface, IdentityInterface
{
    /**
     * CurlLog model cache tag
     */
    const CACHE_TAG = 'foggyline_sentinel_curl_log';

    /**
     * @var string
     */
    protected $_cacheTag = 'foggyline_sentinel_curl_log';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'foggyline_sentinel_curl_log';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Foggyline\Sentinel\Model\ResourceModel\CurlLog');
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
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
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
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setStoreId($storeId)
    {
        $this->setData(self::STORE_ID, $storeId);
        return $this;
    }

    /**
     * Get result
     *
     * @return string|null
     */
    public function getResult()
    {
        return $this->getData(self::RESULT);
    }

    /**
     * Set result
     *
     * @param string $result
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setResult($result)
    {
        $this->setData(self::RESULT, $result);
        return $this;
    }

    /**
     * Get method
     *
     * @return string|null
     */
    public function getMethod()
    {
        return $this->getData(self::METHOD);
    }

    /**
     * Set method
     *
     * @param string $method
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setMethod($method)
    {
        $this->setData(self::METHOD, $method);
        return $this;
    }

    /**
     * Get url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->getData(self::URL);
    }

    /**
     * Set url
     *
     * @param string $url
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setUrl($url)
    {
        $this->setData(self::URL, $url);
        return $this;
    }

    /**
     * Get http_ver
     *
     * @return string|null
     */
    public function getHttpVer()
    {
        return $this->getData(self::HTTP_VER);
    }

    /**
     * Set http_ver
     *
     * @param string $httpVer
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHttpVer($httpVer)
    {
        $this->setData(self::HTTP_VER, $httpVer);
        return $this;
    }

    /**
     * Get headers
     *
     * @return string|null
     */
    public function getHeaders()
    {
        return $this->getData(self::HEADERS);
    }

    /**
     * Set headers
     *
     * @param string $headers
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHeaders($headers)
    {
        $this->setData(self::HEADERS, $headers);
        return $this;
    }

    /**
     * Get body
     *
     * @return string|null
     */
    public function getBody()
    {
        return $this->getData(self::BODY);
    }

    /**
     * Set body
     *
     * @param string $body
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setBody($body)
    {
        $this->setData(self::BODY, $body);
        return $this;
    }

    /**
     * Get http_code
     *
     * @return string|null
     */
    public function getHttpCode()
    {
        return $this->getData(self::HTTP_CODE);
    }

    /**
     * Set http_code
     *
     * @param string $httpCode
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setHttpCode($httpCode)
    {
        $this->setData(self::HTTP_CODE, $httpCode);
        return $this;
    }

    /**
     * Get total_time
     *
     * @return string|null
     */
    public function getTotalTime()
    {
        return $this->getData(self::TOTAL_TIME);
    }

    /**
     * Set total_time
     *
     * @param string $totalTime
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setTotalTime($totalTime)
    {
        $this->setData(self::TOTAL_TIME, $totalTime);
        return $this;
    }

    /**
     * Get name_lookup_time
     *
     * @return string|null
     */
    public function getNameLookupTime()
    {
        return $this->getData(self::NAMELOOKUP_TIME);
    }

    /**
     * Set name_lookup_time
     *
     * @param string $nameLookupTime
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setNameLookupTime($nameLookupTime)
    {
        $this->setData(self::NAMELOOKUP_TIME, $nameLookupTime);
        return $this;
    }

    /**
     * Get primary_ip
     *
     * @return string|null
     */
    public function getPrimaryIp()
    {
        return $this->getData(self::PRIMARY_IP);
    }

    /**
     * Set primary_ip
     *
     * @param string $primaryIp
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setPrimaryIp($primaryIp)
    {
        $this->setData(self::PRIMARY_IP, $primaryIp);
        return $this;
    }

    /**
     * Get primary_port
     *
     * @return string|null
     */
    public function getPrimaryPort()
    {
        return $this->getData(self::PRIMARY_PORT);
    }

    /**
     * Set primary_port
     *
     * @param string $primaryPort
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setPrimaryPort($primaryPort)
    {
        $this->setData(self::PRIMARY_PORT, $primaryPort);
        return $this;
    }

    /**
     * Get local_ip
     *
     * @return string|null
     */
    public function getLocalIp()
    {
        return $this->getData(self::LOCAL_IP);
    }

    /**
     * Set local_ip
     *
     * @param string $localIp
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setLocalIp($localIp)
    {
        $this->setData(self::LOCAL_IP, $localIp);
        return $this;
    }

    /**
     * Get local_port
     *
     * @return string|null
     */
    public function getLocalPort()
    {
        return $this->getData(self::LOCAL_PORT);
    }

    /**
     * Set local_port
     *
     * @param string $localPort
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setLocalPort($localPort)
    {
        $this->setData(self::LOCAL_PORT, $localPort);
        return $this;
    }

    /**
     * Get size_upload
     *
     * @return string|null
     */
    public function getSizeUpload()
    {
        return $this->getData(self::SIZE_UPLOAD);
    }

    /**
     * Set size_upload
     *
     * @param string $sizeUpload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSizeUpload($sizeUpload)
    {
        $this->setData(self::SIZE_UPLOAD, $sizeUpload);
        return $this;
    }

    /**
     * Get size_downloaded
     *
     * @return string|null
     */
    public function getSizeDownload()
    {
        return $this->getData(self::SIZE_DOWNLOAD);
    }

    /**
     * Set size_downloaded
     *
     * @param string $sizeDownload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSizeDownload($sizeDownload)
    {
        $this->setData(self::SIZE_DOWNLOAD, $sizeDownload);
        return $this;
    }

    /**
     * Get speed_download
     *
     * @return string|null
     */
    public function getSpeedDownload()
    {
        return $this->getData(self::SPEED_DOWNLOAD);
    }

    /**
     * Set speed_download
     *
     * @param string $speedDownload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSpeedDownload($speedDownload)
    {
        $this->setData(self::SPEED_DOWNLOAD, $speedDownload);
        return $this;
    }

    /**
     * Get speed_upload
     *
     * @return string|null
     */
    public function getSpeedUpload()
    {
        return $this->getData(self::SPEED_UPLOAD);
    }

    /**
     * Set speed_upload
     *
     * @param string $speedUpload
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setSpeedUpload($speedUpload)
    {
        $this->setData(self::SPEED_UPLOAD, $speedUpload);
        return $this;
    }

    /**
     * Get content_type
     *
     * @return string|null
     */
    public function getContentType()
    {
        return $this->getData(self::CONTENT_TYPE);
    }

    /**
     * Set content_type
     *
     * @param string $contentType
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     */
    public function setContentType($contentType)
    {
        $this->setData(self::CONTENT_TYPE, $contentType);
        return $this;
    }
}
