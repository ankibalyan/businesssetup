<!--<script>
		jQuery(document).ready(function() {
		alert("Hi")
    jQuery.ajax({
      post: "GET",
      url: "checklogin.php"
    }).done(function(result) {
	alert(result)
	if(result==0){
		window.open("index.php/login/login-form","_blank", "resizable=yes, top=500, left=500, width=500, height=500");
		
		} else {
	 alert("Loged in")
		}
    }).fail(function() {
      alert('Sorry'.this.responseText);
    });
  });
 </script>
 -->
<style type="text/css">
	#gkHeader {
		margin-bottom: -27px !important;
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
		
		  $model = $this->getModel('Fileuploadss', 'FileuploadModel');
		 $resList= $model->getData($userID);
		 
		/*   Service_Tax_Documents_gov_fee */
		$editid=321;
		
		if(isset($_GET["edit"])) {
				
				$editid=$_GET["edit"];
		}
		 foreach ($resList as $list) :
		 
		 
		  $register_id =$list->register_id;
		  $country_state =$list->country_state;
		  $no_of_directors =$list->no_of_directors;
		  $country_state =$list->country_state;
		  $country_state =$list->country_state;
		  $dirdetails =$list->dirdetails;
		  $companyInfo =$list->companyInfo;
		  if($dirdetails =='') $dirdetails='Director details';
		  else
		  $dirdetails='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=3" > Director details  </a>';
		  if($companyInfo =='') $companyInfo='Company Info';
		  else
		  $companyInfo='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=4" > Company Info </a>'; 
		  if($summary =='') $summary='summary';
		  else
		  $summary='<a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=4" > summary </a>'; 
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
<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>
		<div class="mainsteps">
