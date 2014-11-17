<?php
/**
 * @version     1.0.0
 * @package     com_meraproject
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      nagesh <NAGESH.MS5@GMAIL.COM> - http://localhost
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Meraproject.
 */
class MeraprojectViewMerav1ews extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
        
        $this->state		= $this->get('State');
        
        
        $this->params       = $app->getParams('com_meraproject');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }	$user = JFactory::getUser();
			 $username=$user->get('username');
			$JBASE = str_replace('\\','/', JPATH_BASE);
			$ftppathclient = $JBASE . '/client-docs';
			if( ! is_dir($ftppathclient))
			 mkdir($ftppathclient);
			if( ! is_dir($ftppathclient))
			 mkdir($ftppathclient);
			$ftppath = $ftppathclient.'/'.$username;
			 if( ! is_dir($ftppath))
			 mkdir($ftppath);
			 if($_FILES){
			 foreach($_FILES as $key => $val):
					 $keyID=$key;
			endforeach;
			$originalfilename=$_FILES["$keyID"]["name"];
			$filename = substr( $keyID , 0 ,-1);
			$path_info = pathinfo($_FILES["$keyID"]["name"]); 
			//echo $filename=$filename . "." .$path_info['extension'] ;
			$filename=$originalfilename;
			  if ( ! $_FILES["$keyID"]["error"] > 0) {
			if( ! file_exists($ftppath.'/'.$_FILES["$keyID".$i]["name"])){
					move_uploaded_file($_FILES["$keyID".$i]["tmp_name"],$ftppath.'/'.$filename);
					echo "First";
					}  else if( unlink( $ftppath.'/'.$_FILES["$keyID".$i]["name"] )){
				move_uploaded_file($_FILES["$keyID".$i]["tmp_name"],$ftppath.'/'.$filename);
				 if($_FILES["$keyID"]["name"])
		  echo "upload updated Success";
		  else
		  echo "Failed file not set";
			}
			}
			}
		 
		  
	// var_dump($_FILES);


		 //  $model = $this->getModel('merav1ews', 'meraprojectModel');
		 // $resList= $model->saveformRegistration();
        
        $this->_prepareDocument();
        parent::display($tpl);
	}
	

	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('COM_MERAPROJECT_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}    
    	
}