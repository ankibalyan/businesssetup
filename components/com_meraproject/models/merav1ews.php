<?php

/**
 * @version     1.0.0
 * @package     com_meraproject
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Meraproject records.
 */
class MeraprojectModelMerav1ews extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
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
	
   
   function saveform1() {
		
		
		
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
						$db      = $this->getDbo(); 
						 $strQry   = $db->getQuery(true);
						 $fname=$_POST["firstname"];
						 $lastname=$_POST["lastname"];
						 $contact=$_POST["contact"];
						 $mailid=$_POST["mailid"];
						 $slist=$_POST["slist"];
						 $address=$_POST["address"];
						 $city=$_POST["city"];
						 
						$db      = $this->getDbo(); 
						 $strQry   = $db->getQuery(true);
						 
						 
						 
	  		$strQry="INSERT INTO awfrq_client_contact_and_entity_info(register_id,first_name,last_name,contact_number , mail_id,country_state,city,address) VALUES 
						 (1,'$fname','$lastname',$contact,'$mailid','$slist','$city','$address')";		
						
//ALTER TABLE `tmp_new_documents` ADD `Birth Certificate` VARCHAR( 150 ) NULL DEFAULT NULL AFTER ` studentId` 
					
			$db->setQuery($strQry);
			
                if ($db->query()):
				die("Successfully Saved");
                    return 1;
                else:
				die("Failed" . $strQry);
                   return $strQry;
                endif; 

}



					 function saveformRegistration(){
								
								$user = JFactory::getUser();
								$app = JFactory::getApplication();
								$db	= $this->getDbo();
								$userID=$user->get('id');
								$JBASE = str_replace('\\','/', JPATH_BASE);
								$ftppath = $JBASE . '/client-docs';
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
					 $service_flag=1;
					
					if( isset($_POST["privatelc_reg_form"]))
					$service_flag=1;
					if( isset($_POST["serviceId"]))
					 $service_flag=$_POST["serviceId"];
		$statelist = $_POST["statelist"];
		$numdirectors = $_POST["numdirectors"];
		$sharecapital = $_POST["sharecapital"];
		$companyregistrationpvtltd_price='';
		$companyregistrationpvtltd_gov='';
		
		$ptlt1_gov='';
		$ptl1t1_price='';
		$ptlt2_gov='';
		$ptl1t2_price='';
		$ptlt3_gov='';
		$ptl1t3_price='';
		$ptlt4_gov='';
		$ptl1t4_price='';
		$ptlt5_gov='';
		$ptl1t5_price='';
		
		// if(isset($_POST["companyregistrationpvtltd"])){
			$companyregistrationpvtltd_price = $_POST["companyregistrationpvtltd_price"];
			$companyregistrationpvtltd_gov = $_POST["companyregistrationpvtltd_gov"];
		//	}
			
		 if(isset($_POST["ptltt1"])){
			$ptl1t1_price = $_POST["ptl1t1_price"];
			 $ptlt1_gov = $_POST["ptlt1_gov"];
			}
		
		 if(isset($_POST["ptltt2"])){
			$ptl1t2_price = $_POST["ptl1t2_price"];
			$ptlt2_gov = $_POST["ptlt2_gov"];
			}
		
		
		 if(isset($_POST["ptltt3"])){
			$ptl1t3_price = $_POST["ptl1t3_price"];
			$ptlt3_gov = $_POST["ptlt3_gov"];
			}
		
		
		 if(isset($_POST["ptltt4"])){
			$ptl1t4_price = $_POST["ptl1t4_price"];
			$ptlt4_gov = $_POST["ptlt4_gov"];
			}
		
		 if(isset($_POST["ptltt5"])){
			$ptl1t5_price = $_POST["ptl1t5_price"];
			$ptlt5_gov = $_POST["ptlt5_gov"];
			}
		
			$total_gov = $_POST["total_gov"];
			$total_price = $_POST["total_price"];
		/* $companyregistrationpvtltd_val = $_POST["ptlt1"];
		$companyregistrationpvtltd_val = $_POST["ptl1t1_price"];
		 */
		
		  $strQry="SELECT register_id,country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,PAN_Application_price, TAN_Application_gov_fee,
        TAN_Application_price,Business_Commencement_gov_fee,Business_Commencement_price,Service_Tax_Documents_gov_fee, Service_Tax_Documents_price,Shops_Establishments_gov_fee,
        Shops_Establishments_price,share_capital, total_gov_fee, total_price_fee 
        FROM awfrq_client_company_registration
        WHERE userId= $userID and delFlag=0 and service_flag=$service_flag ";
        $db->setQuery($strQry);
        $result = $db->loadObjectList();
		$different=0;
		 foreach ($result as $list) :
		  $register_id =$list->register_id;
		  $country_state =$list->country_state;
		  $no_of_directors =$list->no_of_directors;
		  $share_capital =$list->share_capital;
		  endforeach;
								
										$strQry1="select register_id from awfrq_client_company_registration where userid=$userId and delFlag=0 and service_flag='$service_flag'";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
						
									if($counts){
											$registerid=$counts->register_id;
											
											   if($no_of_directors == $numdirectors){ } else {	$different=1; }
											   if($country_state == $statelist ){ } else { $different=1; }
											   if($share_capital == $sharecapital ){ } else { $different=1; }
																		   
												if($different==1){
															
															$strqry="update awfrq_client_company_registration set delFlag=1  where userId=$userId and service_flag='$service_flag'  and delFlag=0";
																	
							
													$db->setQuery($strqry);
													if($db->query()) {

														$strqry="INSERT INTO awfrq_client_company_registration( userId, country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,
														PAN_Application_price,TAN_Application_gov_fee,TAN_Application_price,	Business_Commencement_gov_fee,Business_Commencement_price,	Service_Tax_Documents_gov_fee,
														Service_Tax_Documents_price,	Shops_Establishments_gov_fee,Shops_Establishments_price,	share_capital,total_gov_fee,total_price_fee , service_flag)
														VALUES (	 $userId,'$statelist','$numdirectors','$companyregistrationpvtltd_gov','$companyregistrationpvtltd_price','$ptlt1_gov',
														'$ptl1t1_price',	'$ptlt2_gov','$ptl1t2_price'	,'$ptlt3_gov','$ptl1t3_price',		'$ptlt4_gov',
														'$ptl1t4_price',	'$ptlt5_gov','$ptl1t5_price', 	'$sharecapital',	'$total_gov',	'$total_price' , $service_flag)";

														//die($strqry);
														$db->setQuery($strqry);
														if($db->query())
															$app->Redirect('index.php/component/llp_service/serviceflow?param=2');
														else
															$app->Redirect('index.php/service/incorporations/llp');
													} else
															$app->Redirect('index.php/service/incorporations/llp');
										
												} else {
																		
															$strqry="update awfrq_client_company_registration set country_state='$statelist' , no_of_directors='$numdirectors' ,Registration_Pvt_Ltd_gov_fee='$companyregistrationpvtltd_gov' ,
															Registration_Pvt_Ltd_price= '$companyregistrationpvtltd_price' , PAN_Application_gov_fee='$ptlt1_gov' ,PAN_Application_price= '$ptl1t1_price' , TAN_Application_gov_fee ='$ptlt2_gov' ,
															TAN_Application_price ='$ptl1t2_price' ,Business_Commencement_gov_fee ='$ptlt3_gov' , Business_Commencement_price ='$ptl1t3_price' , Service_Tax_Documents_gov_fee='$ptlt4_gov' ,
															Service_Tax_Documents_price ='$ptl1t4_price' ,Shops_Establishments_gov_fee ='$ptlt5_gov' ,Shops_Establishments_price= '$ptl1t5_price' , share_capital ='$sharecapital' ,
															total_gov_fee ='$total_gov' ,total_price_fee='$total_price'  where userId=$userId and service_flag='$service_flag' and delFlag=0 "; 
																		//die($strqry);	
																			$db->setQuery($strqry);
																			if($db->query()) {	$app->Redirect('index.php/component/llp_service/serviceflow?param=2');
																				} else
																					$app->Redirect('index.php/service/incorporations/llp');
															}									
									
										}
									//	$registerid=1;//$counts->register_id;	$app->Redirect('index.php/pvt-f1');
										$strqry="INSERT INTO awfrq_client_company_registration( userId, country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,
		PAN_Application_price,TAN_Application_gov_fee,TAN_Application_price,	Business_Commencement_gov_fee,Business_Commencement_price,	Service_Tax_Documents_gov_fee,
		Service_Tax_Documents_price,	Shops_Establishments_gov_fee,Shops_Establishments_price,	share_capital,total_gov_fee,total_price_fee ,service_flag)
		VALUES (	 $userId,'$statelist','$numdirectors','$companyregistrationpvtltd_gov','$companyregistrationpvtltd_price','$ptlt1_gov',
						'$ptl1t1_price',	'$ptlt2_gov','$ptl1t2_price'	,'$ptlt3_gov','$ptl1t3_price',		'$ptlt4_gov',
						'$ptl1t4_price',	'$ptlt5_gov','$ptl1t5_price', 	'$sharecapital',	'$total_gov',	'$total_price' , $service_flag)";
						
										//die($strqry);
										$db->setQuery($strqry);
										if($db->query())
										$app->Redirect('index.php/component/llp_service/serviceflow?param=2');
										//die("Saved Successfully");
										else
										$app->Redirect('index.php/service/incorporations/llp');
									//	die;
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
