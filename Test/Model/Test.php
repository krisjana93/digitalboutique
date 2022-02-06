<?php
namespace DigitalBoutique\Test\Model;
use Magento\Framework\Model\AbstractModel;
class Test extends AbstractModel
{
    /**
     * Resource model
     */
    protected function _construct()
    {
        $this->_init('DigitalBoutique\Test\Model\ResourceModel\Test');
    }
}