<header class="gray-bg hidden-xs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<a href="index.php">
					<img height="80px" src="img/logo.png">
					<h1>Dream Cars</h1>
				</a>
			</div>
			<div class="col-sm-6 header-item">
				<p>
					<i class="glyphicon glyphicon-phone-alt"></i> <a href="tel:+442075156521">+44 20 7515 6521</a>
					<i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@dreamcars.co.uk">info@dreamcars.co.uk</a>
				</p>
			</div>
		</div>
	</div>
</header>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="70">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand visible-xs" href="index.php">Dream Cars <img class="visible-xs-inline" height="20px" src="img/logo-white.png"></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navigation">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php">Home</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Cars <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cars_ajax.php">All</a></li>
						<hr>
						<?php
						include_once 'config.inc.php';
						$sql = "SELECT * FROM tbl_make";
						$stmt = $mysqli->prepare($sql);
						$stmt->execute();
						$result = $stmt->get_result();
						$num_rows = $result->num_rows;
						while ($make = $result->fetch_assoc()) {
							echo "<li><a href='cars_ajax.php?make=$make[make_id]'>$make[make_name]</a></li>";
						}
						?>
					</ul>
				</li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">About Us</a></li>
			</ul>
			<hr class="visible-xs">
			<ul class="nav navbar-nav navbar-right">
				<?php @session_start(); ?>
				<li><a href="basket.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket <span class="badge"><?=@count($_SESSION['cars'])?></span></a></li>
				<?php if (!empty($_SESSION['user']['email'])): ?>
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				<?php else: ?>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Regisiter</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>