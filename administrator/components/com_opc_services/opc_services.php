<?php
/**
 * @version     1.0.0
 * @package     com_opc_services
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Balyan <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_opc_services')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Opc_services');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
