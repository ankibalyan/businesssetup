<?php
/**
 * @version     1.0.0
 * @package     com_trademark
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit Kumar <ankit.kr.balyan@gmail.com> - http://igotstudy.com/ankit
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Trademarks list controller class.
 */
class TrademarkControllerTrademarks extends TrademarkController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Trademarks', $prefix = 'TrademarkModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}