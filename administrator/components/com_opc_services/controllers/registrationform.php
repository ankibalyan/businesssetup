<?php
/**
 * @version     1.0.0
 * @package     com_opc_services
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Balyan <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Registrationform controller class.
 */
class Opc_servicesControllerRegistrationform extends JControllerForm
{

    function __construct() {
        $this->view_list = 'registrationforms';
        parent::__construct();
    }

}