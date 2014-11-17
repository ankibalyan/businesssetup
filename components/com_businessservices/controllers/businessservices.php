<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * BusinessServices Controller
 */
class BusinessServicesControllerBusinessServices extends JControllerForm
{
		public function display($cachable = false, $urlparams = false) 
        {

            // set default view if not set
            $input = JFactory::getApplication()->input;
            $input->set('view', $input->getCmd('view', 'BusinessServices'));
			$viewName       = $this->input->get('view');
			switch ($viewName)
			{
			    case 'businessservices':
			        $viewLayout = $this->input->get('layout', 'default');
			        $view = $this->getView($viewName, $format, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
			        $view->setModel($this->getModel('businessservices'));
			        break;
			    case 'trademark':
			    	$viewLayout = $this->input->get('layout', 'default');
			        $view = $this->getView($viewName, $format, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
			        $view->setModel($this->getModel('trademark'));
			        break;
			}
            // call parent behavior
            parent::display($cachable);
        }
}