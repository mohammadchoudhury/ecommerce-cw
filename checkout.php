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
					<h1>Checkout</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Checkout</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-9" id="checkout">
				</div>
				<div class="col-md-3">
					<div class="panel panel-default" id="order-summary">
						<div class="panel-heading">
							<h3 class="text-uppercase">Order summary</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td>Subtotal</td>
										<th>&pound;35,000.00</th>
									</tr>
									<tr>
										<td>Shipping and handling</td>
										<th>&pound;0.00</th>
									</tr>
									<tr>
										<td>Tax</td>
										<th>&pound;7,000.00</th>
									</tr>
									<tr class="total">
										<td>Total</td>
										<th>&pound;42,000.00</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>