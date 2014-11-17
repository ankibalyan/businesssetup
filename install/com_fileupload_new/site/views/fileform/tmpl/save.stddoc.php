<?php
die;
define('DS', DIRECTORY_SEPARATOR);
define('ABSOLUTE_PATH', dirname(__FILE__));
define('RELATIVE_PATH', DS.'staff'.DS.'studregistration');
define('ROOT', str_replace(RELATIVE_PATH, "", ABSOLUTE_PATH));
require_once ( ROOT . DS . 'staff' . DS . 'includes.php' );
require_once ( ROOT . DS . 'staff' . DS . 'studregistration' . DS . 'model' . DS . 'model.php' );
  $slNo = $_GET["param"] ;
  $studentID = $_GET["param1"] ;
 
 $modObj = new ModStudRegistration();
 echo $docSaved= $modObj->Savedoc();
	
?>