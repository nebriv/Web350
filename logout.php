<?php
include('includes/header.php');

session_start();
$user = new User();
//$user->registerUser($id = NULL, $newusername = NULL, $newemail = NULL, $newfirstname = NULL, $newlastname = NULL, $newrole = "Guest"));
if ($user->checkSession()){
  $user->destroySession();
}else{
  echo "You are not logged in";
}

include('includes/footer.php');

?>
