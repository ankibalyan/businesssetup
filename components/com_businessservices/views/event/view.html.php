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
/**
* HTML View class for the BusinessServices Component
*
* @since 0.0.1
*/
class BusinessServicesViewEvent extends JViewLegacy
{
        /**
         * Display the Business Services view
         *
         * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
         *
         * @return  void
         */
        protected $notify;
        protected $user;
        protected $app;
        protected $event;
        protected $can_user;
        protected $menu;
        protected $trademark_m;
        protected $registered;
        public function __construct()
        {
                parent::__construct();
                $this->user = JFactory::getUser();
                $this->app = JFactory::getApplication();
                $this->can_user = $this->user->authorise('core.edit', 'com_businessservices');
                if($this->can_user)
                {
                    $this->menu = array(
                    'user_home' => 'index.php/component/businessservices',
                    'profile' => 'index.php?view=profile&layout=edit&tmpl=component',
                    'Clients' => 'index.php/component/businessservices?layout=clients',
                    'Services' => array(
                            'all' => 'index.php/component/businessservices?layout=services',
                            'pending' => 'index.php/component/businessservices?layout=pending',
                            'completed' => 'index.php/component/businessservices?layout=completed',
                            ),
                    'Documents' => 'index.php/component/businessservices?layout=docs',
                    'Events' => array(
                            'add_new' => 'index.php/component/businessservices?view=event',
                            'all' => 'index.php/component/businessservices?view=event&layout=list',
                            ),
                    'query_inbox' => 'index.php/component/businessservices?view=message&amp;list=all',
                    'raise_an_issue' => 'index.php/component/businessservices?view=message',
                     );
                }
                else
                {
                        $this->menu = array(
                        'user_home' => 'index.php?option=com_businessservices',
                        'profile' => 'index.php?option=com_users&view=profile&layout=edit&tmpl=component',
                        'services' => array(
                                'all' => 'index.php?option=com_businessservices&amp;layout=services',
                                'pending' => 'index.php?option=com_businessservices&amp;layout=pending',
                        'completed' => 'index.php?option=com_businessservices&amp;layout=completed',
                                ),
                        'documents' => 'index.php?option=com_businessservices&amp;layout=docs',
                        'query_inbox' => 'index.php/component/businessservices?view=message&amp;list=all',
                        'raise_an_issue' => 'index.php/component/businessservices?view=message',
                         );
                }
        }
        public function display($tpl = null) 
        {
                $this->model = $this->getModel ( 'Event' );
                $this->trademark_m = JModelLegacy::getInstance('Trademark', 'BusinessServicesModel');
                BusinessServicesHelpersHelper::dataSorts();
                $input = JFactory::getApplication()->input;
                $this->registered = $this->trademark_m->getRegisteredUsers();
                $data = $this->app->input->post->get('sfFormEvent',null,null);
                $this->notify = (count($data)) ? $this->model->saveEvent($data) : '' ;
                if($input->getInt('Itemid'))
                {
                        $this->event = $this->model->getEvent($input->getInt('Itemid'));
                }
                else{
                    unset($this->event);
                }
                if($input->get('layout')==='list')
                {
                        $this->setLayout('list');
                        if($this->can_user)
                        {   
                                $this->allEvents = $this->model->getEvent();
                        }
                        else
                        {
                                $this->allEvents = $this->model->getEvent(null,$this->user->id);
                        }
                        
                        
                }
                
                //Check for errors.
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