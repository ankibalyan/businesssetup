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
								<?php if(!isset($this->event[0]) || count($this->event[0])): ?>
									<h3 class="title">Event Mangement</h3>
									<div class="formContainer">
									<form action="" method="POST" name="sfForm[form]" enctype="multipart/form-data">
										<label for="">For User</label>
										<select name="sfFormEvent[userId]" id="">
											<option value="0">All Users</option>
										<?php foreach ($this->registered as $user): ?>
											<option value="<?php echo $user->id;?>" <?php if(isset($this->event[0]) && $this->event[0]['userId']==$user->id) echo "selected"; ?>>
												<?php echo $user->username ?>
											</option>
										<?php endforeach ?>
											
										</select>
										<label for="">Event Date</label><input type="date" name="sfFormEvent[date]" class="datepicker" value="<?php if(isset($this->event[0])) echo $this->event[0]['date']; ?>">
										<label for="">Title</label><input type="text" name="sfFormEvent[title]" value="<?php if(isset($this->event[0])) echo $this->event[0]['title']; ?>">
										<label for="">Description</label>
										<textarea name="sfFormEvent[description]" id="" class="sfDescription"><?php if(isset($this->event[0])) echo $this->event[0]['description']; ?></textarea>
										<label for=""></label>
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
</div>