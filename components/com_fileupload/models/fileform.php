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

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

/**
 * Fileupload model.
 */
class FileuploadModelFileForm extends JModelItem {
    
 	public function setData()
	{
    			$phoneno=str_replace("'","", $_GET["phoneno"]);
    			$custname=str_replace("'","", $_GET["custname"]);
    			$mailid=str_replace("'","", $_GET["mailid"]);
    			$db   = $this->getDbo();
    			$query="select  recId from awfrq_client_advice_contact where  mailid= '$mailid'";
    			$db->setQuery($query);
				$counts=$db->loadObject();
				if($counts)
				{
					$recId=$counts->recId;
						if($recId){
							 return 2;
						}	
				}
				

		 $strqry="INSERT INTO awfrq_client_advice_contact( custname , phoneno , mailid )
		VALUES ( '$custname' , '$phoneno' , '$mailid' )";
			
										//die($strqry);
										$db->setQuery($strqry);
										if($db->query())
											return 1;
										else
											return $strqry;
    }

}