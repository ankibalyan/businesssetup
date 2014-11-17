<?php

/**
 * @version     1.0.0
 * @package     com_trademark
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Kumar <ankit.kr.balyan@gmail.com> - http://igotstudy.com/ankit
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class TrademarkViewTrademarkservices extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Display the view
     */
    public function display($tpl = null) {

        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        $this->state = $this->get('State');
        $this->params = $app->getParams('com_trademark');
        $register_id = JFactory::getApplication()->input->get('id');
        $param = JFactory::getApplication()->input->get('params');
        $model = $this->getModel('Trademarkservices');
        $this->data = $model->getData($register_id);
        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;
        if($param == 3)
        {
            if (empty($this->item)) {
            $this->item = array(
                'id' => '',
                'record_id' => '',
                'user_id'=>'',
                'service_id' => '',
                'applicant_name'=>'',
                'doc_attachment'=>'',
                'doc_address'=>'',
                'type'=>'',
                'all_directors_fullname'=>'',
                'signatory_fullname'=>'',
                'signatory_phoneno'=>'',
                'signatory_email'=>'',
                'signatory_nationality'=>'',
                'signatory_gaurdian_name'=>'',
                'signatory_address'=>'',
                'signatory_age'=>'',
                'trademark_name'=>'',
                'trademark_desc'=>'',
                'trademark_state'=>'',
                'service_address'=>'',
                );
            }
        }


        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        

        if ($this->_layout == 'edit') {

            $authorised = $user->authorise('core.create', 'com_trademark');

            if ($authorised !== true) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
            }
        }

        $this->_prepareDocument();

        parent::display($tpl);
    }

    /**
     * Prepares the document
     */
    protected function _prepareDocument() {
        $app = JFactory::getApplication();
        $menus = $app->getMenu();
        $title = null;

        // Because the application sets a default page title,
        // we need to get it from the menu item itself
        $menu = $menus->getActive();
        if ($menu) {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        } else {
            $this->params->def('page_heading', JText::_('COM_TRADEMARK_DEFAULT_PAGE_TITLE'));
        }
        $title = $this->params->get('page_title', '');
        if (empty($title)) {
            $title = $app->getCfg('sitename');
        } elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
            $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        } elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
            $title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
        }
        $this->document->setTitle($title);

        if ($this->params->get('menu-meta_description')) {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->params->get('menu-meta_keywords')) {
            $this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
        }

        if ($this->params->get('robots')) {
            $this->document->setMetadata('robots', $this->params->get('robots'));
        }
    }

}
