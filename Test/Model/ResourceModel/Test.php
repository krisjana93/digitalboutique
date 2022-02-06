<?php
namespace DigitalBoutique\Test\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Main table
     */
    protected function _construct()
    {
        $this->_init('digitalboutique_prodsku', 'id');
    }
}