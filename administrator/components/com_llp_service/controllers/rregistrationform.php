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

jimport('joomla.application.component.controllerform');

/**
 * Rregistrationform controller class.
 */
class Llp_serviceControllerRregistrationform extends JControllerForm
{

    function __construct() {
        $this->view_list = 'rregistrationforms';
        parent::__construct();
    }

}