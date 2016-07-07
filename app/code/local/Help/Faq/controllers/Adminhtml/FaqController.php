<?php

class Help_Faq_Adminhtml_FaqController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('helpfaq');

        $contentBlock = $this->getLayout()->createBlock('helpfaq/adminhtml_faq');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }

    public function massDeleteAction()
    {
        $faq = $this->getRequest()->getParam('faq', null);

        if (is_array($faq) && sizeof($faq) > 0) {
            try {
                foreach ($faq as $id) {
                    Mage::getModel('helpfaq/faq')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d faq have been deleted', sizeof($faq)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select faq'));
        }
        $this->_redirect('*/*');
    }
}