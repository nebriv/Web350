<?php

require_once('../classes/main.class.php');

if (isset($_POST['what'])){}
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
      print_r($data);
    }
  }
}