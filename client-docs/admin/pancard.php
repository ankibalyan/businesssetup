		define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php?option=com_users&view=login', 'Please login !!!' );
		}				 
	
				
				//	header(location:JRoute::_('index.php?option=com_users&view=login', false));
					$redirectUrl = urlencode(base64_encode('index.php?option=com_fileupload&view=fileform'));  
					 $redirectUrl = '&return='.$redirectUrl;
					  $joomlaLoginUrl = 'index.php?option=com_users&view=login';
              $finalUrl = $joomlaLoginUrl . $redirectUrl;
			  
//$cookieLogin = $this->user->get('cookieLogin');
//if($cookieLogin) echo "cookieLogin ok";
JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$application = JFactory::getApplication();
//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_fileupload', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_fileupload/assets/js/form.js');
      $model = $this->getModel('Nammaview', 'FileuploadModel');
	echo   $JBASE = str_replace('\\','/', JPATH_BASE);
	echo   $ftppath = $JBASE . '/client-docs';
//echo $HTML_ROOT = str_replace($_SERVER['DOCUMENT_ROOT'], '', $JBASE).'/';

		if(isset($_POST["directorname"]) && $userID){
		
		
				$docUpload="directordin";
				$fileerror=$_FILES[$docUpload]["error"];
		 $fileS =$_FILES[$docUpload]["name"];
		$filepath =$_FILES[$docUpload]["tmp_name"];
		 $fileSize =$_FILES[$docUpload]["size"];
		  
		  
		  
		  $directorname =$_POST["directorname"];
		  $directorAddress =$_POST["directorAddress"];
		  $directorMail =$_POST["directorMail"];
		  $directorEducation =$_POST["directorEducation"];
		  $directorPlace =$_POST["directorPlace"];
		  
		  
		  $directordin =$_FILES["directordin"]["name"];
		  $pancard =$_FILES["pancard"]["name"];
		  $passport =$_FILES["passport"]["name"];
		  $adharcard =$_FILES["adharcard"]["name"];
		  $electioncard =$_FILES["electioncard"]["name"];
		  $drivinglicence =$_FILES["drivinglicence"]["name"];
		  $mobilebill =$_FILES["mobilebill"]["name"];
		  $electricitybill =$_FILES["electricitybill"]["name"];
		  $telephonebill =$_FILES["telephonebill"]["name"];
		  $bankstatement =$_FILES["bankstatement"]["name"];
		 echo $photograph =$_FILES["photograph"]["name"];
		  
		  $promotersname =$_POST["promotersname"];
		  $promotersmail =$_POST["promotersmail"];
		  $promotersshare =$_POST["promotersshare"];
		  

			

	//  echo "Dest :".is_dir($ftppath);
	  if ( ! $_FILES["directordin"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["directordin"]["name"]))
					move_uploaded_file($_FILES["directordin"]["tmp_name"],$ftppath.'/'.$_FILES["directordin"]["name"]);
			}
  if ( ! $_FILES["pancard"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["pancard"]["name"]))
					move_uploaded_file($_FILES["pancard"]["tmp_name"],$ftppath.'/'.$_FILES["pancard"]["name"]);
			}
  if ( ! $_FILES["passport"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["passport"]["name"]))
					move_uploaded_file($_FILES["passport"]["tmp_name"],$ftppath.'/'.$_FILES["passport"]["name"]);
			}
  if ( ! $_FILES["electioncard"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["electioncard"]["name"]))
					move_uploaded_file($_FILES["electioncard"]["tmp_name"],$ftppath.'/'.$_FILES["electioncard"]["name"]);
			}
	  if ( ! $_FILES["drivinglicence"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["drivinglicence"]["name"]))
					move_uploaded_file($_FILES["drivinglicence"]["tmp_name"],$ftppath.'/'.$_FILES["drivinglicence"]["name"]);
			}
  if ( ! $_FILES["mobilebill"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["mobilebill"]["name"]))
					move_uploaded_file($_FILES["mobilebill"]["tmp_name"],$ftppath.'/'.$_FILES["mobilebill"]["name"]);
			}
  if ( ! $_FILES["electricitybill"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["electricitybill"]["name"]))
					move_uploaded_file($_FILES["electricitybill"]["tmp_name"],$ftppath.'/'.$_FILES["electricitybill"]["name"]);
			}
  if ( ! $_FILES["telephonebill"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["telephonebill"]["name"]))
					move_uploaded_file($_FILES["telephonebill"]["tmp_name"],$ftppath.'/'.$_FILES["telephonebill"]["name"]);
			}
	  if ( ! $_FILES["bankstatement"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["bankstatement"]["name"]))
					move_uploaded_file($_FILES["bankstatement"]["tmp_name"],$ftppath.'/'.$_FILES["bankstatement"]["name"]);
			}
  if ( ! $_FILES["photograph"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["photograph"]["name"]))
					move_uploaded_file($_FILES["photograph"]["tmp_name"],$ftppath.'/'.$_FILES["photograph"]["name"]);
			}

		 
		$fileStatus= $model->saveform2($fileS,$fileerror,$filepath,$fileSize);

		}