<?php

/**
 * @version     1.0.0
 * @package     com_llp_service
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Llp_service helper.
 */
class Llp_serviceHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_LLP_SERVICE_TITLE_RREGISTRATIONFORMS'),
			'index.php?option=com_llp_service&view=rregistrationforms',
			$vName == 'rregistrationforms'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_LLP_SERVICE_TITLE_SERVICEFLOWS'),
			'index.php?option=com_llp_service&view=serviceflows',
			$vName == 'serviceflows'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_llp_service';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
