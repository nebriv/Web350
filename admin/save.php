<?php

require_once('../classes/main.class.php');

if (isset($_GET['what'])){
  if ($_GET['what'] == "basic"){
    $db = buildDBObject();
    if (isset($_GET['siteName'])){   
      $sitename = $_GET['siteName'];
      $data = array(
        "siteName" => $sitename,
      );
    }
    if (isset($_GET['siteURL'])){  
      $siteurl = $_GET['siteURL'];
      $data["siteURL"] = $siteurl;
    }
    if (!empty($data)){
      print_r($data);
    }else{
      echo "wat";
    }
  }
}else{
  echo "hello ";
}

?>