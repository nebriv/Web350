<?php

function buildSession(){
	$user = new User("nebriv", "1", "123");
	$user->saveSession();
}

function checkSession(){
	if (isset($_SESSION['user'])){
		$user = unserialize($_SESSION['user']);
		$db = buildDBObject();

		$results = $db
			->where('SessionContent', $user->sessionContent)
			->where('UserID', $user->userID)
			->get('Sessions');
		
		$db = NULL;

		if (count($results) > 0){
			return "True";
		}else{
			return "False";
		}

	}else{
		return "False";
	}
}

?>