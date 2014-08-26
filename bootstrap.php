<?php

/*
 * SetlistGenerator project
 *  @author Wouter Wessendorp
 */

// Define some path constants.
define('ENVIRONMENT', getenv('ENVIRONMENT'));
if (ENVIRONMENT == 'localhost') {
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . 'SetlistGenerator');
} else {
    define('DOCUMENT_ROOT', dirname(__FILE__));
}
define('LIBRARY_PATH', dirname(__FILE__) . '/Library');
define('UTIL_PATH', dirname(__FILE__) . '/Utils');
define('RESOURCES_PATH', dirname(__FILE__) . '/Resources');
define('CONTROLLER_PATH', dirname(__FILE__) . '/Controller');
define('ENTITY_PATH', dirname(__FILE__) . '/Entity');
define('PUBLIC_PATH', dirname(__FILE__) . '/Public');
define('ERROR_PATH', dirname(__FILE__) . '/Error');
define('VIEW_PATH', dirname(__FILE__) . '/View');


/**
 * Here we will define some mandatory includes
 */
require_once UTIL_PATH . DIRECTORY_SEPARATOR . 'FileScanners' . DIRECTORY_SEPARATOR . 'FileScanner.php';
require_once 'Router.php';
