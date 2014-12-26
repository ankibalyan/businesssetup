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
        }
        public function display($tpl = null) 
        {
                $this->model = $this->getModel ( 'Message' );
                $input = JFactory::getApplication()->input;
                if($input->getInt('scId'))
                {
                        $this->model->saveClick($input->getInt('scId'));
                }
                //Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
                        return false;
                }
        }
}