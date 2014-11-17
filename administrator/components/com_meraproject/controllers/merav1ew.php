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

jimport('joomla.application.component.controllerform');

/**
 * Merav1ew controller class.
 */
class MeraprojectControllerMerav1ew extends JControllerForm
{

    function __construct() {
        $this->view_list = 'merav1ews';
        parent::__construct();
    }

}