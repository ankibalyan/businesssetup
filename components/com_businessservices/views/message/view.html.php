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
class BusinessServicesViewMessage extends JViewLegacy
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
        protected $msg;
        protected $can_user;
        protected $menu;
        public function __construct()
        {
                parent::__construct();
                $this->user = JFactory::getUser();
                $this->app = JFactory::getApplication();
                $this->can_user = $this->user->authorise('core.edit', 'com_businessservices');
                if($this->can_user)
                {
                        $this->menu = array(
                        'user_home' => 'index.php?option=com_businessservices',
                        'profile' => 'index.php?option=com_users&view=profile&layout=edit&tmpl=component',
                        'services' => array(
                                'all' => 'index.php?option=com_businessservices&amp;layout=services',
                                'pending' => 'index.php?option=com_businessservices&amp;layout=pservices',
                                'completed' => 'index.php?option=com_businessservices&amp;layout=cservices',
                                ),
                        'documents' => 'index.php?option=com_businessservices&amp;layout=docs',
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
                $this->model = $this->getModel ( 'Message' );
                $input = JFactory::getApplication()->input;
                
                $data = $this->app->input->post->get('sfForm',null,null);
                $this->notify = (count($data)) ? $this->model->saveMessage($data) : '' ;
                if($input->getInt('Itemid'))
                {
                        $this->setLayout('default');
                        $this->msg = $this->model->getMessages($input->getInt('Itemid'));
                }
                if($input->get('rec')==='history')
                {
                        $this->setLayout('list');
                        $this->allMsg = $this->model->getMessages(null,$this->user->id);
                }
                if($input->get('list')==='all')
                {
                        $this->setLayout('list');
                        if($this->can_user)
                        {
                                $this->allMsg = $this->model->getMessages();
                        }
                        else
                        {
                                $this->allMsg = $this->model->getMessages(null,$this->user->id);
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