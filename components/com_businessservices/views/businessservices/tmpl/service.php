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
								<?php if(count($this->service)): ?>
									<h3 class="title"><?php echo $this->service_name[$this->service['0']->service_flag] ?></h3>
									<div class="formContainer">
									<form action="" method="POST" name="sfFormService[form]" enctype="multipart/form-data">
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