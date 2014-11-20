<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
 
class BusinessServicesHelpersHelper
{
    static function menu($menu=array())
    {
        $document = JFactory::getDocument();
        $user = JFactory::getUser();
        ?>
	        <ul class="nav-list">
				<li><h3><?php echo $user->name; ?>!</h3></li>
				<div id="left-menu">
					<ul class="menu">
					<?php foreach ($menu as $key => $value): ?>
						<?php if (is_array($value)): ?>
							<li><a href="<?php echo jRoute::_($value['all']); ?>"><?php echo ucwords(str_replace('_',' ',$key)) ?> </a>
								<ul>
									<?php foreach ($value as $subkey => $subvalue): ?>
										<li><a href="<?php echo jRoute::_($subvalue); ?>"><?php echo ucwords(str_replace('_',' ',$subkey))." ".ucwords(str_replace('_',' ',$key))?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
						<?php else: ?>
							<?php if ($key == 'profile'): ?> 
								<li><a class="modal" href="<?php echo $value ?>" rel="{handler: 'iframe', size: {x: 640, y: 540}}"><?php echo ucwords(str_replace('_',' ',$key)) ?> </a></li>
							<?php else: ?>
								<li><a  href="<?php echo jRoute::_($value) ?>"><?php echo ucwords(str_replace('_',' ',$key)) ?> </a></li>
							<?php endif; ?>
						<?php endif ?>
					<?php endforeach ?>
					</ul>
				</div>
			</ul>
			<?php self::calenderEvents(); ?>
        <?php
    }
    static function calenderEvents()
    {
    	$db  = JFactory::getDBO();
    	$userId = JFactory::getUser()->id;
        $strQry="SELECT `register_id`,`service_flag`,`status`,`comment`,`dueDate`,`date_created` FROM #__client_company_registration  
        WHERE userId = $userId and 'delFlag' = 0";
        $db->setQuery($strQry);
        $result = $db->loadObjectList();
        ?>

        <script>
		var events = [ 
        <?php
        foreach ($result as $key => $value) { ?>
        	{ Title: "<?php echo $value->comment ?>", Date: new Date("<?php  $date = date_create($value->dueDate); echo date_format($date, 'm/d/Y'); ?>") }, 
        <?php } ?>
        ];
        </script>
        <?php
        return $result;
    }

    static function notify($value=null)
    {
	 $msg  = array(
                            '1' => 'Submitted Sucessfully',
                            '2' => 'Updated Sucessfully',
                            '3' => 'Deleted Sucessfully',

                );

    	?>
    	<?php if ($value): ?>
			<div class="sfGrid-Col-9">
				<div class="sfGrids">
					<div class="sfGrid-Col-10 col-centered NOTICE">
						<center><?php echo $val = (isset($msg[$value])) ? $msg[$value] : '' ?></center>
					</div>
				</div>
			</div>	
		<?php endif; ?>
    <?php }

    static function dataSorts()
    {
    	$document = JFactory::getDocument();
         
        //stylesheets
        $document->addStylesheet(JURI::base().'components/com_businessservices/assets/css/jquery.dataTables.min.css');
         
        //javascripts
        $document->addScript(JURI::base().'components/com_businessservices/assets/js/jquery.dataTables.min.js');
    }
}
