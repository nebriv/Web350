<?php

class Site {

	function __construct(){
		$db = buildDBObject();
		$info = $db->get('Site_Settings');
		$info = $info[0];
		$this->sitename = $info["SiteName"];
		$this->MaintenanceMode = $info["MaintenanceMode"];
		$this->RegistrationOpen = $info["RegistrationOpen"];
		$this->RegistrationOpen = $info["RegistrationOpen"];
	}

	function siteName(){
		return $this->sitename;
	}


	function __destruct(){
		$db = NULL;
	}

}

?>