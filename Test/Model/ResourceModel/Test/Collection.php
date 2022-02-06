<?php
namespace DigitalBoutique\Test\Model\ResourceModel\Test;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Model & Resource model
     */
    protected function _construct()
    {
        $this->_init(
            'DigitalBoutique\Test\Model\Test',
            'DigitalBoutique\Test\Model\ResourceModel\Test'
        );
    }
}