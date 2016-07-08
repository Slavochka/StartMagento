<?php

class Help_Faq_Block_Adminhtml_Faq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'helpfaq';
        $this->_controller = 'adminhtml_faq';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('helpfaq');
        $model = Mage::registry('current_faq');

        if ($model->getId()) {
            return $helper->__("Edit Faq item");
        } else {
            return $helper->__("Add Faq item");
        }
    }

}