<?php

/**
 * @version     1.0.0
 * @package     com_publiclc
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Balyan <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Publiclc helper.
 */
class PubliclcHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_PUBLICLC_TITLE_REGISTRATIONFORMS'),
			'index.php?option=com_publiclc&view=registrationforms',
			$vName == 'registrationforms'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PUBLICLC_TITLE_SERVICEFLOWS'),
			'index.php?option=com_publiclc&view=serviceflows',
			$vName == 'serviceflows'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PUBLICLC_TITLE_CUSTOMS'),
			'index.php?option=com_publiclc&view=customs',
			$vName == 'customs'
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

        $assetName = 'com_publiclc';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
