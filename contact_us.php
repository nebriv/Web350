<?php
include('includes/header.php');


?>

      <div class="jumbotron">
<p class="lead">This management system allows us to quickly and easily update what produce we have available on a weekly basis, and also allows you to modify your orders whenever you would like. By utilizing this system we are able to efficiently and accurately build out your order and get it to you within reasonable time!</p>
<p class="lead" style="color:brown">If you have any further questions please don't hesitate to contact us through the field below.</p>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

	</head>

	<body>
		<div>
			<div class="container">
				<div class="panel panel-default" style="margin:0 auto;width:650px">
					<div class="panel-heading">
						<h2 class="panel-title">Contact Us</h2>
					</div>
					<div class="panel-body">
						<form name="contactform" method="post" action="../mailer.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">Name</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSubject" class="col-lg-2 control-label">Subject</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Subject Message">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword1" class="col-lg-2 control-label">Message</label>
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Your message..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" onclick="alert('Your message was delivered')" class="btn btn-default">
										Send Message
									</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</body>
</html>	  
<?php

include('includes/footer.php');

?>
