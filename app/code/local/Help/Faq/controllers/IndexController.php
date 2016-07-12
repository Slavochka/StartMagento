<?php

class Help_Faq_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $faqId = Mage::app()->getRequest()->getParam('id', 0);
        $faq = Mage::getModel('helpfaq/faq')->load($faqId);

        if ($faq->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('faq.content')->assign(array(
                "faqItem" => $faq,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }
}