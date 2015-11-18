<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_ACTIVE = 'system/foggyline_sentinel/active';
    const XML_PATH_EXCLUDE_AREAS = 'system/foggyline_sentinel/exclude_areas';
    const XML_PATH_EXCLUDE_ACTIONS = 'system/foggyline_sentinel/exclude_actions';
    const XML_PATH_CLEAN_AFTER_HOURS = 'system/foggyline_sentinel/clean_after_hours';

    const XML_PATH_QUERY_LOG_ACTIVE  = 'system/foggyline_sentinel/query_log_active';
    const XML_PATH_QUERY_LOG_ALL_QUERIES  = 'system/foggyline_sentinel/query_log_all_queries';
    const XML_PATH_QUERY_LOG_QUERY_TIME = 'system/foggyline_sentinel/query_log_query_time';
    const XML_PATH_QUERY_LOG_CALL_STACK = 'system/foggyline_sentinel/query_log_call_stack';
    const XML_PATH_QUERY_LOG_QUERY_CHUNKS = 'system/foggyline_sentinel/query_log_query_chunks';
    const XML_PATH_QUERY_LOG_CLEAN_AFTER_HOURS = 'system/foggyline_sentinel/query_log_clean_after_hours';


    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
    }

    public function isFoggylineSentinelActive()
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getExcludeAreas()
    {
        $exclude = $this->scopeConfig->getValue(
            self::XML_PATH_EXCLUDE_AREAS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $exclude = explode(',', $exclude);

        return $exclude;
    }

    public function getExcludeActions()
    {
        $exclude = $this->scopeConfig->getValue(
            self::XML_PATH_EXCLUDE_ACTIONS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $exclude = explode(',', $exclude);

        return $exclude;
    }

    public function getCleanAfterHours()
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_CLEAN_AFTER_HOURS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function isQueryLogActive()
    {
        return (bool)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getQueryLogAllQueries()
    {
        return (bool)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_ALL_QUERIES, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getQueryLogQueryTime()
    {
        return (double)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_QUERY_TIME, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getQueryLogCallStack()
    {
        return (bool)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_CALL_STACK, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getQueryLogQueryChunks()
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_QUERY_CHUNKS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getQueryLogCleanAfterHours()
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_QUERY_LOG_CLEAN_AFTER_HOURS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Note, we might opt for using just getmypid(), but process IDs are not unique.
     *
     * @return string
     */
    public function getHttpRequestUniqueId()
    {
        return md5(
            getmypid()
            . $_SERVER['REMOTE_ADDR']
            . $_SERVER['REQUEST_TIME']
            . $_SERVER['REMOTE_PORT']
        );
    }

}
