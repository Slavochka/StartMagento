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
        $name = ''.$this->getRequest()->getPost('name');
        $email = ''.$this->getRequest()->getPost('email');
        $content = ''.$this->getRequest()->getPost('content');

        $date = new DateTime('YmdHis');

        if(isset($name)&&($name!='') && isset($email)&&($email!='')
            && isset($content)&&($content!='') )
        {
            $faq = Mage::getModel('helpfaq/faq');
            $faq->setData('name', $name);
            $faq->setData('email', $email);
            $faq->setData('content', $content);
            $faq->setData('created', $date);
            $faq->setData('status', "1");
            $faq->save();
        }
        $this->_redirect('faq/index/index');
    }
}