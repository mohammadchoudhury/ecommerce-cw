<?php
include_once 'config.inc.php';
include_once 'functions.php';
session_start();
if (!empty($_SESSION['user']['email'])) {
	header('Location: index.php');
}
$msg = [];
if (isset($_POST) && !empty($_POST)) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (!$email || !$password) {
		array_push($msg, array("Must enter email and password", 0));
	}
	$email_regex = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
	if (!preg_match($email_regex, $email)) {
		array_push($msg, array("Please enter a valid email address", 0));
	}
	if (!count($msg)) {
		$sql = "SELECT first_name, last_name, password FROM tbl_customer WHERE email = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt){
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->store_result();
			if ($stmt->num_rows === 1) {
				$stmt->bind_result($fname, $lname, $password_db);
				$stmt->fetch();
				if ($password === $password_db) {
					$_SESSION['user'] = array('email' => $email, 'name' => $fname.' '.$lname);
					header('Location: index.php');
				} else {
					array_push($msg, array("Incorrect password entered", 0));
				}
			} else {
				array_push($msg, array("Incorrect email entered", 0));
			}
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
	} else {
		echo "ERRORS";
	}


	// var form = document.getElementById("login_form");
	// var email = form['email'].value;
	// var password = form['password'].value;
	// var errors = [];
	// if (!email || !password) {
	// 	errors.push("Must enter username and password");
	// }
	// var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	// if (!email_regex.test(email)) {
	// 	errors.push("Email address is invalid");
	// }




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
					<h1>Login</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Login</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-4">
					<form id="login_form" method="post" action="login.php" onsubmit="return validateLogin();">
						<div class="panel panel-default text-center">
							<div class="panel-heading">
								<h2 class="text-uppercase">Login</h2>
								<p class="lead text-center">Already a customer?</p>
							</div>
							<div class="panel-body">
								<div id="error"><?=generateMessages($msg);?></div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="email" placeholder="Email" value="<?=(isset($_GET['email'])?$_GET['email']:(isset($_POST['email'])?$_POST['email']:''))?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<button type="submit" class="btn btn-primary" form="login_form">Log in <i class="glyphicon glyphicon-log-in"></i></button>
								<button type="reset" class="btn btn-danger" form="login_form">Reset <i class="glyphicon glyphicon-erase"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<?php include 'footer.php'; ?>

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>