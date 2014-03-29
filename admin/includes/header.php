<?php
require_once('../classes/main.class.php');

session_start();
$user = new User();
$site = new Site();
if ($user->checkSession()){
	$user->buildObject($user->checkSession());
	if (!$user->checkPerms(2, false)){
		header( 'Location: http://csa.nebriv.com' );
	}
}else{
	header( 'Location: http://csa.nebriv.com' );
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>CSA Management Service</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body onunload="saveData()">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php echo $site->siteName(); ?> - Manage</a>
        </div>
        <div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="http://csa.nebriv.com">View Website</a></li>
			</ul>
		
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="account.php">Profile</a></li>
            <li><a href="help.php">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">

          <?php
          $current_page = $_SERVER['PHP_SELF'];
          echo $current_page;
          switch ($current_page){
          	case "index.php":
          		echo '
	          		<li class="active"><a href="index.php">Dashboard</a></li>
	            	<li><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
            	break;
            case "perms.php":
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li class="active"><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
        	    break;
            case "products.php":
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li"><a href="perms.php">Users and Groups</a></li>
	            	<li class="active><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
        	    break;
            case "farms.php":
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li class="active"><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
        	    break;
            case "theme.php":
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li class="active"><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
        	    break;  
            case "settings.php":
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li class="active"><a href="settings.php">Site Settings</a></li>
        	    ';
        	    break;
          	default:
          		echo '
	          		<li><a href="index.php">Dashboard</a></li>
	            	<li><a href="perms.php">Users and Groups</a></li>
	            	<li><a href="products.php">Product Management</a></li>
	        	    <li><a href="farms.php">Farm Management</a></li>
	        	    <li><a href="theme.php">Look and Feel</a></li>
	        	    <li><a href="settings.php">Site Settings</a></li>
        	    ';
            	break;  	
          }
          ?>
          </ul>
        </div>