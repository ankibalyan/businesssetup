<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * BusinessServices Model
 */
class BusinessServicesModelTrademark extends JModelItem
{
        /**
         * @var string msg
         */
        protected $messages;
        protected $userId;

        public function __construct()
        {   
            parent::__construct();
            $this->userId = JFactory::getUser()->id;

        }
        /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getTable($type = 'BusinessServices', $prefix = 'BusinessServicesTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
        
    public function getData($register_id = null){
    $db = $this->getDbo();
    //$query = $db->getQuery(true);
        if ($register_id) {
            $strQry="SELECT *, a.register_id, b.id as trademark_id, c.recId as companyInfo, d.recId as contactInfo FROM #__client_company_registration as a 
            left outer join #__bstrademarks as b on a.register_id = b.record_id 
            left outer join #__client_company_info as c on a.register_id=c.register_id 
            left outer join #__client_contact_and_entity_info as d on a.register_id=d.register_id
            WHERE a.register_id = '$register_id' and a.userId = '$this->userId'";
        } else {
            $strQry="SELECT * FROM #__client_company_registration as a 
            left outer join #__bstrademarks as b on a.register_id = b.record_id 
            left outer join #__client_company_info as c on a.register_id=c.register_id 
            left outer join #__client_contact_and_entity_info as d on a.register_id=d.register_id
            WHERE a.userId = '$this->userId'";
        }
        $db->setQuery($strQry);
        $result = $db->loadObjectList();
        return $result;
     }

    public function getServices($register_id = null, $status = null, $single=FALSE,$Alluser = FALSE){
    $db = $this->getDbo();
    //$query = $db->getQuery(true);
    $status = strtolower($status);
    ($Alluser) ? $usercondition = "1" : $usercondition = "a.userId = '$this->userId'";
        if ($register_id) {
            $strQry="SELECT *, a.register_id FROM #__client_company_registration as a 
            WHERE a.register_id = '$register_id'";
        }
        else if($status && $status == 'pending'){
            $strQry="SELECT * FROM #__client_company_registration as a 
            WHERE $usercondition and (a.status = '$status' || a.status = 'review' || a.status = 'process')";
        }
        else if($status){
            $strQry="SELECT * FROM #__client_company_registration as a 
            WHERE $usercondition and a.status = '$status'";
        }
        else{
            $strQry="SELECT * FROM #__client_company_registration as a 
            WHERE $usercondition";
        }
        $db->setQuery($strQry);
        $result = $db->loadObjectList();
        foreach ($result as &$each) {
            if($each->comment == '' && $each->status == 'pending') 
                $each->comment = "Please Complete the Pending Details of Registerd id $each->register_id";
            if($each->comment == '' && $each->status == 'process') 
                $each->comment = "Your service with Registerd id $each->register_id is under processing.";
            if($each->comment == '' && $each->status == 'review') 
                $each->comment = "Your service with Registerd id $each->register_id is under Review.";
        }
        return $result;
     }
     public function saveService($data = array(''))
     {
          $dt = new stdClass();
            $dt->register_id = '';
            $dt->status = 'process';
            $dt->assignedId = '';
            $dt->comment = '';
            $dt->dueDate = '0000-00-00';
            $db = JFactory::getDBO();          
            $query = $db->getQuery(true);
            foreach ($data as $key => $value)
            {
                    $dt->$key = $value;
            }
            // foreach ($data as $key => $value)
            // {
            //         $data[$key] = "'".$value."'";
            // }
            // $cols = array_keys($data);
            // $values = array_values($data);

            $result = JFactory::getDbo()->updateObject('#__client_company_registration', $dt,'register_id');
            return $result;
     }
     public function delService($id=null)
     {
         if ($id !=NULL) {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);

            // delete all custom keys for user 1001.
            $conditions = array(
                $db->quoteName('register_id') . '=' . $id,
            );

            $query->delete($db->quoteName('#__client_company_registration'));
            $query->where($conditions);
            $db->setQuery($query); 
            return $result = $db->execute();
      //     "DELETE FROM `db_businesssetup`.`awfrq_client_company_registration` WHERE `awfrq_client_company_registration`.`register_id` = 345"

         }
     }
     public function getDocs($Alluser = FALSE)
     {
        $db = $this->getDbo();
        $strQry = "SELECT a.register_id, userId, assignedId, service_flag, status, recId, director_din_file,
         director_pancard_file, idproof_file, addressproof_file, director_photograph_file FROM #__client_company_registration as a 
        left outer join #__client_company_documents as b on a.register_id=b.register_id
        left outer join #__bstrademarks as c on a.register_id = c.record_id 
        WHERE a.register_id = b.register_id or a.register_id = c.record_id";

        $db->setQuery($strQry);
        $results = $db->loadObjectList();
        //print_r($results);
        return $results;
     }
     public function getServicesCount($status=null,$userId = FALSE)
     {
        ($userId) ? $usercondition = "a.userId = '$userId'" : $usercondition = "1";
        $db = $this->getDbo();
        if($status && $status == 'pending'){
            $strQry="SELECT count(*) as total FROM #__client_company_registration as a 
            WHERE $usercondition and (a.status = '$status' || a.status = 'review' || a.status = 'process')";
        }
        else if($status){
            $strQry="SELECT count(*) as total FROM #__client_company_registration as a 
            WHERE $usercondition and a.status = '$status'";
        }
        
        else{
            $strQry="SELECT count(*) as total FROM #__client_company_registration as a 
            WHERE $usercondition";
        }
        $db->setQuery($strQry);
        $result = $db->loadObject();
        return $result;
     }

