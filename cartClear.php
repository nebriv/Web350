<?php
session_start();
$_SESSION['Farms'] = array();
$_SESSION['total'] = array();
header('Location: cart.php');
?>
