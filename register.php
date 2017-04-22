<?php
include_once 'config.inc.php';
include_once 'functions.php';

$msg = [];
if (isset($_POST) && !empty($_POST)) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$phone = $_POST['phone'];

	if (!$fname || !$lname) {
		array_push($msg, array("Please enter your name", 0));
	}
	$name_regex = "/^[a-zA-Z]+(-)?[a-zA-Z]*$/";
	if ($fname && !preg_match($name_regex, $fname)) {
		array_push($msg, array("First name must not have special characters", 0));
	}
	if ($lname && !preg_match($name_regex, $lname)) {
		array_push($msg, array("Last name must not have special characters", 0));
	}
	$email_regex = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
	if (!preg_match($email_regex, $email)) {
		array_push($msg, array("Please enter a valid email address", 0));
	}
	if ($password != $cpassword) {
		array_push($msg, array("Passwords do not match", 0));
	}
	$pwd_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
	if (!preg_match($pwd_regex, $password)) {
		array_push($msg, array("Passwords must have at least one lowercase character, one uppercase character, one digit and be minimum of 8 characters", 0));
	}
	$phone_regex = "/^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$/";
	if (!preg_match($phone_regex, $phone)) {
		array_push($msg, array("Please enter a valid phone/mobile number", 0));
	}
	if (!count($msg)) {
		$sql = "SELECT customer_id FROM tbl_customer WHERE email = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt){
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($customer_id);
			$stmt->fetch();
			if (empty($customer_id)) {
				$sql = "INSERT INTO tbl_customer(email, password, first_name, last_name, phone_number) value (?, ?, ?, ?, ?)";
				$stmt = $mysqli->prepare($sql);
				if ($stmt){
					$hash_password = hash("sha256", $password);
					$stmt->bind_param("sssss",$email, $hash_password, $fname, $lname, $phone);
					if ($stmt->execute()) {
						array_push($msg, array("Account successfully created<br><a href='login.php?email=$email'>Click Here</a> to sign in", 1));
						$_POST = array();
					} else {
						array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
					}
				} else {
					array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
				}
			} else {
				array_push($msg, array("A customer already exists under that email adress", 0));
			}
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
		$stmt->close();
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
					<h1>Register</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Register</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-4">
					<form id="register_form" method="post" action="register.php" onsubmit="return validateRegister();">
						<div class="panel panel-default text-center">
							<div class="panel-heading">
								<h2 class="text-uppercase">Register</h2>
								<p class="lead text-center">Not a customer yet?</p>
							</div>
							<div class="panel-body">
								<div id="error"><?=generateMessages($msg);?></div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
										<input type="text" class="form-control" name="fname" placeholder="First Name" value="<?=(isset($_POST['fname'])?$_POST['fname']:'')?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
										<input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?=(isset($_POST['lname'])?$_POST['lname']:'')?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="email" placeholder="Email" value="<?=(isset($_POST['email'])?$_POST['email']:'')?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
										<input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="11" value="<?=(isset($_POST['phone'])?$_POST['phone']:'')?>">
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<button type="submit" class="btn btn-primary" form="register_form">Register <i class="glyphicon glyphicon-log-in"></i></button>
								<button type="reset" class="btn btn-danger" form="register_form">Reset <i class="glyphicon glyphicon-erase"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>