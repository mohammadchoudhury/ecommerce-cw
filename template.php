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
	<style type="text/css">
		#heading-breadcrumbs {
			padding:30px 0;
		}

		#heading-breadcrumbs h1 {
			margin: 0px;
			color:#333;
			text-transform:uppercase;
			font-size:30px;
			font-weight:700;
			letter-spacing:.08em
		}

		@media (max-width:991px) {
			#heading-breadcrumbs {
				text-align: center;
			}
			#heading-breadcrumbs h1 {
				margin-bottom: 5px;
			}
			.breadcrumb {
				text-align: center !important;
			}
		}

		.breadcrumb {
			margin: 0px;
		    padding: 5px 0px;
		    background-color: transparent;
		    text-align: right;
		    text-transform: uppercase;
		    letter-spacing: 3px;
		}
	</style>
	<div id="heading-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<h1>Page Title</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Page Title</li>
					</ul>

				</div>
			</div>
		</div>
	</div>



	<section class="dark-blue-bg text-center">
		<div class="container">
			<div class="row">
				<h1>Basic Page Template</h1>
				<p>Cool story bro!</p>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>