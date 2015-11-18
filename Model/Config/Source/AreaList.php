<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Model\Config\Source;

class AreaList implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Magento\Framework\App\AreaList
     */
    protected $areaList;

    public function __construct(
        \Magento\Framework\App\AreaList $areaList
    )
    {
        $this->areaList = $areaList;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {

        $areListCodes = $this->areaList->getCodes();
        $areList = [];

        foreach ($areListCodes as $areListCode) {
            $areList[] = [
                'value' => $areListCode,
                'label' => sprintf('%s [%s]', $this->areaList->getFrontName($areListCode), $areListCode)
            ];
        }

        return $areList;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $areListCodes = $this->areaList->getCodes();
        $areList = [];

        foreach ($areListCodes as $areListCode) {
            $areList[$areListCode] = sprintf('%s [%s]', $this->areaList->getFrontName($areListCode), $areListCode);
        }

        return $areList;
    }
}
