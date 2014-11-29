<?php
/**
* @package Joomla.Administrator
* @subpackage com_businessservices
*
* @copyright Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
 
// No direct access to this file
defined('_JEXEC') or die;
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * Business Service Component Controller
 *
 * @since   0.0.1
 */
class BusinessServicesController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false) 
        {
		$user = JFactory::getUser();
		$can_user = $user->authorise('core.edit', 'com_businessservices');

		$document = JFactory::getDocument();
		//stylesheets
		$document->addStylesheet(JURI::base().'components/com_businessservices/assets/css/style.css');
		//javascripts
		$document->addScript(JURI::base().'components/com_businessservices/assets/js/javascript.js');

				// set default view if not set
                $input = JFactory::getApplication()->input;
                ($can_user)?$input->set('view', $input->getCmd('view', 'Dashboard')):$input->set('view', $input->getCmd('view', 'BusinessServices'));
                require_once JPATH_COMPONENT . '/helpers/helper.php';
                // call parent behavior
                parent::display($cachable);
        }
        
}