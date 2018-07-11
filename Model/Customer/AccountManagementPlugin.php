<?php

namespace Foggyline\Sentinel\Model\Customer;

use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class AccountManagementPlugin
 *
 * for Magento\Customer\Model\AccountManagement
 *
 * @package Foggyline\Sentinel\Model\Customer
 */
class AccountManagementPlugin
{
    /**
     * @var \Foggyline\Sentinel\Helper\Data
     */
    protected $helper;

    /**
     * @var \Foggyline\Sentinel\Model\LoginLogFactory
     */
    protected $loginLogFactory;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        \Foggyline\Sentinel\Model\LoginLogFactory $loginLogFactory,
        \Psr\Log\LoggerInterface $logger,
        \Foggyline\Sentinel\Helper\Data $helper,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->loginLogFactory = $loginLogFactory;
        $this->logger = $logger;
        $this->helper = $helper;
        $this->storeManager = $storeManager;
    }

    public function aroundAuthenticate(
        \Magento\Customer\Api\AccountManagementInterface $subject,
        \Closure $proceed,
        $username,
        $password
    ) {
        /* Skip execution if module is not active */
        if (!$this->helper->isFoggylineSentinelActive()) {
            return $proceed($username, $password);
        }

        try {
            $result = $proceed($username, $password);
            /* Successful customer login - log to database */
            $this->logSuccessfulCustomerAuthentication($username);
            return $result;
        } catch (\Exception $exception) {
            /* Failed customer login - log to database */
            $this->logFailedCustomerAuthentication($username, $password);
            throw $exception;
        }
    }

    private function logSuccessfulCustomerAuthentication($username)
    {
        try {
            /* @var $loginLog \Foggyline\Sentinel\Model\LoginLog */
            $loginLog = $this->loginLogFactory->create();
            $loginLog->setIdentifier($username);
            $loginLog->setStoreId($this->storeManager->getStore()->getId());
            $loginLog->setRequestId($this->helper->getHttpRequestUniqueId());
            $loginLog->setType(\Foggyline\Sentinel\Model\LoginLog::TYPE_CUSTOMER);
            $loginLog->setLoginStatus(\Foggyline\Sentinel\Model\LoginLog::LOGIN_STATUS_SUCCESS);
            $loginLog->save();
        } catch (Exception $e) {
            $this->logger->critical($e);
        }
    }

    private function logFailedCustomerAuthentication($username, $password)
    {
        try {
            /* @var $loginLog \Foggyline\Sentinel\Model\LoginLog */
            $loginLog = $this->loginLogFactory->create();
            $loginLog->setIdentifier($username);
            $loginLog->setStoreId($this->storeManager->getStore()->getId());
            $loginLog->setRequestId($this->helper->getHttpRequestUniqueId());
            $loginLog->setType(\Foggyline\Sentinel\Model\LoginLog::TYPE_CUSTOMER);
            $loginLog->setLoginStatus(\Foggyline\Sentinel\Model\LoginLog::LOGIN_STATUS_FAIL);
            $loginLog->save();
        } catch (Exception $e) {
            $this->logger->critical($e);
        }
    }
}
