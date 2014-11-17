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
 
class FileuploadModelFile extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
	 
	 
	 
	 
	 	 function saveform2Documents(){
		 
			
			$app = JFactory::getApplication();
			$user = JFactory::getUser();
			$userID=$user->get('id');
			 $username=$user->get('username');
			$JBASE = str_replace('\\','/', JPATH_BASE);
			$ftppathclient = $JBASE . '/client-docs';
			if( ! is_dir($ftppathclient))
			 mkdir($ftppathclient);
			
			$ftppath = $ftppathclient.'/'.$username;
			if( ! is_dir($ftppath))
			 mkdir($ftppath);
				
				 $totalDir=$_POST["totalDir"];
				 $status=0;
				/*  
				 if(isset($_FILES["photograph1"]["name"]) || isset($_POST["fileupload"])){
				 echo 1;
				 else
				 echo 0;
				 die;
				 } */
		for($i=1; $i <= $totalDir; $i++){
		
		
		  $directorname =$_POST["directorname".$i];
		  $directorAddress =$_POST["directorAddress".$i];
		  $directorMail =$_POST["directorMail".$i];
		  $directorEducation =$_POST["directorEducation".$i];
		  $directorPlace =$_POST["directorPlace".$i];
		 
		  
		  $directordin =$_FILES["directordin".$i]["name"];
		  $pancard =$_FILES["pancard".$i]["name"];
		
		  
  if ( ! $_FILES["photograph".$i]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["photograph".$i]["name"]))
					move_uploaded_file($_FILES["photograph".$i]["tmp_name"],$ftppath.'/'.$_FILES["photograph".$i]["name"]);
			}
			
			$passport='';
			$adharcard ='';
			$electioncard ='';
			$drivinglicence ='';
			$mobilebill =''; 
			$electricitybill =''; 
			$telephonebill ='';
			$bankstatement ='';
			
			$promotersname ='';
			$promotersmail ='';
			$promotersshare ='';
			$service_flag=1;
			$promo_check = (isset($_POST["cdnp".$i])) ? 1 : 0;
		  $addressproof =$_POST["addressproof".$i];
		  $idproof =$_POST["idproof".$i];
		  $idproof_file=$_FILES["idprooffile".$i]["name"]; 
		  $addressproof_file=$_FILES["addressprooffile".$i]["name"];
		  
		  
		
		  $directorname =$_POST["directorname".$i];
		  $directorAddress =$_POST["directorAddress".$i];
		  $directorMail =$_POST["directorMail".$i];
		  $directorEducation =$_POST["directorEducation".$i];
		  $directorPlace =$_POST["directorPlace".$i];
		  
		  
		  $directordin =$_FILES["directordin".$i]["name"];
		  $pancard =$_FILES["pancard".$i]["name"];
		  $photograph =$_FILES["photograph".$i]["name"];
		  if(! $promo_check){
			$promotersname =$_POST["promotersname".$i];
			$promotersmail =$_POST["promotersmail".$i];
			$promotersshare =$_POST["promotersshare".$i];
			$dirshare="";
		  } else {
			 $dirshare =$_POST["dirshare".$i];
		  }
		  
		  
		  
		  
										$db   = $this->getDbo();
										$strQry1="select register_id , no_of_directors from awfrq_client_company_registration where userid=$userID and delFlag=0 and service_flag='$service_flag'";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										$registerid=$counts->register_id;
										$numdirectors=$counts->no_of_directors;
										//print_r($counts);
										if( ! $counts)
											$app->Redirect('index.php/service/incorporations/private-limited-company', 'Not Registered' );
										 
				
		  		 
												$strqry_director1="select count(*) as directorsCount  from  awfrq_client_company_documents  where register_id=$registerid";
												$query1=$db->setQuery($strqry_director1);
												$Dircounts1=$db->loadObject();
												 $directorsCount=$Dircounts1->directorsCount;
												 						
	  if ( ! $_FILES["idprooffile".$i]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["idprooffile".$i]["name"]))
					move_uploaded_file($_FILES["idprooffile".$i]["tmp_name"],$ftppath.'/'.$_FILES["idprooffile".$i]["name"]);
			 else if( unlink( $ftppath.'/'.$_FILES["idprooffile".$i]["name"] )){
				move_uploaded_file($_FILES["idprooffile".$i]["tmp_name"],$ftppath.'/'.$_FILES["idprooffile".$i]["name"]);
			}
			}
		  
	  if ( ! $_FILES["addressprooffile".$i]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["addressprooffile".$i]["name"]))
					move_uploaded_file($_FILES["addressprooffile".$i]["tmp_name"],$ftppath.'/'.$_FILES["addressprooffile".$i]["name"]);
			if( unlink( $ftppath.'/'.$_FILES["addressprooffile".$i]["name"] )){
				move_uploaded_file($_FILES["addressprooffile".$i]["tmp_name"],$ftppath.'/'.$_FILES["addressprooffile".$i]["name"]);
			}
			}
			
	  if ( ! $_FILES["directordin".$i]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["directordin".$i]["name"]))
					move_uploaded_file($_FILES["directordin".$i]["tmp_name"],$ftppath.'/'.$_FILES["directordin".$i]["name"]);
			if( unlink( $ftppath.'/'.$_FILES["directordin".$i]["name"] )){
					move_uploaded_file($_FILES["directordin".$i]["tmp_name"],$ftppath.'/'.$_FILES["directordin".$i]["name"]);
			}
			}
			
  if ( ! $_FILES["pancard".$i]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["pancard".$i]["name"]))
					move_uploaded_file($_FILES["pancard".$i]["tmp_name"],$ftppath.'/'.$_FILES["pancard".$i]["name"]);
			if( unlink( $ftppath.'/'.$_FILES["pancard".$i]["name"] )){
					move_uploaded_file($_FILES["pancard".$i]["tmp_name"],$ftppath.'/'.$_FILES["pancard".$i]["name"]);
			}
			}
									 if(isset($_POST["recId".$i])){

														$recId=$_POST["recId".$i];
														if($addressproof_file !='')
														{
															  $addressproof_file="addressproof_file='$addressproof_file',";
														}
															  if($directordin !=''){
															  $directordin="director_din_file='$directordin',";
															  }
															  
															  if($pancard !=''){
															  $pancard="director_pancard_file='$pancard',";
															  }
															  if($photograph !=''){
															  $photograph="director_photograph_file='$photograph',";
															  }
															  if($dirshare !=''){
															  $dirshare="director_share='$dirshare',";
															  }
															  if($addressproof !=''){
															  $addressproof="dir_addressproof='$addressproof',";
															  }
															  
															  if($idproof !=''){
															  $idproof="dir_idproof='$idproof',";
															  }
								
							 	$strQry="update awfrq_client_company_documents set director_name='$directorname' ,director_address='$directorAddress' ,director_mail_id= '$directorMail' , director_qualification ='$directorEducation' ,
										director_birthplace ='$directorPlace' ,   $idproof 
										$addressproof $directordin $pancard $addressproof_file  $photograph  $idproof_file $dirshare promoters_name='$promotersname' , promoters_mail='$promotersmail' ,
										promoters_percentage_of_share='$promotersshare' , promo_check = '$promo_check' where register_id=$registerid and recId=$recId  ";
								//echo $strQry; die;
										 $query1	=$db->setQuery($strQry);
										if ($db->query()):
										$status ++;
											endif; 
		
								} else {
								
										if($directorsCount == $numdirectors){
										
										
										
												$strqry_director1="select count(*) as directorsCount  from  awfrq_client_company_documents  where register_id=$registerid";
												$query1=$db->setQuery($strqry_director1);
												$Dircounts1=$db->loadObject();
												 $directorsCount=$Dircounts1->directorsCount;
													if($directorsCount == 0){
														$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3', 'Updated Successfully');
													} else {
													
																$strQry1="select recId from awfrq_client_company_info where register_id=$registerid";
																$query1	=$db->setQuery($strQry1);
																$counts=$db->loadObject();
																$found=$counts->recId;
																	if( $found ){
																		$app->Redirect('index.php?option=com_fileupload&view=fileuploadss', 'Updated Successfully' );
																	}
																	else {
																	$app->Redirect('index.php?option=com_fileupload&view=fileuploadss&param=4');
																	}
													}
										
										
										
										}
		  
										 $strQry="INSERT INTO awfrq_client_company_documents(register_id,director_name,director_address,director_mail_id,director_qualification,director_birthplace,
										director_din_file,director_pancard_file,dir_idproof,idproof_file,dir_addressproof,addressproof_file,director_photograph_file,promoters_name,
										promoters_mail,promoters_percentage_of_share , promo_check  , director_share) VALUES ($registerid,'$directorname','$directorAddress','$directorMail','$directorEducation','$directorPlace',
										'$directordin','$pancard','$idproof','$idproof_file','$addressproof','$addressproof_file','$photograph','$promotersname','$promotersmail','$promotersshare','$promo_check' ,'$dirshare')";
									
										$db->setQuery($strQry);
										if ($db->query()):
										$status ++;
										endif; 
									}
		
		
		
		
		}
		
										
										if($totalDir == $status)
												$app->Redirect('index.php?option=com_fileupload&view=fileuploadss&edit=4');  //echo "Successfully Saved";
										 else
												$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3');	//echo " Not Saved"; 	//	$app->Redirect('index.php?option=com_fileupload&view=fileuploadss&edit=4');			 //$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3');	
											die;
	 
	 }
	 
	 
	 
	 
	 
   function saveform1ContactInfo() {
		
		
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
								$app->Redirect('index.php/component/fileupload/fileuploadss?param=2' , " Invalid Details , Please provide valid data ");
						 }
						// $slist=$_POST["slist"];
					//	 $address=$_POST["address"];
					//	 $city=$_POST["city"];
						 $service_flag=1;
						 
						$db      = $this->getDbo(); 
						 	$strQry1="select register_id from awfrq_client_company_registration where userid=$userId and service_flag='$service_flag' and delFlag=0";
										$query1	=$db->setQuery($strQry1);
										$counts=$db->loadObject();
										//print_r($counts);
										if( ! $counts)
											$app->Redirect('index.php/service/incorporations/private-limited-company', 'Not Registered' );
										 
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
														$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3');
													} else {
													
																$strQry1="select recId from awfrq_client_company_documents where register_id=$registerid";
																$query1	=$db->setQuery($strQry1);
																$counts=$db->loadObject();
																$found=$counts->recId;
																	if( $found ){
																		$app->Redirect('index.php/component/fileupload/fileuploadss?id=0&edit=3' );
																	}
																	else {
																	$app->Redirect('index.php/pvt-f3');
																	}
													}
			$app->Redirect('index.php?option=com_fileupload&view=fileuploadss');
			        return 1;
                else:
				$app->Redirect( 'index.php/pvt-f1', 'Update failed' );
                endif; 
						 } else {
									//,'$slist','$city','$address'  ,contact_country_state,city,address
									$strQry="INSERT INTO awfrq_client_contact_and_entity_info(register_id,contact_first_name,contact_last_name,contact_number , mail_id) VALUES 
													($registerid,'$fname','$lastname',$contact,'$mailid')";
												
													$db->setQuery($strQry);
													if ($db->query()):
														$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3' );
													else:
														$app->Redirect( 'index.php/component/fileupload/fileuploadss?param2', 'Could not save.' );
														endif; 
						}

}






					 function saveform3CompanyInfo(){
								
								$user = JFactory::getUser();
								$db	= $this->getDbo();
								$app = JFactory::getApplication();
								$userID=$user->get('id');
								$username =$user->username;
								$service_flag=1;
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
											$app->Redirect('index.php?option=com_fileupload&view=fileuploadss' );
									//	$app->Redirect( 'index.php?option=com_fileupload&view=fileuploadss');
										else
										echo "Failed" ;
										 }
										 else{
										 //die("Insert");
										 
										$strqry="INSERT INTO awfrq_client_company_info(register_id,first_name,second_name,third_name,name_significance,company_main_object,registered_address,addressproof,police_station_Name_and_address)
										VALUES ($registerid,'$Firstname','$Secondname','$Thirdname','$Significancename','$companyObjective','$companyaddress','$addressproof','$policestationaddress')";
										
										//die($strqry);
										$db->setQuery($strqry);
										if($db->query())
										$app->Redirect( 'index.php?option=com_fileupload&view=fileuploadss' );
										else
										echo "Failed" ;
										}
						}


	 
	 



					 function saveformRegistration($service_flag = 1){
								
								$user = JFactory::getUser();
								$app = JFactory::getApplication();
								$db	= $this->getDbo();
								$userID=$user->get('id');
								$JBASE = str_replace('\\','/', JPATH_BASE);
								$ftppath = $JBASE . '/client-docs';
					$user = JFactory::getUser();
					 $userId=$user->get('id');
					 $username =$user->username;
					/*  
					echo isset($_POST["privatelc_reg_form"]);
					echo "service_flag".$service_flag=1;
					die;
					*/ 
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
		/*
		$strQry="SELECT register_id,country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,PAN_Application_price, TAN_Application_gov_fee,
        TAN_Application_price,Business_Commencement_gov_fee,Business_Commencement_price,Service_Tax_Documents_gov_fee, Service_Tax_Documents_price,Shops_Establishments_gov_fee,
        Shops_Establishments_price,share_capital, total_gov_fee, total_price_fee 
        FROM awfrq_client_company_registration
        WHERE userId= $userID and delFlag=0 ";
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
															
															$strqry="update awfrq_client_company_registration set delFlag=1  where userId=$userId ";
																		/* 	 if(is_dir($ftppath.'/'.$username)) {
																			 rmdir($ftppath.'/'.$username); echo $ftppath.'/'.$username; }
																			 else
																			 echo 0;
																			 die; */
	// 											} else {
																		
	// 														$strqry="update awfrq_client_company_registration set country_state='$statelist' , no_of_directors='$numdirectors' ,Registration_Pvt_Ltd_gov_fee='$companyregistrationpvtltd_gov' ,
	// 														Registration_Pvt_Ltd_price= '$companyregistrationpvtltd_price' , PAN_Application_gov_fee='$ptlt1_gov' ,PAN_Application_price= '$ptl1t1_price' , TAN_Application_gov_fee ='$ptlt2_gov' ,
	// 														TAN_Application_price ='$ptl1t2_price' ,Business_Commencement_gov_fee ='$ptlt3_gov' , Business_Commencement_price ='$ptl1t3_price' , Service_Tax_Documents_gov_fee='$ptlt4_gov' ,
	// 														Service_Tax_Documents_price ='$ptl1t4_price' ,Shops_Establishments_gov_fee ='$ptlt5_gov' ,Shops_Establishments_price= '$ptl1t5_price' , share_capital ='$sharecapital' ,
	// 														total_gov_fee ='$total_gov' ,total_price_fee='$total_price'  where userId=$userId "; 
																			
	// 																		// $db->setQuery($strqry);
	// 																		// if($db->query()) {	$app->Redirect('index.php/component/fileupload/fileuploadss?param=2');
	// 																		// 	} else
	// 																		// 		$app->Redirect('index.php/service/incorporations/private-limited-company');
	// 														}									
									
							
	// 									$db->setQuery($strqry);
	// 									if($db->query()) {
										
	// 									 $strqry="INSERT INTO awfrq_client_company_registration( userId, country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,
	// 	PAN_Application_price,TAN_Application_gov_fee,TAN_Application_price,	Business_Commencement_gov_fee,Business_Commencement_price,	Service_Tax_Documents_gov_fee,
	// 	Service_Tax_Documents_price,	Shops_Establishments_gov_fee,Shops_Establishments_price,	share_capital,total_gov_fee,total_price_fee , service_flag)
	// 	VALUES (	 $userId,'$statelist','$numdirectors','$companyregistrationpvtltd_gov','$companyregistrationpvtltd_price','$ptlt1_gov',
	// 					'$ptl1t1_price',	'$ptlt2_gov','$ptl1t2_price'	,'$ptlt3_gov','$ptl1t3_price',		'$ptlt4_gov',
	// 					'$ptl1t4_price',	'$ptlt5_gov','$ptl1t5_price', 	'$sharecapital',	'$total_gov',	'$total_price' , $service_flag)";
			
	// 									//die($strqry);
	// 									$db->setQuery($strqry);
	// 									if($db->query())
	// 									$app->Redirect('index.php/component/fileupload/fileuploadss?param=2');
	// 									//die("Saved Successfully");
	// 									else
	// 									$app->Redirect('index.php/component/fileupload/fileuploadsform');
										
										
	// 									 $strQry1="select recId from awfrq_client_contact_and_entity_info where register_id=$registerid";
	// 									$query1	=$db->setQuery($strQry1);
	// 									$counts=$db->loadObject();
	// 									$found=$counts->recId;
	// 											if( $found ){
												
	// 											$app->Redirect('index.php/component/fileupload/fileuploadss?edit=2');
												
	// 											$strqry_director1="select count(*) as directorsCount  from  awfrq_client_company_documents  where register_id=$registerid";
	// 											$query1=$db->setQuery($strqry_director1);
	// 											$Dircounts1=$db->loadObject();
	// 											 $directorsCount=$Dircounts1->directorsCount;
	// 												if($directorsCount == 0){
	// 													$app->Redirect('index.php/component/fileupload/fileuploadss?edit=3');
	// 												} else {
													
	// 															$strQry1="select recId from awfrq_client_company_info where register_id=$registerid";
	// 															$query1	=$db->setQuery($strQry1);
	// 															$counts=$db->loadObject();
	// 															$found=$counts->recId;
	// 																if( $found ){
	// 																	$app->Redirect('index.php?option=com_fileupload&view=fileuploadss');
	// 																}
	// 																else {
	// 																$app->Redirect('index.php/pvt-f3');
	// 																}
	// 												}

												
	// 											} else
	// 												$app->Redirect('index.php/component/fileupload/fileuploadss?param=2');
	// 									} else
	// 												$app->Redirect('index.php/service/incorporations/private-limited-company');
										
	// 									}
	// 								//	$registerid=1;//$counts->register_id;	$app->Redirect('index.php/pvt-f1');
	// */


	 
	 
	 
	 
	 
    protected function populateState() {
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
        if (isset($params_array['item_id'])) {
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
    public function &getData($id = null) {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('file.id');
            }

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {
                // Check published state.
                if ($published = $this->getState('filter.published')) {
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

        
		if ( isset($this->_item->created_by) ) {
			$this->_item->created_by_name = JFactory::getUser($this->_item->created_by)->name;
		}

        return $this->_item;
    }

    public function getTable($type = 'File', $prefix = 'FileuploadTable', $config = array()) {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkin($id = null) {
        // Get the id.
        $id = (!empty($id)) ? $id : (int) $this->getState('file.id');

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
    public function checkout($id = null) {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int) $this->getState('file.id');

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

    public function getCategoryName($id) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
                ->select('title')
                ->from('#__categories')
                ->where('id = ' . $id);
        $db->setQuery($query);
        return $db->loadObject();
    }

    public function publish($id, $state) {
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;
        return $table->store();
    }

    public function delete($id) {
        $table = $this->getTable();
        return $table->delete($id);
    }

}
