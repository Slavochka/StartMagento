<?php

class Help_Faq_Adminhtml_FaqController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('User interaction'))->_title($this->__('FAQ'));
        $this->loadLayout()->_setActiveMenu('helpfaq');
        $this->_addContent($this->getLayout()->createBlock('helpfaq/adminhtml_faq'));
        $this->renderLayout();
    }
    
    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_faq', Mage::getModel('helpfaq/faq')->load($id));

        $this->loadLayout()->_setActiveMenu('helpfaq');
        $this->_addContent($this->getLayout()->createBlock('helpfaq/adminhtml_faq_edit'));
        $this->renderLayout();
    }
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('helpfaq/faq');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Faq was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('helpfaq/faq')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Faq was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
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