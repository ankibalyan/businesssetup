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
	// print_r($this->links);	
 // echo "</pre>";
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
			<h3>My Documents</h3>
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids">
						<div class="sfGrid-Col-10 col-centered">
							<div class="sfGrids col-bordered">
								<?php if(count($this->trademarkPending)): ?>
								<table>
									<thead>
										<tr>
											<th>Service Name</th>
											<th>Linked to</th>
											<th>view / edit</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->allDocs as $service){ ?>
											<tr>
												<td>Service Id: <?php echo "$service->register_id"; ?></td>
											</tr>
										<?php if(isset($service->director_photograph_file ) && $service->director_photograph_file != '' ): ?>
											<?php $adr = "client-docs/".$this->user->username.'/'.$service->director_photograph_file; ?>
											<?php if (file_exists($adr)): ?>
												<tr>
													<td><?php echo $this->service_name[$service->service_flag]; ?></td>
													<td><?php echo "director photograph file"; ?></td>
													<td><a href="<?php echo $adr ?>">View</a>/<a href="<?php echo $this->links[$service->service_flag].'?edit=3' ?>">Edit</a></td>
												</tr>
											<?php endif; ?>
									<?php elseif(isset($service->director_din_file ) && $service->director_din_file != ''): ?>
										<?php  $adr = "client-docs/".$this->user->username.'/'.$service->director_din_file; ?>
											<?php if (file_exists($adr)): ?>
												<tr>
													<td><?php echo "$service->register_id"; ?></td>
													<td><?php echo $this->service_name[$service->service_flag]; ?></td>
													<td><?php echo "director din file"; ?></td>
													<td><a href="<?php echo $adr ?>">View</a>/<a href="<?php echo $this->links[$service->service_flag].'?edit=3' ?>">Edit</a></td>
												</tr>
											<?php endif; ?>
									<?php elseif(isset($service->idproof_file ) && $service->idproof_file != ''): ?>
										<?php  $adr = "client-docs/".$this->user->username.'/'.$service->idproof_file; ?>
											<?php if (file_exists($adr)): ?>
												<tr>
													<td><?php echo "$service->register_id"; ?></td>
													<td><?php echo $this->service_name[$service->service_flag]; ?></td>
													<td><?php echo "director Id Proof file"; ?></td>
													<td><a href="<?php echo $adr ?>">View</a>/<a href="<?php echo $this->links[$service->service_flag].'?edit=3' ?>">Edit</a></td>
												</tr>
											<?php endif; ?>
									<?php elseif(isset($service->director_din_file ) && $service->director_din_file != ''): ?>
										<?php  $adr = "client-docs/".$this->user->username.'/'.$service->director_din_file; ?>
											<?php if (file_exists($adr)): ?>
												<tr>
													<td><?php echo "$service->register_id"; ?></td>
													<td><?php echo $this->service_name[$service->service_flag]; ?></td>
													<td><?php echo "director din file"; ?></td>
													<td><a href="<?php echo $adr ?>">View</a>/<a href="<?php echo $this->links[$service->service_flag].'?edit=3' ?>">Edit</a></td>
												</tr>
											<?php endif; ?>
									<?php endif; ?>
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