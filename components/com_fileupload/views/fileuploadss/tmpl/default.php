<style type="text/css">
	#gkHeader {
		margin-bottom: 10px !important;
	}
	article header h1{
		padding-top: 50px;
	}
</style> 
<?php

		define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php/private-limited-company-login', 'Please login !!!' );
		}				 
		$serviceId=1; 
		if(!isset($_GET['rid'])) {
          JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
          $registerId = (isset($_SERVER['HTTP_REFERER'])) ? header('Location: ' . $_SERVER['HTTP_REFERER']) : '';
        }
        else{
          $registerId = $_GET['rid'];
        }
		 $model = $this->getModel('Fileuploadss', 'FileuploadModel');
		 $resList= $model->getData($userID,$registerId);
		/*   Service_Tax_Documents_gov_fee */
		$editid=321;
		if(isset($_GET["edit"])) {
				
				$editid=$_GET["edit"];
		}
		if(isset($_GET["params"])) {
				
				$editid=$_GET["params"];
		}
		 foreach ($resList as $list) :
		 
		 
		  $register_id =$list->register_id;
		  $country_state =$list->country_state;
		  $no_of_directors =$list->no_of_directors;
		  $country_state =$list->country_state;
		  $country_state =$list->country_state;
		  $dirdetails =$list->dirdetails;
		  $companyInfo1 =$list->companyInfo;
		  $promocheck = $list->promo_check;
		  $same = "Directors and promotors are same ";
		  if($dirdetails =='') $dirdetails='Director details';
		  else
		  $dirdetails='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&rid='.$register_id.'&amp;edit=3" > Director details  </a>';
		  
		  if($companyInfo1 =='') $companyInfo='Company Info';
		  else
		  $companyInfo='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&rid='.$register_id.'&amp;edit=4" > Company Info </a>'; 
		  
		  if($companyInfo1 =='') $summary='Summary';
		  else
		  $summary='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&rid='.$register_id.'"> Summary </a>'; 

		  $total_gov =$list->total_gov_fee;
		  $total_price =$list->total_price_fee;
		  $gov1 ='';
		  $price1 ='';
		  $desc1="Company Registration Private Limited ";
		  $gov2 ='';
		  $price2 ='';
		  $desc2="PAN Application ";
		  $gov3 ='';
		  $price3 ='';
		  $desc3="TAN Application ";
		  $gov4 ='';
		  $price4 ='';
		  $desc4="Business Commencement";
		  $gov5 ='';
		  $price5 ='';
		  $desc5="Service Tax Documents";
		  $gov6 ='';
		  $price6 ='';
		  $desc6="Shops Establishments";
		  
		   if($list->Registration_Pvt_Ltd_price !=''){
			$gov1 =$list->Registration_Pvt_Ltd_gov_fee;
			$price1 =$list->Registration_Pvt_Ltd_price;
		   }
		   
		  
		  if($list->PAN_Application_price !=''){
			$gov2 =$list->PAN_Application_gov_fee;
			$price2 =$list->PAN_Application_price;
		   }
		   
		  
		  if($list->TAN_Application_price !=''){
			$gov3 =$list->TAN_Application_gov_fee;
			$price3 =$list->TAN_Application_price;
		   }
		   
		  if($list->Business_Commencement_price !=''){
			$gov4 =$list->Business_Commencement_gov_fee;
			$price4 =$list->Business_Commencement_price;
		   }
		   
		  if($list->Service_Tax_Documents_price !=''){
			$gov5 =$list->Service_Tax_Documents_gov_fee;
			$price5 =$list->Service_Tax_Documents_price;
		   }
		  if($list->Shops_Establishments_price !=''){
			$go6 =$list->Shops_Establishments_gov_fee;
			$price6 =$list->Shops_Establishments_price;
		   }
		   
		   if($editid==321){
		   $JBASE = str_replace('\\','/', JPATH_BASE);
		 //  echo file_exists($JBASE.'/includes/checklogin.php');
		?>
		<?php // echo$JBASE.'/includes/checklogin.php';?>
<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>
<article>
	<header>
		<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>		
	</header>
</article>
		<div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;rid=<?php echo $register_id ?>&amp;edit=2">Contact Info</a></center></div>
<div id="step2"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;rid=<?php echo $register_id ?>&amp;id=&amp;edit=3">Details of Directors</a></center></div>
<div id="step3"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;rid=<?php echo $register_id ?>&amp;edit=4" >Company Info</a></center></div>
<div id="step4" class="ms-active"><center>&nbsp; Summary &nbsp;</center></div>
<div id="step5"><center>Payment</center></div>
</div>
<!-- <div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&rid=<?php echo $register_id ?>&edit=1">edit </a>]</div> -->
<br />
									<div class="file-edit front-end-edit">
												<div>
												<h3 style="float:left">Registration  Details </h3>
												<div style="clear:both"></div>
												<ul>
													<li> &nbsp;<b> State :  </b><?php echo $list->country_state; ?>  &nbsp;&nbsp;<b>    No of Directors :  </b> <?php echo $list->no_of_directors; ?>      <b>  &nbsp;&nbsp;Share Capital : </b>
													<?php if($list->share_capital ==1) echo "1 Lakh - 5 Lakh";
													 elseif($list->share_capital ==5) echo "5 Lakh - 10 Lakh";
													 elseif($list->share_capital ==10) echo "10 Lakh - 25 Lakh";
													 elseif($list->share_capital ==25) echo "Above 25 Lakh"; 
													 ?> </li>
												</ul>
												<table style="width:70%" >
												<thead><tr style="font:bold"> <td>Description</td> <td>Gov. Fee(INR)</td><td>Price (INR)</td></tr></thead>
													<tr> <td><?php echo $desc1; ?></td> <td><?php echo $gov1; ?></td><td><?php echo $price1; ?></td>	</tr>
													<tr> <td><?php echo $desc2; ?></td> <td><?php echo $gov2; ?></td><td><?php echo $price2; ?></td>	</tr>
													<tr> <td><?php echo $desc3; ?></td> <td><?php echo $gov3; ?></td><td><?php echo $price3; ?></td>	</tr>
													<tr> <td><?php echo $desc4; ?></td> <td><?php echo $gov4; ?></td><td><?php echo $price4; ?></td>	</tr>
													<tr> <td><?php echo $desc5; ?></td> <td><?php echo $gov5; ?></td><td><?php echo $price5; ?></td>	</tr>
													<tr> <td><?php echo $desc6; ?></td> <td><?php echo $gov6; ?></td><td><?php echo $price6; ?></td>	</tr>
													<tr> <td>Total :</td> <td><?php echo $total_gov; ?></td><td><?php echo $total_price; ?></td>	</tr>
												</table>
											</div>
											<table>
											<tr><td>
											<div>
												<h3 style="float:left">Contact Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&rid=<?php echo $register_id ?>&edit=2">edit </a>]</div>
												<div style="clear:both"></div>
											<ul>
											<li>First Name  : <?php echo $list->contact_first_name; ?> </li>
											<li>Last Name : <?php echo $list->contact_last_name; ?> </li>
											<li>Contact Number : <?php echo $list->contact_number; ?> </li>
											<li>Mail ID :   <?php echo $list->mail_id; ?> </li>
											</ul>
											
											
											</div>
											</td>
											<td>
												<div>
											<h3 style="float:left">Company Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&rid=<?php echo $register_id ?>&edit=4">edit </a>]</div>
												<div style="clear:both"></div>
											<ul>
											<li>1 .Desired Names of the Company</li>
											<li>First Name  : <?php echo $list->first_name; ?> </li>
											<li>Second Name : <?php echo $list->second_name; ?> </li>
											<li>Third Name  : <?php echo $list->third_name; ?> </li>
											<li>2.Significance of Name :  <?php echo $list->name_significance; ?> </li>
											<li>3 .Main Object of the Company : <?php echo $list->company_main_object; ?></li>
											<li>4 .Desired Registered Address of the company : <?php echo $list->registered_address; ?> </li>
											
											<li>5 .Name and address of police station  : <?php echo $list->police_station_Name_and_address; ?> </li>
											</ul>
											
											
											</div>
												</td></tr>
												<tr>
									<?php 
												$result= $model->getDirData($register_id);
												$slno=0;
												$dirNo=0;
											

										foreach ($result as $list1) : 
										$slno++;
										$dirNo++;
										
										if($slno==3)
										echo "</tr><tr>";
										?>
										
		 
											<td><div>
											<h3 style="float:left">Details of director <?php echo $dirNo; ?></h3><div style="float:left"> &nbsp;[<a  href="index.php/component/fileupload/fileuploadss?rid=<?php echo $register_id ?>&id=<?php echo$list1->recId;?>&edit=3">edit </a>]</div>
												<div style="clear:both"></div>
											<ul>
											<li>Name of Director : <?php echo $list1->director_name; ?> </li>
											<li>Address of director : <?php echo $list1->director_address; ?> </li>
											<li>Mail ID of director : <?php echo $list1->director_mail_id; ?> </li>
											<li>Education Qualification: <?php echo $list1->director_qualification; ?> </li>
											<li>Place of birth : <?php echo $list1->director_birthplace; ?> </li>
											<?php if($list1->promo_check =='0' ||  $list1->promo_check ==0):?>
											<li>Details of promoters</li>
											
											<li>Name: <?php echo $list1->promoters_name; ?> </li>
											<li>Mail ID: <?php echo $list1->promoters_mail; ?> </li>
											<li>% of share holding : <?php echo $list1->promoters_percentage_of_share; ?> </li>
											<?php 
											else : ?>
											<li>% of share holding : <?php echo $list1->director_share; ?> </li>
											<?php endif; ?>
											</ul>
												</div> </td>
									
									<?php 
									
										if($slno==3){  $slno=0; }
									endforeach; ?>
										
												</tr>
												<tr>
												<td  align="right"> <form action="<?php echo JRoute::_("index.php?option=com_businessservices") ?>&rid=<?php echo $register_id; ?>" method="POST"><input type="hidden" name="msg" value="1"><input type= "submit" value="Proceed" /></td></tr>
												</table>
									</div>
									
		<?php 	}
