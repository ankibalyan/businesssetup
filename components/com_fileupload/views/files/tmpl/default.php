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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canCreate = $user->authorise('core.create', 'com_fileupload');
$canEdit = $user->authorise('core.edit', 'com_fileupload');
$canCheckin = $user->authorise('core.manage', 'com_fileupload');
$canChange = $user->authorise('core.edit.state', 'com_fileupload');
$canDelete = $user->authorise('core.delete', 'com_fileupload');

		define( 'ROOT', 'F:/ftp/test' );
		defined('_JEXEC') or die;
		$user = JFactory::getUser();
		$userID=$user->get('id');
		$username =$user->username;
		$app = JFactory::getApplication();
		if ($user->id == 0) {
		$app->Redirect( 'index.php/private-limited-company-login', 'Please login !!!' );
		}				 
		
		  $model = $this->getModel('Files', 'FileuploadModel');
		 $resList= $model->getData($userID);
		 
		/*   Service_Tax_Documents_gov_fee */
		$editid=321;
		
		if(isset($_GET["edit"])) {
				
				$editid=$_GET["edit"];
		}
		 foreach ($resList as $list) :
?>



											<div>
												<h3 style="float:left">Registration  Details </h3>
												<div style="clear:both"></div>
												<ul>
													<li> &nbsp;<b> State :  </b><?php echo $list->country_state; ?>  &nbsp;&nbsp;<b>    No of Directors :  </b> <?php echo $list->no_of_directors; ?>      <b>  &nbsp;&nbsp;Share Capital : </b><?php echo $list->share_capital; ?> Lakh</li>
												</ul>
												<table style="width:70%" >
												<thead><tr style="font:bold"> <td>Description</td> <td>Gov. Fee(INR)</td><td>Price (INR)</td></tr></thead>
													<tr> <td><?php echo $desc1; ?></td> <td><?php echo $gov1; ?></td><td><?php echo $price1; ?></td>	</tr>
													<tr> <td><?php echo $desc2; ?></td> <td><?php echo $gov2; ?></td><td><?php echo $price2; ?></td>	</tr>
													<tr> <td><?php echo $desc3; ?></td> <td><?php echo $gov3; ?></td><td><?php echo $price3; ?></td>	</tr>
													<tr> <td><?php echo $desc4; ?></td> <td><?php echo $gov4; ?></td><td><?php echo $price4; ?></td>	</tr>
													<tr> <td><?php echo $desc5; ?></td> <td><?php echo $gov5; ?></td><td><?php echo $price5; ?></td>	</tr>
													<tr> <td><?php echo $desc6; ?></td> <td><?php echo $gov6; ?></td><td><?php echo $price6; ?></td>	</tr>
													<tr> <td>Total :</td> <td><?php echo $total_gov; ?></td><td><?php echo $total_price; ?></td>	</tr>
												</table>
											</div>
							<?php endforeach ;?>

<form action="<?php echo JRoute::_('index.php?option=com_fileupload&view=files'); ?>" method="post" name="adminForm" id="adminForm">

    <table class="table table-striped" id="fileList">
        <thead>
            <tr>
                <?php if (isset($this->items[0]->state)): ?>
                    <th width="1%" class="nowrap center">
                        <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
                    </th>
                <?php endif; ?>

                				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_FILEUPLOAD_FILES_FILENAME', 'a.filename', $listDirn, $listOrder); ?>
				</th>
                    

                <?php if (isset($this->items[0]->id)): ?>
                    <th width="1%" class="nowrap center hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                <?php endif; ?>

                				<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_FILEUPLOAD_FILES_ACTIONS'); ?>
				</th>
				<?php endif; ?>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($this->items as $i => $item) : ?>
                <?php $canEdit = $user->authorise('core.edit', 'com_fileupload'); ?>

                				<?php if (!$canEdit && $user->authorise('core.edit.own', 'com_fileupload')): ?>
					<?php $canEdit = JFactory::getUser()->id == $item->created_by; ?>
				<?php endif; ?>

                <tr class="row<?php echo $i % 2; ?>">

                    <?php if (isset($this->items[0]->state)): ?>
                        <?php $class = ($canEdit || $canChange) ? 'active' : 'disabled'; ?>
                        <td class="center">
                            <a class="btn btn-micro <?php echo $class; ?>" href="<?php echo ($canEdit || $canChange) ? JRoute::_('index.php?option=com_fileupload&task=file.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
                                <?php if ($item->state == 1): ?>
                                    <i class="icon-publish"></i>
                                <?php else: ?>
                                    <i class="icon-unpublish"></i>
                                <?php endif; ?>
                            </a>
                        </td>
                    <?php endif; ?>

                    				<td>

					<?php
						if (!empty($item->filename)):
							$uploadPath = 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_fileupload' . DIRECTORY_SEPARATOR . 'F:\ftp' .DIRECTORY_SEPARATOR . $item->filename;
							echo '<a href="' . JRoute::_(JUri::base() . $uploadPath, false) . '" target="_blank" title="See the filename">' . $item->filename . '</a>';
						else:
							echo $item->filename;
						endif; ?>				</td>


                    <?php if (isset($this->items[0]->id)): ?>
                        <td class="center hidden-phone">
                            <?php echo (int) $item->id; ?>
                        </td>
                    <?php endif; ?>

                    				<?php if ($canEdit || $canDelete): ?>
					<td class="center">
						<?php if ($canEdit): ?>
							<a href="<?php echo JRoute::_('index.php?option=com_fileupload&task=file.edit&id=' . $item->id, false, 2); ?>" class="btn btn-mini" type="button"><i class="icon-edit" ></i></a>
						<?php endif; ?>
						<?php if ($canDelete): ?>
							<button data-item-id="<?php echo $item->id; ?>" class="btn btn-mini delete-button" type="button"><i class="icon-trash" ></i></button>
						<?php endif; ?>
					</td>
				<?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($canCreate): ?>
        <a href="<?php echo JRoute::_('index.php?option=com_fileupload&task=file.edit&id=0', false, 2); ?>" class="btn btn-success btn-small"><i class="icon-plus"></i> <?php echo JText::_('COM_FILEUPLOAD_ADD_ITEM'); ?></a>
    <?php endif; ?>

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>

<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery('.delete-button').click(deleteItem);
    });

    function deleteItem() {
        var item_id = jQuery(this).attr('data-item-id');
        if (confirm("<?php echo JText::_('COM_FILEUPLOAD_DELETE_MESSAGE'); ?>")) {
            window.location.href = '<?php echo JRoute::_('index.php?option=com_fileupload&task=file.remove&id=', false, 2) ?>' + item_id;
        }
    }
</script>