<div id="step2"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=2">Contact Info</a></center></div>
<div id="step3"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;id=&amp;edit=3">Details of Directors</a></center></div>
<div id="step4"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=4" >Company Info</a></center></div>
<div id="step5" class="ms-active"><center>&nbsp; Summary &nbsp;</center></div>
</div>
<!-- <div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&edit=1">edit </a>]</div> -->
<br />
									<div class="file-edit front-end-edit">
												<div>
												<h3 style="float:left">Registration  Details </h3>
												<div style="clear:both"></div>
												<ul>
													<li> &nbsp;<b> State :  </b><?php echo $list->country_state; ?>  &nbsp;&nbsp;<b>    No of Directors :  </b> <?php echo $list->no_of_directors; ?>      <b>  &nbsp;&nbsp;Share Capital : </b><?php echo $list->share_capital; ?> Lakh</li>
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
												<h3 style="float:left">Contact Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&edit=2">edit </a>]</div>
												<div style="clear:both"></div>
											<ul>
											<li>First Name  : <?php echo $list->contact_first_name; ?> </li>
											<li>Last Name : <?php echo $list->contact_last_name; ?> </li>
											<li>Contact Number : <?php echo $list->contact_number; ?> </li>
											<li>Mail ID :   <?php echo $list->mail_id; ?> </li>
											<li>State  : <?php echo $list->contact_country_state; ?></li>
											<li> City  : <?php echo $list->city; ?></li>
											<li>Address  : <?php echo $list->address; ?> </li>
											</ul>
											
											
											</div>
											</td>
											<td>
												<div>
											<h3 style="float:left">Company Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="index.php?option=com_fileupload&view=fileuploadss&edit=4">edit </a>]</div>
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
											<h3 style="float:left">Details of director <?php echo $dirNo; ?></h3><div style="float:left"> &nbsp;[<a  href="index.php/component/fileupload/fileuploadss?id=<?php echo$list1->recId;?>&edit=3">edit </a>]</div>
												<div style="clear:both"></div>
											<ul>
											<li>Name of Director : <?php echo $list1->director_name; ?> </li>
											<li>Address of director : <?php echo $list1->director_address; ?> </li>
											<li>Mail ID of director : <?php echo $list1->director_mail_id; ?> </li>
											<li>Education Qualification: <?php echo $list1->director_qualification; ?> </li>
											<li>Place of birth : <?php echo $list1->director_birthplace; ?> </li>
											<li>Details of promoters</li>
											
											<li>Name: <?php echo $list1->promoters_name; ?> </li>
											<li>Mail ID: <?php echo $list1->promoters_mail; ?> </li>
											<li>% of share holding : <?php echo $list1->promoters_percentage_of_share; ?> </li>
											</ul>
												</div> </td>
									
									<?php 
									
										if($slno==3){  $slno=0; }
									endforeach; ?>
										
												</tr>
												<tr>
												<td  align="right"><input type= "button" value="Proceed" /></td></tr>
												
												</table>
									</div>
									
		<?php 	} else  if($editid==1)  { ?>
		
		
		
		<p>{simplepopup name=popupFromLink hidden=true} Show when link is clicked {/simplepopup}</p>
<p>A private company limited by shares, usually called a private limited company (Ltd.) (though this can theoretically also refer to a private company limited by guarantee), is a type of company incorporated under the laws of England and Wales, Scotland, that of certain Commonwealth countries and the Republic of Ireland. It has shareholders with limited liability and its shares may not be offered to the general public, unlike those of a public limited company (plc).</p>
<p><br /><b>Ideal For</b> IT services, eCommerce, Hospitality, Real Estate<br /><b>Features</b>, Limited Liability, Very High Credibility</p>
<div style="clear: both;"> </div>
<hr width="100%" />
<h3 style="display: inline-block; margin-bottom: 10px;">To Get Started</h3>
<p style="display: inline-block;"><small>select the options below</small></p>
<div style="clear: both;"> </div>
<div style="width: 50%; float: left;">
<div id="cbs1" class="forms1"><center><b>Step One</b></center></div>
<form id="RegistrationForm1" class="form-validate form-horizontal" action="index.php?option=com_fileupload&amp;view=file&edit=1" enctype="multipart/form-data" method="post" name="RegistrationForm1">
<table id="fs">
<tbody>
<tr>
<td colspan="2"><select id="statelist" name="statelist">
<option value="0">Select a State</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select></td>
</tr>
<tr>
<td colspan="2"><select id="numdirectors" name="numdirectors">
<option value="No of Directors">No of Directors</option>
<option>2</option>
<option>3</option>
</select></td>
</tr>
<tr>
<td><select id="sharecapital" name="sharecapital">
<option value="select share capital">Select Share Capital</option>
<option value="1">1 Lakh - 5 Lakh</option>
<option value="5">5 Lakh - 10 Lakh</option>
<option value="10">10 Lakh - 25 Lakh</option>
</select></td>
</tr>
<tr>
<td><input id="s2" type="button" value="Lets Proceed!" /></td>
</tr>
</tbody>
</table>
<div class="forms2"><center><b>Step Two</b></center></div>
<div id="spt">
<table class="servicepricingtable">
<tbody>
<tr class="ptheading">
<td class="ptright"><b>Description</b></td>
<td class="ptright"><b>Gov. Fee(INR)</b></td>
<td><b>Price (INR)</b></td>
</tr>
<tr class="ptbottom">
<td class="ptright" style="font-size: 14px;"><input id="companyregistrationpvtltd" checked="checked" name="companyregistrationpvtltd" type="checkbox" /> Company Registration Private Limited <input id="companyregistrationpvtltd_price" name="companyregistrationpvtltd_price" type="hidden" /> <input id="companyregistrationpvtltd_gov" name="companyregistrationpvtltd_gov" type="hidden" /></td>
<td class="ptright"><a id="companyregistrationpvtltd_gov1" href="index.php/pvt-gov-breakup">11870</a></td>
<td id="companyregistrationpvtltd_price1">9000</td>
</tr>
<tr class="ptbottom">
<td style="font-size: 14px; border-right: 1px solid #000;"><input id="ptltt1" name="ptltt1" type="checkbox" /> PAN Application</td>
<td class="ptright"><span id="ptl1t1">105</span></td>
<td><span id="ptlt1">900</span> <input id="ptlt1_gov" name="ptlt1_gov" type="hidden" /> <input id="ptl1t1_price" name="ptl1t1_price" type="hidden" /></td>
</tr>
<tr class="ptbottom">
<td style="font-size: 14px; border-right: 1px solid #000;"><input id="ptltt2" name="ptltt2" type="checkbox" /> TAN Application</td>
<td class="ptright"><span id="ptl1t2">62</span></td>
<td><span id="ptlt2">900</span> <input id="ptlt2_gov" name="ptlt2_gov" type="hidden" /> <input id="ptl1t2_price" name="ptl1t2_price" type="hidden" /></td>
</tr>
<tr class="ptbottom">
<td style="font-size: 14px; border-right: 1px solid #000;"><input id="ptltt3" name="ptltt3" type="checkbox" /> Business Commencement</td>
<td class="ptright"><span id="ptl1t3">300</span></td>
<td><span id="ptlt3">2000</span> <input id="ptlt3_gov" name="ptlt3_gov" type="hidden" /> <input id="ptl1t3_price" name="ptl1t3_price" type="hidden" /></td>
</tr>
<tr class="ptbottom">
<td style="font-size: 14px; border-right: 1px solid #000;"><input id="ptltt4" name="ptltt4" type="checkbox" /> Service Tax Documents</td>
<td class="ptright"><span id="ptl1t4"></span> </td>
<td><span id="ptlt4">3000</span> <input id="ptlt4_gov" name="ptlt4_gov" type="hidden" /> <input id="ptl1t4_price" name="ptl1t4_price" type="hidden" /></td>
</tr>
<tr class="ptbottom1">
<td style="font-size: 14px; border-right: 1px solid #000;"><input id="ptltt5" name="ptltt5" type="checkbox" /> Shops amp; Establishments</td>
<td class="ptright"> <span id="ptl1t5"></span></td>
<td><span id="ptlt5">4000</span> <input id="ptlt5_gov" name="ptlt5_gov" type="hidden" /> <input id="ptl1t5_price" name="ptl1t5_price" type="hidden" /></td>
</tr>
<tr>
<td> </td>
<td> </td>
<td><button>Buy Now</button></td>
</tr>
</tbody>
</table>
</div>
</form></div>
<table class="pricecalculator">
<tbody>
<tr>
<td class="pricecalculatorh" colspan="2"><center><b>PRICE CALCULATOR</b></center></td>
</tr>
<tr>
<td>Professional Fee</td>
<td>Rs. <span id="pubt">9000</span></td>
</tr>
<tr class="ptbottom1">
<td>Government Fee</td>
<td>Rs. <span id="govt">11870</span></td>
</tr>
<tr>
<td>Total</td>
<td>Rs. 0.0</td>
</tr>
<tr class="pricecalculatorf">
<td colspan="2">
<div class="pricecalculatorf"> </div>
</td>
</tr>
</tbody>
</table>
<div style="clear: both;"> </div>
<hr width="100%" />
<p><a href="#">Comparision between various structures</a></p>
<table>
<tbody>
<tr>
<td colspan="2"><b>Do you need an advice?Let us call you</b></td>
</tr>
<tr>
<td style="width: 10%;">Name</td>
<td><input name="name" size="35" type="text" /></td>
</tr>
<tr>
<td>Email</td>
<td><input name="email" size="35" type="text" /></td>
</tr>
<tr>
<td>Phone</td>
<td><input name="phone" size="35" type="text" /></td>
</tr>
<tr>
<td><input type="submit" value="Send" /></td>
</tr>
</tbody>
</table>
		
		
		
		<?php 	} else  if($editid==2)  { ?>
		
		<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>


<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>
		<div class="mainsteps">
<div id="step2" class="ms-active"><center>Contact Info</center></div>
<div id="step3" ><center><?php echo $dirdetails; ?></center></div>
<div id="step4" ><center><?php echo $companyInfo; ?></center></div>
<div id="step5"><center><?php echo $summary; ?></center></div>
</div>
<div style="clear: both;"></div>

<p><b>Contact Information</b></p>
<form id="myform" action="index.php/index.php?option=com_fileupload&amp;view=file&edit=2" method="post">
<table>
<tbody>
<tr>
<td>First Name</td>
<td><input id="firstname" style="width: 250px;"  value="<?php echo $list->contact_first_name; ?>"  name="firstname" required="required" type="text" /></td>
<td>Last Name</td>
<td><input id="lastname"  value="<?php echo $list->contact_last_name; ?>" name="lastname" required="required" type="text" /></td>
</tr>
<tr>
<td style="width: 15%;">Contact Number</td>
<td><input id="contact" style="width: 250px;" maxlength="10" value="<?php echo $list->contact_number; ?>" name="contact" required="" type="text" /></td>
<td>Mail ID</td>
<td><input id="mailid" name="mailid" value=" <?php echo $list->mail_id; ?>"  required="true" type="text" /> (We wont spam you)</td>
</tr>
<tr>
<td>State</td>
<td><select name="slist" id="slist">
<option value=" <?php echo $list->contact_country_state; ?>"> <?php echo $list->contact_country_state; ?></option>
<option value="0">Select a State</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select>
</td>
<td>City</td>
<td><input id="city" name="city" type="text"  value="<?php echo $list->city; ?>"   required="required" /></td>
</tr>
<tr>
<td>Address</td>
<td><input id="address" style="width: 250px;" name="address"  value="<?php echo $list->address; ?>" required="required" type="text" /></td>
<td></td>
<td><input type="submit" value="Proceed &gt;&gt;" /></td>
</tr>
</tbody>
</table>
</form>
		
		
		
		<?php 	} else  if($editid==3)  { 
		
		
				$recId=$_GET["id"];
													if(isset($_GET["id"])){
												$result= $model->getDirDataRecId($register_id,$recId);
												foreach ($result as $list1) : 
													$dirNo= $model->getDirno($list1->recId, $register_id);
									
									?>
<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>

<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>
									<div class="mainsteps">
<div id="step2"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=2">Contact Info</a></center></div>
<div id="step3" class="ms-active" ><center>Details of Directors</center></div>
<div id="step4"><center>Company Info</center></div>
<div id="step5"><center>&nbsp; Summary &nbsp; </center></div>
</div>
<div style="clear: both;"> </div>
<form id="directordetails" action="index.php?option=com_fileupload&amp;view=file&edit=3&id=<?php echo$list1->recId; ?>" enctype="multipart/form-data" method="post" name="directordetails">
<?php if($dirNo==1) { ?>
Are Directors and Promoters same ?<input id="cdnp" name="cdnp" type="checkbox" value="yes" />
<?php } ?>
<table id="defaultdnp">
<tbody>

<tr>
<td colspan="2">
<table>
<tr>
<td colspan="2">
<h3>Edit Details of director <?php echo $dirNo; ?></h3>
</td>
</tr>
<tr>
<td>Name of Director</td>
<td><input id="directorname" name="directorname" value=" <?php echo $list1->director_name; ?> "required="required" type="text" /></td>
</tr>
<tr>
<td>Address of director</td>
<td><input id="directorAddress" name="directorAddress" value="<?php echo $list1->director_address; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Mail ID of director</td>
<td><input id="directorMail" name="directorMail" value="<?php echo $list1->director_mail_id; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Education Qualification</td>
<td><input id="directorEducation" name="directorEducation" value="<?php echo $list1->director_qualification; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Place of birth</td>
<td><input id="directorPlace" name="directorPlace" value="<?php echo $list1->director_birthplace; ?> " required="required" type="text" /></td>
</tr>
<tr>
<td>DIN if already applied</td>
<td><input id="directordin" name="directordin" type="file" /></td>
</tr>
</table>
</td>
<?php if($dirNo==1){ ?>
<td colspan="2">
<table id="dnp" style="display: block;">
<tr>
<td>
<h3>Details of promoters</h3>
</td>
</tr>
<tr>
<td>Name</td>
<td><input id="promotersname" name="promotersname" value="<?php echo $list1->promoters_name; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Mail ID</td>
<td><input id="promotersmail" name="promotersmail" value="<?php echo $list1->promoters_mail; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>% of share holding</td>
<td><input id="promotersshare" name="promotersshare" value="<?php echo $list1->promoters_percentage_of_share; ?> " required="required" type="text" /></td>
</tr>
</table>
</td>
<?php }?>
</tr>

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
<td><input id="photograph" name="photograph" type="file" /></td>
<td>PAN Card</td>
<td><input id="pancard" name="pancard" type="file" /></td>
</tr>
<tr>
<td colspan="2"><h3>Identity Proof</h3></td>
<td></td>
<td colspan="2"><h3>Address Proof</h3></td>
<td></td>
</tr>
<tr>
<td colspan="2"><small>* Anyone of the following</small></td>
<td></td>
<td colspan="2"><small>* Anyone of the following</small></td>
<td></td>
</tr>
<tr>
<td>Passport</td>
<td><input id="passport" name="passport" type="file" /></td>
<td>Mobile Bill</td>
<td><input id="mobilebill" name="mobilebill" type="file" /></td>
</tr>
<tr>
<td>Aadhar Card</td>
<td><input id="adharcard" name="adharcard" type="file" /></td>
<td>Electricity Bill</td>
<td><input id="electricitybill" name="electricitybill" type="file" /></td>
</tr>
<tr>
<td>Election Card</td>
<td><input id="electioncard" name="electioncard" type="file" /></td>
<td>Telephone Bill</td>
<td><input id="telephonebill" name="telephonebill" type="file" /></td>
</tr>
<tr>
<td>Driving License</td>
<td><input id="drivinglicence" name="drivinglicence" type="file" /></td>
<td>Bank Statement</td>
<td><input id="bankstatement" name="bankstatement" type="file" /></td>
</tr>
</tbody>
</table>
<p><input type="submit" value="Proceed" /></p>
</form>
									
									
			<?php
			endforeach;
					} else {
					
					
													$dirNo= $model->getdirConut($register_id);
					?>
					<div class="tabbs">
<ul class="tabb-links">
<li class="active"><a href="index.php/service/incorporations">Incorporations</a></li>
<li><a href="#tabb2">Registrations</a></li>
<li><a href="#tabb3">Company Maintenance</a></li>
<li><a href="#tabb4">Intellectual Property</a></li>
<li><a href="#tabb5">Funding</a></li>
</ul>
</div>
<h1 itemprop="name">
	<a itemprop="url" href="#">
Private Limited Company</a>
</h1>
					<div class="mainsteps">
<div id="step2"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=2">Contact Info</a></center></div>
<div id="step3" class="ms-active"><center>Details of Directors</center></div>
<div id="step4"><center>Company Info</center></div>
<div id="step5"><center>&nbsp; Summary &nbsp; </center></div>
</div>
<div style="clear: both;"> </div>
<form id="directordetails" action="index.php?option=com_fileupload&amp;view=file" enctype="multipart/form-data" method="post" name="directordetails">
<?php if($dirNo==1){ ?>
Are Directors and Promoters same ?<input id="cdnp" name="checkDNP" type="checkbox" value="yes" />
<?php } ?>
<table id="defaultdnp">
<tbody>

<tr>
<td colspan="2">
<table>
<tr>
<td colspan="2">
<h3>Details of director <?php echo $dirNo; ?></h3>
</td>
</tr>
<tr>
<td>Name of Director</td>
<td><input id="directorname" name="directorname" value=" <?php echo $list1->director_name; ?> " required="required" type="text" /></td>
</tr>
<tr>
<td>Address of director</td>
<td><input id="directorAddress" name="directorAddress" value="<?php echo $list1->director_address; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Mail ID of director</td>
<td><input id="directorMail" name="directorMail" value="<?php echo $list1->director_mail_id; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Education Qualification</td>
<td><input id="directorEducation" name="directorEducation" value="<?php echo $list1->director_qualification; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Place of birth</td>
<td><input id="directorPlace" name="directorPlace" value="<?php echo $list1->director_birthplace; ?> " required="required" type="text" /></td>
</tr>
<tr>
<td>DIN if already applied</td>
<td><input id="directordin" name="directordin" type="file" /></td>
</tr>
</table>
</td>
<?php if($dirNo==1){ ?>
<td colspan="2">
<table id="dnp" style="display: block;">
<tr>
<td>
<h3>Details of promoters</h3>
</td>
</tr>
<tr>
<td>Name</td>
<td><input id="promotersname" name="promotersname" value="<?php echo $list1->promoters_name; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>Mail ID</td>
<td><input id="promotersmail" name="promotersmail" value="<?php echo $list1->promoters_mail; ?>" required="required" type="text" /></td>
</tr>
<tr>
<td>% of share holding</td>
<td><input id="promotersshare" name="promotersshare" value="<?php echo $list1->promoters_percentage_of_share; ?> " required="required" type="text" /></td>
</tr>
</table>
</td>
<?php } ?>
</tr>

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
<td><input id="photograph" name="photograph" type="file" /></td>
<td>PAN Card</td>
<td><input id="pancard" name="pancard" type="file" /></td>
</tr>
<tr>
<td colspan="2"><h3>Identity Proof</h3></td>
<td></td>
<td colspan="2"><h3>Address Proof</h3></td>
<td></td>
</tr>
<tr>
<td colspan="2"><small>* Anyone of the following</small></td>
<td></td>
<td colspan="2"><small>* Anyone of the following</small></td>
<td></td>
</tr>
<tr>
<td>Passport</td>
<td><input id="passport" name="passport" type="file" /></td>
<td>Mobile Bill</td>
<td><input id="mobilebill" name="mobilebill" type="file" /></td>
</tr>
<tr>
<td>Aadhar Card</td>
<td><input id="adharcard" name="adharcard" type="file" /></td>
<td>Electricity Bill</td>
<td><input id="electricitybill" name="electricitybill" type="file" /></td>
</tr>
<tr>
<td>Election Card</td>
<td><input id="electioncard" name="electioncard" type="file" /></td>
<td>Telephone Bill</td>
<td><input id="telephonebill" name="telephonebill" type="file" /></td>
</tr>
<tr>
<td>Driving License</td>
<td><input id="drivinglicence" name="drivinglicence" type="file" /></td>
<td>Bank Statement</td>
<td><input id="bankstatement" name="bankstatement" type="file" /></td>
</tr>
</tbody>
</table>
<p><input type="submit" value="Proceed" /></p>
</form>

<?php 
}
					
			
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
<div class="mainsteps">
<div id="step2"><center><a class="ms-link" href="index.php?option=com_fileupload&amp;view=fileuploadss&amp;edit=2">Contact Info</a></center></div>
<div id="step3"><center><a class="ms-link"href="index.php/component/fileupload/fileuploadss?id=0&amp;edit=3">Details of Directors</a></center></div>
<div id="step4"  class="ms-active"><center>Company Info</center></div>
<div id="step5"><center>Summary</center></div>
</div>
<div style="clear: both;"></div>
<form id="companyInfoForm" action="index.php/index.php?option=com_fileupload&amp;view=file&edit=4" enctype="multipart/form-data" method="post" name="companyInfoForm">
<h3>Company Information</h3>
<br /><b style="margin-right: 10px;">1 .Desired Names of the Company</b>
<table>
<tbody>
<tr>
<td>First Name</td>

<td><input id="companyFirstname" name="companyFirstname" value="<?php echo $list->first_name; ?>"  required="required" type="text"  /></td>
<td>1st Part Shall consist of<span style="color: #4c90fe;"> Keyword</span></td>
</tr>
<tr>
<td>Second Name</td>
<td><input id="Secondname" name="Secondname" value=" <?php echo $list->second_name; ?> " required="required" type="text" /></td>
<td>2nd Part Shall consist of the <span style="color: #4c90fe;">Activity Word </span>which clearly relates with the business</td>
</tr>
<tr>
<td>Third Name</td>
<td><input id="Thirdname" name="Thirdname" required="required" value=" <?php echo $list->third_name; ?> " type="text"/></td>
<td>3rd Part <span style="color: #4c90fe;">Private Limited </span></td>
</tr>
</tbody>
</table>
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
<br /><b>2.<span >Significance of Name</span></b><br />
<div>(For Eg: If the name starts with is an acronym of B. Murugan &amp; Co.)</div>
<br />
<div><span style="color: #4c90fe;">Please fill in </span><br /><textarea id="Significancename" cols="80" name="Significancename" required="required" rows="5"><?php echo $list->name_significance; ?></textarea></div>
<div style="width: 70%; font-size: 14px;"><span style="color: #000;"> <b>SUGGESTION: </b> Please provide the meaning or importance of the name. The explanation shall be convincing to the ROC, so as to feel that this name is of vital meaning and significance for your Company existence and branding. The significance is only for the sake of obtaining the name from the ROC office. After name approval there is no relevance or reference of the significance in the existence and branding of your Company. <span style="color: #4c90fe;"> Please provide, if you have applied for a trademark or own a website domain registration with the suggested keyword.</span></span></div>
<br /> <b>3 .Main Objective of the Company</b><br /> <span style="color: #4c90fe;">Please fill in </span><br /><textarea id="companyObjective" cols="80" name="companyObjective" required="required" rows="5"><?php echo $list->company_main_object; ?></textarea><br />
<div style="width: 70%; font-size: 14px;"><b>SUGGESTION: </b>Only a brief mentioning of the main products/services/activity of the business is sufficient. Normally it has to have 5 to 8 points mentioning the business activities relating to a single industry. Following can be EXAMPLE OF MAIN OBJECTIVES: IT Industry: Software development, IT enabled services, Computer sales, BPO, digital marketing, e-commerce, web designing, IT consulting, tele-communication, animation etc. Textile Industry: Manufacturing and trading of cloth, fashion designing, tailoring, apparels, leather products, dyeing.</div>
<br /> <b>4 .Desired Registered Address of the company</b><br /> <span style="color: #4c90fe;">Please fill in </span><br /> <textarea id="companyaddress" cols="80" name="companyaddress" required="required" rows="5"><?php echo $list->registered_address; ?></textarea>
<div style="width: 70%; font-size: 14px;">Please provide the postal address for the proposed registered office of the company along with the <span style="color: #4c90fe;">recent address proof not older than 40 days (Electricity Bill/Telephone Bill/Gas Bill/Mobile Bill ALONG WITH Conveyance/Sale deed/Lease deed/Rent Agreement along with the rent receipts </span></div>
Upload<input id="addressproof" name="addressproof" type="file" value="Namma" /><br /> <br /><b>5 .Name and address of police station under whose jurisdiction the registered office will be situated</b><br /> <span style="color: #4c90fe;">Please fill in </span><br /> <textarea id="policestationaddress" cols="80" name="policestationaddress" required="required" rows="5"><?php echo $list->police_station_Name_and_address; ?></textarea> <br /><br /><input type="submit" value="Proceed" /></form>



	<?php	}	break;  endforeach; ?>
 