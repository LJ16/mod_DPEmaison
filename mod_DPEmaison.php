<?php

defined('_JEXEC') or die('Restricted access'); // no direct access

require_once __DIR__ . '/helper.php';
$item = modDPEmaisonHelper::getItem($params);
require(JModuleHelper::getLayoutPath('mod_DPEmaison'));
require_once ('helper.php');

?>
