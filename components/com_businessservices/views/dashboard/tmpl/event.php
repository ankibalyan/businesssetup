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
		<?php BusinessServicesHelpersHelper::notify($this->notify); ?>
		<div class="sfGrid-Col-9">
			<div class="sfGrids">
				<div class="sfGrid-Col-12">
					<div class="sfGrids">
						<div class="sfGrid-Col-10 col-centered">
							<div class="sfGrids col-bordered">
								<?php if(count($this->event)): ?>
									<h3 class="title">Event Mangement</h3>
									<div class="formContainer">
									<form action="" method="POST" name="sfFormService[form]" enctype="multipart/form-data">
										<label for="">Status</label>
										<select name="sfFormService[status]" id="">
										<?php foreach ($this->statuses as $key => $value): ?>
											<option value="<?php echo $key; ?>" <?php echo ($key==$this->service['0']->status) ? 'selected' : ''; ?>><?php echo $value; ?></option>
										<?php endforeach ?>
										</select>
										<label for="">Assign to</label>
										<select name="sfFormService[assignedId]" id="">
											<option value="0">Un Assigned</option>
										<?php foreach ($this->admins as $value): ?>
											<option value="<?php echo $value ?>" <?php echo ($value==$this->service['0']->assignedId) ? 'selected' : ''; ?> ><?php echo JFactory::getUser($value)->username ?></option>
										<?php endforeach ?>
											
										</select>
										<label for="">Due Date</label><input type="date" name="sfFormService[dueDate]" class="datepicker" value="<?php echo $this->service['0']->dueDate ?>">
										<label for="">Comment</label>
										<textarea name="sfFormService[comment]" id="" class="sfComment"><?php echo $this->service['0']->comment ?></textarea>
										<label for="">Documents</label><input type="file" class="filevalidate" name="sfFormService[processDocs][]" id="processDocs">
										<label for=""></label>
										<input type="hidden" name="sfFormService[register_id]" value="<?php echo $this->service['0']->register_id ?>" id="register_id">
										<input type="hidden" name="token" id="token">
										<input type="hidden" name="action" id="action">
										<input type="submit" value="Save">
									</form>
									</div>
								<?php else: ?>
								<div class="sfGrids">
									<div class="sfGrid-Col-12">
										<?php echo "Retry using by selecting proper service."; ?>
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
</div>-