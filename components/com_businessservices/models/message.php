<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * BusinessServices Model
 */
class BusinessServicesModelMessage extends JModelItem
{
        /**
         * @var string messages
         */
        protected $messages;

        /**
         * Returns a reference to the a Table object, always creating it.
         *
         * @param       type    The table type to instantiate
         * @param       string  A prefix for the table class name. Optional.
         * @param       array   Configuration array for model. Optional.
         * @return      JTable  A database object
         * @since       2.5
         */
        public function getTable($type = 'BusinessServices', $prefix = 'BusinessServicesTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
 
        /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        
        public function getMsg($id = 1) 
        {
                if (!is_array($this->messages))
                {
                        $this->messages = array();
                }
 
                if (!isset($this->messages[$id])) 
                {
                        //request the selected id
                        $jinput = JFactory::getApplication()->input;
                        $id = $jinput->get('id', 1, 'INT' );
 
                        // Get a TableHelloWorld instance
                        $table = $this->getTable();
 
                        // Load the message
                        $table->load($id);
 
                        // Assign the message
                        $this->messages[$id] = $table->id;
                }
                return $this->messages[$id];
        }
        public function getMessages($id=null,$uid=null)
        {
            $db = JFactory::getDBO();          
            $query = $db->getQuery(true);

            if ($id) {
                $query
                    ->select('*')
                    ->from($db->quoteName('#__client_advice_contact'))
                    ->where($db->quoteName('recId') . ' = '. $db->quote($id),'OR')
                    ->where($db->quoteName('replyId') . ' = '. $db->quote($id))
                    ->order('created_date ASC');
                    ($uid) ? $query->where($db->quoteName('uid') . ' = '. $db->quote($uid)):'';
                    $db->setQuery($query);
                    $result = $db->loadAssocList();
            }
            else {
                $query
                    ->select('*')
                    ->from($db->quoteName('#__client_advice_contact'))
                    ->where($db->quoteName('replyId') . ' = '. 0)
                    ->order('created_date ASC');
                    ($uid) ? $query->where($db->quoteName('uid') . ' = '. $db->quote($uid)):'';
                    $db->setQuery($query);
                    $result = $db->loadObjectList();
            }
        return $result;            
        }
        public function get_new()
        {
            $message = new stdClass();
            $message->uid = '';
            $message->replyId = '';
            $message->subject = '';
            $message->message = 'mail@sd.com';
            $message->custname = '';
            $message->phoneno ='';
            $message->mailid ='';
            $message->delFlag = 0;
            return $message;
        }
        public function saveMessage($data = array())
        {
                $db = JFactory::getDBO();          
                $query = $db->getQuery(true);
                $dt = $this->get_new();
                foreach ($data as $key => $value)
                {
                        $dt->$key = $value;
                }
                if(isset($dt->replyId) && $dt->replyId !='') self::saveClick($dt->replyId,FALSE);
                // foreach ($data as $key => $value)
                // {
                //         $data[$key] = "'".$value."'";
                // }
                // $cols = array_keys($data);
                // $values = array_values($data);

                $result = JFactory::getDbo()->insertObject('#__client_advice_contact', $dt);
                return $result;
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

        public function saveClick($id=NULL, $status = TRUE)
        {
            if($id)
            {
                $dt = new stdClass();
                $dt->recId = $id;
                $dt->clicked = $status;
                $db = JFactory::getDBO();          
                $query = $db->getQuery(true);
                return $result = JFactory::getDbo()->updateObject('#__client_advice_contact', $dt,'recId');
            }
        }
}