    public function getServiceUser($id = NULL)
    {
        if($id){
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            // delete all custom keys for user 1001.
            $query->SELECT(array('userId'));
            $query->where($db->quoteName('register_id') . '=' . $id);
            $query->from($db->quoteName('#__client_company_registration'));
            // /die;
            $db->setQuery($query);
            return $result = $db->loadObject()->userId;
        }
    }

    public function get_profile_info() {

        $db = JFactory::getDBO();          
        $query = $db->getQuery(true);

        $query->SELECT('*');
        $query->FROM (' #__users AS u');
        $query->LEFTJOIN (' #__user_profiles AS up1 ON u.id = up1.user_id AND up1.ordering = 1');
        $query->LEFTJOIN (' #__user_profiles AS up2 ON u.id = up2.user_id AND up2.ordering = 2');
        $query->WHERE(' u.id = '.$this->userId.'');
       $db->setQuery($query); 
       return $query;
}
    public function getAllUsers()
    {
        jimport('joomla.access.access');
        jimport('joomla.user.user');
        $users6 = JAccess::getUsersByGroup(6); // in my project it was $self::REGISTERED_GROUP
        $users7 = JAccess::getUsersByGroup(7); // in my project it was $self::REGISTERED_GROUP
        return $users = array_merge($users6,$users7);
        // $db =& JFactory::getDBO();
        // $query = "SELECT * FROM #__users" ;
        // $db->setQuery($query);
        // return $rows = $db->loadObjectList();
    }
    public function getRegisteredUsers()
    {
        jimport('joomla.access.access');
        jimport('joomla.user.user');
        $users = JAccess::getUsersByGroup(2); // in my project it was $self::REGISTERED_GROUP
        $array = array();
        foreach ($users as $key) {
            $array[$key] = JFactory::getUser($key);
        }
        return $array;
        // $db =& JFactory::getDBO();
        // $query = "SELECT * FROM #__users" ;
        // $db->setQuery($query);
        // return $rows = $db->loadObjectList();
    }
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return  JDatabaseQuery
     * @since   1.6
     */
    protected function getListQuery() {
        $db     = $this->getDbo();
        $query  = $db->getQuery(true);
        return $query;
    }


    public function getItems() {
        $items = parent::getItems();
        return $items;
    }

    public function upload($files,$uname=NULL)
    {
        foreach ($files as $file) {
        $file_name = $file['name'];
        $src = $file['tmp_name'];
        $size = $file['size'];
        $upload_error = $file['error'];
        $type = $file['type'];
        $dest = JPATH_ROOT."/client-docs/$uname/$file_name";
        if (isset($file_name) && $file_name !=NULL && $file_name != '') {
        // Move the uploaded file.
        return JFile::upload( $src, $dest );
        }
        }
    }
}
