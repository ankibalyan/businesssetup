<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * BusinessServices Model
 */
class BusinessServicesModelEvent extends JModelItem
{
        /**
         * @var string events
         */
        protected $events;

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
         * Get the event
         * @return string The event to be displayed to the user
         */
        
        public function getEvent($id=null,$uid=null)
        {
            $db = JFactory::getDBO();          
            $query = $db->getQuery(true);

            if ($id) {
                $query
                    ->select('*')
                    ->from($db->quoteName('#__client_company_events'))
                    ->where($db->quoteName('id') . ' = '. $db->quote($id));
                    ($uid) ? $query->where($db->quoteName('userId') . ' = '. $db->quote($uid)):'';
                    $db->setQuery($query);
                    $result = $db->loadAssocList();
            }
            else {
                $query
                    ->select('*')
                    ->from($db->quoteName('#__client_company_events'));
                    ($uid) ? $query->where($db->quoteName('uid') . ' = '. $db->quote($uid)):'';
                    $db->setQuery($query);
                    $result = $db->loadObjectList();
            }
        return $result;            
        }
        public function get_new()
        {
            $event = new stdClass();
            $event->userId = '';
            $event->title = '';
            $event->description = '';
            $event->date = 'mail@sd.com';
            return $event;
        }
        public function saveEvent($data = array())
        {
                $db = JFactory::getDBO();          
                $query = $db->getQuery(true);
                $dt = $this->get_new();
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

                $result = JFactory::getDbo()->insertObject('#__client_company_events', $dt);
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
}