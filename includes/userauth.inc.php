<?php

function checkSession(){
	if (isset($_SESSION['user'])){
		$user = unserialize($_SESSION['user']);
		$db = buildDBObject();

		$results = $db
			->where('SessionContent', $user->sessionContent)
			->where('UserID', $user->UserID)
			->get('Sessions');
		
		if (count($results) > 0){
			return True;
		}else{
			return False;
		}

	}else{
		return False;
	}
}

?>