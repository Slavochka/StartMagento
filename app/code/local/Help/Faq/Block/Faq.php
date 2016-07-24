<?php

class Help_Faq_Block_Faq extends Mage_Core_Block_Template
{
    protected function _prepareLayout()
    {
        $breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
        if ($breadcrumbs) {
            $title = $this->__("FAQ");

            $breadcrumbs->addCrumb('home', array(
                'label' => $this->__('Home'),
                'title' => $this->__('Go to Home Page'),
                'link'  => Mage::getBaseUrl()
            ))->addCrumb('faq', array(
                'label' => $title,
                'title' => $title
            ));
        }

        $title = $this->__("FAQ");
        $this->getLayout()->getBlock('head')->setTitle($title);

        return parent::_prepareLayout();
    }

    public function getFaqCollection()
    {
        $limit = Mage::getModel('helpfaq/source_configUserInteractionFaq')->getDisplayedQuestions();
        $faqCollection = Mage::getModel('helpfaq/faq')
            ->getCollection()
            ->addFieldToFilter('status', Help_Faq_Model_Source_Statuses::APPROVED_QUESTION)
            ->setOrder('created', 'DESC')
            ->setPageSize($limit);

        return $faqCollection;
    }

    public function getActionOfForm()
    {
        return $this->getUrl('faq/index/save');
    }
}