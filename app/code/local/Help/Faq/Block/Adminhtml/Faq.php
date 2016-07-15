<?php

class Help_Faq_Block_Adminhtml_Faq extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        parent::__construct();
        $this->_removeButton('add');
    }

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('helpfaq');
        $this->_blockGroup = 'helpfaq';
        $this->_controller = 'adminhtml_faq';


        $this->_headerText = $helper->__('Faq Management');
    }
}