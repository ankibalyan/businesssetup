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
$user = JFactory::getUser();
$can_user = $user->authorise('core.edit', 'com_businessservices');
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
		<?php BusinessServicesHelpersHelper::notify($this->notify); ?>
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
			<div class="sfGrids">
				<div class="sfGrid-Col-10 col-centered">
					<div class="sfGrids">
						<div class="sfGrid-Col-4">
							<a href="index.php?option=com_businessservices&amp;layout=pending">
								<div class="circle-text col-centered">
									<div>Pending Services
									</div>
								</div>
								<?php if(isset($this->pendingTotal) && $this->pendingTotal > 0)  echo "<span class='notify_badge'>".$this->pendingTotal."</span>"; ?>
							</a>
						</div>
						<div class="sfGrid-Col-4">
							<a href="index.php?option=com_businessservices&amp;layout=completed">
								<div class="circle-text col-centered">
									<div>Completed Services
									</div>
								</div>
								<?php if(isset($this->completedTotal) && $this->completedTotal > 0)  echo "<span class='notify_badge'>".$this->completedTotal."</span>"; ?>
							</a>
						</div>
						<div class="sfGrid-Col-4">
							<a href="index.php?option=com_businessservices&amp;view=message&rec=history">
								<div class="circle-text col-centered">
									<div>History
									</div>
								</div>
							</a>
							<?php if(isset($this->allHistory) && $this->allHistory > 0) echo "<span class='notify_badge'></span>"; ?>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</div>
</div>