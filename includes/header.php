<?php
require_once('classes/main.class.php');
session_start();
$user = new User();
$site = new Site();

if ($site->maintenanceEnabled()){
	header( 'Location: http://csa.nebriv.com/maintenance.php' );
}

$auser = $user->checkSession();
if ($auser){
	$user->buildObject($auser);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>CSA Management Service</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<div class="container">

	<div class="masthead">
		<h3 class="text-muted"><a href="index.php"><?php echo $site->siteName(); ?></a></h3>
		<ul class="nav nav-justified">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="products.php">Produce/Shop</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href='#'>My Cart</a></li>
			<?php

			if ($user->checkSession()){

			echo "
				
				<li class='dropdown'>
					<a class='dropdown-toggle' href='#' data-toggle='dropdown'>Hello, ";
					 echo ucfirst($user->getFirstName());
			echo "<strong class='caret'></strong></a>
					<ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>
							 <li role='presentation' class='dropdown-header'>Your Account</li>
							<li role='presentation' class='divider'></li>
							<li role='presentation'><a role='menuitem' tabindex='-1' href='subscriptions.php'>Your Current Subscriptions</a></li>
							<li role='presentation'><a role='menuitem' tabindex='-1' href='orderhistory.php'>Your Order History</a></li>
							<li role='presentation'><a role='menuitem' tabindex='-1' href='myaccount.php'>Your Account Settings</a></li>
							";
							if ($user->checkPerms(1)){
								echo "<li role='presentation' class='divider'></li>
								<li role='presentation' class='dropdown-header'>Site Administration</li>
								<li role='presentation'><a role='menuitem' tabindex='-1' href='admin/index.php'>Dashboard</a></li>
								<li role='presentation'><a role='menuitem' tabindex='-1' href='admin/settings.php'>Site Settings</a></li>
								<li role='presentation'><a role='menuitem' tabindex='-1' href='subscriptions.php'>View/Print Orders</a></li>";
							}
			echo "
							<li role='presentation' class='divider'></li>
							<li role='presentation'><a role='menuitem' tabindex='-1' href='logout.php'>Logout</a></li>
					</ul>
				</li>";
			}else{
				echo "
				<li class='dropdown'>
					<a class='dropdown-toggle' href='#' data-toggle='dropdown'>Sign In/Up <strong class='caret'></strong></a>
					<div class='dropdown-menu' style='padding: 15px; padding-bottom: 10px;'>
						<form name='login' action='login.php' method='post' accept-charset='UTF-8'>
						<input id='user_username' style='margin-bottom: 15px;' type='text' name='username' placeholder='Username' size='30' />
						<input id='user_password' style='margin-bottom: 15px;' type='password' name='password' placeholder='Password' size='30' />
						<input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='rememberme' value='1' />
						<label class='string optional' for='user_remember_me'> Remember me</label>
						<input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='commit' value='Sign In' />
						</form>
						<hr>
						<h5>Don't have an account?<br /><a href='register.php'>Click here to make one</a></h5>
					</div>
				</li>";
			}
			?>
		</ul>
	</div>
