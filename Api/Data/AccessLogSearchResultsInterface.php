<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;

/**
 * Foggyline Sentinel AccessLog entity search results interface
 * @api
 */
interface AccessLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get log entities list.
     *
     * @return \Foggyline\Sentinel\Api\Data\AccessLogInterface[]
     */
    public function getItems();

    /**
     * Set log entities list.
     *
     * @param \Foggyline\Sentinel\Api\Data\AccessLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
