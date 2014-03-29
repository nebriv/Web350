<?php

require_once('../classes/main.class.php');


//This is still insecure, unauthorized users (users without the correct role) could push updates to settings that they don't have permissions to.
//Each setting below should have their own check instead of a global check.
/*$site = new Site();
$user = new User();
if ($user->checkSession()){
  $user->buildObject($user->checkSession());
  if (!$user->checkPerms(2, false)){
    header( 'Location: http://csa.nebriv.com' );
  }
}else{
  header( 'Location: http://csa.nebriv.com' );
}*/


//Basic Settings Section of Site Settings
if (isset($_POST['what'])){
  if ($_POST['what'] == "basic"){
    $db = buildDBObject();
    $current = $db->get('Site_Settings');
    $current = $current[0];
    $changes = False;
    if (isset($_POST['siteName'])){   
      $sitename = $_POST['siteName'];
      if ($current["SiteName"] != $sitename){
        $data = array(
          "siteName" => $sitename,
        );
        $changes = True;
      }
    }
    if (isset($_POST['siteURL'])){  
      $siteurl = $_POST['siteURL'];
      if ($current["SiteName"] != $sitename){
        $data["siteURL"] = $siteurl;
        $changes = True;
      }
    }
    if (!empty($data)){
      if ($changes == True){
        $db->where('ID', 1);
        if($db->update('Site_Settings', $data)){
          echo '<div class="alert alert-success">Settings Saved!</div>';
        }else{
          echo '<div class="alert alert-danger">The server encountered an error saving your changes!</div>';
        }
      }else{
        echo '<div class="alert alert-info">No changes were detected! Nothing was saved.</div>';
      }
    }else{
        echo '<div class="alert alert-info">No changes were detected! Nothing was saved.</div>';
    }
  }

//Maintenance Settings Section of Site Settings  
  if ($_POST['what'] == "maintenance"){
    $db = buildDBObject();
    $current = $db->get('Site_Settings');
    $current = $current[0];
    $data = array();
    $changes = False;
    if (isset($_POST['maintenanceMode'])){   
      $maintenanceMode = $_POST['maintenanceMode'];
      if ($current["MaintenanceMode"] != $maintenanceMode){
        $data = array(
          "MaintenanceMode" => $maintenanceMode,
        );
        $changes = True;
      }
    }
    if (isset($_POST['maintenanceMessage'])){  
      $maintenanceMessage = $_POST['maintenanceMessage'];
      if ($current["MaintenanceMessage"] != $maintenanceMessage){
        $data["MaintenanceMessage"] = $maintenanceMessage;
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


//Registration Settings Section of Site Settings
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
          echo '<div class="alert alert-success">Settings Saved!</div>';
        }else{
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