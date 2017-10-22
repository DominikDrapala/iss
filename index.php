<?php

define('BASEPATH', dirname(__FILE__));
require_once BASEPATH . '/app/core/autoloader.php';

$controller = new controllers\Main();
$controller->index();



