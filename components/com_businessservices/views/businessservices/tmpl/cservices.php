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
	echo "<pre>";
		//print_r($this->trademarkCompleted);
    echo "</pre>";
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
			<h3>My Completed Sevices</h3>
			<div class="sfGrids">

				<div class="sfGrid-Col-12">
					<div class="sfGrids">
						<div class="sfGrid-Col-10 col-centered">
							<div class="sfGrids col-bordered">
								<?php if(count($this->trademarkCompleted)): ?>
								<table>
									<thead>
										<tr>
											<th>Registerd ID</th>
											<th>Service Name</th>
											<th>Applied On</th>
											<th>Comment</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->trademarkCompleted as $service){ ?>
										<tr>
											<td><?php echo "$service->register_id"; ?></td>
											<td><?php echo $this->service_name[$service->service_flag]; ?></td>
											<td></td>
											<td><?php echo "$service->date_created"; ?></td>
											<td><a href="#">Go to</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>