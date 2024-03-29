<?php
require_once('classes/main.class.php');
$site = new Site();
if (!$site->maintenanceEnabled()){
  header( 'Location: http://csa.nebriv.com/' );
}
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	
    <title>CSA Management Service</title>

    <link href='../css/bootstrap.css' rel='stylesheet'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
      <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>
  <body>
	<div class='container'>
  	<div class='jumbotron'>
      <h2>Sorry! We are currently undergoing some maintenance!</h2>
      <p><?php echo $site->maintenanceEnabled(); ?></p>
    </div>
      <div class="footer">
        <p>&copy; 2014  -  Proudly powered by <a href="#">CSA Managing Systems</a></p>
      </div>

  </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>