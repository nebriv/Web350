<?php
include('includes/header.php');

$log = new logger();
#$log->createEvent("Logout Failed", "Authentication", "The user successfully terminated their current session.", "info");
?>

      <div class="jumbotron">
        <h1><?php echo $site->siteName(); ?> Welcomes You</h1>
        <p class="lead">From this website you will be able to sign up to receive your very own share of locally grown crops!</p>
        <p><a class="btn btn-lg btn-success" href="register.php" role="button">Sign up today</a></p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <h2>What is Community Supported Agriculture?</h2>
			<p>Community Supported Agriculture is a alternative model for producing and distributing food and other produce throughout a local area. Members are able to subscribe to receive scheduled shipments or pick-up of food tailored to their needs.</p>
        </div>
        <div class="col-lg-4">
          <h2>What is this management system?</h2>
          <p>This management system allows us to quickly and easily update what produce we have available on a weekly basis, and also allows you to modify your orders whenever you would like. By utilizing this system we are able to efficiently and <a href="commits.PNG">accurately build out your order and get it to you within reasonable time!</a></p>
       </div>
        <div class="col-lg-4">
          <h2>How can I contribute?</h2>
          <p>If you are a local farmer and would like to contribute to this CSA please send us an email!</p>
          <p><a class="btn btn-primary" href="contact_us.php" role="button">Contact Us! &raquo;</a></p>
        </div>
      </div>
	  
<?php

include('includes/footer.php');

?>
