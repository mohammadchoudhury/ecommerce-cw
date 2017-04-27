<?php
include 'functions.php';

$msg = [];
$name = '';
$email = '';
$message = '';
if (isset($_POST) && !empty($_POST)) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	if (!$name || !$email || !$message) {
		array_push($msg_details, array("You must fill in all fields", 0));
	}
	$name_regex = "/^[a-zA-Z ]+(-)?[a-zA-Z ]*$/";
	if ($name && !preg_match($name_regex, $name)) {
		array_push($msg_details, array("Name must not have special characters", 0));
	}
	$email_regex = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
	if (!preg_match($email_regex, $email)) {
		array_push($msg, array("Please enter a valid email address", 0));
	}
	if (strlen($message) < 25) {
		array_push($msg, array("Message must be at least 25 characters", 0));
	}
	if (!count($msg)) {
		mail("noyan786@hotmail.com", "E-Commerce Email", "Name: $name \n\r" . $message, "From:" . $email);
		array_push($msg, array("Thank you for your message. We will get back to you ASAP.", 1));
		$name = '';
		$email = '';
		$message = '';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include 'header.php'; ?>
	
	<div id="banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7">
					<h1>Contact Us/h1>
					</div>
					<div class="col-md-5">
						<ul class="breadcrumb">
							<li><a href="index.php">Home</a>
							</li>
							<li>Contact Us/li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<section class="gray-bg text-center">
				<div class="container">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="text-uppercase">Contact Us</h3>
							</div>
							<div class="panel-body">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3>Get In Touch</h3>
									</div>
									<div class="panel-body">
										<div class="col-md-12">
											There are several ways to get in touch with us. Telephone, Email and Contact Form.
										</div>
										<style type="text/css">
											.col-sm-4 i {
												margin-top: 15px;
												padding: 10px;
												border: 3px solid black;
												border-radius: 50%;
												font-size: 25px;
											}
										</style>
										<div class="col-sm-4">
											<i class="glyphicon glyphicon-phone-alt"></i><a href="tel:+442075156521">+44 20 7515 6521</a>
										</div>
										<div class="col-sm-4">
											<i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@dreamcars.co.uk">info@dreamcars.co.uk</a>
										</div>
										<div class="col-sm-4">
											<i class="glyphicon glyphicon-edit"></i> <a href="contact.php#contact">Contact Form</a>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h3>Visit Us</h3>
									</div>
									<div class="panel-body">
										<h4>Dream Cars, Northampton Square, London, EC1V OBH</h4>
										<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9928.76771195759!2d-0.1015937!3d51.5280395!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x570d19c20ab22a83!2sCity%2C+University+of+London!5e0!3m2!1sen!2suk!4v1493280886685" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
										<div class="col-md-12">
											<div class="list-group">
												<div class="list-group-item">
													<h4 class="list-group-item-heading">Bus</h4>
													<p class="list-group-item-text">Some random text. New the her nor case that lady paid read. Invitation friendship travelling eat everything the out two. Shy you who scarcely expenses debating hastened resolved. Always polite moment on is warmth spirit it to hearts. Downs those still witty an balls so chief so. Moment an little remain no up lively no. Way brought may off our regular country towards adapted cheered.</p>
												</div>
												<div class="list-group-item">
													<h4 class="list-group-item-heading">Train</h4>
													<p class="list-group-item-text">More random text. On recommend tolerably my belonging or am. Mutual has cannot beauty indeed now sussex merely you. It possible no husbands jennings ye offended packages pleasant he. Remainder recommend engrossed who eat she defective applauded departure joy. Get dissimilar not introduced day her apartments. Fully as taste he mr do smile abode every. Luckily offered article led lasting country minutes nor old. Happen people things oh is oppose up parish effect. Law handsome old outweigh humoured far appetite. </p>
												</div>
												<div class="list-group-item">
													<h4 class="list-group-item-heading">Car</h4>
													<p class="list-group-item-text">Yes, you guessed it is more random text. Why end might ask civil again spoil. She dinner she our horses depend. Remember at children by reserved to vicinity. In affronting unreserved delightful simplicity ye. Law own advantage furniture continual sweetness bed agreeable perpetual. Oh song well four only head busy it. Afford son she had lively living. Tastes lovers myself too formal season our valley boy. Lived it their their walls might to by young. </p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h3>Contact Form</h3>
									</div>
									<div class="panel-body" id="contact">
										<div id="error"><?=generateMessages($msg);?></div>
										<form class="form-horizontal form-group" method="post">
											<div class="form-group">
												<label for="name" class="col-sm-3 control-label">Full Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?=$name?>">
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
												</div>
											</div>
											<div class="form-group">
												<label for="message" class="col-sm-3 control-label">Message</label>
												<div class="col-sm-8">
													<textarea name="message" id="message" class="form-control" rows="10" style="resize:none;" placeholder="Enter message here"><?=$message?></textarea>
												</div>
											</div>
											<button type="submit" class="btn btn-primary">Send Message</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php include 'footer.php'; ?>

			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>

		</body>
		</html>