<?php

class logger {

	function __construct(){
		$db = buildDBObject();
	}

	function createGroup($name, $description){
		$db = buildDBObject();
		$data = array(
		    'GroupID' => NULL,
		    'GroupName' => $name,
		    'GroupDescription' => $description,
		);

		$id = $db->insert('EventGroup', $data);
		if ($id){
			$db->where('GroupName', $name);
			$results = $db->get("EventGroup");
			return $results[0]['GroupID'];
		}else{
			return false;
		}
	}

	function getGroupID($groupname){
		$db = buildDBObject();
		$db->where('GroupName', $groupname);
		$results = $db->get("EventGroup");
		return $results[0]['GroupID'];
	}

	function createEvent($name, $group, $description, $severity){
		$db = buildDBObject();
		$data = array(
		    'EventID' => NULL,
		    'EventName' => $name,
		    'GroupID' => $this->getGroupID($group),
		    'EventDescription' => $description,
		    'Severity' => $severity,
		);
		print_r($data);
		$id = $db->insert('EventIDs', $data);
		echo $id;
		if ($id){
			$db->where('EventName', $name);
			$results = $db->get("EventIDs");
			return $results[0]['EventID'];
		}else{
			echo $db->getLastError();
		}
	}

	function auth($severity = "warn"){

	}


	function __destruct(){
		$db = NULL;
	}

}

?>