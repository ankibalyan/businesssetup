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
					<div class="sfGrids">
						<div class="sfGrid-Col-10 formContainer">
						<?php if (!count($this->msg)): ?>
							<form action="?view=message" method="post" class="sfContactForm" id="sfForm" name="sfform[form]">
								<label for="sfForm[subject]">Subject</label>
								<input type="text" class="charsonly" name="sfForm[subject]" id="subject">
								<label for="sfForm[message]">Message</label>
								<textarea name="sfForm[message]" id="message" class = "TE"></textarea>
								<input type="hidden" name="sfForm[custname]" value="<?php echo $this->user->username; ?>" id="username">
								<input type="hidden" name="sfForm[mailid]" value="<?php echo $this->user->email; ?>" id="email">
								<input type="hidden" name="sfForm[uid]" value="<?php echo $this->user->id; ?>">
								<input type="hidden" name="token" id="token">
								<input type="hidden" name="action" id="action">
								<input type="submit" name="submit" id="submit">
							</form>
						<?php else: ?>
							<div class="messager">
								<div><span>Email: </span><?php echo $this->msg['0']['mailid']; ?></div>
								<div><span>Phone No: </span><?php echo $this->msg['0']['phoneno']; ?></div>
								<div><span>Subject: </span><?php echo $this->msg['0']['subject']; ?></div>
								<?php foreach ($this->msg as $rec): ?>
									<div class="messageHistory"><p><?php echo JFactory::getUser($rec['uid'])->username." : ".$rec['message']; ?></p></div>	
								<?php endforeach ?>
								
							</div>
							<form action="?view=message&amp;Itemid=<?php echo $this->msg['0']['recId']; ?>" method="post" class="sfContactForm" id="sfForm" name="sfForm[form]">
								<textarea name="sfForm[message]" id="message" class="TE"></textarea>
								<input type="hidden" name="sfForm[uid]" value="<?php echo $this->user->id; ?>">
								<input type="hidden" name="sfForm[replyId]" value="<?php echo $this->msg['0']['recId']; ?>">
								<input type="hidden" name="token" id="token">
								<input type="hidden" name="action" id="action">
								<input type="submit" name="submit" id="submit" value="Reply">
							</form>
						<?php endif; ?>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>