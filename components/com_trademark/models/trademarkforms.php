<?php

/**
 * @version     1.0.0
 * @package     com_llp_service
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Llp_service records.
 */
class TrademarkModelTrademarkForms extends JModelList {

    /**
     * Constructor.
     *
     * @params    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                
            );
        }
        parent::__construct($config);
    }
	
	
	
	

				 function saveformRegistration($service_flag){
							
							$user = JFactory::getUser();
							$app = JFactory::getApplication();
							$db	= $this->getDbo();
							$userID=$user->get('id');
							$JBASE = str_replace('\\','/', JPATH_BASE);
							$ftppath = $JBASE . '/client-docs';
		$user = JFactory::getUser();
		$userId=$user->get('id');
		$username =$user->username;
		extract($_POST['regService']);
		$strqry="INSERT INTO awfrq_client_company_registration( userId, country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,
		PAN_Application_price,TAN_Application_gov_fee,TAN_Application_price,	Business_Commencement_gov_fee,Business_Commencement_price,	Service_Tax_Documents_gov_fee,
		Service_Tax_Documents_price,	Shops_Establishments_gov_fee,Shops_Establishments_price,	share_capital,total_gov_fee,total_price_fee ,service_flag)
		VALUES (	 $userId,'$statelist','$numdirectors','$companyregistrationpvtltd_gov','$companyregistrationpvtltd_price','$ptlt1_gov',
						'$ptl1t1_price',	'$ptlt2_gov','$ptl1t2_price'	,'$ptlt3_gov','$ptl1t3_price',		'$ptlt4_gov',
						'$ptl1t4_price',	'$ptlt5_gov','$ptl1t5_price', 	'$sharecapital',	'$total_gov',	'$total_price' , $service_flag)";
					
		//die($strqry);
		$db->setQuery($strqry);
		if($db->query())
			return true;
				//die("Saved Successfully");
		else
			return false;
	}
		// $strQry="SELECT register_id,country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,PAN_Application_price, TAN_Application_gov_fee,
  //       TAN_Application_price,Business_Commencement_gov_fee,Business_Commencement_price,Service_Tax_Documents_gov_fee, Service_Tax_Documents_price,Shops_Establishments_gov_fee,
  //       Shops_Establishments_price,share_capital, total_gov_fee, total_price_fee 
  //       FROM awfrq_client_company_registration
  //       WHERE userId= $userID and delFlag=0 and service_flag=$service_flag ";
  //       $db->setQuery($strQry);
  //       $result = $db->loadObjectList();
		// $different=0;
		//  foreach ($result as $list) :
		//   $register_id =$list->register_id;
		//   $country_state =$list->country_state;
		//   $no_of_directors =$list->no_of_directors;
		//   $share_capital =$list->share_capital;
		//   endforeach;
		// 							$strQry1="select register_id from awfrq_client_company_registration where userid=$userId and delFlag=0 and service_flag='$service_flag'";
		// 							$query1	=$db->setQuery($strQry1);
		// 							$counts=$db->loadObject();
		// 							if($counts){
		// 									$registerid=$counts->register_id;
		// 									   if($no_of_directors == $numdirectors){ } else {	$different=1; }
		// 									   if($country_state == $statelist ){ } else { $different=1; }
		// 									   if($share_capital == $sharecapital ){ } else { $different=1; }
																		   
		// 										if($different==1){
															
		// 													$strqry="update awfrq_client_company_registration set delFlag=1  where userId=$userId and service_flag='$service_flag'  and delFlag=0";
																	
							
		// 											$db->setQuery($strqry);
		// 											if($db->query()) {

		// 												$strqry="INSERT INTO awfrq_client_company_registration( userId, country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,
		// 												PAN_Application_price,TAN_Application_gov_fee,TAN_Application_price,	Business_Commencement_gov_fee,Business_Commencement_price,	Service_Tax_Documents_gov_fee,
		// 												Service_Tax_Documents_price,	Shops_Establishments_gov_fee,Shops_Establishments_price,	share_capital,total_gov_fee,total_price_fee , service_flag)
		// 												VALUES (	 $userId,'$statelist','$numdirectors','$companyregistrationpvtltd_gov','$companyregistrationpvtltd_price','$ptlt1_gov',
		// 												'$ptl1t1_price',	'$ptlt2_gov','$ptl1t2_price'	,'$ptlt3_gov','$ptl1t3_price',		'$ptlt4_gov',
		// 												'$ptl1t4_price',	'$ptlt5_gov','$ptl1t5_price', 	'$sharecapital',	'$total_gov',	'$total_price' , $service_flag)";

		// 												//die($strqry);
		// 												$db->setQuery($strqry);
		// 												if($db->query())
		// 													$app->Redirect('index.php/trademark-services?params=2');
		// 												else
		// 													$app->Redirect('index.php/service/incorporations/llp');
		// 											} else
		// 													$app->Redirect('index.php/service/incorporations/llp');
										
		// 										} else {
																		
		// 													$strqry="update awfrq_client_company_registration set country_state='$statelist' , no_of_directors='$numdirectors' ,Registration_Pvt_Ltd_gov_fee='$companyregistrationpvtltd_gov' ,
		// 													Registration_Pvt_Ltd_price= '$companyregistrationpvtltd_price' , PAN_Application_gov_fee='$ptlt1_gov' ,PAN_Application_price= '$ptl1t1_price' , TAN_Application_gov_fee ='$ptlt2_gov' ,
		// 													TAN_Application_price ='$ptl1t2_price' ,Business_Commencement_gov_fee ='$ptlt3_gov' , Business_Commencement_price ='$ptl1t3_price' , Service_Tax_Documents_gov_fee='$ptlt4_gov' ,
		// 													Service_Tax_Documents_price ='$ptl1t4_price' ,Shops_Establishments_gov_fee ='$ptlt5_gov' ,Shops_Establishments_price= '$ptl1t5_price' , share_capital ='$sharecapital' ,
		// 													total_gov_fee ='$total_gov' ,total_price_fee='$total_price'  where userId=$userId and service_flag='$service_flag' and delFlag=0 "; 
		// 																//die($strqry);	
		// 																	$db->setQuery($strqry);
		// 																	if($db->query()) {	$app->Redirect('index.php/trademark-services?params=2');
		// 																		} else
		// 																			$app->Redirect('index.php/service/incorporations/llp');
		// 													}									
									
		// 								}
									//	$registerid=1;//$counts->register_id;	$app->Redirect('index.php/pvt-f1');
										
							 
   function saveform1ContactInfo($service_flag) {
		
		
			$app = JFactory::getApplication();
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
						$db      = $this->getDbo(); 
						 $strQry   = $db->getQuery(true);
						 $fname= str_ireplace("'" , "" ,$_POST["firstname"]);
						 $lastname= str_ireplace("'" , "" ,$_POST["lastname"]);
						 $contact=str_ireplace("'" , "" ,$_POST["contact"]);
						 $mailid=str_ireplace("'" , "" ,$_POST["mailid"]);
						 if($fname==''||$lastname==''||$contact==''||$mailid=='' ) {
						 	$app->Redirect($this->baseurl.'index.php/trademark-services?params=2', " Invalid Details , Please provide valid data ");
						 }
						// $slist=$_POST["slist"];
					//	 $address=$_POST["address"];
					//	 $city=$_POST["city"];
					//	 $service_flag=2;
						 
						$db = $this->getDbo(); 
						 	$strQry1="select register_id from awfrq_client_company_registration where userid=$userId and service_flag='$service_flag' and delFlag=0";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										//print_r($counts);
										if( ! $counts)
											$app->Redirect('index.php/service/incorporations/login', 'Not Registered' );
										 
										 $registerid=$counts->register_id;
										  
										 $strQry1="select recId from awfrq_client_contact_and_entity_info where register_id=$registerid";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										$found=$counts->recId;
										// die ("Validation is going on!!!!");
										if( $found ){
										 // , contact_country_state ='$slist' ,  city = '$city' , address ='$address'
						$strQry=" update awfrq_client_contact_and_entity_info set contact_first_name='$fname' , contact_last_name ='$lastname' , contact_number =$contact , mail_id='$mailid'
											where register_id= $registerid ";
						 
						$db->setQuery($strQry);
							if ($db->query()):
				
												$strqry_director1="select count(*) as directorsCount  from  awfrq_client_company_documents  where register_id=$registerid";
												$query1=$db->setQuery($strqry_director1);
												$Dircounts1=$db->loadObject();
												 $directorsCount=$Dircounts1->directorsCount;
													if($directorsCount == 0){
														$app->Redirect( 'index.php/trademark-services?params=3' );
													} else {
													
																$strQry1="select recId from awfrq_client_company_documents where register_id=$registerid";
																$query1	=$db->setQuery($strQry1);
																$counts=$db->loadObject();
																$found=$counts->recId;
																	if( $found ){
																		$app->Redirect( 'index.php/trademark-services?params=3' );
																	}
																	else {
																	$app->Redirect('index.php/');
																	}
													}
                else:
				$app->Redirect( 'index.php/trademark-services?params=2' );
                endif; 
						 } else {
									//,'$slist','$city','$address'  ,contact_country_state,city,address
									$strQry="INSERT INTO awfrq_client_contact_and_entity_info(register_id,contact_first_name,contact_last_name,contact_number , mail_id) VALUES 
													($registerid,'$fname','$lastname',$contact,'$mailid')";
													$db->setQuery($strQry);
													if ($db->query()):
														$app->Redirect( 'index.php/trademark-services?params=3' );
													else:
														$app->Redirect( 'index.php/trademark-services?params=2' , 'Could not save.');
														endif; 
						}

}





					
	 
 	function saveformTrademark($record_id)
 	{
		$app = JFactory::getApplication();
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username=$user->get('username');
		$JBASE = str_replace('\\','/', JPATH_BASE);
		$ftppathclient = $JBASE . '/client-docs';
		$status = "processing";
		$db	= $this->getDbo();
		if( !is_dir($ftppathclient))
		mkdir($ftppathclient);
		$service_flag=5;
		
		$ftppath = $ftppathclient.'/'.$username;
		if( !is_dir($ftppath))
		mkdir($ftppath);
		$data = $_POST['tmservice'];
		unset($data["service-submit"]);
		$record_id = null;
		if ($record_id) {
			$row = "";
			foreach ($data as $key => $value) {
				$row .= $key ." = '".$value."'";
			}
			$sql = "UPDATE `#__bstrademarks` SET $row WHERE `record_id` = '$record_id'";
			# code...
		} else
		{
			$columns = implode(", ",array_keys($data));
			$escaped_values = array_map('mysql_real_escape_string', array_values($data));
			$values  = implode("', '", $escaped_values);
			$sql = "INSERT INTO `#__bstrademarks` ($columns) VALUES ('$values')";
		}
		
		
		
		$db->setQuery($sql);
		if($db->query())
		{
			return 1;
		}
		return 0;
	 }
	public function array_from_post($fields)
	{
		$data=array();
		foreach($fields as $field => $value)
		{
			$data[$field]=addslashes($value);
		}
		return $data;
	}			
						
					 function saveform3CompanyInfo($service_flag){
								
								$user = JFactory::getUser();
								$db	= $this->getDbo();
								$app = JFactory::getApplication();
								$userID=$user->get('id');
								$username =$user->username;
						//		$service_flag=2;
								$JBASE = str_replace('\\','/', JPATH_BASE);
								
								
			$JBASE = str_replace('\\','/', JPATH_BASE);
			$ftppathclient = $JBASE . '/client-docs';
			if( ! is_dir($ftppathclient))
			 mkdir($ftppathclient);
			
			$ftppath = $ftppathclient.'/'.$username;
			if( ! is_dir($ftppath))
			 mkdir($ftppath);
								$Firstname =$_POST["companyFirstname"];
								$Secondname =$_POST["Secondname"];
								$Thirdname =$_POST["Thirdname"];
								$Significancename =$_POST["Significancename"];
								$companyObjective =$_POST["companyObjective"];
								$companyaddress =$_POST["companyaddress"];
								$policestationaddress =$_POST["policestationaddress"];
								$addressproof =$_FILES["addressproof"]["name"];
							
							if ( ! $_FILES["addressproof"]["error"] > 0) {
										if( ! file_exists($ftppath.'/'.$_FILES["addressproof"]["name"]))
												move_uploaded_file($_FILES["addressproof"]["tmp_name"],$ftppath.'/'.$_FILES["addressproof"]["name"]);
										}
										$strQry1="select register_id from awfrq_client_company_registration where userid=$userID  and service_flag='$service_flag' and delFlag=0";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										//print_r($counts);
										if( ! $counts)
										 die ("Not registered");
										 
										 $registerid=$counts->register_id;
										 
										 
										 $strQry1="select recId from awfrq_client_company_info where register_id=$registerid";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										$found=$counts->recId;
										if( $found ){
									//	echo "File:".file_exists($ftppath.'/'.$_FILES["addressproof"]["name"]);
									
										if ( ! $_FILES["addressproof"]["error"] > 0) {
										if(file_exists($ftppath.'/'.$_FILES["addressproof"]["name"]))
										if(unlink($ftppath))
										//die("Unlink Success Can upload");
										move_uploaded_file($_FILES["addressproof"]["tmp_name"],$ftppath.'/'.$_FILES["addressproof"]["name"])	;
										} else {
										move_uploaded_file($_FILES["addressproof"]["tmp_name"],$ftppath.'/'.$_FILES["addressproof"]["name"]);
											//	die("Success");
											//	die("Not");
										}
										 
										$strqry="update awfrq_client_company_info set first_name='$Firstname' ,second_name='$Secondname' ,third_name='$Thirdname' , name_significance='$Significancename' ,
														company_main_object='$companyObjective' ,registered_address='$companyaddress' , addressproof='$addressproof' , police_station_Name_and_address='$policestationaddress'
														where register_id=$registerid ";
										//die($strqry);
										$db->setQuery($strqry);
										if($db->query())
											$app->Redirect('index.php/trademark-services' );
									//	$app->Redirect( 'index.php?option=com_fileupload&view=fileuploadss');
										else
										$app->Redirect( 'index.php/trademark-services?params=4' );
										echo "Failed" ;
										 }
										 else{
										 //die("Insert");
										 
										$strqry="INSERT INTO awfrq_client_company_info(register_id,first_name,second_name,third_name,name_significance,company_main_object,registered_address,addressproof,police_station_Name_and_address)
										VALUES ($registerid,'$Firstname','$Secondname','$Thirdname','$Significancename','$companyObjective','$companyaddress','$addressproof','$policestationaddress')";
										
										//die($strqry);
										$db->setQuery($strqry);
										if($db->query())
										$app->Redirect( 'index.php/trademark-services' );
										else
										$app->Redirect( 'index.php/trademark-services?params=4' );
										echo "Failed" ;
										}
						}
	
	

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		return $query;
	}


	public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
