<?php
/**
 * @version     1.0.0
 * @package     com_opc_services
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_opc_services', JPATH_ADMINISTRATOR);
$serviceId=3;
?>
<?php if ($this->item && $this->item->state == 1) : ?>

    <div class="item_fields">
        <table class="table">
            
        </table>
    </div>
    
    <?php
else:
?>
<style type="text/css">
	#gkHeader {
		margin-bottom: 10px !important;
	}
	article header h1{
		padding-top: 50px;
	}
</style> 
<article>
	<header>
		<h1 itemprop="name">
			<a itemprop="url" href="#">One Person company</a>
		</h1>
	</header>
</article>
<p>A One Person company , usually called a One Person company (Ltd.) (though this can theoretically also refer to a private company limited by guarantee), is a type of company incorporated under the laws of England and Wales, Scotland, that of certain Commonwealth countries and the Republic of Ireland. It has shareholders with limited liability and its shares may not be offered to the general public, unlike those of a public limited company (plc). </p>
<div >
<p><b>Ideal For</b> IT services, eCommerce, Hospitality, Real Estate<br /><b>Features</b>, Limited Liability, Very High Credibility</p>
</div>
<div style="clear: both;"> </div>
<!-- <div id="fade"> </div>
<div id="light">
<div id="popuclose"><b>X</b></div>
<div id="popcon"></div>
<div class="options">
	<a href="javascript:void(0);" class="button popupClose" style="color:#fff;">Cancel</a>
	<a href="javascript:void(0);" class="button popupContinue" style="color:#fff;">Continue</a>
</div>
</div> -->
<div class="arc"><header class="arc_header">
<h3>Get Started</h3>
</header>
<section class="arc_section">
<article class="arc_section_main"><form id="publiclc_reg_form" action="<?php echo $this->baseurl; ?>/index.php/component/opc_services/registrationforms" method="post" name="privatelc_reg_form"> 
<input type="hidden" id="serviceId" name="regService[serviceId]" value="<?php echo $serviceId; ?>" />
<table id="fs" class="tb_get_start">
<tbody>
<tr>
<td>State *</td>
<td><select id="statelist" name="regService[statelist]">
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
<span class="error_field"></span></td>
</tr>
<tr>
<td>Capital *</td>
<td>
<input type="hidden" id="numdirectors" name="regService[numdirectors]" value = "1">
<select id="sharecapital" name="regService[sharecapital]">
<option value="" data-info = "0">Select Share Capital</option>
<option value="1" data-info = "2">1 Lakh - 5 Lakh</option>
<option value="5" data-info = "3">5 Lakh - 10 Lakh</option>
<option value="10" data-info = "4">10 Lakh - 25 Lakh</option>
<option value="25" data-info = "5">Above 25 Lakh</option>
</select>
<span class="error_field"></span>
</td>
</tr>
</tbody>
</table>
<table id="sptable" class="tb_get_start">
<thead>
<tr class="pthd"><th><b>Description</b></th><th><b>Gov.Fee (INR)</b></th><th><b>Price (INR)</b></th></tr>
</thead>
<tbody>
<tr class="td1">
<td><input id="ptltt" checked="checked" disabled="disabled" name="regService[ptltt]" type="checkbox" /> Company Registration Private Limited <input id="companyregistrationpvtltd_price" name="regService[companyregistrationpvtltd_price]" type="hidden" />
<input id="companyregistrationpvtltd_gov" name="regService[companyregistrationpvtltd_gov]" type="hidden" /></td>
<td><a id="companyregistrationpvtltd_gov1" title="Click to view" href="index.php/pvt-gov-breakup" data-toggle="tooltip" class="govval">0</a></td>
<td class="prival" id="companyregistrationpvtltd_price1" title="">0</td>
</tr>
<tr class="td2">
<td><input id="ptltt1" name="regService[ptltt1]" type="checkbox" /> PAN Application</td>
<td><span  style="display:none;" id="ptl1t1">0</span><span>*</span></td>
<td><span  style="display:none;" id="ptlt1">0</span><span>*</span><input id="ptlt1_gov" name="regService[ptlt1_gov]" type="hidden" /> <input id="ptl1t1_price" name="regService[ptl1t1_price]" type="hidden" /></td>
</tr>
<tr class="td1">
<td><input id="ptltt2" name="regService[ptltt2]" type="checkbox" /> TAN Application</td>
<td><span  style="display:none;" id="ptl1t2">0</span><span>*</span></td>
<td><span  style="display:none;" id="ptlt2">0</span><span>*</span><input id="ptlt2_gov" name="regService[ptlt2_gov]" type="hidden" /> <input id="ptl1t2_price" name="regService[ptl1t2_price]" type="hidden" /></td>
</tr>
<tr class="td2">
<td><input id="ptltt3" name="regService[ptltt3]" type="checkbox" /> Business Commencement</td>
<td><span  id="ptl1t3">300</span></td>
<td><span  id="ptlt3">2000</span> <input id="ptlt3_gov" name="regService[ptlt3_gov]" type="hidden" /> <input id="ptl1t3_price" name="regService[ptl1t3_price]" type="hidden" /></td>
</tr>
<tr class="td1">
<td><input id="ptltt4" name="regService[ptltt4]" type="checkbox" /> Service Tax Documents</td>
<td> </td>
<td><span  id="ptlt4">3000</span> <input id="ptlt4_gov" name="regService[ptlt4_gov]" type="hidden" /> <input id="ptl1t4_price" name="regService[ptl1t4_price]" type="hidden" /></td>
</tr>
<tr class="td2">
<td><input id="ptltt5" name="regService[ptltt5]" type="checkbox" /> Shops &amp; Establishments</td>
<td> </td>
<td><span  id="ptlt5">4000</span> <input id="ptlt5_gov" name="regService[ptlt5_gov]" type="hidden" /> <input id="ptl1t5_price" name="regService[ptl1t5_price]" type="hidden" /></td>
</tr>
<tr class="td_last">
<td colspan="2"><span class="small_text"><small>* Mandatory Fields</small></span><input id="total_gov" name="regService[total_gov]" type="hidden" value="0" /><input id="total_price" name="regService[total_price]" type="hidden" value="0" /></td>
<td><button>Buy Now</button></td>
</tr>
</tbody>
</table>
<div id="notify"> </div>
</form></article>
<aside class="section_aside" id="gkSidebar">
<article>
<form id="advicecontact" action="javascript:void(0);" method="post" name="advicecontact">
<table>
<thead>
<tr><th colspan="2">
<div id="need_help" class="need_help">Do you need an advice? Let us call you</div>
</th></tr>
</thead>
<tbody>
<tr>
<td style="width: 10%;">Name</td>
<td><input id="custname" class="charsonly validatefield" name="custname" size="35" type="text" /><span  class="error_field"></span></td>
</tr>
<tr>
<td>Email</td>
<td><input id="emailId" class="validatemail validatefield" name="emailId" size="35" type="text" /><span  class="error_field"></span></td>
</tr>
<tr>
<td>Phone</td>
<td><input id="phoneno" class="phone validatefield" name="phoneno" size="35" type="text" /><span  class="error_field"></span></td>
</tr>
<tr class="td_last">
<td><input type="submit" value="Send" /></td>
<td id="messagedisplay" style="color: green;"> </td>
</tr>
</tbody>
</table>
</form>
</article>
<article class="section_aside_article">
<div id="price_cal" class="price_cal">
<table>
<thead>
<tr><th colspan="2"><center><b>PRICE CALCULATOR</b></center></th></tr>
</thead>
<tbody>
<tr>
<td>Price</td>
<td><b>Rs. <span id="pubt">0</span></b></td>
</tr>
<tr>
<td>Gov. Fee</td>
<td><b>Rs. <span id="govt">0</span></b></td>
</tr>
<tr class="ptbottom1">
<td>Total</td>
<td><b>Rs. <span id="pc_tot">0</span></b></td>
</tr>
</tbody>
</table>
</div>
</article>
<article>
<p><a class="comparison" href="#">Comparision between various structures</a></p>
</article>
</aside>
</section>
<footer class="arc_footer"></footer></div>
<div style="clear: both;"> </div>

	<div class="sf_fade"></div>
	<div class="sf_light">
		<div class="sf_close">X</div>
		<div class="sf_popup"></div>
		<div class="sf_message"></div>
	</div>

	<div class="show_cont">
	<table class="private_pt">
		<thead>
			<tr>
				<th>1. Name Application</th>
				<th>1lakh - 5 lakh</th>
				<th>5lakh - 10 lakh</th>
				<th>10lakh - 25 lakh</th>
				<th>Above 25 Lakhs</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Form- INC 1</td>
				<td class = "add_val">1000</td>
				<td class = "add_val">1000</td>
				<td class = "add_val">1000</td>
				<td class = "add_val">1000</td>
			</tr>
			<tr>
				<th>2. Stamp Duty charges</th>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
			</tr>
			<tr>
				<td class = "add_val">Moa</td>
				<td class = "add_val">200</td>
				<td class = "add_val">200</td>
				<td class = "add_val">200</td>
				<td class = "add_val">200</td>
			</tr>
			<tr>
				<td class = "add_val">AOA</td>
				<td class = "add_val">1000</td>
				<td class = "add_val">1000</td>
				<td class = "add_val">2000</td>
				<td class = "add_val">5000</td>
			</tr>
			<tr>
				<td class = "add_val">Form- INC 7</td>
				<td class = "add_val">100</td>
				<td class = "add_val">100</td>
				<td class = "add_val">100</td>
				<td class = "add_val">100</td>
			</tr>
			<tr>
				<th>3. Form filing fees</th>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
				<td class = "add_val"></td>
			</tr>
			<tr>
				<td class = "add_val">Form DIR - 12</td>
				<td class = "add_val">300</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
			</tr>
			<tr>
				<td class = "add_val">Form INC 22</td>
				<td class = "add_val">300</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
			</tr>
			<tr>
				<td class = "add_val">Form INC 7</td>
				<td class = "add_val">300</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
			</tr>
			<tr>
				<td class = "add_val">MOA</td>
				<td class = "add_val">2000</td>
				<td class = "add_val">2000</td>
				<td class = "add_val">2000</td>
				<td class = "add_val">2000</td>
			</tr>
			<tr>
				<td class = "add_val">AOA</td>
				<td class = "add_val">300</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
				<td class = "add_val">500</td>
			</tr>
			<tr>
				<th>5. Liaison Charges</th>
				<td class = "add_val">3000</td>
				<td class = "add_val">3000</td>
				<td class = "add_val">3000</td>
				<td class = "add_val">3000</td>
			</tr>
			<tr>
				<th>6. DIN Application fees</th>
				<td class = "add_val DIN">500</td>
				<td class = "add_val DIN">500</td>
				<td class = "add_val DIN">500</td>
				<td class = "add_val DIN">500</td>
			</tr>
			<tr>
				<th>7. Digital Signature (DSC) fees</th>
				<td class = "add_val DSF" data-base ="1500">1500</td>
				<td class = "add_val DSF" data-base ="1500">1500</td>
				<td class = "add_val DSF" data-base ="1500">1500</td>
				<td class = "add_val DSF" data-base ="1500">1500</td>
			</tr>
			<tr id = "pSum">
				<th>Total</th>
				<td id = "PL_TOT1"></td>
				<td id = "PL_TOT5"></td>
				<td id = "PL_TOT10"></td>
				<td id = "PL_TOT25"></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="login_fade"></div>
<div id="login_light">
	<div id="login_close"> X </div>
	<div id="login_popup">
	<div class="pLogin">
		<?php
			$user = JFactory::getUser();
			$doc = JFactory::getDocument();
			$module = JModuleHelper::getModule('mod_login');
			//get and update params
			$params = new JRegistry;
			$params->loadString($module->params);
			// $params->set('registration_tab1','enabled');
			// $params->set('login_tab','enable');

			//render module
			$renderer = $doc->loadRenderer('module');
			$content = $renderer->render($module, array('params'=> $params));
			//echo "<pre>".print_r($module->params)."</pre>";
			// $content .= '<a class="regOpen" href="index.php/user-profile/user-profile?view=registration"> Don\'t Have an Account, Click Here </a>';
			print $content;
		?>
	</div>
	<div class="pRegistration">
		<?php 

		// Path to the users component
		$com = JPATH_SITE.DS.'components'.DS.'com_users';

		// Get/configure the users controller
		if (!class_exists('UsersController')) require($com.DS.'controller.php');
		$config['base_path'] = $com;
		$cont = new UsersController($config);

		// Get the view and add the correct template path
		$view =& $cont->getView('registration', 'html');
		$view->addTemplatePath($com.DS.'views'.DS.'registration'.DS.'tmpl');

		// Set which view to display and add appropriate paths
		JRequest::setVar('view', 'registration');
		JForm::addFormPath($com.DS.'models'.DS.'forms');
		JForm::addFieldPath($com.DS.'models'.DS.'fields');

		// Load the language file
		$lang =& JFactory::getLanguage();
		$lang->load('com_users', JPATH_SITE);

		// And finally render the view!
		$cont->display();
	 ?>	
	</div>
	<div class="popup_notify"> </div>
	</div>
</div>
<?php endif; ?>
