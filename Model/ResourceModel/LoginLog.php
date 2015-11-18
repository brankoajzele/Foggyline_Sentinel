<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model\ResourceModel;

/**
 * Foggyline Sentinel LoginLog model resource
 */
class LoginLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('foggyline_sentinel_login_log', 'entity_id');
    }
}
