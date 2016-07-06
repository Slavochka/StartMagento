<?php

class Help_Faq_Model_Resource_Faq extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('helpfaq/table_faq', 'faq_id');
    }
}