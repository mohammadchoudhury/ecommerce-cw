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
								<div id="error"></div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="email" type="text" class="form-control" name="email" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="password" type="password" class="form-control" name="password" placeholder="Password">
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