<?php
  $farm_id = $_POST['FarmID'];
  $total = $_POST['total'];
  session_start();
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