else  if($editid==2)  { ?>		
<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>

<article>
	<header>
		<h1 itemprop="name">
	<a itemprop="url" href="#">
	Private Limited Company</a>
		</h1>		
	</header>
</article>
<div class="mainsteps">
<div id="step1" class="ms-active"><center>Contact Info</center></div>
<div id="step2" ><center><?php echo $dirdetails; ?></center></div>
<div id="step3" ><center><?php echo $companyInfo; ?></center></div>
<div id="step4"><center><?php echo $summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<div style="clear: both;"></div>

<p><b>Contact Information</b></p>
<form id="myform" action="index.php?option=com_fileupload&amp;view=file&amp;rid=<?php echo $register_id ?>&edit=2" method="post">
<input type="hidden" id="serviceId" name="serviceId" value="<?php echo $serviceId; ?>" />
<table>
<tbody>
<tr>
<td>First Name<span style="color:red;">*</span></td>
<td><input id="firstname" class="charsonly" style="width: 250px;"  value="<?php echo $list->contact_first_name; ?>"  class="validatefield" name="firstname" required="required" type="text" /><span  class="error_field">Enter First Name</span></td>
<td>Last Name<span style="color:red;">*</span></td>
<td><input id="lastname" class="charsonly" class="validatefield"  value="<?php echo $list->contact_last_name; ?>" name="lastname" required="required" type="text" /><span  class="error_field">Enter Last Name</span></td>
</tr>
<tr> 
<td style="width: 15%;">Contact Number<span style="color:red;">*</span></td>
<td><input id="contact" class="phone" style="width: 250px;" min-lenght="8" maxlength="10"  class="validatefield validatenumber" value="<?php echo $list->contact_number; ?>" name="contact" required="" type="text" /><span  class="error_field">Enter Contact Number</span></td>
<td>Mail ID<span style="color:red;">*</span></td>
<td><input id="mailid" class="validatefield validatemail" name="mailid" value="<?php echo $list->mail_id; ?>"  required="true" type="text" />(We wont spam you)<span  class="error_field">Enter valid Mail ID</span></td>
<td><input type="submit" value="Proceed " /></td>
</tr>
</tbody>
</table>
</form>
<?php 	} 
else if($editid==3)
{  
		
		
				 					$totalDir=$no_of_directors;
									$display="block";
									$active='ui-state-default ui-corner-top tabactive ui-state-active ';
									$inactive=' ui-corner-top ';
									
									?>
												
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>
<article>
	<header>
		<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>		
	</header>
</article>
<div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&rid=<?php echo $register_id ?>&amp;edit=2">Contact Info</a></center></div>
<div id="step2" class="ms-active" ><center>Details of Directors</center></div>
<div id="step3" ><center><?php echo $companyInfo; ?></center></div>
<div id="step4"><center><?php echo $summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<div class="ui-tabs  ui-widget-content ui-corner-all"  >
<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
<?php for ($i=1; $i <= $totalDir ; $i++) {
	if($i==1) { $status=$active; } else { $status=$inactive;  }?>
    <li id="litab<?php echo$i; ?>" data-tabno="<?php echo "$i"; ?>" class="listtabs	defaulttab" class="<?php echo$status ; ?>"  style="">
	<a id="ui-id-1" class="ui-tabs-anchor"  href="javascript:void(0)" role="presentation" tabindex="-1">Director <?php echo $i ?> </a></li>
	<?php } ?>

</ul>

<!--index.php?option=com_fileupload&amp;view=file&edit=3&id=0 -->
<div style="clear: both;"> </div>
<?php 
													$result= $model->getDirDataRecId($register_id); 
													if($result){
												//	if(isset($_GET["id"])){		index.php?option=com_fileupload&amp;view=file&edit=3&id=0
				//$recId=$_GET["id"];
												?>
<form id="directordetails" action="index.php?option=com_fileupload&view=file&rid=<?php echo $register_id ?>&edit=3&id=0"  enctype="multipart/form-data" method="post" name="directordetails">
<input type="hidden" id="serviceId" name="serviceId" value="<?php echo $serviceId; ?>" />
<input type="hidden" id="totalDir" name="totalDir" value="<?php echo$totalDir; ?>" />
<?php  $i=0; 
foreach ($result as $list1) {
$i++ ;
													$dirNo= $model->getDirno($list1->recId, $register_id);
													if($list1->promo_check == 1){
														$checked="checked='checked';";
														$validatefield="";
														$display="display:none;";
													} else {
														$checked="";
														$display="";
														$validatefield="validatefield";
													}
													$director_adharcard_file=''; 
													$director_din_file=''; 
													$director_pancard_file=''; 
													$director_photograph_file='';
													$idproof='';
													$addressproof='';
													$idval='Select Id';
													$addressval='Select Address';
													if($list1->director_din_file) { $director_din_file=$list1->director_din_file; } 
													if($list1->director_pancard_file) { $director_pancard_file=$list1->director_pancard_file; }
													if($list1->director_photograph_file) { $director_photograph_file=$list1->director_photograph_file;	}
													$idproof_file=$list1->idproof_file;	
													if($list1->dir_idproof == 1) { $idproof=1; $idval="Passport"; } 
														elseif($list1->dir_idproof == 2) {  $idproof=2;  $idval="Aadhar Card"; }
														else if($list1->dir_idproof == 3) { 	 $idproof=3; $idval="Election Card"; }
														elseif($list1->dir_idproof == 4) {   $idproof=4;	$idval="Driving License";}
														$addressproof_file=$list1->addressproof_file;
													if($list1->dir_addressproof == 1) { 	$addressproof=1; 	$addressval="Mobile Bill";}
														elseif($list1->dir_addressproof == 2) { 	$addressproof=2;	$addressval="Electricity Bill";}
														elseif($list1->dir_addressproof == 3) { 	$addressproof=3;	$addressval="Telephone Bill";}
														elseif($list1->dir_addressproof == 4) { 	$addressproof=4;	$addressval="Bank Statement";}
												if($i==1) $Firsttab=''; else $Firsttab="class='error_field'";
												?>
<input type="hidden" id="recId<?php echo$i; ?>" class="validatefield" name="recId<?php echo$i; ?>" value="<?php echo$list1->recId; ?>" />

<div id="tab<?php echo$i; ?>" class="tabs" <?php echo$Firsttab; ?> >
<?php echo $same; ?>
  ? <input id="cdnp<?php echo$i; ?>" data-value="<?php echo $i; ?>" class="cdnpclas" name="cdnp<?php echo$i; ?>"  type="checkbox"  <?php echo$checked; ?> readonly="readonly" value="yes" />
<div>
<div class="shift_left">
<table>
<tr>
<td colspan="2">
<h3>Edit Details of director <?php echo$dirNo; ?></h3>
</td>
</tr>
<tr>
<td>Name of Director<span  style="color:red;">*</span></td>
<td><input id="directorname<?php echo$i; ?>" class="validatefield charsonly" name="directorname<?php echo$i; ?>" value="<?php echo $list1->director_name; ?>"  type="text" /><span  class="error_field">Enter Name</span></td>
</tr>
<tr>
<td>Address of director<span  style="color:red;">*</span></td>
<td><input id="directorAddress<?php echo$i; ?>" class="validatefield address" name="directorAddress<?php echo$i; ?>" value="<?php echo $list1->director_address; ?>"  type="text" /><span  class="error_field">Enter Address</span></td>
</tr>
<tr>
<td>Mail Id of director<span  style="color:red;">*</span></td>
<td><input id="directorMail<?php echo$i; ?>" class="validatefield	validatemail" name="directorMail<?php echo$i; ?>" value="<?php echo $list1->director_mail_id; ?>" type="text" /><span  class="error_field">Enter mail Id</span></td>
</tr>
<tr>
<td>Education Qualification<span  style="color:red;">*</span></td> 
<td><input id="directorEducation<?php echo$i; ?>" class="validatefield charsonly" name="directorEducation<?php echo$i; ?>" value="<?php echo $list1->director_qualification; ?>"  type="text" /><span  class="error_field">Enter Qualification</span></td>
</tr>
<tr>
<td>Place of birth<span  style="color:red;">*</span></td>
<td><input id="directorPlace<?php echo$i; ?>" class="validatefield charsonly" name="directorPlace<?php echo$i; ?>" value="<?php echo$list1->director_birthplace; ?>"  type="text" /><span  class="error_field">Enter birth place</span></td>
</tr>
<tr>
<td>DIN if already applied</td>
<td>
<?php if($list->director_din_file !='') { $file="display:block"; $update="display:inline" ; $fileinput="display:none"; } else { $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none"; }  ?>
<input type="text" id="directordin<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue"  readonly value="<?php echo $list->director_din_file; ?>" /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="directordin<?php echo$i; ?>2" >update</a>
<input id="directordin<?php echo$i; ?>"  style="<?php echo$fileinput; ?>" class="filevalidate" name="directordin<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="directordin<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
</tr>
<tr id="dirdnp<?php echo$i; ?>" <?php if($validatefield !="") echo "error_field"; ?> >
<td>% of share holding</td>
<td><input id="dirshare<?php echo$i; ?>" class=" <?php if($validatefield=="")  echo "validatefield";  ?>" maxlength="3" name="dirshare<?php echo$i; ?>" value="<?php echo $list1->director_share; ?>"  type="text" /><span  class="error_field">percentage in number</span></td>
</tr>
</table>

</div>
<div class="shift_right">
<table  id="dnp<?php echo$i; ?>" style="<?php echo $display;?>">
<tr>
<td>
<h3>Details of promoters</h3>
</td>
</tr>
<tr>
<td>Name<span  style="color:red;">*</span></td>
<td><input id="promotersname<?php echo$i; ?>" class="<?php echo $validatefield; ?> " name="promotersname<?php echo$i; ?>" value="<?php echo $list1->promoters_name; ?>"  type="text" /><span  class="error_field">Enter Name</span></td>
</tr>
<tr>
<td>Mail ID<span  style="color:red;">*</span></td>
<td><input id="promotersmail<?php echo$i; ?>"   class="<?php echo $validatefield; ?> " name="promotersmail<?php echo$i; ?>" value="<?php echo $list1->promoters_mail; ?>"  type="text" /><span  class="error_field">Enter valid mail Id</span></td>
</tr>
<tr>
<td>% of share holding<span  style="color:red;">*</span></td>
<td><input id="promotersshare<?php echo$i; ?>"   class=" <?php echo $validatefield; ?> " maxlength="2" name="promotersshare<?php echo$i; ?>" value="<?php echo $list1->promoters_percentage_of_share; ?>"  type="text" /><span  class="error_field">percentage in number</span></td>
</tr>
</table>
</div>
</div>
<table>

<tr>
<td></td>
<td></td>
</tr>
<tr>
<td colspan="2">
<h3>Documents Upload</h3>
</td>
</tr>
<tr>
<td>Photograph</td>
<td>
<?php if($list->director_photograph_file !='') { $file="display:block"; $update="display:inline" ; $fileinput="display:none"; } else { $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none"; }  ?>
<input type="text" id="photograph<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue"  readonly value="<?php echo $list->director_photograph_file; ?>" /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="photograph<?php echo$i; ?>2" >update</a>
<input class="filevalidate" id="photograph<?php echo$i; ?>" style="<?php echo $fileinput; ?>" name="photograph<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="photograph<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
<td>PAN Card</td>
<td>
<?php if($list->director_pancard_file !='') { $file="display:block"; $update="display:inline" ; $fileinput="display:none"; } else { $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none"; }  ?>
<input type="text" id="pancard<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue"  readonly value="<?php echo $list->director_pancard_file; ?>" /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="pancard<?php echo$i; ?>2" >update</a>
<input class="filevalidate" id="pancard<?php echo$i; ?>" style="<?php echo $fileinput; ?>" name="pancard<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="pancard<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
</tr>



<tr>
<td colspan="2"><h3>Identity Proof</h3></td>
<td></td>
<td colspan="2"><h3>Address Proof</h3></td>
<td></td>
</tr>
<tr>
<td><select id="idproof<?php echo$i; ?>" class="" name="idproof<?php echo$i; ?>" >
<option value="<?php echo $idproof; ?>" ><?php echo $idval; ?></option>
<option value="1" >Passport</option>
<option value="2" >Aadhar Card</option>
<option value="3" >Election Card</option>
<option value="4" >Driving License</option>
</select>
</td><td>
<?php if($list->idproof_file !='') { $file="display:block"; $update="display:inline" ; $fileinput="display:none"; } else { $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none"; }  ?>
<input type="text" id="idprooffile<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue"  readonly value="<?php echo $list->idproof_file; ?>"/><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="idprooffile<?php echo$i; ?>2" >update</a>
<input  id="idprooffile<?php echo$i; ?>" class="filevalidate" style="<?php echo $fileinput; ?>" name="idprooffile<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="idprooffile<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
<td><select id="addressproof<?php echo$i; ?>"  class="" name="addressproof<?php echo$i; ?>" >
<option value="<?php echo $addressproof; ?>" ><?php echo $addressval; ?></option>
<option value="" >Select Address</option>
<option value="1" >Mobile Bill</option>
<option value="2" >Electricity Bill</option>
<option value="3" >Telephone Bill</option>
<option value="4" >Bank Statement</option>
</select></td>
<td>
<?php if($list->addressproof_file !='') { $file="display:block"; $update="display:inline" ; $fileinput="display:none"; } else { $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none"; }  ?>
<input type="text" id="addressprooffile<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue"  readonly value="<?php echo $list->addressproof_file; ?>" /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="addressprooffile<?php echo$i; ?>2" >update</a>
<input class="filevalidate" id="addressprooffile<?php echo$i; ?>" style="<?php echo $fileinput; ?>" name="addressprooffile<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="addressprooffile<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress>
</td>
</tr>

<tr>
<td colspan="2"><?php echo$idproof_file ;?></td>
<td colspan="2"><?php echo$addressproof_file ;?></td>
</tr>



</tbody>
</table>
</div>
<?php } ?>
</div>
<p><a class="button"  class="ui-tabs-anchor" href="javascript:tabopen(<?php echo $totalDir; ?>)" id="prevDir" role="presentation" tabindex="-1"> Prev Director</a>
<a class="button" class="ui-tabs-anchor" href="javascript:tabopen(2);" id="nextDir" role="presentation" tabindex="-1">Next Director</a>
<input type="submit" value="Proceed" /></p>
</form>
<p><span class="display_all_errors"></span></p>	
</div>				
									
			<?php
			//endforeach;
					} else {
					
					?>
					<form id="directordetails" action="index.php?option=com_fileupload&amp;view=file&amp;rid=<?php echo $register_id ?>&edit=3&id=0" enctype="multipart/form-data" method="post" name="directordetails">
					<input type="hidden" id="serviceId" name="serviceId" value="<?php echo $serviceId; ?>" />
<input type="hidden" id="totalDir" name="totalDir" value="<?php echo$totalDir; ?>" />
<input type="hidden" id="fileupload" name="fileupload"  />
<?php  $i=0; 
for ($i=1; $i<=$totalDir; $i++) {
if($i==1) $Firsttab=''; else $Firsttab="class='error_field'";
												?>
<div id="tab<?php echo$i; ?>" class="tabs" <?php echo$Firsttab; ?> >
<?php echo $same; ?>    ? <input id="cdnp<?php echo $i; ?>" checked="checked" data-value="<?php echo $i; ?>" class="cdnpclas" name="cdnp<?php echo$i; ?>" type="checkbox"    value="yes" />

<div>
<div class="shift_left">
<table>
<tr>
<td colspan="2">
<h3> Details of director <?php echo$i; ?></h3>
</td>
</tr>
<tr>
<td>Name of Director<span  style="color:red;">*</span></td>
<td><input id="directorname<?php echo$i; ?>" class="validatefield charsonly" name="directorname<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">Enter  Name</span></td>
</tr>
<tr>
<td>Address of director<span  style="color:red;">*</span></td>
<td><input id="directorAddress<?php echo$i; ?>" class="validatefield address" name="directorAddress<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">Enter Address</span></td>
</tr>
<tr>
<td>Mail ID of director<span  style="color:red;">*</span></td>
<td><input id="directorMail<?php echo$i; ?>" class="validatefield validatemail" name="directorMail<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">Enter mail Id</span></td>
</tr>
<tr>
<td>Education Qualification<span  style="color:red;">*</span></td>
<td><input id="directorEducation<?php echo$i; ?>" class="validatefield charsonly" name="directorEducation<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">Enter Qualification</span></td>
</tr>
<tr>
<td>Place of birth<span  style="color:red;">*</span></td>
<td><input id="directorPlace<?php echo$i; ?>" class="validatefield charsonly" name="directorPlace<?php echo$i; ?>" value="" type="text" /><span  class="error_field">Enter birth place</span></td>
</tr>
<tr>
<td>DIN if already applied</td>
<td>
<?php   $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none";  ?>
<input type="text" id="directordin<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue" readonly  /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="directordin<?php echo$i; ?>2" >update</a>
<input id="directordin<?php echo$i; ?>"  class="filevalidate" name="directordin<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="directordin<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
</tr>
<tr id="dirdnp<?php echo$i; ?>" class="">
<td>% of share holding<span  style="color:red;">*</span></td>
<td><input id="dirshare<?php echo$i; ?>" class="validatefield" maxlength="2" name="dirshare<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">percentage in number</span></td>
</tr>
</table> 

</div>
<div class="shift_right">
<table  id="dnp<?php echo$i; ?>" style="display: none;">
<tr>
<td>
<h3>Details of promoters</h3>
</td>
</tr>
<tr>
<td>Name<span  style="color:red;">*</span></td>
<td><input id="promotersname<?php echo$i; ?>"  name="promotersname<?php echo$i; ?>" value="" type="text" /><span  class="error_field">Enter Name</span></td>
</tr>
<tr>
<td>Mail ID<span  style="color:red;">*</span></td>
<td><input id="promotersmail<?php echo$i; ?>" name="promotersmail<?php echo$i; ?>" value=""  type="text" /><span  class="error_field">Enter mail Id</span></td>
</tr>
<tr>
<td>% of share holding<span  style="color:red;">*</span></td> 
<td><input id="promotersshare<?php echo$i; ?>" maxlength="2" name="promotersshare<?php echo$i; ?>" value="" type="text" /><span  class="error_field">percentage in number</span></td>
</tr>
</table>
</div>
</div>
<table>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td colspan="2">
<h3>Documents Upload</h3>
</td>
</tr>
<tr>
<td>Photograph</td>
<td>
<?php   $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none";  ?>
<input type="text" id="photograph<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue" readonly  /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="photograph<?php echo$i; ?>2" >update</a>
<input id="photograph<?php echo$i; ?>" class="filevalidate" name="photograph<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="photograph<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
<td>PAN Card</td>
<td>
<?php   $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none";  ?>
<input type="text" id="pancard<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue" readonly  /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="pancard<?php echo$i; ?>2" >update</a>
<input id="pancard<?php echo$i; ?>" class="filevalidate" name="pancard<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="pancard<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
</tr>



<tr>
<td colspan="2"><h3>Identity Proof</h3></td>
<td></td>
<td colspan="2"><h3>Address Proof</h3></td>
<td></td>
</tr>
<tr>
<td><select id="idproof<?php echo$i; ?>" class="" name="idproof<?php echo$i; ?>" >
<option value="1" >Passport</option>
<option value="2" >Aadhar Card</option>
<option value="3" >Election Card</option>
<option value="4" >Driving License</option>
</select>
</td><td>
<?php   $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none";  ?>
<input type="text" id="idprooffile<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue" readonly  /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="idprooffile<?php echo$i; ?>2" >update</a>
<input id="idprooffile<?php echo$i; ?>" class="filevalidate" name="idprooffile<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="idprooffile<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
<td><select id="addressproof<?php echo$i; ?>" class="" name="idprooffile<?php echo$i; ?>" >
<option value="" >Select Address</option>
<option value="1" >Mobile Bill</option>
<option value="2" >Electricity Bill</option>
<option value="3" >Telephone Bill</option>
<option value="4" >Bank Statement</option>
</select></td>
<td>
<?php   $fileinput="display:block"; $file="display:none"; $file="display:none"; $update="display:none";  ?>
<input type="text" id="addressprooffile<?php echo$i; ?>1" style="<?php echo$file; ?>" class="filevalue" readonly  /><a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="addressprooffile<?php echo$i; ?>2" >update</a>
<input id="addressprooffile<?php echo$i; ?>" class="filevalidate" name="addressprooffile<?php echo$i; ?>" type="file" />
<span  class="error_field" ></span><progress class="hideclass" id="addressprooffile<?php echo$i; ?>prog" value="0" min ="0" max="100"></progress></td>
</tr>


</tbody>
</table>
</div>
<?php } ?>
</div>
<p><a class="button" class="ui-tabs-anchor" href="javascript:tabopen(<?php echo $totalDir; ?>)" id="prevDir" role="presentation" tabindex="-1"> Prev Director</a>
<a class="button" class="ui-tabs-anchor" href="javascript:tabopen(2);" id="nextDir" role="presentation" tabindex="-1">Next Director</a>
<input type="submit" value="Proceed" /></p>
</form>
<p><span class="display_all_errors"></span></p>
<?php 
}
?>
	<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
			function tabopen(tab){
			if(parseInt(tab) < parseInt(1))
			{
				tab = 1;
			}
			else if(parseInt(tab) > parseInt(totalDir))
			{
				tab = totalDir;
			}
			jQuery(".tabs").css("display", "none");
			jQuery("#tab"+tab).css("display", "block");
			jQuery("#tab"+tab).css("display", "block");
			jQuery(".listtabs").removeClass( "<?php echo$active; ?>" ).addClass( "<?php echo$inactive; ?>" );
			jQuery("#litab"+tab).addClass("<?php echo$active; ?>" );
			}           
			tabopen(1);
			jQuery('#prevDir').hide();
			jQuery('#nextDir').click(function(event){
				event.preventDefault();
				var tabno = jQuery('.tabactive').attr('data-tabno');
				var totalDir=jQuery("#totalDir").val();
				var next = parseInt(tabno,10)+parseInt(1,10);
				var prev = parseInt(tabno,10)-parseInt(1,10);
				tabopen(next);
				if(next >= totalDir)
				{
					
					jQuery(this).hide();
					jQuery('#prevDir').show();

					// jQuery('#nextDir').attr('href', 'javascript:tabopen(1);'); 
					// jQuery('#prevDir').attr('href', 'javascript:tabopen('+prev+');'); 
				}
				else
				{	
					
					jQuery('#prevDir').show();
					jQuery(this).show();
					//jQuery('#nextDir').attr('href', 'javascript:tabopen('+next+');'); 
					//jQuery('#prevDir').attr('href', 'javascript:tabopen('+prev+');'); 
				}
			});
			jQuery('#prevDir').click(function(event) {

				event.preventDefault();
				var tabno = jQuery('.tabactive').attr('data-tabno');
				var totalDir=jQuery("#totalDir").val();
				var next = parseInt(tabno,10)+parseInt(1,10);
				var prev = parseInt(tabno,10)-parseInt(1,10);
				tabopen(prev);	
				if(prev == 1)
				{
					jQuery(this).hide();
					jQuery('#nextDir').show();
					// alert('tabone');
					// jQuery('#prevDir').attr('href', 'javascript:tabopen('+totalDir+');'); 
					// jQuery('#nextDir').attr('href', 'javascript:tabopen('+next+');'); 
				}
				// if(parseInt(tabno) == parseInt(totalDir))
				// {
				// 	alert('totalDir');
				// 	jQuery('#nextDir').attr('href', 'javascript:tabopen(1);'); 
				// }
				else
				{
					jQuery(this).show();
					jQuery('#nextDir').show();
					// alert('middle');
					// jQuery('#prevDir').attr('href', 'javascript:tabopen('+prev+');'); 
					// jQuery('#nextDir').attr('href', 'javascript:tabopen('+next+');'); 
				}
				
			});
			// if(jQuery("#totalDir")){
			// 	var  totalDir=jQuery("#totalDir").val();
												
			// 	jQuery(".cdnpclas").click(function(){
				
			// 	var i=jQuery(this).attr('data-value');
									
			// 	if (jQuery("#cdnp"+i).attr('checked')) {
			
			// 	jQuery("#dnp"+i).css({display: 'none'});
			// 	jQuery("#promotersname"+i).removeClass("validatefield"); 
			// 	jQuery("#promotersmail"+i).removeClass("validatefield"); 
			// 	jQuery("#promotersshare"+i).removeClass("validatefield"); 
				
			// } else {
			// 	jQuery("#dnp"+i).css({display: 'block'});
			// 	jQuery("#promotersname"+i).addClass("validatefield"); 
			// 	jQuery("#promotersmail"+i).addClass("validatefield");
			// 	jQuery("#promotersshare"+i).addClass("validatefield"); 
			// }
			// });
			// 	}
</script>	
<script>
	
	// Ajax File upload with jQuery and XHR2
// Sean Clark http://square-bracket.com
// xhr2 file upload
// data is optional
jQuery.fn.upload = function(remote,data,successFn,progressFn) {
  // if we dont have post data, move it along
  if(typeof data != "object") {
    progressFn = successFn;
    successFn = data;
  }
  return this.each(function() {
    if(jQuery(this)[0].files[0]) {
    var formData = new FormData();
    formData.append(jQuery(this).attr("name"), jQuery(this)[0].files[0]);

    // if we have post data too
    if(typeof data == "object") {
      for(var i in data) {
        formData.append(i,data[i]);
      }
    }

    // do the ajax request
    upload= jQuery.ajax({
    url: remote,
    type: 'POST',
    xhr: function() {
    myXhr = jQuery.ajaxSettings.xhr();
    if(myXhr.upload && progressFn){
    myXhr.upload.addEventListener('progress',function(prog) {
    var value = ~~((prog.loaded / prog.total) * 100);

    // if we passed a progress function
    if(progressFn && typeof progressFn == "function") {
    progressFn(prog,value);

    // if we passed a progress element
    } else if (progressFn) {
    jQuery(progressFn).val(value);
    }
    }, false);
    }
    return myXhr;
    },
    data: formData,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    complete : function(res) {
    var json;
    try {
    json = JSON.parse(res.responseText);
    } catch(e) {
    json = res.responseText;
    }
    if(successFn) successFn(json);
    }
    });
    }
    });
};
var id=0 , lastChar='';

jQuery('.filevalidate').click(function () {
  id = jQuery(this).attr('id');
  lastChar =id.substr(id.length - 1);
  jQuery('#' + id).change(function () {
    var file = jQuery(this).get(0);
    var fsize = jQuery(this) [0].files[0].size;
    var name = jQuery(this) [0].files[0].name;
    if (fsize > 1024000) {
      console.log("larger file : " + fsize);
      jQuery(this).addClass('error');
      jQuery(this).next('span.error_field').css('display', 'block').text("File must be smaller than 1MB.");
    } else {
      console.log(" file size : " + fsize + "ID : "+id + "#prog"+lastChar);
      jQuery(this).removeClass('error');
      jQuery(this).next('span.error_field').css('display', 'none').text("");
      jQuery("#"+id+"prog").css('display','block');

      jQuery("#" + id).upload("index.php?option=com_meraproject&view=merav1ews" , function(success){
      console.log("success"+success);
      } , function(prog , value){
        jQuery("#"+id+"prog").val( value );
        console.log("success progress"+value);

        if(value==100){
          jQuery("#"+id+"prog").css('display','none'); 
          jQuery("#"+id).css('display','none');
          jQuery("#"+id).css('display','none');
          jQuery("#"+id+1).css('display','block').val(name);
          jQuery("#"+id+1).next('.update').css('display','inline');
        }
      });  
    }
  });
});


jQuery('.update').click(function () {
  jQuery(this).next().css('display', 'block');
  jQuery(this).prev().css('display', 'none');
  jQuery(this).css('display', 'none');
});

//file upload ends
</script>	
<?php 

					
			
			} else if($editid==4) { ?>

<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>
<article>
	<header>
		<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>		
	</header>
</article>
<div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&rid=<?php echo $register_id ?>&amp;edit=2">Contact Info</a></center></div>
<div id="step2"><center><a class="ms-link"href="index.php/component/fileupload/fileuploadss?rid=<?php echo $register_id ?>&amp;edit=3">Details of Directors</a></center></div>
<div id="step3"  class="ms-active"><center>Company Info</center></div>
<div id="step4"><center><?php echo$summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<div style="clear: both;"></div>
<form id="companyInfoForm" action="index.php/index.php?option=com_fileupload&amp;view=file&rid=<?php echo $register_id; ?>&edit=4" enctype="multipart/form-data" method="post" name="companyInfoForm">
<input type="hidden" id="serviceId" name="serviceId" value="<?php echo $serviceId; ?>" />
<h3>Company Information</h3>
<br /><b style="margin-right: 10px;">1 .Desired Names of the Company</b>
<div style="clear: both;"></div>
<div class="Ci_table">
<table class="Dn_table" width="300">
<tbody>
<tr>
<td>First Choice<span style="color:red;">*</span></td>
<td><input id="companyFirstname" class="validatefield" name="companyFirstname" value="<?php echo $list->first_name; ?>"  required="required" type="text"  /><span  class="error_field">Enter First Choice</span></td>
</tr>
<tr>
<td>Second Choice<span style="color:red;">*</span></td>
<td><input id="Secondname" class="validatefield" name="Secondname" value="<?php echo $list->second_name; ?>" required="required" type="text" /><span  class="error_field">Enter Second Choice</span></td>
</tr>
<tr>
<td>Third Choice<span style="color:red;">*</span></td>
<td><input id="Thirdname" name="Thirdname" class="validatefield" required="required" value="<?php echo $list->third_name; ?>" type="text"/><span  class="error_field">Enter Third Choice</span></td>
</tr>
</tbody>
</table>
</div>
<!-- 
<div class="Dn_tool_hint">
	<table style="width: 45%;">
<tbody>
<tr>
<td>E.g.:</td>
<td><b><span style="text-decoration: underline;">Aarya</span></b></td>
<td><b><span style="text-decoration: underline;">Consultancy Services</span></b></td>
<td><b><span style="text-decoration: underline;">Private Limited</span></b></td>
</tr>
<tr>
<td></td>
<td>1st Part</td>
<td>2nd Part</td>
<td>3rd Part</td>
</tr>
</tbody>
</table>
</div>
-->
<div id="Dn_choice_hint" title="">
<div class="title"><strong>Hint: A Company Name should Consist of 3 Parts</strong></div>
<ul>
<li class="cont">1st Part Shall consist of Keyword<br />Eg.: Aditya</li>
<li class="cont">2nd Part Shall consist of the Activity Word which clearly relates with the business,<br /> Eg.: Consultancy Services</li>
<li class="cont">3rd Part Shall consist of Private Limited</li>
</ul>
</div>
<div style="clear: both;"></div>
<br /><b>2.<span >Significance of Name</span></b><span style="color:red;">*</span><br />
<div>(For Eg: If the name starts with is an acronym of B. Murugan &amp; Co.)</div>
<br />
<div><span style="color: #4c90fe;">Please fill in </span><br /><textarea id="Significancename" class="validatefield" cols="80" name="Significancename" required="required" rows="5"><?php echo $list->name_significance; ?></textarea><span  class="error_field">Enter Name Significance</span></div>
<div style="width: 70%; font-size: 14px;"><span style="color: #000;"> <b>SUGGESTION: </b> Please provide the meaning or importance of the name. The explanation shall be convincing to the ROC, so as to feel that this name is of vital meaning and significance for your Company existence and branding. The significance is only for the sake of obtaining the name from the ROC office. After name approval there is no relevance or reference of the significance in the existence and branding of your Company. <span style="color: #4c90fe;"> Please provide, if you have applied for a trademark or own a website domain registration with the suggested keyword.</span></span></div>
<br /> <b>3 .Main Objective of the Company</b><span style="color:red;">*</span><br /> <span style="color: #4c90fe;">Please fill in </span><br /><textarea class="validatefield" id="companyObjective" cols="80" name="companyObjective" required="required" rows="5"><?php echo $list->company_main_object; ?></textarea><span  class="error_field">Enter Objective of the Company</span><br />
<div style="width: 70%; font-size: 14px;"><b>SUGGESTION: </b>Only a brief mentioning of the main products/services/activity of the business is sufficient. Normally it has to have 5 to 8 points mentioning the business activities relating to a single industry. Following can be EXAMPLE OF MAIN OBJECTIVES: IT Industry: Software development, IT enabled services, Computer sales, BPO, digital marketing, e-commerce, web designing, IT consulting, tele-communication, animation etc. Textile Industry: Manufacturing and trading of cloth, fashion designing, tailoring, apparels, leather products, dyeing.</div>
<br /> <b>4 .Desired Registered Address of the company</b><span style="color:red;">*</span><br /> <span style="color: #4c90fe;">Please fill in </span><br /> <textarea class="validatefield" id="companyaddress" cols="80" name="companyaddress" required="required" rows="5"><?php echo $list->registered_address; ?></textarea><span  class="error_field">Enter Registered Address</span>
<div style="width: 70%; font-size: 14px;">Please provide the postal address for the proposed registered office of the company along with the <span style="color: #4c90fe;">recent address proof not older than 40 days (Electricity Bill/Telephone Bill/Gas Bill/Mobile Bill ALONG WITH Conveyance/Sale deed/Lease deed/Rent Agreement along with the rent receipts </span></div>
Upload<input id="addressproof" name="addressproof" type="file" value="Namma" /><br /> <br /><b>5 .Name and address of police station under whose jurisdiction the registered office will be situated</b><span style="color:red;">*</span><br /> <span style="color: #4c90fe;">Please fill in </span><br /> <textarea class="validatefield" id="policestationaddress" cols="80" name="policestationaddress" required="required" rows="5"><?php echo $list->police_station_Name_and_address; ?></textarea><span  class="error_field">Enter Name and address of police station</span><br /><br /><input type="submit" value="Proceed" /></form>



	<?php	}	break;  endforeach; ?>
 