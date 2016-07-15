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
            // better Mage::registry
            $this->getLayout()->getBlock('faq.content')->assign(array(
                "faqItem" => $faq,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            try {
                $faq = Mage::getModel('helpfaq/faq');
                $faq->setData($data)->setName($this->getRequest()->getParam('name'));
                $faq->setData($data)->setEmail($this->getRequest()->getParam('email'));
                $faq->setData($data)->setContent($this->getRequest()->getParam('content'));
                $faq->setData($data)->setCreated(now());
                $faq->setData($data)->setStatus(1);
                $faq->save();

                Mage::getSingleton('core/session')->addSuccess($this->__('Question was added successfully'));
                $this->_redirect('faq/index/index');
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError($e->getMessage());
                $this->_redirect('faq/index/index');
            }
        }
    }
}