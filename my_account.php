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
							<form class="form-horizontal">
								<div class="form-group">
									<label for="first_name" class="col-sm-3 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="first_name" placeholder="First Name">
									</div>
								</div>
								<div class="form-group">
									<label for="last_name" class="col-sm-3 control-label">Last Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="last_name" placeholder="Last Name">
									</div>
								</div>
								<div class="form-group">
									<label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="phone_number" placeholder="Phone Number">
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Update Details</button>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Change Email Address</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label for="new_email" class="col-sm-3 control-label">New Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="new_email" placeholder="New Email">
									</div>
								</div>
								<div class="form-group">
									<label for="confirm_email" class="col-sm-3 control-label">Confirm email</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="confirm_email" placeholder="Confirm New Email">
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Change Email</button>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Change Password</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label for="current_password" class="col-sm-3 control-label">Current Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="current_password" placeholder="Current Password">
									</div>
								</div>
								<div class="form-group">
									<label for="new_password" class="col-sm-3 control-label">New Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="new_password" placeholder="New Password">
									</div>
								</div>
								<div class="form-group">
									<label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="confirm_password" placeholder="Confirm New Password">
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Change Password</button>
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