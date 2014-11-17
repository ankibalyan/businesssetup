<?php
/**
 * @version     1.0.0
 * @package     com_fileupload
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_fileupload', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_fileupload/assets/js/form.js');


?>
</style>
<script type="text/javascript">
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
            jQuery('#form-file').submit(function(event) {
                
		if(jQuery('#jform_filename').val() != ''){
			jQuery('#jform_filename_hidden').val(jQuery('#jform_filename').val());
		}
		if (jQuery('#jform_filename').val() == '' && jQuery('#jform_filename_hidden').val() == '') {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			event.preventDefautl();
		}
            });

            
        });
    });

</script>

<div class="file-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-file" action="<?php echo JRoute::_('index.php?option=com_fileupload&task=file.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
	</div>
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

	<?php if(empty($this->item->created_by)): ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />
	<?php else: ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
	<?php endif; ?>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('filename'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('filename'); ?></div>
	</div>
	<?php if (!empty($this->item->filename)) : ?>
		<a href="<?php echo JRoute::_(JUri::base() . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_fileupload' . DIRECTORY_SEPARATOR . 'F:\ftp' .DIRECTORY_SEPARATOR . $this->item->filename, false);?>"><?php echo JText::_("COM_FILEUPLOAD_VIEW_FILE"); ?></a>
	<?php endif; ?>
	<input type="hidden" name="jform[filename]" id="jform_filename_hidden" value="<?php echo $this->item->filename ?>" />
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_fileupload&task=fileform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_fileupload" />
        <input type="hidden" name="task" value="fileform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
