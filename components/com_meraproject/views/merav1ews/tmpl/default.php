<?php

		define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php?option=com_users&view=login', 'Please login !!!' );
		}				 
		$model = $this->getModel('merav1ews', 'MeraprojectModel');

		  $addressproof_file=$_FILES["addressprooffile".$i]["name"];
		  if($_FILES["addressprooffile2"]["name"])
		  echo "can upload";
		  else
		  echo "Canot set";
		  var_dump($_FILES);
	?>