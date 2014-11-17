<?php
die("view.html");
$redirectUrl='';

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
      $model = $this->getModel('meranam', 'MeraprojectModel');
	echo   $JBASE = str_replace('\\','/', JPATH_BASE);
	echo   $ftppath = $BASE . '/client-docs';
//echo $HTML_ROOT = str_replace($_SERVER['DOCUMENT_ROOT'], '', $JBASE).'/';


			 $filepath =$_FILES["directordin"]["tmp_name"];
			 $directordin =$_FILES["directordin"]["name"];
			 $ftpFilepath=$ftppath.$directordin;


	  echo "Dest :".is_dir($ftppath);
	   	if( ! file_exists($ftpFilepath))
					move_uploaded_file($filepath,$ftpFilepath);
					echo "uploaded Suceessfully";
// ftp_put($conn_id,$ftpFilepath,$filepath,FTP_BINARY);	
					 else return 0;

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
		  $photograph =$_FILES["photograph"]["name"];
		  
		  $promotersname =$_POST["promotersname"];
		  $promotersmail =$_POST["promotersmail"];
		  $promotersshare =$_POST["promotersshare"];
		  
		 
		$fileStatus= $model->saveform2($fileS,$fileerror,$filepath,$fileSize);

		}
			
?>





<form action="" enctype="multipart/form-data" method="post">Wheather Directors and Promoters are the same<input id="cdnp" name="checkDNP" type="checkbox" value="yes" />
<table id="defaultdnp">
<tbody>
<tr>
<td colspan="2">
<h3>Details of directors</h3>
</td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>Name of Director</td>
<td><input id="directorname" name="directorname" type="text" /></td>
</tr>
<tr>
<td>Address of director</td>
<td><input name="directorAddress" id="directorAddress" type="text" /></td>
</tr>
<tr>
<td>Mail ID of director</td>
<td><input name="directorMail" id="directorMail" type="text" /></td>
</tr>
<tr>
<td>Education Qualification</td>
<td><input name="directorEducation" id="directorEducation" type="text" /></td>
</tr>
<tr>
<td>Place of birth</td>
<td><input name="directorPlace" id="directorPlace" type="text" /></td>
</tr>
<tr>
<td>DIN if already applied</td>
<td><input id="directordin" name="directordin" type="file" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td colspan="2">
<h3>Documents Upload</h3>
</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>PAN Card</td>
<td><input id="pancard" name="pancard" type="file" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td colspan="2"><b>Identity Proof</b></td>
<td> </td>
</tr>
<tr>
<td colspan="2"><small>* Anyone of the following</small></td>
<td> </td>
</tr>
<tr>
<td>Passport</td>
<td><input id="passport" name="passport" type="file" /></td>
</tr>
<tr>
<td>Aadhar Card</td>
<td><input id="adharcard" name="adharcard" type="file" /></td>
</tr>
<tr>
<td>Election Card</td>
<td><input id="electioncard" name="electioncard" type="file" /></td>
</tr>
<tr>
<td>Driving License</td>
<td><input id="drivinglicence" name="drivinglicence" type="file" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td colspan="2"><b>Address Proof</b></td>
<td> </td>
</tr>
<tr>
<td colspan="2"><small>* Anyone of the following</small></td>
<td> </td>
</tr>
<tr>
<td>Mobile Bill</td>
<td><input id="mobilebill" name="mobilebill" type="file" /></td>
</tr>
<tr>
<td>Electricity Bill</td>
<td><input id="electricitybill" name="electricitybill" type="file" /></td>
</tr>
<tr>
<td>Telephone Bill</td>
<td><input id="telephonebill" name="telephonebill" type="file" /></td>
</tr>
<tr>
<td>Bank Statement</td>
<td><input id="bankstatement" name="bankstatement" type="file" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>Photograph</td>
<td><input id="photograph" name="photograph" type="file" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td colspan="3">
<table id="dnp" style="display: none;">
<tbody>
<tr>
<td>
<h3>Details of promoters</h3>
</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td> </td>
</tr>
<tr>
<td>Name</td>
<td><input name="promotersname" id="promotersname" type="text" /></td>
</tr>
<tr>
<td>Mail ID</td>
<td><input name="promotersmail" id="promotersmail" type="text" /></td>
</tr>
<tr>
<td>% of share holding</td>
<td><input name="promotersshare" id="promotersshare" type="text" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<p><input type="submit" value="Proceed" /></p>
</form>
