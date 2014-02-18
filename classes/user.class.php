<?php

class User {
/*	
	$username;
	$userID;
	$role;
	$csrf;
	$lastActive;
	$sessionContent;*/

	function __construct($newusername = NULL, $id = NULL, $newsession = NULL){
		$this->username = $newusername;
		$this->userID = $id;
		$this->sessionContent = $newsession;
	}

	function setID($newid){
		$this->userID = $newid;
	}

	function setSessionContent($newsession){
		$this->sessionContent = $newsession;
	}

	function saveSession(){
		$_SESSION['user'] = serialize($this);
	}

}

?>