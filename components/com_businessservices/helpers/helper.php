<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
 
class BusinessServicesHelpersHelper
{
    protected $can_user;
    static function menu($menu=array())
    {
        $document = JFactory::getDocument();
        $user = JFactory::getUser();
        ?>
            <ul class="nav-list">
                <li><div class="welcome-user"> Hello <?php echo $user->name; ?> !</div></li>
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
            <?php
                    self::calenderEvents();
             ?>
        <?php
    }
    static function calenderEvents()
    {
        $db  = JFactory::getDBO();
        $userId = JFactory::getUser()->id;
        $user = JFactory::getUser();
        $strQry="SELECT `register_id`,`service_flag`,`status`,`comment`,`dueDate`,`date_created` FROM #__client_company_registration  
        WHERE userId = $userId and 'delFlag' = 0";
        $db->setQuery($strQry);
        $result = $db->loadObjectList();

        $can_user = $user->authorise('core.edit', 'com_businessservices');
        if($can_user)
        {
            $strQry="SELECT * FROM #__client_company_events  
            WHERE userId = $userId or userId = 0 ";
            $db->setQuery($strQry);
            $allevents = $db->loadObjectList();
        }
    ?>

        <script>
        var events = [
        <?php
        foreach ($result as $key => $value) { ?>
            { Title: "<?php echo $value->comment ?>", Date: new Date("<?php  $date = date_create($value->dueDate); echo date_format($date, 'm/d/Y'); ?>") }, 
        <?php }
        if($can_user && count($allevents))
        {
            foreach ($allevents as $key => $value) { ?>
                { Title: "<?php echo $value->description ?>", Date: new Date("<?php  $date = date_create($value->date); echo date_format($date, 'm/d/Y'); ?>") }, 
        <?php }
        } ?>

        ];
        </script>
<div id="fade"></div>
<div id="light">
    <div id="popuclose"> X </div>
    <div id="popuCont"></div>
</div>
<div id="popu"></div>
        <?php
//        return $result;
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
        $document->addStylesheet("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css");
        //javascripts
        $document->addScript(JURI::base().'components/com_businessservices/assets/js/jquery.dataTables.min.js');
    }

    static function countUserRecentMsgs()
    {
        $db  = JFactory::getDBO();
        $user = JFactory::getUser();
        $sql = "SELECT  count(*) as total
FROM
    #__client_advice_contact AS inbox
    left 
  outer join #__users as users
        
  on inbox.uid = users.id
        INNER JOIN
    #__client_advice_contact AS reply ON inbox.recId = reply.replyId
WHERE
    inbox.uid = $user->id and inbox.clicked = 0 AND 'delFlag' = 0";
        $db->setQuery($sql);
        $result = $db->loadObject()->total;
        return $result;
    }
    static function countAdminRecentMsgs()
    {
        $db  = JFactory::getDBO();
        $user = JFactory::getUser();
        $sql = "SELECT  count(*) as total
FROM
    #__client_advice_contact AS inbox
    left 
  outer join #__users as users
  on users.id = inbox.uid
WHERE
    inbox.replyId = 0 AND (inbox.created_date > users.lastvisitDate OR inbox.clicked = 0) AND 'delFlag' = 0";
        $db->setQuery($sql);
        $result = $db->loadObject()->total;
        return $result;
    }
}