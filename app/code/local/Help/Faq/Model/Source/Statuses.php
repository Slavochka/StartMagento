<?php

class Help_Faq_Model_Source_Statuses extends Varien_Data_Collection
{
    const NEW_QUESTION = 1;
    const APPROVED_QUESTION = 2;
    const REJECTED_QUESTION = 3;

    public function toOptionArray()
    {
        $helper = Mage::helper('helpfaq');

        $statuses = array(
            array('value' => self::NEW_QUESTION, 'label' => $helper->__('New')),
            array('value' => self::APPROVED_QUESTION, 'label' => $helper->__('Approved')),
            array('value' => self::REJECTED_QUESTION, 'label' => $helper->__('Rejected')),
        );
        return $statuses;
    }

    public function getOptions() 
    {
        $options = array();
        foreach ($this->toOptionArray() as $option) {
            $options[$option['value']] = $option['label'];
        }
        return $options;
    }
}