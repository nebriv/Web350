<?php
  $farm_id = $_POST['FarmID'];
  $total = $_POST['total'];
  session_start();
    //What happens when the user logs in from a different computer? They will loose their saved cart because it is session based.
  //This should be stored in the database, and tied to their session token located in the Sessions table.
  if(isset($_SESSION['Farms'])){
    array_push($_SESSION['Farms'], $farm_id);
  }else{
    $_SESSION['Farms'] = array();
    array_push($_SESSION['Farms'], $farm_id);
  }
  if(isset($_SESSION['total'])){
    array_push($_SESSION['total'], $total);
  }else{
    $_SESSION['total'] = array();
    array_push($_SESSION['total'], $total);
  }
  header('Location: cart.php');
?>
