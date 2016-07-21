<?php

class Help_Faq_Model_Source_ConfigUserInteractionFaq
{
    const PATH_TO_FRONTEND_VIEW = 'faq/frontend_view/';
    const ENABLED = self::PATH_TO_FRONTEND_VIEW.'enabled';
    const DISPLAYED_QUESTIONS = self::PATH_TO_FRONTEND_VIEW.'displayed_questions';

    public function isEnabled ()
    {
        if (Mage::getStoreConfig(self::ENABLED) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function setDisplayedQuestions ($questionsNumber)
    {

    }
}