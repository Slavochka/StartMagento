<?php

class Help_Faq_Model_Resource_Faq_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('helpfaq/faq');
    }
}