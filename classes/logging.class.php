<?php

class logger {

	function __construct(){
		$db = buildDBObject();
	}

	function createGroup($name, $description){
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

	function createEvent($name, $group, $description, $severity){

	}

	function auth($severity = "warn"){

	}


	function __destruct(){
		$db = NULL;
	}

}

?>