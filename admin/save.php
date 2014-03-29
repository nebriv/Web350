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
  if ($_POST['what'] == "maintenance"){
    $db = buildDBObject();
    if (isset($_POST['maintenanceMode'])){   
      $maintenanceMode = $_POST['maintenanceMode'];
      $data = array(
        "maintenanceMode" => $maintenanceMode,
      );
    }
    if (isset($_POST['maintenanceMessage'])){  
      $maintenanceMessage = $_POST['maintenanceMessage'];
      $data["maintenanceMessage"] = $maintenanceMessage;
    }
    if (!empty($data)){

      $db->where('ID', 1);
      if($db->update('Site_Settings', $data)){
        //print_r($data);
        echo '<div class="alert alert-success">Settings Saved!</div>';
      }else{
        //print_r($data);
        echo '<div class="alert alert-danger">The server encountered an error saving your changes!</div>';
      }
    }
  }

  if ($_POST['what'] == "registration"){
    $db = buildDBObject();

    $current = $db->get('Site_Settings');
    $current = $current[0];

    $data = array();
    $changes = False;
    if (isset($_POST['registrationRequired'])){   
      $registrationRequired = $_POST['registrationRequired'];
      if ($current["RegistrationRequired"] != $registrationRequired){
        $data = array(
          "RegistrationRequired" => $registrationRequired,
        );
        $changes = True;
      }
    }
    if (isset($_POST['registrationOpen'])){  
      $registrationOpen = $_POST['registrationOpen'];
      if ($current["RegistrationOpen"] != $registrationOpen){
        $data["RegistrationOpen"] = $registrationOpen;
        $changes = True;
      }
    }
    if (isset($_POST['AdminApprovalRequired'])){

      $AdminApprovalRequired = $_POST['AdminApprovalRequired'];
      if ($current["AdminApprovalRequired"] != $AdminApprovalRequired){
        $data["AdminApprovalRequired"] = $AdminApprovalRequired;
        $changes = True;
      }
    }

    if (!empty($data)){
      if ($changes == True){
        $db->where('ID', 1);
        if($db->update('Site_Settings', $data)){
          //print_r($data);
          echo '<div class="alert alert-success">Settings Saved!</div>';
        }else{
          //print_r($data);
          echo '<div class="alert alert-danger">The server encountered an error saving your changes!</div>';
        }
      }else{
        echo '<div class="alert alert-info">No changes were detected! Nothing was saved.</div>';
      }
    }else{
        echo '<div class="alert alert-info">No changes were detected! Nothing was saved.</div>';
    }
  }

}

?>