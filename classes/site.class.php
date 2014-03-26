<?php

class Site {

	function __construct(){
		$db = buildDBObject();
		$info = $db->get('Site_Settings');
		$info = $info[0];
		$sitename = $info["SiteName"];
		$MaintenanceMode = $info["MaintenanceMode"];
		$RegistrationOpen = $info["RegistrationOpen"];
		$RegistrationOpen = $info["RegistrationOpen"];
	}

	function siteName(){
		echo $this->sitename;
		return $this->sitename;
	}


	function __destruct(){
		$db = NULL;
	}

}

?>