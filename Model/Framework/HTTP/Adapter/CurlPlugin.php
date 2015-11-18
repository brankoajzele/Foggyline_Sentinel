<?php

namespace Foggyline\Sentinel\Model\Framework\HTTP\Adapter;

use Symfony\Component\Config\Definition\Exception\Exception;

class CurlPlugin
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
     * @var \Foggyline\Sentinel\Model\CurlLogFactory
     */
    protected $curlLog;

    /**#@+
     * Params to be set in "beforeWrite", so we can use them in "afterRead" method. A little bit of trickery to get
     * all the required info (body of request and response stuff).
     */
    protected $cUrlMethod;
    protected $cUrlUrl;
    protected $cUrlHttpVer;
    protected $cUrlHeaders;
    protected $cUrlBody;

    /**#@-*/

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Foggyline\Sentinel\Helper\Data $helper,
        \Foggyline\Sentinel\Model\CurlLogFactory $curlLog
    )
    {
        $this->logger = $logger;
        $this->helper = $helper;
        $this->curlLog = $curlLog;
    }

    /**
     * @param \Magento\Framework\HTTP\Adapter\Curl $subject
     * @param $result
     * @return mixed
     */
    public function afterRead(
        \Magento\Framework\HTTP\Adapter\Curl $subject,
        $result
    )
    {
        try {
            /* @var $curlLog \Foggyline\Sentinel\Model\CurlLog */
            $curlLog = $this->curlLog->create();

            $curlLog->setRequestId($this->helper->getHttpRequestUniqueId());
            $curlLog->setResult($result);
            $curlLog->setMethod($this->cUrlMethod);
            $curlLog->setUrl($this->cUrlUrl);
            $curlLog->setHttpVer($this->cUrlHttpVer);
            $curlLog->setHeaders(serialize($this->cUrlHeaders));
            $curlLog->setBody($this->cUrlBody);
            $curlLog->setHttpCode($subject->getInfo(CURLINFO_HTTP_CODE));
            $curlLog->setTotalTime($subject->getInfo(CURLINFO_TOTAL_TIME));
            $curlLog->setNameLookupTime($subject->getInfo(CURLINFO_NAMELOOKUP_TIME));
            $curlLog->setPrimaryIp($subject->getInfo(CURLINFO_PRIMARY_IP));
            $curlLog->setPrimaryPort($subject->getInfo(CURLINFO_PRIMARY_PORT));
            $curlLog->setLocalIp($subject->getInfo(CURLINFO_LOCAL_IP));
            $curlLog->setLocalPort($subject->getInfo(CURLINFO_LOCAL_PORT));
            $curlLog->setSizeUpload($subject->getInfo(CURLINFO_SIZE_UPLOAD));
            $curlLog->setSizeDownload($subject->getInfo(CURLINFO_SIZE_DOWNLOAD));
            $curlLog->setSpeedUpload($subject->getInfo(CURLINFO_SPEED_UPLOAD));
            $curlLog->setSpeedDownload($subject->getInfo(CURLINFO_SPEED_DOWNLOAD));
            $curlLog->setContentType($subject->getInfo(CURLINFO_CONTENT_TYPE));

            $curlLog->save();
        } catch (\Exception $e) {
            $this->logger->critical($e);
        }

        return $result;
    }

    /**
     * Since "write" is always executed before "read", we use it here to catch $body and other few variables,
     * which we then use for logging within the "beforeWrite" method.
     *
     * @param \Magento\Framework\HTTP\Adapter\Curl $subject
     * @param $method
     * @param $url
     * @param string $http_ver
     * @param array $headers
     * @param string $body
     */
    public function beforeWrite(
        \Magento\Framework\HTTP\Adapter\Curl $subject,
        $method, $url, $http_ver = '1.1', $headers = [], $body = ''
    )
    {
        $this->cUrlMethod = $method;
        $this->cUrlUrl = $url;
        $this->cUrlHttpVer = $http_ver;
        $this->cUrlHeaders = $headers;
        $this->cUrlBody = $body;
    }
}
