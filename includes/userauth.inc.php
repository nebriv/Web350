<?php

function checkSession(){
	#if (isset($_SESSION['user'])){
		#$user = unserialize($_SESSION['user']);
		$db = buildDBObject();

		$results = $db
			->where('UserID', '2')
			->get('Sessions');
			#
			#->where('SessionContent', $user->sessionContent)
		print_r($results);
	#}else{
	#	return false;
	#}
}

?>