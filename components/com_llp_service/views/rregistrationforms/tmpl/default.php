<?php

/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
// no direct access
//error_reporting(1);
defined('_JEXEC') or die;
		define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$serviceId=2;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php/login', 'Please login !!!' );
		} 
      $model = $this->getModel('rregistrationforms', 'llp_serviceModel');
	   $JBASE = str_replace('\\','/', JPATH_BASE);
	   $ftppath = $JBASE . '/client-docs';
//echo $HTML_ROOT = str_replace($_SERVER['DOCUMENT_ROOT'], '', $JBASE).'/';

		if(isset($_POST["totalDir"]) && $userID){
		
		$fileStatus= $model->saveform2Documents($serviceId);

		}
		
		if(isset($_POST["firstname"]) && $userID){
		
		$fileStatus= $model->saveform1ContactInfo($serviceId);

		}
		
		if(isset($_POST["companyFirstname"]) && $userID){
		
		$fileStatus= $model->saveform3CompanyInfo($serviceId);

		}
		if(isset($_POST["regService"]['statelist']) && $userID && isset($_POST["regService"]['serviceId'])){
			$serviceId=$_POST["regService"]['serviceId'];
			echo "<div id = 'fileStatus'>" . $fileStatus= $model->saveformRegistration($serviceId) . "</div>";
			echo "<div id = 'redirectUrl'>" . $this->baseurl . "/index.php/llp-service-flow?params=2</div>";
		}
		else
		{
			$app->Redirect($this->baseurl);
		}