<?php

class Help_Faq_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /*public function viewAction()
    {
        $faqId = Mage::app()->getRequest()->getParam('id', 0);
        $faq = Mage::getModel('helpfaq/faq')->load($faqId);

        if ($faq->getId() > 0) {
            $this->loadLayout();
            // better Mage::registry
            $this->getLayout()->getBlock('faq.content')->assign(array(
                "faqItem" => $faq,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }*/

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            try {
                $faq = Mage::getModel('helpfaq/faq')->setData($data);
                $faq->setCreated(now());
                $faq->setStatus(1);
                $faq->save();

                Mage::getSingleton('core/session')->addSuccess($this->__('Question was added successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('faq/index/index');
    }
}