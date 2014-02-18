<?php

function checkSession(){
	#if (isset($_SESSION['user'])){
		#$user = unserialize($_SESSION['user']);
		$db = buildDBObject();

		$results = $db
			->where('UserID', '1')
			->get('Sessions');
			#
			#->where('SessionContent', $user->sessionContent)
		print_r($results);
	#}else{
	#	return false;
	#}
}

?>