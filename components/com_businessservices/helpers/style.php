<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
 
class BusinessServicesHelpersStyle
{
    static function load()
    {
        $document = JFactory::getDocument();
         
        //stylesheets
        $document->addStylesheet(JURI::base().'components/com_businessservices/assets/css/style.css');
         
        //javascripts
        $document->addScript(JURI::base().'components/com_businessservices/assets/js/sfcusDash.js');
    }

    
}
