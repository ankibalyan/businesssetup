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

//jimport('joomla.application.component.view');

/**
 * View to edit
 */
class FileuploadViewFileform extends JViewLegacy {

		 
    public function display($tpl = null) {

		  $model = $this->getModel('Fileform', 'FileuploadModel');
    		if(isset($_GET["custname"])){
    			
    			  $result= $model->setData();
    			if($result==1){
    				echo "1";
    			} elseif ($result==0) {
    				echo "0";
    			} elseif ($result==2) {
    				echo "2";
    			}
    		}
    		die;

        parent::display($tpl);
    }

   
}
