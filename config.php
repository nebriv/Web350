<?php
date_default_timezone_set("America/New_York");

define("DB_DSN", "mysql:host=mysql.nebriv.com:3307;dbname=CSA");
define("DB_USERNAME", "web350");
define("DB_PASSWORD", "P6xpznvLcM29JtYw");

define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");

function handleException($exception){
	echo "Whoops! We've encountered an error, this has been recorded in our database and hopefully will be fixed soon! Please try again later";
	error_log($exception->getMessage());
}

set_exception_handler('handleException');

function buildDBObject(){
	$db = new Mysqlidb('mysql.nebriv.com', 'web350', 'P6xpznvLcM29JtYw', 'CSA', '3307');
	return $db;
}

#Include other functions
include_once('includes/userauth.inc.php');


?>