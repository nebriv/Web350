<?php

class Site {

	function __construct(){
		$db = buildDBObject();
		$info = $db->get('Site_Settings');
		$info = $info[0];
		$this->sitename = $info["SiteName"];
		$this->siteURL = $info["SiteURL"];
		$this->MaintenanceMode = $info["MaintenanceMode"];
		$this->MaintenanceMessage = $info["MaintenanceMessage"];
		$this->RegistrationOpen = $info["RegistrationOpen"];
		$this->RegistrationOpen = $info["RegistrationOpen"];
	}

	function siteName(){
		return $this->sitename;
	}

	function siteURL(){
		return $this->siteURL;
	}

	function MaintenanceModeMessage(){
		return $this->MaintenanceMessage;
	}

	function maintenanceEnabled(){
		if ($this->MaintenanceMode){
			return $this->MaintenanceMessage;
		}else{
			return False;
		}
	}

	function __destruct(){
		$db = NULL;
	}

}

?>