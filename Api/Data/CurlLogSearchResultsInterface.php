<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Api\Data;

/**
 * Foggyline Sentinel CurlLog entity search results interface
 * @api
 */
interface CurlLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get log entities list.
     *
     * @return \Foggyline\Sentinel\Api\Data\CurlLogInterface[]
     */
    public function getItems();

    /**
     * Set log entities list.
     *
     * @param \Foggyline\Sentinel\Api\Data\CurlLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
