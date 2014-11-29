<?php
/**
* @package Joomla.Administrator
* @subpackage com_businessservices
*
* @copyright Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
 
// No direct access to this file
defined('_JEXEC') or die;
 
// import Joomla view library
jimport('joomla.application.component.view');
require_once 'components/com_businessservices/models/businessservices.php';
JLoader::import('joomla.application.component.model');
JLoader::import( 'llp','components/com_llp_service/models' );
JLoader::import( 'opc','components/com_opc_services/models' );
JLoader::import( 'plc','components/com_publiclc/models' );
JLoader::import( 'pvt','components/com_fileupload/models' );
/**
* HTML View class for the BusinessServices Component
*
* @since 0.0.1
*/
class BusinessServicesViewBusinessServices extends JViewLegacy
{
        protected $service_name;
        protected $status;
        protected $uri;
        protected $msg;
        protected $notify;
        protected $trademark_m;
        /**
         * Display the Business Services view
         *
         * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
         *
         * @return  void
         */
        public function display($tpl = null) 
        {
                // Assign data to the view
                $this->user = JFactory::getUser();
                $this->app = JFactory::getApplication();
                $input = $this->app->input;
                $this->menu = array(
                'user_home' => 'index.php/component/businessservices',
                'profile' => 'index.php?view=profile&layout=edit&tmpl=component',
                'services' => array(
                        'all' => 'index.php/component/businessservices?layout=services',
                        'pending' => 'index.php/component/businessservices?layout=pending',
                        'completed' => 'index.php/component/businessservices?layout=completed',
                        ),
                'documents' => 'index.php/component/businessservices?layout=docs',
                'query_inbox' => 'index.php/component/businessservices?view=message&amp;list=all',
                'raise_an_issue' => 'index.php/component/businessservices?view=message',
                 );
                $this->service_name  = array('0' => 'Any',
                                '1' => 'Privare Limited Company',
                                '2' => 'Limited Liability',
                                '3' => 'One Person Company',
                                '4' => 'Public Limited Company',
                                '5' => 'Trademark and Copyright'
                        );
                $this->statuses  = array(
                                // 'pservices' => 'pending',
                                // 'cservices' => 'completed',
                                'review'    => 'under review',
                                'process'   => 'in process',
                                'pending'   => 'pending',
                                'completed'   => 'completed'
                        );
                $this->links = array(
                                '1' => 'fileupload/fileuploadss',
                                '2' => 'llp_service/serviceflow',
                                '3' => 'opc_services/serviceflow',
                                '4' => 'publiclc/serviceflow',
                                '4' => 'trademark/serviceflow',
                    );
                array_walk($this->links,function(&$value)
                {
                    $value = JURI::root(false).'index.php/component/'.$value;
                });

                $BusinessServices_m = $this->getModel ( 'BusinessServices' );
                $this->trademark_m = JModelLegacy::getInstance('Trademark', 'BusinessServicesModel');
                if(isset($this->statuses[trim($this->getLayout())]))
                        {
                               $this->status = ucwords($this->statuses[trim($this->getLayout())]);
                               $this->setLayout('services');
                        }
                if($input->getInt('Itemid') != NULL && $input->getInt('Itemid') != 0)
                {

                        $useri = $this->trademark_m->getServiceUser($input->getInt('Itemid')); // get the user id of current item id
                        $data = $this->app->input->post->get('sfFormService',null,null); 
                        $file = $this->app->input->files->get('sfFormService'); 
                        //die;
                        $uploads = (count($data)) ? $this->trademark_m->upload($file['processDocs'],JFactory::getUser($useri)->username) : '' ;
                        //die;
                        $notify = (count($data)) ? $this->trademark_m->saveService($data) : '' ;
                        ($notify) ? $this->notify = 2 : $this->notify = null;
                        
                        $this->service = $this->trademark_m->getServices($input->getInt('Itemid'),NULL,TRUE,TRUE);
                }
                $this->trademarkPending = $this->trademark_m->getServices(null,"$this->status",FALSE,FALSE);
                $this->allDocs = $this->trademark_m->getDocs(FALSE);

                $this->profile = $this->trademark_m->get_profile_info();
                //echo "<pre>";print_r($this->profile);echo "</pre>";
                $this->allTotal = $this->trademark_m->getServicesCount(null,$this->user->id)->total;
                $this->pendingTotal = $this->trademark_m->getServicesCount("pending",$this->user->id)->total;
                $this->completedTotal = $this->trademark_m->getServicesCount("completed",$this->user->id)->total;
                $this->app = JFactory::getApplication();

                 if($input->getInt('msg') != NULL && $input->getInt('msg') != 0)
                {
                    (in_array($input->getInt('msg'), $this->msg)) ? $this->notify = $input->getInt('msg') : $this->notify = null;
                }
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
                        return false;
                }
                // Display the view
                //$tpl = "pservices";
                parent::display($tpl);
        }
}