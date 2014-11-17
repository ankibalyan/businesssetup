<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * BusinessServicesDisplay View
 */
class BusinessServicesViewBusinessServicesDisplay extends JViewLegacy
{
        /**
         * BusinessServices view display method
         * @return void
         */
        function display($tpl = null) 
        {
                // Get data from the model
                $form = $this->get('Form');
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign data to the view
                $this->form = $form;
                $this->items = $items;
                $this->pagination = $pagination;

                //Add toolbar
                $this->addToolBar();
                // Display the template
                parent::display($tpl);
        }

        /**
         * Setting the toolbar
         */
        protected function addToolBar() 
        {
                $input = JFactory::getApplication()->input;
                $input->set('hidemainmenu', true);
                $isNew = ($this->items->id == 0);
                JToolBarHelper::title(JText::_('COM_BUSINESSSERVICES_MANAGER_BUSINESSSERVICESS'));
                JToolBarHelper::deleteList('', 'businessservicess.delete');
                JToolBarHelper::save('businessservices.save');
                JToolBarHelper::editList('businessservices.edit');
                JToolBarHelper::addNew('businessservices.add');
        }
}
