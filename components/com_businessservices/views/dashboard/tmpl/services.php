<?php
/**
* @package Joomla.Administrator
* @subpackage com_helloworld
*
* @copyright Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
 
// No direct access to this file
defined('_JEXEC') or die;
?>
<?php 
	// echo "<pre>";
	// 	//print_r($this->trademarkPending);
 //    echo "</pre>";
?>
<div class="sfContainer">
	<div class="sfGrids">
		<div class="sfGrid-Col-3">
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<?php BusinessServicesHelpersHelper::menu($this->menu); ?>
					<div id="datepicker"></div>
				</div>
			</div>
		</div>
		<div class="sfGrid-Col-9">
			<h3>All <?php echo $this->status; ?> Sevices</h3>
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids">
						<div class="sfGrid-Col-12 col-centered">
						<a href="<?php echo jURI::base().'index.php/component/businessservices/?do=genCsv&q='.$this->getLayout() ?>" class="csvData">Download Csv</a>
							<div class="sfGrids col-bordered">
								<?php if(count($this->trademarkPending)): ?>
								<table id="sortTable">
									<thead>
										<tr>
											<th>Service No</th>
											<th>User Name</th>
											<th class="td-100">Service Name</th>
											<th>State</th>
											<th>Date Applied</th>
											<th>Status</th>
											<th title="Download as File"><i class="fa fa-paperclip"></i></th>
											<th title="Edit Service"><i class="fa fa-pencil-square-o"></i></th>
											<th title="Delete Service"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->trademarkPending as $service){ ?>
										<tr>
											<td><?php echo "$service->register_id"; ?></td>
											<td><?php echo JFactory::getUser($service->userId)->username; ?></td>
											<?php //echo $this->links[$service->service_flag].'?rid='.$service->register_id?>	
											<td class="td-100"><a href="javascript:void()" title="View Record"><?php echo $this->service_name[$service->service_flag]; ?></a></td>
											<td><?php echo "$service->country_state"; ?></td>
											<td><?php echo substr($service->date_created, 0, 10) ?></td>
											<td class="<?php echo $service->status ?>"><?php echo $this->statuses[$service->status]; ?></td>
											<td><a href="<?php echo jURI::base().'index.php/component/businessservices/?do=genCsv&rid='.$service->register_id ?>" title="Download as File" class="csvData"><i class="fa fa-paperclip"></i></a></td>
											<td><a href='<?php echo jRoute::_("index.php?option=com_businessservices&layout=service&Itemid=$service->register_id") ?>' title="Edit Record" class="jmodedit"> <i class="fa fa-pencil-square-o"></i></a></td>
											<td><a href="<?php echo jRoute::_("index.php?option=com_businessservices&task=del&Itemid=$service->register_id&msg=3") ?>" title="Delete Record"><div id="cross"></div></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php else: ?>
								<div class="sfGrids">
									<div class="sfGrid-Col-12">
										<?php echo "You have no $this->status services"; ?>
									</div>
								</div>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>