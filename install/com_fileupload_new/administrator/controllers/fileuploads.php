<?php
/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Fileuploads controller class.
 */
class FileuploadControllerFileuploads extends JControllerForm
{

    function __construct() {
        $this->view_list = 'fileuploadss';
        parent::__construct();
    }

}