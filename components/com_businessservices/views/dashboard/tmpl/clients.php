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
			<h3>All Clients</h3>
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids">
						<div class="sfGrid-Col-12 col-centered">
						<a href="<?php echo jURI::base().'index.php/component/businessservices/?do=genCsv&q='.$this->getLayout() ?>" class="csvData">Download Csv</a>
							<div class="sfGrids col-bordered">
								<?php if(count($this->registered)): ?>
								<table id="sortTable">
									<thead>
										<tr>
											<!-- <th>User ID</th> -->
											<th>Username</th>
											<th>Email</th>
											<th>Phone On</th>
											<th>Total Services</th>
											<th>Registered On</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->registered as $register){ ?>
										<tr>
											<!-- <td><?php //echo "$register->id"; ?></td> -->
											<td><?php echo $register->username; ?></td>
											<td><?php echo $register->email; ?></td>
											<td><?php echo $phone = (isset(JUserHelper::getProfile($register->id)->profile['phone']))? JUserHelper::getProfile($register->id)->profile['phone'] : ' - '; ?></td>
											<td><?php echo $this->trademark_m->getServicesCount(null,$register->id)->total ?></td>
											<td><?php echo substr($register->registerDate, 0, 10) ?></td><!-- 
											<td><a href='<?php echo jRoute::_("index.php?option=com_businessregisters&layout=register&Itemid=$register->register_id") ?>' title="View Record"> Edit </a></td> --><!-- 
											<td><a href="<?php echo jRoute::_("index.php?option=com_businessregisters&task=del&Itemid=$register->register_id&msg=3") ?>" title="Delete Record"> X </a></td> -->
										</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php else: ?>
								<div class="sfGrids">
									<div class="sfGrid-Col-12">
										<?php echo "You have no $this->status registers"; ?>
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