<?php

/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @component GMapFP Component
 */

defined('_JEXEC') or die();

class JFormFieldGMapFPHead3 extends JFormField
{    
	public $type = 'GMapFPHead3';

	protected function getInput()
	{
		if ($this->element['default']) {
			return '<li><label style="background: #CCE6FF; color: #0069CC; padding:5px; width: 100%"><strong>' . JText::_($this->element['default']) . '</strong></label></li>';
		} else {
			return '<li />';
		}
	}

}

?>