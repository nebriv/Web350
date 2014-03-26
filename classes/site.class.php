<?php

class Site {

	function __construct(){
		$db = buildDBObject();
		$info = $db->get('Site_Settings');
		$info = $info[0];
		#print_r($info);
		echo $info["SiteName"];
		#$sitename = $info["SiteName"];
		$MaintenanceMode = $info["MaintenanceMode"];
		$RegistrationOpen = $info["RegistrationOpen"];
		$RegistrationOpen = $info["RegistrationOpen"];
	}

	function siteName(){
		return $this->$sitename;
	}


	function __destruct(){
		$db = NULL;
	}

}

?>