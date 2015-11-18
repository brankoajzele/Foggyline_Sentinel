<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model\ResourceModel;

/**
 * Foggyline Sentinel CurlLog model resource
 */
class CurlLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('foggyline_sentinel_curl_log', 'entity_id');
    }
}
