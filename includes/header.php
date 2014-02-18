<?php
require_once('../classes/dbcon.class.php');
require_once('../classes/user.class.php');
require_once('../config.php')
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>CSA Management Service</title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<div class="container">

	<div class="masthead">
		<h3 class="text-muted">Your Farm Name</h3>
		<ul class="nav nav-justified">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">Produce/Shop</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
				<div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
					<form name="login" action="login.php" method="post" accept-charset="UTF-8">
					<input id="user_username" style="margin-bottom: 15px;" type="text" name="username" placeholder="Username" size="30" />
					<input id="user_password" style="margin-bottom: 15px;" type="password" name="password" placeholder="Password" size="30" />
					<input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="rememberme" value="1" />
					<label class="string optional" for="user_remember_me"> Remember me</label>
					<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
					</form>
				</div>
			</li>
		</ul>
	</div>