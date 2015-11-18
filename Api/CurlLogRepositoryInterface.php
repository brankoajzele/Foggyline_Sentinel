<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api;

/**
 * Foggyline Sentinel CurlLog entity CRUD interface.
 * @api
 */
interface CurlLogRepositoryInterface
{
    /**
     * Save log entity.
     *
     * @param \Foggyline\Sentinel\Api\Data\CurlLogInterface $log
     * @return \Magento\Cms\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Foggyline\Sentinel\Api\Data\CurlLogInterface $log);

    /**
     * Retrieve log entity.
     *
     * @param int $logId
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($logId);

    /**
     * Retrieve log entities matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Foggyline\Sentinel\Api\Data\CurlLogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete log entity.
     *
     * @param \Foggyline\Sentinel\Api\Data\CurlLogInterface $log
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Foggyline\Sentinel\Api\Data\CurlLogInterface $log);

    /**
     * Delete log entity by ID.
     *
     * @param int $logId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($logId);
}
