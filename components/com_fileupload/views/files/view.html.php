<?php
/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Fileupload.
 */
class FileuploadViewFiles extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
        
			define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php/login', 'Please login !!!' );
		}
		$slno='';
$serviceId=1;		
		if(isset($_GET["serviceId"])){
				$formId=$_GET["serviceId"];
				if($formId=="privatelc_reg_form"){
					 $serviceId=1;
				} elseif($formId=="llp_reg_form"){
					$serviceId=2;
				} elseif($formId=="opc_reg_form"){
					$serviceId=3;
				} elseif($formId=="publiclc_reg_form"){
					$serviceId=4;
				}
		
		}

		
		  $model = $this->getModel('Files', 'FileuploadModel');
		 $resList= $model->getData($userID , $serviceId);
		 
		/*   Service_Tax_Documents_gov_fee */
		$editid=321;
		
		if(isset($_GET["edit"])) {
				
				$editid=$_GET["edit"];
		}
		$different=0;
		 foreach ($resList as $list) :
		  $register_id =$list->register_id;

		  $country_state =$list->country_state;
		  $no_of_directors =$list->no_of_directors;
		  $country_state =$list->country_state;
		  $country_state =$list->country_state;
		/*   $dirdetails =$list->dirdetails;
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
		   echo$_GET["sharecapital"];
		   echo$_GET["statelist"];
		   echo$_GET["numdirectors"]; */
		//   echo $list->dirdetails;
		   if($list->no_of_directors == $_GET["numdirectors"] ){
								$dirNodifferent="Directors selection Same";
/* 							if($list->dirdetails == ""){
									$dirdetailsEntered="Director details Not entered";
							} else{
									$dirdetailsEntered="Director details already entered";
							} */
		   } else {	$different=1;
								$dirNodifferent="Directors selection Different";
	/* 						if($list->dirdetails == ""){
									$dirdetailsEntered="Director details already entered";
							} else{
									$dirdetailsEntered="Director details Not entered";
							} */
		   }
		   
		   if($list->country_state == $_GET["statelist"] ){ } else { $different=1; }
		   if($list->share_capital == $_GET["sharecapital"] ){ } else { $different=1; }
					
					if($different==1){
							$changed="Your Selections are different.";
					} else {
						echo "1";
							die;
					}
					if($list->share_capital ==1)
					$share_capital="1 Lakh - 5 Lakh";
					else if($list->share_capital ==5)
					$share_capital="5 Lakh - 10 Lakh";
					else if($list->share_capital ==10)
					$share_capital="10 Lakh - 25 Lakh";
					else if($list->share_capital ==25)
					$share_capital="Above 25 Lakh";
		   
?>

						<div class="popup_message">
						<p><b>Your previous  Selections  were :</b></p> 
					<!--	<p><?php echo $dirNodifferent. "    " . $dirdetailsEntered ;?><b>Your previous  details are :</b></p> -->
							<ul>
								<li><b>State :  </b><?php echo $list->country_state; ?>  &nbsp;&nbsp;</li>
								<li><b> No of Directors :  </b> <?php echo $list->no_of_directors; ?>      </li>
								<li><b> Share Capital : </b><?php echo $share_capital; ?></li>
							</ul>
						<p>Your all previous records will be trashed.</p>
						<p>Are You sure you want to Continue?</p>

												<!--
												<table style="width:70%; height:80%;" >
												<thead><tr style="font:bold"> <td>Description</td> <td>Gov. Fee(INR)</td><td>Price (INR)</td></tr></thead>
													<tr> <td><?php echo $desc1; ?></td> <td><?php echo $gov1; ?></td><td><?php echo $price1; ?></td>	</tr>
													<tr> <td><?php echo $desc2; ?></td> <td><?php echo $gov2; ?></td><td><?php echo $price2; ?></td>	</tr>
													<tr> <td><?php echo $desc3; ?></td> <td><?php echo $gov3; ?></td><td><?php echo $price3; ?></td>	</tr>
													<tr> <td><?php echo $desc4; ?></td> <td><?php echo $gov4; ?></td><td><?php echo $price4; ?></td>	</tr>
													<tr> <td><?php echo $desc5; ?></td> <td><?php echo $gov5; ?></td><td><?php echo $price5; ?></td>	</tr>
													<tr> <td><?php echo $desc6; ?></td> <td><?php echo $gov6; ?></td><td><?php echo $price6; ?></td>	</tr>
													<tr> <td>Total :</td> <td><?php echo $total_gov; ?></td><td><?php echo $total_price; ?></td>	</tr>
												</table>
												-->
											</div>
							<?php
							$slno=1;
							break;
							endforeach ;
							
							if($slno=='')
							echo 1;
							die;
        $this->state		= $this->get('State');
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
        $this->params       = $app->getParams('com_fileupload');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        $this->_prepareDocument();
        parent::display($tpl);
	}


	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('COM_FILEUPLOAD_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}    
    	
}
