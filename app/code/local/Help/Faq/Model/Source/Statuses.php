<?php

class Help_Faq_Model_Source_Statuses extends Varien_Data_Collection
{
    public function toOptionArray()
    {
        $helper = Mage::helper('helpfaq');

        $statuses = array(
            array('value' => '1', 'label' => $helper->__('New')),
            array('value' => '2', 'label' => $helper->__('Approved')),
            array('value' => '3', 'label' => $helper->__('Rejected')),
        );
        return $statuses;
    }
}