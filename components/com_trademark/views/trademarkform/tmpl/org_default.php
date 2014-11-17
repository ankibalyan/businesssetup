<?php
/**
 * @version     1.0.0
 * @package     com_trademark
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Kumar <ankit.kr.balyan@gmail.com> - http://igotstudy.com/ankit
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_trademark', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_trademark/assets/js/form.js');


?>
</style>
<script type="text/javascript">
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
            jQuery('#form-trademark').submit(function(event) {
                
		if(jQuery('#jform_doc_attachment').val() != ''){
			jQuery('#jform_doc_attachment_hidden').val(jQuery('#jform_doc_attachment').val());
		}
		if(jQuery('#jform_doc_address').val() != ''){
			jQuery('#jform_doc_address_hidden').val(jQuery('#jform_doc_address').val());
		}
            });

            
        });
    });

</script>

<div class="trademark-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-trademark" action="<?php echo JRoute::_('index.php?option=com_trademark&task=trademark.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

	<?php if(empty($this->item->created_by)): ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />
	<?php else: ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
	<?php endif; ?>
	<input type="hidden" name="jform[record_id]" value="<?php echo $this->item->record_id; ?>" />

	<input type="hidden" name="jform[user_id]" value="<?php echo $this->item->user_id; ?>" />

	<input type="hidden" name="jform[service_id]" value="<?php echo $this->item->service_id; ?>" />

	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('applicant_name'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('applicant_name'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('doc_attachment'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('doc_attachment'); ?></div>
	</div>
	<?php if (!empty($this->item->doc_attachment)) : ?>
		<a href="<?php echo JRoute::_(JUri::base() . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' .DIRECTORY_SEPARATOR . $this->item->doc_attachment, false);?>"><?php echo JText::_("COM_TRADEMARK_VIEW_FILE"); ?></a>
	<?php endif; ?>
	<input type="hidden" name="jform[doc_attachment]" id="jform_doc_attachment_hidden" value="<?php echo $this->item->doc_attachment ?>" />
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('doc_address'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('doc_address'); ?></div>
	</div>
	<?php if (!empty($this->item->doc_address)) : ?>
		<a href="<?php echo JRoute::_(JUri::base() . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' .DIRECTORY_SEPARATOR . $this->item->doc_address, false);?>"><?php echo JText::_("COM_TRADEMARK_VIEW_FILE"); ?></a>
	<?php endif; ?>
	<input type="hidden" name="jform[doc_address]" id="jform_doc_address_hidden" value="<?php echo $this->item->doc_address ?>" />
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('type'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('type'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('all_directors_fullname'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('all_directors_fullname'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_fullname'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_fullname'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_phoneno'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_phoneno'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_email'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_email'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_nationality'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_nationality'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_gaurdian_name'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_gaurdian_name'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_address'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_address'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('signatory_age'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('signatory_age'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('trademark_name'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('trademark_name'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('trademark_desc'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('trademark_desc'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('trademark_state'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('trademark_state'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('service_address'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('service_address'); ?></div>
	</div>				<div class="fltlft" <?php if (!JFactory::getUser()->authorise('core.admin','trademark')): ?> style="display:none;" <?php endif; ?> >
                <?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
                <?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
                <fieldset class="panelform">
                    <?php echo $this->form->getLabel('rules'); ?>
                    <?php echo $this->form->getInput('rules'); ?>
                </fieldset>
                <?php echo JHtml::_('sliders.end'); ?>
            </div>
				<?php if (!JFactory::getUser()->authorise('core.admin','trademark')): ?>
                <script type="text/javascript">
                    jQuery.noConflict();
                    jQuery('.tab-pane select').each(function(){
                       var option_selected = jQuery(this).find(':selected');
                       var input = document.createElement("input");
                       input.setAttribute("type", "hidden");
                       input.setAttribute("name", jQuery(this).attr('name'));
                       input.setAttribute("value", option_selected.val());
                       document.getElementById("form-trademark").appendChild(input);
                    });
                </script>
             <?php endif; ?>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_trademark&task=trademarkform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_trademark" />
        <input type="hidden" name="task" value="trademarkform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
