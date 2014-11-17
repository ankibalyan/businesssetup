<?php
/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
// no direct access
$redirectUrl='';

		define( 'ROOT', 'F:/ftp/test' );
defined('_JEXEC') or die;
					$user = JFactory::getUser();
					echo $userID=$user->get('id');
					 $username =$user->username;
					 
/* 
if($user->usertype == "Super Administrator" || $user->usertype == "Administrator"){
echo 'You are an Administrator';
}
else{
echo 'You are just an ordinary user';
} 
if ($user->authorise( 'com_fileupload', 'edit', 'content', 'all' )) {
  echo 'Editing permitted.';
} else {
  echo 'Editing not permitted.';
}
 */	
 
 $app = JFactory::getApplication();

if ($user->id == 0) {
	$app->Redirect( 'index.php?option=com_users&view=login', 'Please login !!!' );
}				 
	
					if( ! $userID){
					$loginpage=JRoute::_('index.php?option=com_users&view=login',false);
				//	header("Location: JRoute::_('index.php?option=com_users&view=login',false)");
					
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
      $model = $this->getModel('FileForm', 'FileuploadModel');
	  

		if(isset($_POST["directorname"]) && $userID){
		
		
				$docUpload="directordin";
				$fileerror=$_FILES[$docUpload]["error"];
		 $fileS =$_FILES[$docUpload]["name"];
		$filepath =$_FILES[$docUpload]["tmp_name"];
		 $fileSize =$_FILES[$docUpload]["size"];
		 
		$fileStatus= $model->uploadFileRegister($fileS,$fileerror,$filepath,$fileSize);
		
		
		
		
		
		
		
		
		
		
		
		
		}
			
			

		if(isset($_POST["rowFlag"]) && $userID){
			
			
			//function For Upload the file
			if($_POST["UDFlag"]==1)	{
			//	 die("Entered1");
			$docCount=$_POST["docCount"];
		
			for( $i=1; $i<=$docCount;  $i++){
			
			$docUpload="docUpload".$i;
			if( isset($_FILES[$docUpload]["name"])){
									$fileStatus= $model->uploadFile($i);
									if($fileStatus==0):
											JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
									else : if($fileStatus==3){  }
									else  if($fileStatus==5){ 
											JFactory::getApplication()->enqueueMessage(JText::_('"Filesize Should be less than 3MB."'), 'error');
											}
											JFactory::getApplication()->enqueueMessage('Uploaded SuccessFully','notice');
									endif;
						}
						
					}
			} else 	if($_POST["UDFlag"]==2)	{
				
					// die("Entered2");
						$fileStatus= $model->deleteFile();
									if($fileStatus==0):
											JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
									else :
											JFactory::getApplication()->enqueueMessage('Deleted SuccessFully','notice');
									endif;
					
					
				
				}
		}
				
				
				

      $doclist = $model->getDoclist(0,10);
//$doclist = $modObj->getDoclist($start,$totalRec);
//$session =& JFactory::getSession();
//print_r($session);


 
//Add a message to the message queue
//$application->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
 
/** Alternatively you may use chaining */
//JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');

?>
</style>
<script type="text/javascript">
//alert("First")
//    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
			
    $('#form-file').ajaxForm({
        dataType:'script',
        success:function(result) { 
		 resetMessage();
		alert(result);
			$("#loader").fadeOut();
            if(result==1)
            {
			displayMessage("* Saved successfully!","passmsg","frmmsg");
			
         		 $(".formholder2").fadeOut();
				 displayMessage("* Saved successfully!","passmsg","frmmsg");
               	  displayMessage("* Saved successfully!","passmsg","frmmsg");
              // loadFolder();
                }
            else if(result==2)
            {
                displayMessage("* Sorry! We could not save the file, Duplicate School","errmsg","frmmsg");
            }
			 else if(result==3)
            {
		 
		   DocReport(studentID);
		    
           displayMessage("* Saved successfully!","passmsg","frmmsg");
		   alert("Saved successfully!")
                  }
				   else if(result==4)
            {
           displayMessage("* Saved successfully!","passmsg","frmmsg");
		   alert("Saved successfully!")
		     }
			 		   else if(result==5)
            {
          displayMessage("* Sorry! File Size should be within 1MB","errmsg","frmmsg");
              }else if(result==6)
			   {
		 
		   DocReport(studentID);
		    
           displayMessage("* Deleted the Document successfully!","passmsg","frmmsg");
		   alert("Deleted successfully!")
                  }
				  
			else if(result==7)
			   {
			   displayMessage("* Sorry! We could not delete the file","errmsg","frmmsg");
         }
		 	else if(result==9)
			   {
			   displayMessage("* Sorry! Same File Already Exist","errmsg","frmmsg");
			   alert("Same File Already Exist")
         }
            else
            {
              displayMessage("* Sorry! We could not save , Please try again","errmsg","frmmsg");
            }
            document.FrmStudentReg.action="javascript:void(0);";
        }
    });	   

            
        });
		
		
		
	function saveDoc1(SlNo , Studentid)	{
	
 
						var docUpload=jQuery("#docUpload"+SlNo).val();
						var rowFlag=jQuery("#rowFlag").val(SlNo);
						UDFlag=jQuery("#UDFlag").val(1);		// UDFlag= 1 for upload
						rowFlag=jQuery("#rowFlag").val();
					
					if(docUpload==0){
						alert("Select a File to Upload")
						}	 else		{
						
						$("#form-file").attr("action",  "<?php echo JRoute::_('index.php?option=com_fileupload&task=file.save'); ?>");
				 }
		}
		
		
		
		
	function DelDoc(SlNo , Studentid)	{
	
				var docUpload=jQuery("#docUpload"+SlNo).val();
				var UDFlag=jQuery("#UDFlag").val(2);				// UDFlag= 2 for delete
				var rowFlag=jQuery("#rowFlag").val(SlNo);
				UDFlag=jQuery("#UDFlag").val();
				rowFlag=jQuery("#rowFlag").val();
			//	alert(docUpload)
			//	alert(UDFlag)
		
		}

