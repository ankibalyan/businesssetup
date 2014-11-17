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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_trademark/assets/css/trademark.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'trademark.cancel') {
            Joomla.submitform(task, document.getElementById('trademark-form'));
        }
        else {
            
				js = jQuery.noConflict();
				if(js('#jform_doc_attachment').val() != ''){
					js('#jform_doc_attachment_hidden').val(js('#jform_doc_attachment').val());
				}
				js = jQuery.noConflict();
				if(js('#jform_doc_address').val() != ''){
					js('#jform_doc_address_hidden').val(js('#jform_doc_address').val());
				}
            if (task != 'trademark.cancel' && document.formvalidator.isValid(document.id('trademark-form'))) {
                
                Joomla.submitform(task, document.getElementById('trademark-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_trademark&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="trademark-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_TRADEMARK_TITLE_TRADEMARK', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>				<input type="hidden" name="jform[record_id]" value="<?php echo $this->item->record_id; ?>" />
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
						<a href="<?php echo JRoute::_(JUri::base() . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' .DIRECTORY_SEPARATOR . $this->item->doc_attachment, false);?>">[View File]</a>
				<?php endif; ?>
				<input type="hidden" name="jform[doc_attachment]" id="jform_doc_attachment_hidden" value="<?php echo $this->item->doc_attachment ?>" />			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('doc_address'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('doc_address'); ?></div>
			</div>

				<?php if (!empty($this->item->doc_address)) : ?>
						<a href="<?php echo JRoute::_(JUri::base() . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' .DIRECTORY_SEPARATOR . $this->item->doc_address, false);?>">[View File]</a>
				<?php endif; ?>
				<input type="hidden" name="jform[doc_address]" id="jform_doc_address_hidden" value="<?php echo $this->item->doc_address ?>" />			<div class="control-group">
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
			</div>


                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        <?php if (JFactory::getUser()->authorise('core.admin','trademark')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'permissions', JText::_('JGLOBAL_ACTION_PERMISSIONS_LABEL', true)); ?>
		<?php echo $this->form->getInput('rules'); ?>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
<?php endif; ?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>