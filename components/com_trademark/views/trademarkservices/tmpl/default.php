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
        $serviceId=5;
        $model = $this->getModel('Trademarkservices', 'TrademarkModel');
        $resList= $model->getData(280);
        // echo "<pre>";
        // print_r($resList);
        // echo "</pre>";
        // die;
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
          $no_of_directors =$list->no_of_directors;
          $country_state =$list->country_state;
          $trademark_id = $list->trademark_id;

          $companyInfo1 =$list->companyInfo;
          $same = "Directors and promotors are same ";
          if($trademark_id =='') $trademark_id='Trademark &amp; Copyright';
          else
          $trademark_id='<a class="ms-link" href="'.$this->baseurl.'/index.php/trademark-services?params=3" > Trademark &amp; Copyright  </a>';
          
          if($companyInfo1 =='') $companyInfo='Company Info';
          else
          $companyInfo='<a class="ms-link" href="'.$this->baseurl.'/index.php/trademark-services?params=4" > Company Info </a>'; 
          
          if($companyInfo1 =='') $summary='Summary';
          else
          $summary='<a class="ms-link" href="'.$this->baseurl.'/index.php/trademark-services"> Summary </a>'; 

          $total_gov =$list->total_gov_fee;
          $total_price =$list->total_price_fee;
          $gov1 ='';
          $price1 ='';
          $desc1="Company Registration Limited Liability ";
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
Trademark and Copyrights</a>
</h1>       
    </header>
</article>
        <div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=2">Contact Info</a></center></div>
<div id="step2"><center><a class="ms-link" href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=3">Trademark &amp; Copyright</a></center></div>
<div id="step3"><center><a class="ms-link" href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=4" >Company Info</a></center></div>
<div id="step4" class="ms-active"><center>&nbsp; Summary &nbsp;</center></div>
<div id="step5"><center>Payment</center></div>
</div>
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
                                                    <tr> <td><?php echo $desc1; ?></td> <td><?php echo $gov1; ?></td><td><?php echo $price1; ?></td>    </tr>
                                                    <tr> <td><?php echo $desc2; ?></td> <td><?php echo $gov2; ?></td><td><?php echo $price2; ?></td>    </tr>
                                                    <tr> <td><?php echo $desc3; ?></td> <td><?php echo $gov3; ?></td><td><?php echo $price3; ?></td>    </tr>
                                                    <tr> <td><?php echo $desc4; ?></td> <td><?php echo $gov4; ?></td><td><?php echo $price4; ?></td>    </tr>
                                                    <tr> <td><?php echo $desc5; ?></td> <td><?php echo $gov5; ?></td><td><?php echo $price5; ?></td>    </tr>
                                                    <tr> <td><?php echo $desc6; ?></td> <td><?php echo $gov6; ?></td><td><?php echo $price6; ?></td>    </tr>
                                                    <tr> <td>Total :</td> <td><?php echo $total_gov; ?></td><td><?php echo $total_price; ?></td>    </tr>
                                                </table>
                                            </div>
                                            <table>
                                            <tr><td>
                                            <div>
                                                <h3 style="float:left">Contact Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="<?php echo $this->baseurl ?>/index.php/trademark-services?params=2">edit </a>]</div>
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
                                            <h3 style="float:left">Company Information</h3><div style="float:left"> &nbsp;&nbsp;[<a  href="<?php echo $this->baseurl ?>/index.php/trademark-services?params=4">edit </a>]</div>
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
                                            <h3 style="float:left">Details of director <?php echo $dirNo; ?></h3><div style="float:left"> &nbsp;[<a  href="<?php $this->baseurl ?>/index.php/trademark-services?id=<?php echo$list1->recId;?>&params=3">edit </a>]</div>
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
                                                <td  align="right"> <form action="<?php echo JRoute::_("index.php?option=com_businessservices") ?>" method="POST"><input type="hidden" name="msg" value="1"><input type= "submit" value="Proceed" /></td></tr>
                                                
                                                </table>
                                    </div>
                                    
        <?php   }
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
    Trademark &amp; Copyright</a>
        </h1>       
    </header>
</article>
<div class="mainsteps">
<div id="step1" class="ms-active"><center>Contact Info</center></div>
<div id="step2" ><center><?php echo $trademark_id; ?></center></div>
<div id="step3" ><center><?php echo $companyInfo; ?></center></div>
<div id="step4"><center><?php echo $summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<div style="clear: both;"></div>

<p><b>Contact Information</b></p>
<form id="myform" action="<?php echo $this->baseurl; ?>/index.php/component/trademark/trademarkforms" method="post">
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
</tr>
<!-- <tr>
<td>State<span style="color:red;">*</span></td>
<td><select name="slist" id="slist">
<option value="<?php echo $list->contact_country_state; ?>"> <?php echo $list->contact_country_state; ?></option>
<option value="">Select a State</option>
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
</select><span  class="error_field">Select State</span>
</td>
<td>City<span style="color:red;">*</span></td>
<td><input id="city" class="validatefield" name="city" type="text"  value="<?php echo $list->city; ?>"   required="required" /><span  class="error_field">Enter City</span></td>
</tr>
<tr>
<td>Address<span style="color:red;">*</span></td>
<td><input id="address" style="width: 250px;" name="address" class="validatefield"  value="<?php echo $list->address; ?>" required="required" type="text" /><span  class="error_field">Enter Address</span></td>
<td></td> -->
<tr>
<td><input type="submit" value="Proceed " /></td>
</tr>
</tbody>
</table>
</form>
        
        
        
