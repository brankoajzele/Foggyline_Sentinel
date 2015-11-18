<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model;

use Symfony\Component\Config\Definition\Exception\Exception;

class Observer
{
    /**
     * @var \Foggyline\Sentinel\Helper\Data
     */
    protected $helper;

    /**
     * @var \Foggyline\Sentinel\Model\AccessLogFactory
     */
    protected $log;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Framework\App\AreaList
     */
    protected $areaList;

    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $authSession;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Foggyline\Sentinel\Helper\Data $helper,
        \Foggyline\Sentinel\Model\AccessLogFactory $log,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\AreaList $areaList,
        \Magento\Backend\Model\Auth\Session $authSession
    )
    {
        $this->helper = $helper;
        $this->log = $log;
        $this->logger = $logger;
        $this->areaList = $areaList;
        $this->authSession = $authSession;
    }

    /**
     * Observer for controller_front_send_response_before event fired in lib/internal/Magento/Framework/App/Http.php.
     *
     * $eventParams = ['request' => $this->_request, 'response' => $this->_response];
     *
     * request => Magento\Framework\App\Request\Http
     * response => Magento\Framework\Webapi\Rest\Response\Proxy
     *
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function log(\Magento\Framework\Event\Observer $observer)
    {
        /* @var $request \Magento\Framework\App\Request\Http */
        $request = $observer->getEvent()->getRequest();
        $areaCode = $this->areaList->getCodeByFrontName($request->getFrontName());

        /**
         * Stop execution if module is not active
         * or if the current request falls within excluded areas
         * or if the current request falls within excluded actions
         */
        if (!$this->helper->isFoggylineSentinelActive()
            OR in_array($areaCode, $this->helper->getExcludeAreas())
            OR in_array($request->getFullActionName(), $this->helper->getExcludeActions())) {
            return $this;
        }

        /* @var $log \Foggyline\Sentinel\Model\AccessLog */
        $log = $this->log->create();

        $log->setRequestId($this->helper->getHttpRequestUniqueId());

        if ($this->authSession && $this->authSession->getUser()) {
            $user = $this->authSession->getUser();
            $log->setUserId($user->getId());
            $log->setUserUsername($user->getUserName());
            $log->setUserEmail($user->getEmail());
            $log->setUserName($user->getName());
        }

        $log->setActionName($request->getActionName());
        $log->setFullActionName($request->getFullActionName());
        $log->setClientIp($request->getClientIp());
        $log->setCountryByGeoIp('Croatia');
        $log->setRequestString($request->getRequestString());
        $log->setRequestMethod($request->getMethod());
        $log->setHttpGetParams($_GET);
        $log->setHttpPostParams($_POST);
        $log->setHttpFilesParams($_FILES);
        $log->setModuleName($request->getModuleName());
        $log->setControllerModule($request->getControllerModule());
        $log->setArea($areaCode);

        try {
            $log->save();
        } catch (\Exception $e) {
            $this->logger->critical($e);
        }

        return $this;
    }
}
