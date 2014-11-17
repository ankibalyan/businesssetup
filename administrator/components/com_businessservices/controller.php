<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * General Controller of BusinessServices component
 */
class BusinessServicesController extends JControllerLegacy
{
        /**
         * display task
         *
         * @return void
         */
        function display($cachable = false, $urlparams = false) 
        {
                // set default view if not set
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'BusinessServicesDisplay'));
 
                // call parent behavior
                parent::display($cachable);
        }
}