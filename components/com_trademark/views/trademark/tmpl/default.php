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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_trademark', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_trademark.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_trademark' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item && $this->item->state == 1) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_RECORD_ID'); ?></th>
			<td><?php echo $this->item->record_id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_USER_ID'); ?></th>
			<td><?php echo $this->item->user_id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SERVICE_ID'); ?></th>
			<td><?php echo $this->item->service_id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_APPLICANT_NAME'); ?></th>
			<td><?php echo $this->item->applicant_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_DOC_ATTACHMENT'); ?></th>
			<td>
			<?php $uploadPath = 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' . DIRECTORY_SEPARATOR . $this->item->doc_attachment; ?>
			<a href="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" target="_blank"><?php echo $this->item->doc_attachment; ?></a></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_DOC_ADDRESS'); ?></th>
			<td>
			<?php $uploadPath = 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_trademark' . DIRECTORY_SEPARATOR . 'user/docs' . DIRECTORY_SEPARATOR . $this->item->doc_address; ?>
			<a href="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" target="_blank"><?php echo $this->item->doc_address; ?></a></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_TYPE'); ?></th>
			<td><?php echo $this->item->type; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_ALL_DIRECTORS_FULLNAME'); ?></th>
			<td><?php echo $this->item->all_directors_fullname; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_FULLNAME'); ?></th>
			<td><?php echo $this->item->signatory_fullname; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_PHONENO'); ?></th>
			<td><?php echo $this->item->signatory_phoneno; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_EMAIL'); ?></th>
			<td><?php echo $this->item->signatory_email; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_NATIONALITY'); ?></th>
			<td><?php echo $this->item->signatory_nationality; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_GAURDIAN_NAME'); ?></th>
			<td><?php echo $this->item->signatory_gaurdian_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_ADDRESS'); ?></th>
			<td><?php echo $this->item->signatory_address; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SIGNATORY_AGE'); ?></th>
			<td><?php echo $this->item->signatory_age; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_TRADEMARK_NAME'); ?></th>
			<td><?php echo $this->item->trademark_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_TRADEMARK_DESC'); ?></th>
			<td><?php echo $this->item->trademark_desc; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_TRADEMARK_STATE'); ?></th>
			<td><?php echo $this->item->trademark_state; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_TRADEMARK_FORM_LBL_TRADEMARK_SERVICE_ADDRESS'); ?></th>
			<td><?php echo $this->item->service_address; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_trademark&task=trademark.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_TRADEMARK_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_trademark.trademark.'.$this->item->id)):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_trademark&task=trademark.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_TRADEMARK_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_TRADEMARK_ITEM_NOT_LOADED');
endif;
?>
