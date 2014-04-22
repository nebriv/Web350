<?php
  $farm_id = $_POST['FarmID'];
  $total = $_POST['total'];
  session_start();
  if(isset($_SESSION['Farms'])){
    array_push($_SESSION['Farms'], $farm_id);
    echo $_SESSION['Farms'];
  }else{
    $_SESSION['Farms'] = array();
    array_push($_SESSION['Farms'], $farm_id);
    echo "frms";
  }
  if(isset($_SESSION['total'])){
    array_push($_SESSION['total'], $total);
    echo $_SESSION['total'];
  }else{
    $_SESSION['total'] = array();
    array_push($_SESSION['total'], $total);
    echo "test";
  }
  //header('Location: cart.php');
?>
