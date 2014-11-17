<?php
/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');

/**
 * Fileupload model.
 */
class FileuploadModelFileForm extends JModelForm
{
    
    var $_item = null;
    
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('com_fileupload');

		// Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_fileupload.edit.file.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_fileupload.edit.file.id', $id);
        }
		$this->setState('file.id', $id);

		// Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if(isset($params_array['item_id'])){
            $this->setState('file.id', $params_array['item_id']);
        }
		$this->setState('params', $params);

	}
        

	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getData($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('file.id');
			}

			// Get a level row instance.
			$table = $this->getTable();

			// Attempt to load the row.
			if ($table->load($id))
			{
                
                $user = JFactory::getUser();
                $id = $table->id;
                $canEdit = $user->authorise('core.edit', 'com_fileupload') || $user->authorise('core.create', 'com_fileupload');
                if (!$canEdit && $user->authorise('core.edit.own', 'com_fileupload')) {
                    $canEdit = $user->id == $table->created_by;
                }

                if (!$canEdit) {
                    JError::raiseError('500', JText::_('JERROR_ALERTNOAUTHOR'));
                }
                
				// Check published state.
				if ($published = $this->getState('filter.published'))
				{
					if ($table->state != $published) {
						return $this->_item;
					}
				}

				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
				$this->_item = JArrayHelper::toObject($properties, 'JObject');
			} elseif ($error = $table->getError()) {
				$this->setError($error);
			}
		}

		return $this->_item;
	}
    
	public function getTable($type = 'File', $prefix = 'FileuploadTable', $config = array())
	{   
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');
        return JTable::getInstance($type, $prefix, $config);
	}     

    
	/**
	 * Method to check in an item.
	 *
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkin($id = null)
	{
		// Get the id.
		$id = (!empty($id)) ? $id : (int)$this->getState('file.id');

		if ($id) {
            
			// Initialise the table
			$table = $this->getTable();

			// Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
		}

		return true;
	}

	/**
	 * Method to check out an item for editing.
	 *
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkout($id = null)
	{
		// Get the user id.
		$id = (!empty($id)) ? $id : (int)$this->getState('file.id');

		if ($id) {
            
			// Initialise the table
			$table = $this->getTable();

			// Get the current user object.
			$user = JFactory::getUser();

			// Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
		}

		return true;
	}    
    
	/**
	 * Method to get the profile form.
	 *
	 * The base form is loaded from XML 
     * 
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_fileupload.file', 'fileform', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_fileupload.edit.file.data', array());
        if (empty($data)) {
            $data = $this->getData();
        }
        
        return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param	array		The form data.
	 * @return	mixed		The user id on success, false on failure.
	 * @since	1.6
	 */
	public function save($data)
	{
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('file.id');
        $state = (!empty($data['state'])) ? 1 : 0;
        $user = JFactory::getUser();

        if($id) {
            //Check the user can edit this item
            $authorised = $user->authorise('core.edit', 'com_fileupload') || $authorised = $user->authorise('core.edit.own', 'com_fileupload');
            if($user->authorise('core.edit.state', 'com_fileupload') !== true && $state == 1){ //The user cannot edit the state of the item.
                $data['state'] = 0;
            }
        } else {
            //Check the user can create new items in this section
            $authorised = $user->authorise('core.create', 'com_fileupload');
            if($user->authorise('core.edit.state', 'com_fileupload') !== true && $state == 1){ //The user cannot edit the state of the item.

                $data['state'] = 0;
            }
        }

        if ($authorised !== true) {
            JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
            return false;
        }
        
        $table = $this->getTable();
//print_r($table);

//$reflector = new ReflectionClass('FileuploadModelFileForm ');
//echo $reflector->getFileName();

        if ($table->save($data) === true) {
		
            return $id;
        } else {
            return false;
        }
        
	}
	
	
	 function getDoclist($start,$totalRec ) 
	 {
     // Create a new query object.
      $db      = $this->getDbo();
      $query   = $db->getQuery(true);
      $query->select(
         $this->getState(
         'recId',
         'docName',
         'docType'
         )
      );
      $query->from('#__add_doc AS t1');
      $query = "select  recId, docName, docType  from #__add_doc  WHERE  docType=1 and delFlag=0";
	  //die($query);
      $db->setQuery($query);
	  $data = $db->loadObjectList();
	//  print_r($data);
	  //die;
	  if($data)
		return $data;
	  else
		return die("No");
   }
   
   
   
	function getFileList($userID,$ad_docId)
	{
		     $db      = $this->getDbo();

				$strQry = "SELECT docPath FROM  #__added_tmp_documents WHERE userId=$userID and ad_docId=$ad_docId and delFlag=0";
				$db->setQuery($strQry);
		$result = $db->loadObjectList();
        return $result;
	
	}
	
   
   function uploadFileRegister($fileS,$fileerror,$filepath,$fileSize) {
		
		
		
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
//$count= $_POST["rowFlag"];
//$ad_docId= $_POST["recID$count"];

if ($fileerror > 0) {
//  echo "Error: " . $_FILES["docUpload$count"]["error"] . "<br>";
  return 3;
}	 else if (! $_FILES["directordin"]['name'] =='')	{
/*   echo "Upload: " . $_FILES["docUpload$rowFlag"]["name"] . "<br>";
  echo "Type: " . $_FILES["docUpload$rowFlag"]["type"] . "<br>";
  echo "Size: " . ($_FILES["docUpload$rowFlag"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["docUpload$rowFlag"]["tmp_name"]; 
echo $rowFlag=$_POST["rowFlag"];
echo $_FILES["docUpload$rowFlag"]["name"];*/

				
		 if($fileSize>3072000) return 5;
		 
					if(!is_dir(ROOT)):
					die("Ftp Folder Not Exist");
				mkdir(ROOT.DS.'New_Admission'.'/'.'Admission_Year');
					endif; 
					
					if(!is_dir(ROOT.$username)):
				mkdir(ROOT.$username);
					endif; 
					
			
					$docPath= $fileS ;
					$ftpFilepath=ROOT."/$username/".$fileS ;
	
				 	if( ! file_exists($ftpFilepath)){
					move_uploaded_file($filepath,$ftpFilepath); 
// ftp_put($conn_id,$ftpFilepath,$filepath,FTP_BINARY);	
						return 1;
						}
					 else return 0;
					     
   
   
   
   
  }

  }

  
   
   function uploadFile($count) {
		
		
		
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
//$count= $_POST["rowFlag"];
$ad_docId= $_POST["recID$count"];

if ($_FILES["docUpload$count"]["error"] > 0) {
//  echo "Error: " . $_FILES["docUpload$count"]["error"] . "<br>";
  return 3;
}	 else if (! $_FILES["docUpload$count"]['name'] =='')	{
/*   echo "Upload: " . $_FILES["docUpload$rowFlag"]["name"] . "<br>";
  echo "Type: " . $_FILES["docUpload$rowFlag"]["type"] . "<br>";
  echo "Size: " . ($_FILES["docUpload$rowFlag"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["docUpload$rowFlag"]["tmp_name"]; 
echo $rowFlag=$_POST["rowFlag"];
echo $_FILES["docUpload$rowFlag"]["name"];*/

				
				$docUpload="docUpload".$count;
				
		 $fileS =$_FILES[$docUpload]["name"];
		$filepath =$_FILES[$docUpload]["tmp_name"];
		 $fileSize =$_FILES[$docUpload]["size"];
		 if($fileSize>3072000) return 5;
		 
		 
					if(!is_dir(ROOT)):
					die("Ftp Folder Not Exist");
				mkdir(ROOT.DS.'New_Admission'.'/'.'Admission_Year');
					endif; 
					
					if(!is_dir(ROOT.$username)):
				mkdir(ROOT.$username);
					endif; 
					
			
					$docPath= $fileS ;
					$ftpFilepath=ROOT."/$username/".$fileS ;
	
				 	if( ! file_exists($ftpFilepath))
					move_uploaded_file($filepath,$ftpFilepath); 
// ftp_put($conn_id,$ftpFilepath,$filepath,FTP_BINARY);	
					 else return 0;
					     
						$db      = $this->getDbo(); 
						 $strQry   = $db->getQuery(true);
	  	$strQry="INSERT INTO #__added_tmp_documents(userId, ad_docId, docPath) VALUES ($userId , $ad_docId,'$docPath')  ";		
//ALTER TABLE `tmp_new_documents` ADD `Birth Certificate` VARCHAR( 150 ) NULL DEFAULT NULL AFTER ` studentId` 
					
			$db->setQuery($strQry);
                if ($db->query()):
			//	die("Successfully Saved");
                    return 1;
                else:
				die("Failed" . $strQry);
                   return $strQry;
                endif; 
}
}
	
   function deleteFile() {
		
		
		
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
$count= $_POST["rowFlag"];
$ad_docId= $_POST["recID$count"];
			
							     $db      = $this->getDbo();

				$strQry = "SELECT docPath FROM  #__added_tmp_documents WHERE userId=$userId and ad_docId=$ad_docId and delFlag=0";
				$db->setQuery($strQry);
				$FileList = $db->loadObjectList();
				 		foreach($FileList as $ii =>$list1):
							$fileS=$list1->docPath;
						endforeach; 
					$docPath= $fileS ;
				
					$ftpFilepath=ROOT."/$username/".$fileS ;
				 	if( file_exists($ftpFilepath) )
					unlink($ftpFilepath); 
					
// ftp_put($conn_id,$ftpFilepath,$filepath,FTP_BINARY);	
					// else return 0;
					     
						 $strQry   = $db->getQuery(true);
	  	$strQry="update  #__added_tmp_documents set  delFlag=1 where userId=$userId and  ad_docId=$ad_docId  ";	
		
				//	 die("Deleted");
//ALTER TABLE `tmp_new_documents` ADD `Birth Certificate` VARCHAR( 150 ) NULL DEFAULT NULL AFTER ` studentId` 
					
			$db->setQuery($strQry);
                if ($db->query()):
			//	die("Successfully Saved");
			
                    return 1;
                else:
				die("Failed" . $strQry);
                   return $strQry;
                endif; 

}
	
/*         $db = new FDatabase();
        $sessObj = new FSessions();
		$dobj=new FGeneral();
        $schoolID = $sessObj->get("school_id");
        $strQry = "SELECT recId,schoolId,docName,docType FROM add_doc WHERE  schoolId=$schoolID and docType=1 and delFlag=0 ";
         define("PAGE_SQL", $strQry);
        $db->setQueryPaging($strQry, $start, $totalRec);
        $result = $db->loadObjectList();
        return $result; */
	
	
	
	
    
     function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('file.id');
        if(JFactory::getUser()->authorise('core.delete', 'com_fileupload') !== true){
            JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
            return false;
        }
        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } else {
            return false;
        }
        
        return true;
    }
    
}