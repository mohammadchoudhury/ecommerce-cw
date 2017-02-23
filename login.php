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

<!-- 	<section class="white-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h2 class="text-uppercase">Login</h2>
							<p class="lead text-center">Already our customer?</p>
						</div>
						<div class="panel-body">
							<form id="login_form">
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
							</form>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-primary" form="login_form">Log in <i class="glyphicon glyphicon-log-in"></i></button>
							<button type="reset" class="btn btn-danger" form="login_form">Reset <i class="glyphicon glyphicon-erase"></i></button>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="text-center">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<div class="well">
							<form action="login.php" method="post">
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
								<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
								<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="well text-center">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<form action="login.php" method="post">
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
							<hr style="border-color: #2c3e50;">
							<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
							<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<form id="login_form" method="post" action="login.php" onsubmit="return validateLogin(this.value);">
						<div class="panel panel-default text-center">
							<div class="panel-heading">
								<h2 class="text-uppercase">Login</h2>
								<p class="lead text-center">Already our customer?</p>
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

				<!-- <div class="col-md-4">
					<div class="text-center">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<div class="well">
							<form action="login.php" method="post">
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
								<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
								<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="well text-center">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<form action="login.php" method="post">
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
							<hr style="border-color: #2c3e50;">
							<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
							<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
						</form>
					</div>
				</div> -->
			</div>
		</div>
	</section>


<!-- 	<style type="text/css">
		.white-bg {
			background-color: white;
		}
	</style>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h2 class="text-uppercase">Login</h2>
							<p class="lead text-center">Already our customer?</p>
						</div>
						<div class="panel-body">
							<form id="login_form">
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
							</form>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-primary" form="login_form">Log in <i class="glyphicon glyphicon-log-in"></i></button>
							<button type="reset" class="btn btn-danger" form="login_form">Reset <i class="glyphicon glyphicon-erase"></i></button>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="text-center">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<div class="well white-bg">
							<form action="login.php" method="post">
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
								<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
								<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="well text-center white-bg">
						<h2 class="text-uppercase">Login</h2>
						<p class="lead">Already our customer?</p>
						<hr style="border-color: #2c3e50;">
						<form action="login.php" method="post">
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
							<hr style="border-color: #2c3e50;">
							<button type="submit" class="btn btn-primary">Log in <i class="glyphicon glyphicon-log-in"></i></button>
							<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<?php include 'footer.php'; ?>

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		function validateLogin() {
			var form = document.getElementById("login_form");
			var email = form['email'].value;
			var password = form['password'].value;
			var errors = "";
			if (!email || !password) {
				errors += "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>Must enter username and password</div>";
			}
			var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			if (!email_regex.test(email)) {
				errors += "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>Email address is invalid</div>";
			}
			console.log(errors == '');
			document.getElementById("error").innerHTML = errors;
			return errors == '';
		}
	</script>

</body>
</html>