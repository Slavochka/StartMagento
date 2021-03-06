<?php

class Help_Faq_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $isEnabled = Mage::getModel('helpfaq/source_configUserInteractionFaq')->isEnabled();
        //$isEnabled = true;
        if ($isEnabled)
        {
            $this->loadLayout();
            $this->renderLayout();
        }
        else
        {
            $this->norouteAction();
        }
    }

    public function detailsAction()
    {
        $faqId = Mage::app()->getRequest()->getParam('id', 0);
        $faq = Mage::getModel('helpfaq/faq')->load($faqId);

        if ($faq->getId() > 0) {
            Mage::register('faqItem', $faq);
            $this->loadLayout()->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

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