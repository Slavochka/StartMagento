<?php

class Help_Faq_Block_Details extends Mage_Core_Block_Template
{
    public function getFaqItem()
    {
        return Mage::registry('faqItem');
    }
}