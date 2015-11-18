<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;

/**
 * Foggyline Sentinel LoginLog entity search results interface
 * @api
 */
interface LoginLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get log entities list.
     *
     * @return \Foggyline\Sentinel\Api\Data\LoginLogInterface[]
     */
    public function getItems();

    /**
     * Set log entities list.
     *
     * @param \Foggyline\Sentinel\Api\Data\LoginLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
