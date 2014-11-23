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
		<?php if ($this->notify == 1): ?>
			<div class="sfGrid-Col-9">
				<div class="sfGrids">
					<div class="sfGrid-Col-10 col-centered NOTICE">
						<center>Sent Successfully</center>
					</div>
				</div>
			</div>	
		<?php endif; ?>
		
		<div class="sfGrid-Col-9">
			<div class="sfGrids">
				<?php if(isset($this->pendingTotal) && $this->pendingTotal > 0): ?>
				<div class="sfGrid-Col-10 col-centered NOTICE">
					<h4>Notice:</h4>
					<div id="diaog" class= "notice-board" title="Basic dialog">
						<?php foreach ($this->trademarkPending as $service){ ?>
							<?php if($service->status != 'completed' ) ?>
								<p><?php echo $service->comment; ?></p>
						<?php } ?>
					</div>
				</div>
			<?php endif; ?>
			</div>
			<!-- <pre><?php print_r($this->allEvents) ?></pre> -->
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids col-bordered">
						<table id = "sortTable">
							<thead>
								<tr>
									<th>Title</th>
									<th>For User</th>
									<th>Description</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							<?php if(count($this->allEvents)): ?>
							<?php foreach ($this->allEvents as $event): ?>
								<tr>
									<td><a href="<?php echo jRoute::_("index.php?option=com_businessservices&view=event&Itemid=$event->id") ?>"><?php echo $event->title; ?></a></td>
									<td><?php if($event->userId) echo JFactory::getUser($event->userId)->username; else echo "All Users" ?></td>
									<td><?php echo $event->description ?></td>
									<td><?php echo $event->date ?></td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td><?php echo "No Events History"; ?></td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>