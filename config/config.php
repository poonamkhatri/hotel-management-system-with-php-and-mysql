<?php

//Note: This file should be included first in every php page.
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/lib/MysqliDb/MysqliDb.php';
require_once BASE_PATH . '/helpers/helpers.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */


 //define('DB_HOST', "localhost");
//define('DB_USER', "root");
//define('DB_PASSWORD', "");
//define('DB_NAME', "hotel_krishana");
//error_reporting(E_ERROR | E_PARSE);

define('DB_HOST', "sg2nlmysql33plsk.secureserver.net:3306");
define('DB_USER', "hotel_krishana");
define('DB_PASSWORD', "hotel_krishana");
define('DB_NAME', "hotel_krishana");
error_reporting(E_ERROR | E_PARSE);
/**
 * Get instance of DB object
 */
function getDbInstance() {
	return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}