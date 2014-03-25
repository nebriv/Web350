<?php
include('includes/header.php');
$log = new logger();
$user = new User();
//$user->registerUser($id = NULL, $newusername = NULL, $newemail = NULL, $newfirstname = NULL, $newlastname = NULL, $newrole = "Guest"));
if ($user->checkSession()){
  $user->buildObject($user->checkSession());
  $log->auth("logoutsuccess", $user);
  $user->destroySession();
  #echo "You've been logged out.";

  header( 'Location: http://csa.nebriv.com' ) ;
}else{
  $log->auth("logoutfailure", $user);
  echo "You are not logged in";
}

include('includes/footer.php');

?>
