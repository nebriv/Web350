<?php

class site {

	function __construct(){
		$db = buildDBObject();
		$info = $db->get('Site_Settings');
		$sitename = $info["SiteName"];
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