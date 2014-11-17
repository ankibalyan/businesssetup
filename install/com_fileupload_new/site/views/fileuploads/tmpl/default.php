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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_fileupload', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_fileupload');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_fileupload')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item && $this->item->state == 1) : ?>

    <div class="item_fields">
        <table class="table">
            
        </table>
    </div>
    
    <?php
else:
    echo JText::_('COM_FILEUPLOAD_ITEM_NOT_LOADED');
endif;
?>
