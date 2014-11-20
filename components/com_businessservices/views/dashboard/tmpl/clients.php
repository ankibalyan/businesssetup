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
<?php BusinessregistersHelpersHelper::dataSorts(); ?>
<div class="sfContainer">
	<div class="sfGrids">
		<div class="sfGrid-Col-3">
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<?php BusinessregistersHelpersHelper::menu($this->menu); ?>
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
							<div class="sfGrids col-bordered">
								<?php if(count($this->register)): ?>
								<table id="clients">
									<thead>
										<tr>
											<th>User ID</th>
											<th>Username</th>
											<th>Email</th>
											<th>Phone On</th>
											<th>Assign</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->register as $register){ ?>
										<tr>
											<td><?php echo "$register->register_id"; ?></td>
											<td><?php echo JFactory::getUser($register->userId)->username; ?></td>
											<td><a href="<?php echo $this->links[$register->register_flag];?>" title="View Record"><?php echo $this->register_name[$register->register_flag]; ?></a></td>
											<td><?php echo substr($register->date_created, 0, 10) ?></td>
											<td class="<?php echo $register->status ?>"><?php echo $this->statuses[$register->status]; ?></td>
											<td><a href='<?php echo jRoute::_("index.php?option=com_businessregisters&layout=register&Itemid=$register->register_id") ?>' title="View Record"> Edit </a></td>
											<td><a href="<?php echo jRoute::_("index.php?option=com_businessregisters&task=del&Itemid=$register->register_id&msg=3") ?>" title="Delete Record"> X </a></td>
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