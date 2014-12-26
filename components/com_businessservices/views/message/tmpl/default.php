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
				<div class="sfGrid-Col-12">
					<div class="sfGrids col-bordered">
						<div class="sfGrid-Col-12 formContainer msgBox">
						<?php if (!count($this->msg)): ?>
							<form action="?view=message" method="post" class="sfContactForm" id="sfMessageForm" name="sfform[form]">
								<label for="sfForm[subject]">Subject</label>
								<input type="text" class="charsonly required" name="sfForm[subject]" id="subject">
								<span class="error_field"></span>
								<label for="sfForm[message]">Message</label>
								<textarea name="sfForm[message]" id="message" class = "TE required"></textarea>
								<span class="error_field"></span>
								<input type="hidden" name="sfForm[custname]" value="<?php echo $this->user->username; ?>" id="username">
								<input type="hidden" name="sfForm[mailid]" value="<?php echo $this->user->email; ?>" id="email">
								<input type="hidden" name="sfForm[uid]" value="<?php echo $this->user->id; ?>">
								<input type="hidden" name="token" id="token">
								<input type="hidden" name="action" id="action">
								<input type="submit" name="submit" id="submit">
							</form>
						<?php else: ?>
							<div class="messager">
							<?php 
							$this->can_user = $this->user->authorise('core.edit', 'com_businessservices');
                				if($this->can_user):
							 ?>
								<div><label>Email: </label><?php echo $this->msg['0']['mailid']; ?></div>
								<div><label>Phone No: </label><?php echo $this->msg['0']['phoneno']; ?></div>
							<?php endif; ?>
								<div><label>Subject: </label><?php echo $this->msg['0']['subject']; ?></div> <hr>
								<?php foreach ($this->msg as $rec): ?>
									<div class="messageHistory"><?php echo $rec['message']."<label> Sent By: ". JFactory::getUser($rec['uid'])->name."</label>"; ?></div>	
								<?php endforeach ?>
							</div>
							<form action="?view=message	&amp;Itemid=<?php echo $this->msg['0']['recId']; ?>" method="post" class="sfContactForm" id="sfReplyForm" name="sfForm[form]">
								<textarea name="sfForm[message]" id="message" class="TE required"></textarea>
								<span class="error_field"></span>
								<input type="hidden" name="sfForm[uid]" value="<?php echo $this->user->id; ?>">
								<input type="hidden" name="sfForm[replyId]" value="<?php echo $this->msg['0']['recId']; ?>">
								<input type="hidden" name="token" id="token">
								<input type="hidden" name="action" id="action">
								<?php 
									if($this->can_user): ?>
										<input type="hidden" name="solved" id="solved" value="Solved">
									<?php endif; ?>
								<input type="submit" name="submit" id="submit" value="Reply">
							</form>
						<?php endif; ?>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>