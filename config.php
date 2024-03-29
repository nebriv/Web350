<?php
date_default_timezone_set("America/New_York");

$MySQLTimeStamp = date("Y-m-d H:i:s");

define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");

function handleException($exception){
	echo "Whoops! We've encountered an error, this has been recorded in our database and hopefully will be fixed soon! Please try again later";
	error_log($exception->getMessage());
}

set_exception_handler('handleException');

function buildDBObject(){
	$db = new Mysqlidb('127.0.0.1', 'web350', 'P6xpznvLcM29JtYw', 'CSA', '3307');
	return $db;
}

#Include other functions


?>