</script>

<div class="file-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h3>Document Details</h3>
    <?php endif; ?>
    <form id="form-file" action="" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
			
			<input type="text" name="directorname" id="directorname" value="0" />
			<input type="file" name="directordin" id="directordin" />
			<input type="hidden" name="rowFlag" id="rowFlag" value="0" />
			<input type="hidden" name="UDFlag" id="UDFlag" value="0" />
	 <table  cellpadding="2" cellspacing="0" border="0" style=" margin-left:20px"  class="gridtabel"   style="  width:80% ">
                     <thead>
                      <tr>
					 <td style="width:10%;">SlNo</td> 
					 <td style="width:30%;">Document Name</td>
					 
					   <td style="width:20%;">File</td> 
                        <td style="width:20%;">Upload Status</td> 
                     <!-- <td><a href='javacript:uploadDoc(  ".$recId."  , ". $slNo ."  )' >Upload<a/></td>
				<input type='radio' name='require".$slNo."' id='NA".$slNo."' /> 
				 <input type='radio' name='require".$slNo."' id='no".$slNo."' />
				<input type='radio' name='require".$slNo."' id='yes".$slNo."' />
				<iframe id="iFrame" src='' style='display:none;' scrolling='no' frameborder='0' > </iframe>
				
				$info=uploadprogress_get_info($get['id'])
				$total=round(info['bytes_total']/1024);
				$Uploaded=round(info['bytes_uploaded']/1024);-->    
                    </tr></thead>
            
                 <tbody  id="docDetails">





 <?php
			

			  $slNo=0;
/* 			  print_r($doclist);
			 foreach($doclist  as  $list) :
			 echo $list->recId;	
			 echo $list->docName;	
			 endforeach;
		
			 while($row=$doclist){
			 echo $slNo++;	
			 echo $row['recid'];
			echo $row[1];
			 if($slNo==10) break;
			 }
			 	  die; */
			 foreach($doclist  as  $i =>$list) :
			 
			 $slNo++;
			 
				 $recId=$list->recId;
				 $doctype=$list->docType;
				 $docname=$list->docName;
				 $studentID=1;
				 
				  $FileList = $model->getFileList($userID, $recId);
  $fileName='';
 // print_r($FileList);
 		foreach($FileList as $ii =>$list1):
$fileName=$list1->docPath;
		endforeach; 
		 
			$InputFile="<input type='file'  name='docUpload". $slNo ."' id='docUpload". $slNo ."' value='Upload' class='buttons' />";
		$UDFile="Pending";//"<input name='Upload".$slNo."' type='submit' class='buttons' id='Upload".$slNo."' value='Upload' onclick='saveDoc1(".$slNo.",".$studentID .")' />";
	 	if(!$fileName==null){
				$UDFile="<input name='Delete".$slNo."' type='submit' class='buttons' id='Delete".$slNo."' value='Delete' onclick='DelDoc(".$slNo.",".$studentID .")' />";
				$InputFile='';
			$InputFile=$fileName;//"<input type='text' class='textbox1' readonly='readonly' name='filename". $slNo ."' id='filename". $slNo ."' value='".$fileName."' />";
				}
		echo "<tr>
				 <td>$slNo</td>
				 <td id='docname".$slNo."'  name='docname".$slNo."' >$docname 
				 <input type='hidden' value='$recId'  name='recID".$slNo."' id='recID".$slNo."' />
				  <input type='hidden' value='$studentID'  name='studentID".$slNo."' id='studentID".$slNo."' />
				 </td>
				  
				<td>".$InputFile."</td>
				 <td>".$UDFile."</td>
			
				</tr> ";
				 
				   
                
				 endforeach;
				 
				  if ($slNo == 0):
                          
						  echo "<tr><td colspan='4'>No Document available!</td></tr>";
                        else:
                   echo "<tr><td colspan='3' align='right'><input name='Upload1' type='submit' class='buttons' id='Upload1' value='Upload' onclick='saveDoc1(1,".$studentID .")' /></td></tr>";
				 ?>
				 
		<input type='hidden'    value="<?php echo $slNo; ?>"  id="docCount" name="docCount" />
		
				<?php
				 endif;
				 
				 ?> 
				  
 </tbody>
				 </table>	
 			 
    </form>
</div>
