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
		<h3 class="text-muted">&lt;Your Farm Name&gt;</h3>
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

      <div class="jumbotron">
        <h1>&lt;Your Farm Name&gt; Welcomes You</h1>
        <p class="lead">From this website you will be able to sign up to receive your very own share of locally grown crops!</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <h2>What is Community Supported Agriculture?</h2>
			<p>Community Supported Agriculture is a alternative model for producing and distributing food and other produce throughout a local area. Members are able to subscribe to receive scheduled shipments or pick-up of food tailored to their needs.</p>
        </div>
        <div class="col-lg-4">
          <h2>What is this management system?</h2>
          <p>This management system allows us to quickly and easily update what produce we have available on a weekly basis, and also allows you to modify your orders whenever you would like. By utilizing this system we are able to efficiently and accurately build out your order and get it to you within reasonable time!</p>
       </div>
        <div class="col-lg-4">
          <h2>How can I contribute?</h2>
          <p>If you are a local farmer and would like to contribute to this CSA please send us an email!</p>
          <p><a class="btn btn-primary" href="#" role="button">Contact Us! &raquo;</a></p>
        </div>
      </div>
	  
      <div class="footer">
        <p>&copy; 2014  -  Proudly powered by <a href="#">CSA Managing Systems</a></p>
      </div>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
