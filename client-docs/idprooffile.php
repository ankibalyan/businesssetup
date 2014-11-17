merav1ew documents


	 function saveform2Documents($fileS,$fileerror,$filepath,$fileSize){
			
			
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
		  
				$db   = $this->getDbo(); 
				$strQry   = $db->getQuery(true);
	 
	 $strQry="INSERT INTO awfrq_client_company_documents(register_id,director_name,director_address,director_mail_id,director_qualification,director_birthplace,
director_din_file,director_pancard_file,director_passport_file,director_adharcard_file,director_election_file,director_dl_file,director_mobilebill_file,
director_electricitybill_file,director_telephonebill_file,director_bankstatement_file,director_photograph_file,promoters_name,
promoters_mail,promoters_percentage_of_share) VALUES (2,'$directorname','$directorAddress','$directorMail','$directorEducation','$directorPlace',
'$directordin','$pancard','$passport','$adharcard','$electioncard','$drivinglicence','$mobilebill',
'$electricitybill','$telephonebill','$bankstatement','$photograph','$promotersname','$promotersmail','$promotersshare')";
			$db->setQuery($strQry);
                if ($db->query()):
				die("Successfully Saved");
                    return 1;
                else:
				die("Failed" . $strQry);
                   return $strQry;
                endif; 
	 
	 
	 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
   function saveform1Contact() {
		
		
		
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
	 
	 
	 