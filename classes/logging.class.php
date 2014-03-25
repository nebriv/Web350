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
	function getEventID($eventname){
		$db = buildDBObject();
		$db->where('EventName', $eventname);
		$results = $db->get("EventIDs");
		if ($results){
			return $results[0]['EventID'];
		}else{
			return False;
		}
		
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
		$id = $db->insert('EventIDs', $data);
		if ($id){
			$db->where('EventName', $name);
			$results = $db->get("EventIDs");
			return $results[0]['EventID'];
		}else{
			return False;
		}
	}

	function auth($type, $user = "Not Logged In", $notes = "None"){
		$db = buildDBObject();
		if ($type == "success"){
			$data = array(
			    'LogID' => NULL,
			    'EventID' => $this->getEventID("Login Successful"),
			    'Timestamp' => date("Y-m-d H:i:s"),
			    'UserID' => $user->getID(),
			    'IP' => $_SERVER['REMOTE_ADDR'],
			    'Notes' => $notes,
			);
			$id = $db->insert('AuditLog', $data);
			if ($id){
				return True;
			}else{
				return False;
			}
		}elseif ($type == "failure"){
			$data = array(
			    'LogID' => NULL,
			    'EventID' => $this->getEventID("Login Failed"),
			    'Timestamp' => date("Y-m-d H:i:s"),
			    'UserID' => $user->getID(),
			    'IP' => $_SERVER['REMOTE_ADDR'],
			    'Notes' => $notes,
			);
			$id = $db->insert('AuditLog', $data);
			if ($id){
				return True;
			}else{
				return False;
			}
		}elseif ($type == "logoutsuccess"){
			$data = array(
			    'LogID' => NULL,
			    'EventID' => $this->getEventID("Logout Successful"),
			    'Timestamp' => date("Y-m-d H:i:s"),
			    'UserID' => $user->getID(),
			    'IP' => $_SERVER['REMOTE_ADDR'],
			    'Notes' => $notes,
			);
			$id = $db->insert('AuditLog', $data);
			if ($id){
				return True;
			}else{
				return False;
			}
		}elseif ($type == "logoutfailure"){
			$data = array(
			    'LogID' => NULL,
			    'EventID' => $this->getEventID("Logout Failed"),
			    'Timestamp' => date("Y-m-d H:i:s"),
			    'UserID' => $user->getID(),
			    'IP' => $_SERVER['REMOTE_ADDR'],
			    'Notes' => $notes,
			);
			$id = $db->insert('AuditLog', $data);
			if ($id){
				return True;
			}else{
				return False;
			}
		}
	}


	function __destruct(){
		$db = NULL;
	}

}

?>