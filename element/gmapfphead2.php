<?php

/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @component GMapFP Component
 */

defined('_JEXEC') or die();

class JFormFieldGMapFPHead2 extends JFormField
{    
	public $type = 'GMapFPHead2';

	protected function getInput()
	{
		if ($this->element['default']) {
			return '<li><label style="background: #ecd3d7; color: #d43c0f; padding:5px; width: 100%"><strong>' . JText::_($this->element['default']) . '</strong></label></li>';
		} else {
			return '<li />';
		}
	}

}

?>