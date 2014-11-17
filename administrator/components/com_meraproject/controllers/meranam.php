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
 * Meranam controller class.
 */
class MeraprojectControllerMeranam extends JControllerForm
{

    function __construct() {
        $this->view_list = 'mera';
        parent::__construct();
    }

}