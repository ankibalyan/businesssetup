<?php

/**
 *
 * Main file
 *
 * @version             3.0.0
 * @package             Gavern Framework
 * @copyright			Copyright (C) 2010 - 2012 GavickPro. All rights reserved.
 *               
 */
 
// No direct access.
defined('_JEXEC') or die;
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$document = JFactory::getDocument();
$document->addStyleSheet('templates/gk_simplicity/css/jquery-ui.min.css');
$document->addScript('templates/gk_simplicity/js/jquery-ui.min.js');
// enable showing errors in PHP
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);
ini_set('display_errors','On');
// include framework classes and files
require_once('lib/gk.framework.php');
require_once('lib/framework/gk.const.php');
// run the framework
$tpl = new GKTemplate($this, $GK_TEMPLATE_MODULE_STYLES);

// EOF