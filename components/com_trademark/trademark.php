<?php
/**
 * @version     1.0.0
 * @package     com_trademark
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Kumar <ankit.kr.balyan@gmail.com> - http://igotstudy.com/ankit
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Trademark');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
