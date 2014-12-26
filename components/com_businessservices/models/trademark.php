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
        protected $service_name;

        public function __construct()
        {   
            parent::__construct();
            $this->userId = JFactory::getUser()->id;
            $this->user = JFactory::getUser();
            $this->service_name  = array('0' => 'Any',
                                '1' => 'Privare Limited Company',
                                '2' => 'Limited Liability',
                                '3' => 'One Person Company',
                                '4' => 'Public Limited Company',
                                '5' => 'Trademark and Copyright'
                        );

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
if(isset($this->user->groups[8]) && $this->user->groups[8] == 8)
    { $usercondition = "1"; }
elseif(isset($this->user->groups[7]) && $this->user->groups[7] == 7)
    { $usercondition = "a.assignedId = $this->userId"; }
else{
     $usercondition = "a.userId = $this->userId";
}
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
                $each->comment = "Please Complete the Pending Details of service ".$this->service_name[$each->service_flag]." having Service No. $each->register_id";
            if($each->comment == '' && $each->status == 'process') 
                $each->comment = "Your service ".$this->service_name[$each->service_flag]." having Service No. $each->register_id is under processing.";
            if($each->comment == '' && $each->status == 'review') 
                $each->comment = "Your service ".$this->service_name[$each->service_flag]." having Service No. $each->register_id is under Review.";
        }
        return $result;
     }
     public function saveService($data = array(''))
     {
            $dt = new stdClass();
            $dt->register_id = '';
            $dt->status = 'review';
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
        $strQry = "SELECT 
        a.register_id, userId, assignedId, service_flag, status, recId, director_din_file,
        director_pancard_file, idproof_file, addressproof_file, director_photograph_file 
        FROM #__client_company_registration as a 
        left outer join #__client_company_documents as b on a.register_id=b.register_id
        left outer join #__bstrademarks as c on a.register_id = c.record_id
        WHERE a.register_id = b.register_id or a.register_id = c.record_id";

        $db->setQuery($strQry);
        $results = $db->loadObjectList();
        //print_r($readdir()sults);
        return $results;
     }
     public function getServicesCount($status=null,$userId = FALSE)
     {
        if(isset($this->user->groups[8]) && $this->user->groups[8] == 8)
    {  $usercondition = "1"; }
elseif(isset($this->user->groups[7]) && $this->user->groups[7] == 7)
    { $usercondition = "a.assignedId = $this->userId"; }
else{
    $usercondition = "a.userId = $this->userId";
}
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
            $result = $db->loadObject();
            return ($result) ? $result : false;
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
            $uri = JURI::base()."client-docs/$uname/$file_name";
            if (isset($file_name) && $file_name !=NULL && $file_name != '') {
                $upload = JFile::upload( $src, $dest);
                if($upload){
                    $db     = $this->getDbo();
                    $query  = $db->getQuery(true);
                    $dt = new stdClass();
                    $dt->url = $uri;
                    $dt->name = $file_name;
                    $result = ($db->insertObject('#__client_docs', $dt)) ? $db->insertid() : NULL ;
                }
            }
        }
        return $result;
    }
    public function getFile($id)
    {
        if($id){
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            // delete all custom keys for user 1001.
            $query->SELECT('*');
            $query->where($db->quoteName('id') . '=' . $id);
            $query->from($db->quoteName('#__client_docs'));
            // /die;
            $db->setQuery($query);
            $result = $db->loadObject();
            return ($result) ? $result : false;
        }
    }
    public function genCsv($csvFrom = null,$Alluser = 1)
        {
            ($Alluser) ? $usercondition = "1" : $usercondition = "a.userId = '$this->userId'";
            if (!is_numeric($csvFrom) ):
            switch ($csvFrom) {
                case 'services':
                        $query ="SELECT 
                                a.register_id AS 'Service Id',
                                b.username AS 'User Name',
                                a.country_state AS 'State',
                                a.no_of_directors AS 'No of Directors',
                                a.total_gov_fee AS 'Government Fee',
                                a.total_price_fee AS 'Price Fee',
                                a.status AS 'Status',
                                a.comment AS 'Comment',
                                a.date_created AS 'Registered On',
                                a.dueDate As 'Due Date'
                        FROM #__client_company_registration as a 
                        left outer join #__users as b on a.userId = b.id 
                        WHERE $usercondition";
                    break;
                case 'docs':
                        $query ="";
                    break;
                case 'clients':
                        $query ="SELECT 
                            a.username AS 'User Name',
                            a.email AS 'Email',
                            a.registerDate AS 'Registeration Date',
                            COUNT(b.register_id) AS 'Total Services'
                        FROM
                            #__users AS a
                            left Outer join #__client_company_registration AS b  
                            on a.id = b.userId
                            group by a.id";
                    break;
                default:
                        $query ="";
                    break;
            }
            else:
            $query = "SELECT reg.register_id as 'Service Id',
                    user.username AS 'User Name',
                    reg.country_state AS 'State',
                    reg.no_of_directors AS 'No of Directors',
                    reg.total_gov_fee AS 'Government Fee',
                    reg.total_price_fee AS 'Price Fee',

                    contact.contact_first_name AS 'Contact First Name',
                    contact.contact_last_name AS 'Contact Last Name',
                    contact.contact_number AS 'Contact Phone No',
                    contact.mail_id AS 'Contact Mail Id',

                    company.first_name AS 'Company Name 1st Choice',
                    company.second_name AS 'Company Name 2nd Choice',
                    company.third_name AS 'Company Name 3rd Choice',
                    company.name_significance AS 'Company Name Significance',
                    company.company_main_object AS 'Company Main Object',
                    company.registered_address AS 'Company Registered Address',
                    company.police_station_Name_and_address AS 'Police Station Details',
                    company.addressproof AS 'Company Address Proof',

                    doc.`director_name` AS 'Director Name',
                    doc.director_address AS 'Director Address',
                    doc.director_mail_id AS 'Director Address',
                    doc.director_qualification AS 'Director Address',
                    doc.director_birthplace AS 'Director Address',
                    doc.promoters_name AS 'Director Address',
                    doc.promoters_mail AS 'Director Address',
                    doc.director_share AS 'Director Address',
                    doc.promoters_percentage_of_share AS 'Director Address',

                    reg.status AS 'Status',
                    reg.comment AS 'Comment',
                    reg.date_created AS 'Registered On',
                    reg.dueDate As 'Due Date'
                    FROM #__client_company_registration as reg 
                    left outer join #__client_contact_and_entity_info as contact on reg.register_id = contact.register_id
                    left outer join #__client_company_info as company on reg.register_id=company.register_id 
                    left outer join #__client_company_documents as doc on reg.register_id = doc.register_id
                    left outer join #__bstrademarks as trademark on reg.register_id = trademark.record_id
                    left outer join #__users as user on reg.userId = user.id 
                    WHERE reg.register_id = $csvFrom";
            endif;
            // echo "<pre>";
            // echo ($csvFrom);
            // echo "</pre>";
            /*
            // Using the function
            $sql = "SELECT * FROM table";
            // $db_conn should be a valid db handle
            */
            // output as an attachment

            $this->query_to_csv($query,true, true);

            // output to file system
            //query_to_csv($db_conn, $sql, "test.csv", false);
        }

       public function query_to_csv($query = NULL, $attachment = false, $headers = true) {
       $filename = "recorder_".time().".csv";
        if($attachment) {
            // send response headers to the browser
            header( 'Content-Type: application/csv' );
            header( 'Content-Disposition: attachment;filename='.$filename);
            header("Pragma: no-cache");
            header("Expires: 0");
            $fp = fopen('php://output', 'w');
        } else {
            $fp = fopen($filename, 'w');
        }

        $db = $this->getDbo();
        $db->setQuery($query);

        if($headers) {
            // output header row (if at least one row exists)
            $row = $db->loadAssoc();
            if($row) {
                fputcsv($fp, array_keys($row));
            }
        }
        $results = $db->loadRowList();        
        if(count($results))
        {
            foreach ($results as $key => $value) {
                fputcsv($fp, $value);    
            }
        }
        
       /*
        $result = mysql_query($query, $db_conn) or die( mysql_error( $db_conn ) );
       
        if($headers) {
            // output header row (if at least one row exists)
            $row = mysql_fetch_assoc($result);
            if($row) {
                fputcsv($fp, array_keys($row));
                // reset pointer back to beginning
                mysql_data_seek($result, 0);
            }
        }
       */
        // foreach ($data as $key => $value) {          
        //  fputcsv($fp, $value);
        // }
       
        fclose($fp);
    }
}

