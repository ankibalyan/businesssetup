<?php

/**
 * @version     1.0.0
 * @package     com_meraproject
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Meraproject helper.
 */
class MeraprojectHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_MERAPROJECT_TITLE_MERA'),
			'index.php?option=com_meraproject&view=mera',
			$vName == 'mera'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_MERAPROJECT_TITLE_MERAV1EWS'),
			'index.php?option=com_meraproject&view=merav1ews',
			$vName == 'merav1ews'
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

        $assetName = 'com_meraproject';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
