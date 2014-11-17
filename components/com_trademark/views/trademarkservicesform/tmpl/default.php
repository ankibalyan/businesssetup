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
            jQuery('#form-trademarkservices').submit(function(event) {
                
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

<div class="trademarkservices-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-trademarkservices" action="<?php echo JRoute::_('index.php?option=com_trademark&task=trademarkservices.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_trademark&task=trademarkservicesform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_trademark" />
        <input type="hidden" name="task" value="trademarkservicesform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
