<?php

class Help_Faq_Block_Faq extends Mage_Core_Block_Template
{
    public function getFaqCollection()
    {
        $faqCollection = Mage::getModel('helpfaq/faq')->getCollection();
        $faqCollection->setOrder('created', 'DESC');
        return $faqCollection;
    }
}