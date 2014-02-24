<?php
include('includes/header.php');

$user = new User();
//$user->registerUser($id = NULL, $newusername = NULL, $newemail = NULL, $newfirstname = NULL, $newlastname = NULL, $newrole = "Guest"));
if ($user->checkSession()){
  $user->destroySession();
  #echo "You've been logged out.";
  header( 'Location: http://csa.nebriv.com' ) ;
}else{
  echo "You are not logged in";
}

include('includes/footer.php');

?>
