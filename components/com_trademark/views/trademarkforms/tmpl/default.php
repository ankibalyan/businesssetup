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
		$serviceId=5;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php/login', 'Please login !!!' );
		} 
      $model = $this->getModel('trademarkforms', 'trademarkModel');
	   $JBASE = str_replace('\\','/', JPATH_BASE);
	   $ftppath = $JBASE . '/client-docs';
//echo $HTML_ROOT = str_replace($_SERVER['DOCUMENT_ROOT'], '', $JBASE).'/';

		if(isset($_POST["tmservice"]) && $userID){
		// print_r($_POST);
	 //   	die;
		$fileStatus= $model->saveformTrademark($serviceId);
		echo "<div id = 'fileStatus'>" . $fileStatus . "</div>";
		echo "<div id = 'redirectUrl'>" . $this->baseurl . "/index.php/trademark-services?params=4</div>";
		$app->Redirect($this->baseurl. "/index.php/trademark-services?params=4");
		die;

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
			echo "<div id = 'redirectUrl'>" . jRoute::_('index.php?option=com_trademark&view=trademarkservices&params=2')."</div>";
			die("Came");
		}
		else
		{
			$app->Redirect($this->baseurl);
		}