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
			<!-- <pre><?php print_r($this->allMsg) ?></pre> -->
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids col-bordered">
						<table>
							<thead>
								<tr>
									<th>Subject</th>
									<th>Customer Name</th>
									<th>Mail Id</th>
									<th>Phone no</th>
								</tr>
							</thead>
							<tbody>
							<?php if(count($this->allMsg)): ?>
							<?php foreach ($this->allMsg as $message): ?>
								<tr>
									<td><?php echo $message->subject; ?></td>
									<td><a  href='<?php echo JURI::root(false)."index.php/component/businessservices?view=message&Itemid=$message->recId" ?>'><?php echo $message->custname; ?></a></td>
									<td><?php echo $message->mailid ?></td>
									<td><?php echo $message->phoneno ?></td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td><?php echo "No Messages History"; ?></td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>