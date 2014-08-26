<?php

require_once 'Autoloader.php';
Autoloader::init();

// initialize config.
$config = JSONConfig::getInstance();
$config->setConfigPath(dirname(__FILE__) . '/Config/' . ENVIRONMENT . '/config.json' );
$config->read();

$router = new Router( new Request() );