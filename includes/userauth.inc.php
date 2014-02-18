<?php

function checkSession(){
	#if (isset($_SESSION['user'])){
		#$user = unserialize($_SESSION['user']);
		$db = buildDBObject();

		$results = $db
			->get('Sessions')
			->where('UserID', '1')
			->where('SessionContent', '123')
			#->where('UserID', $user->UserID)
			#->where('SessionContent', $user->sessionContent)
		print_r($results);
	#}else{
	#	return false;
	#}
}

?>