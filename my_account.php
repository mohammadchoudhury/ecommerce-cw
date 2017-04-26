<?php
session_start();
if (!isset($_SESSION['user'])):
	header('Location: login.php');
endif;

include_once 'config.inc.php';
include_once 'functions.php';
$sql = "SELECT * FROM tbl_customer WHERE customer_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION['user']['c_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$msg_details = [];
$fname = $row['first_name'];
$lname = $row['last_name'];
$phone = $row['phone_number'];
if (isset($_POST) && !empty($_POST) && $_POST['update']=="details") {
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$phone = $_POST['phone_number'];
	if (!$fname || !$lname) {
		array_push($msg_details, array("Please enter your name", 0));
	}
	$name_regex = "/^[a-zA-Z]+(-)?[a-zA-Z]*$/";
	if ($fname && !preg_match($name_regex, $fname)) {
		array_push($msg_details, array("First name must not have special characters", 0));
	}
	if ($lname && !preg_match($name_regex, $lname)) {
		array_push($msg_details, array("Last name must not have special characters", 0));
	}
	$phone_regex = "/^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$/";
	if (!preg_match($phone_regex, $phone)) {
		array_push($msg_details, array("Please enter a valid phone/mobile number", 0));
	}
	if (!count($msg_details)) {
		$sql = "UPDATE tbl_customer SET first_name = ?, last_name = ?, phone_number = ? WHERE customer_id = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt){
			$stmt->bind_param("sssi",$fname, $lname, $phone, $_SESSION['user']['c_id']);
			if ($stmt->execute()) {
				array_push($msg_details, array("Your details updated successfully", 1));
				$_SESSION['user']['name'] = $fname . " " . $lname;
			} else {
				array_push($msg_details, array("An error has occurred on our end<br>Please try again later", 0));
			}
		} else {
			array_push($msg_details, array("An error has occurred on our end<br>Please try again later", 0));
		}
		$stmt->close();
	}
}

$msg_email = [];
$email = $row['email'];
$c_email = $row['email'];
if (isset($_POST) && !empty($_POST) && $_POST['update']=="email") {
	$email = $_POST['new_email'];
	$c_email = $_POST['confirm_email'];
	
	$email_regex = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
	if (!preg_match($email_regex, $email)) {
		array_push($msg_email, array("Please enter a valid email address", 0));
	}
	if (!preg_match($email_regex, $c_email)) {
		array_push($msg_email, array("Please enter a valid email confirmation", 0));
	}
	if ($email != $c_email) {
		array_push($msg_email, array("Emails do not match", 0));
	}
	if (!count($msg_email)) {
		$sql = "UPDATE tbl_customer SET email = ? WHERE customer_id = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt){
			$stmt->bind_param("si", $email, $_SESSION['user']['c_id']);
			if ($stmt->execute()) {
				array_push($msg_email, array("Your email updated successfully", 1));
				$_SESSION['user']['email'] = $email;
			} else {
				array_push($msg_email, array("An error has occurred on our end<br>Please try again later", 0));
			}
		} else {
			array_push($msg_email, array("An error has occurred on our end<br>Please try again later", 0));
		}
		$stmt->close();
	}
}

$msg_password = [];
$password = '';
$n_password = '';
$c_password = '';
if (isset($_POST) && !empty($_POST) && $_POST['update']=="password") {
	$password = $_POST['current_password'];
	$hash_password = hash("sha256", $password);
	$n_password = $_POST['new_password'];
	$c_password = $_POST['confirm_password'];
	if ($hash_password !== $row['password']) {
		array_push($msg_password, array("Incorrect password", 0));
	}
	if ($n_password != $c_password) {
		array_push($msg_password, array("Passwords do not match", 0));
	}
	$pwd_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
	if (!preg_match($pwd_regex, $n_password)) {
		array_push($msg_password, array("Passwords must have at least one lowercase character, one uppercase character, one digit and be minimum of 8 characters", 0));
	}
	if (!count($msg_password)) {
		$sql = "UPDATE tbl_customer SET password = ? WHERE customer_id = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt){
			$hash_password = hash("sha256", $n_password);
			$stmt->bind_param("si", $hash_password, $_SESSION['user']['c_id']);
			if ($stmt->execute()) {
				array_push($msg_password, array("Your password updated successfully", 1));
				$password = '';
				$n_password = '';
				$c_password = '';
			} else {
				array_push($msg_password, array("An error has occurred on our end<br>Please try again later", 0));
			}
		} else {
			array_push($msg_password, array("An error has occurred on our end<br>Please try again later", 0));
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
					<h1>My Account</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>My Account</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<section class="gray-bg text-center">
		<div class="container">
			<div class="col-md-3">
				<div class="list-group" style="font-weight: bold;">
					<a href="my_account.php" class="list-group-item active">My Account</a>
					<a href="order_history.php" class="list-group-item">Order History</a>
					<a href="addresses.php" class="list-group-item">Addresses</a>
					<a href="payment_methods.php" class="list-group-item">Payment Methods</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Personal Details</h3>
						</div>
						<div class="panel-body">
							<div id="error"><?=generateMessages($msg_details);?></div>
							<form class="form-horizontal form-group" method="post">
								<div class="form-group">
									<label for="first_name" class="col-sm-3 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?=$fname;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="last_name" class="col-sm-3 control-label">Last Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?=$lname;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?=$phone;?>">
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="update" value="details">Update Details</button>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Change Email Address</h3>
						</div>
						<div class="panel-body">
							<div id="error"><?=generateMessages($msg_email);?></div>
							<form class="form-horizontal form-group" method="post">
								<div class="form-group">
									<label for="new_email" class="col-sm-3 control-label">New Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="new_email" name="new_email" placeholder="New Email" value="<?=$email;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="confirm_email" class="col-sm-3 control-label">Confirm email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="confirm_email" name="confirm_email" placeholder="Confirm New Email" value="<?=$c_email;?>">
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="update" value="email">Change Email</button>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Change Password</h3>
						</div>
						<div class="panel-body">
							<div id="error"><?=generateMessages($msg_password);?></div>
							<form class="form-horizontal form-group" method="post">
								<div class="form-group">
									<label for="current_password" class="col-sm-3 control-label">Current Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" value="<?=$password;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="new_password" class="col-sm-3 control-label">New Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" value="<?=$n_password;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" value="<?=$c_password;?>">
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="update" value="password">Change Password</button>
							</form>
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