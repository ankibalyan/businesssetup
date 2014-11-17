<?php
/**
 * Joomla! component Creative Contact Form
 *
 * @version $Id: 2012-04-05 14:30:25 svn $
 * @author creative-solutions.net
 * @package Creative Contact Form
 * @subpackage com_creativecontactform
 * @license GNU/GPL
 *
 */

// no direct access
defined('_JEXEC') or die('Restircted access');

jimport('joomla.application.component.controllerform');

class CreativeContactFormControllerCreativeField extends JControllerForm
{
	function __construct($default = array()) {
		parent::__construct($default);
	
		//$this->registerTask('add', 'addfield');
	}
	
	function addfield() {
		$link = 'index.php?option=com_creativecontactform&view=creativefield&layout=add';
		$this->setRedirect($link, $msg);
	}
}