<?php } else if($editid==3) { ?>                                               
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
Trademark &amp; Copyrights</a>
</h1>       
    </header>
</article>
<div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=2">Contact Info</a></center></div>
<div id="step2" class="ms-active" >Trademark &amp; Copyright</div>
<div id="step3" ><center><?php echo $companyInfo; ?></center></div>
<div id="step4"><center><?php echo $summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<form id="trademarkFrom" action="<?php echo $this->baseurl; ?>/index.php/component/trademark/trademarkforms" enctype="multipart/form-data" method="post" name="tmservice[trademarkFrom]">
<div class="formContainer">
	<div class="formHead">Trademark &amp; Copyright</div>
	<div class="formLeft">
		<label for="applicant_name">Applicant Name</label>
		<input type="text" name="tmservice[applicant_name]" id="applicant_name">

    <?php   $fileinput="display:block"; $file="display:none"; $update="display:none";  ?>
		<label for="doc_attachment">Documents attachment</label>
    <input type="text" id="doc_attachment1" style="<?php echo$file; ?>" readonly  />
    <a href="javascript:void(0);" style="<?php echo$update; ?>"  class="update" id="doc_attachment2" >update</a>
		<input type="file" name="tmservice[doc_attachment]" id="doc_attachment">
    <span  class="error_field" ></span>
    <progress class="hideclass" id="doc_attachmentprog" value="0" min ="0" max="100"></progress>

    <label for="doc_address">Address Proof</label>
		<input type="file" name="tmservice[doc_address]" id="doc_address">
		<label for="type">Type</label>
		<input type="text" name="tmservice[type]" id="type">
		<label for="trademark_name">Trademark Name</label>
		<input type="text" name="tmservice[trademark_name]" id="trademark_name">
		<label for="trademark_desc">Trademark Description</label>
		<input type="text" name="tmservice[trademark_desc]" id="trademark_desc">
		<label for="trademark_state">Trademark State</label>
		<select name="tmservice[trademark_state]" id="trademark_state">
			<option value="null">Select State</option>
			<option value="manufacturer">Manufacturer</option>
			<option value="trader">Trader</option>
			<option value="serviceProvider">Service Provider</option>
		</select>
		<label for="service_address">Service Address</label>
		<textarea name="tmservice[service_address]" id="service_address"  rows="2"></textarea>

	</div>
	<div class="formRight">
		<label for="all_directors_fullname">All Directors Fullname</label>
		<textarea name="tmservice[all_directors_fullname]" id="all_directors_fullname"  rows="2"></textarea>
		<label for="signatory_fullname">Signatory Fullname</label>
		<input type="text" name="tmservice[signatory_fullname]" id="signatory_fullname">
		<label for="signatory_phoneno">Signatory Phone no</label>
		<input type="text" name="tmservice[signatory_phoneno]" id="signatory_phoneno">
		<label for="signatory_email">Signatory email</label>
		<input type="email" name="tmservice[signatory_email]" id="signatory_email">
		<label for="signatory_nationality">Signatory Nationality</label>
		<input type="text" name="tmservice[signatory_nationality]" id="signatory_nationality">
		<label for="signatory_gaurdian_name">Signatory Gaurdian Name</label>
		<input type="text" name="tmservice[signatory_gaurdian_name]" id="signatory_gaurdian_name">
		<label for="signatory_address">Signatory Address</label>
		<textarea name="tmservice[signatory_address]" id="signatory_address"  rows="2"></textarea>
		<label for="signatory_age">Signatory Age</label>
		<input type="text" name="tmservice[signatory_age]" id="signatory_age">
	</div>
	<div class="formFoot">
		<input type="hidden" name="tmservice[record_id]" value="<?php echo "$register_id"; ?>">
		<input type="submit" name="tmservice[service-submit]" class="button" value="Proceed"/>
	</div>
</div>
</form>
<p><span class="display_all_errors"></span></p>
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
                //  alert('totalDir');
                //  jQuery('#nextDir').attr('href', 'javascript:tabopen(1);'); 
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
            //  var  totalDir=jQuery("#totalDir").val();
                                                
            //  jQuery(".cdnpclas").click(function(){
                
            //  var i=jQuery(this).attr('data-value');
                                    
            //  if (jQuery("#cdnp"+i).attr('checked')) {
            
            //  jQuery("#dnp"+i).css({display: 'none'});
            //  jQuery("#promotersname"+i).removeClass("validatefield"); 
            //  jQuery("#promotersmail"+i).removeClass("validatefield"); 
            //  jQuery("#promotersshare"+i).removeClass("validatefield"); 
                
            // } else {
            //  jQuery("#dnp"+i).css({display: 'block'});
            //  jQuery("#promotersname"+i).addClass("validatefield"); 
            //  jQuery("#promotersmail"+i).addClass("validatefield");
            //  jQuery("#promotersshare"+i).addClass("validatefield"); 
            // }
            // });
            //  }
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
Trademark &amp; Copyright</a>
</h1>       
    </header>
</article>
<div class="mainsteps">
<div id="step1"><center><a class="ms-link" href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=2">Contact Info</a></center></div>
<div id="step2"><center><a class="ms-link"href="<?php echo $this->baseurl; ?>/index.php/trademark-services?params=3">Trademark &amp; Copyright</a></center></div>
<div id="step3"  class="ms-active"><center>Company Info</center></div>
<div id="step4"><center><?php echo$summary; ?></center></div>
<div id="step5"><center>Payment</center></div>
</div>
<div style="clear: both;"></div>
<form id="companyInfoForm" action="<?php echo $this->baseurl; ?>/index.php/component/trademark/trademarkforms" enctype="multipart/form-data" method="post" name="companyInfoForm">
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
<td><b><span style="text-decoration: underline;">Limited Liability</span></b></td>
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
<li class="cont">3rd Part Shall consist of LLP</li>
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



    <?php   }   break;  endforeach; ?>
 