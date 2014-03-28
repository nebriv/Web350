<?php

require_once('../classes/main.class.php');

/*$site = new Site();
if ($user->checkSession()){
  $user->buildObject($user->checkSession());
  if (!$user->checkPerms(2, false)){
    header( 'Location: http://csa.nebriv.com' );
  }
}else{
  header( 'Location: http://csa.nebriv.com' );
}*/

if (isset($_POST['what'])){
  if ($_POST['what'] == "basic"){
    $db = buildDBObject();
    if (isset($_POST['siteName'])){   
      $sitename = $_POST['siteName'];
      $data = array(
        "siteName" => $sitename,
      );
    }
    if (isset($_POST['siteURL'])){  
      $siteurl = $_POST['siteURL'];
      $data["siteURL"] = $siteurl;
    }
    if (!empty($data)){
      $db->where('ID', 1);
      if($db->update('Site_Settings', $data)){
        echo '<div class="alert alert-success">Settings Saved!</div>';
      }else{
        echo '<div class="alert alert-danger">The server encountered an error saving your changes!</div>';
      }
    }
  }
}

?>