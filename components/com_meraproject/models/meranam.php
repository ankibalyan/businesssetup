<?php

/**
 * @version     1.0.0
 * @package     com_meraproject
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

/**
 * Meraproject model.
 */
class MeraprojectModelMeranam extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
	 
	 
	 
	 function  saveform2($fileS,$fileerror,$filepath,$fileSize){
	 
		  $directorname =$_POST["directorname"];
		  $directorAddress =$_POST["directorAddress"];
		  $directorMail =$_POST["directorMail"];
		  $directorEducation =$_POST["directorEducation"];
		  $directorPlace =$_POST["directorPlace"];
		  
		  
		  $directordin =$_FILES["directordin"]["name"];
		  $pancard =$_FILES["pancard"]["name"];
		  $passport =$_FILES["passport"]["name"];
		  $adharcard =$_FILES["adharcard"]["name"];
		  $electioncard =$_FILES["electioncard"]["name"];
		  $drivinglicence =$_FILES["drivinglicence"]["name"];
		  $mobilebill =$_FILES["mobilebill"]["name"];
		  $electricitybill =$_FILES["electricitybill"]["name"];
		  $telephonebill =$_FILES["telephonebill"]["name"];
		  $bankstatement =$_FILES["bankstatement"]["name"];
		  $photograph =$_FILES["photograph"]["name"];
		  
		  $promotersname =$_POST["promotersname"];
		  $promotersmail =$_POST["promotersmail"];
		  $promotersshare =$_POST["promotersshare"];
		  
	$db      = $this->getDbo(); 
						 $strQry   = $db->getQuery(true);
	 
	 $strqry="INSERT INTO fwcompany_documents(register_id,director_name,director_address,director_mail_id,director_qualification,director_birthplace,
director_din_file,director_pancard_file,director_passport_file,director_adharcard_file,director_election_file,director_dl_file,director_mobilebill_file,
director_electricitybill_file,director_telephonebill_file,director_bankstatement_file,director_photograph_file,promoters_name,
promoters_mail,promoters_percentage_of_share) VALUES (2,'$directorname','$directorAddress','$directorMail','$directorEducation','$directorPlace',
'$directordin','$pancard','$passport','$adharcard','$electioncard','$drivinglicence','$mobilebill',
'$electricitybill','$telephonebill','$bankstatement','$photograph','$promotersname','$promotersmail','$promotersshare')";
	
	
			$db->setQuery($strQry);
                if ($db->query()):
			//	die("Successfully Saved");
                    return 1;
                else:
				die("Failed" . $strQry);
                   return $strQry;
                endif; 
	
	 }
	 
	 
	 
	 
	 
    protected function populateState() {
        $app = JFactory::getApplication('com_meraproject');

        // Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_meraproject.edit.meranam.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_meraproject.edit.meranam.id', $id);
        }
        $this->setState('meranam.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('meranam.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }

    /**
     * Method to get an ojbect.
     *
     * @param	integer	The id of the object to get.
     *
     * @return	mixed	Object on success, false on failure.
     */
    public function &getData($id = null) {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('meranam.id');
            }

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $this->_item = JArrayHelper::toObject($properties, 'JObject');
            } elseif ($error = $table->getError()) {
                $this->setError($error);
            }
        }

        
		if ( isset($this->_item->created_by) ) {
			$this->_item->created_by_name = JFactory::getUser($this->_item->created_by)->name;
		}

        return $this->_item;
    }

    public function getTable($type = 'Meranam', $prefix = 'MeraprojectTable', $config = array()) {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkin($id = null) {
        // Get the id.
        $id = (!empty($id)) ? $id : (int) $this->getState('meranam.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to check out an item for editing.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkout($id = null) {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int) $this->getState('meranam.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    public function getCategoryName($id) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
                ->select('title')
                ->from('#__categories')
                ->where('id = ' . $id);
        $db->setQuery($query);
        return $db->loadObject();
    }

    public function publish($id, $state) {
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;
        return $table->store();
    }

    public function delete($id) {
        $table = $this->getTable();
        return $table->delete($id);
    }

}
