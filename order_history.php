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
					<h1>Order History</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Order History</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg text-center">
		<div class="container">
			<div class="col-md-3">
				<div class="list-group" style="font-weight: bold;">
					<a href="my_account.php" class="list-group-item">My Account</a>
					<a href="order_history.php" class="list-group-item active">Order History</a>
					<a href="addresses.php" class="list-group-item">Addresses</a>
					<a href="payment_methods.php" class="list-group-item">Payment Methods</a>
				</div>
			</div>
			<style type="text/css">
				td, th {
					vertical-align: middle !important;
					text-align: center;
				}
			</style>
			<div class="col-md-9">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-uppercase">Order History</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Order Number</th>
										<th>Date</th>
										<th>Total</th>
										<th>Status</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>#1005</td>
										<td>20/04/2017</td>
										<td>&pound;252000</td>
										<td><span class="label label-danger">REFUNDED</span></td>
										<td><a href="#" class="btn btn-primary">View</a></td>
									</tr>
									<tr>
									<td>#1016</td>
										<td>20/04/2017</td>
										<td>&pound;252000</td>
										<td><span class="label label-success">DELIVERED</span></td>
										<td><a href="#" class="btn btn-primary">View</a></td>
									</tr>
									<tr>
										<td>#1027</td>
										<td>20/04/2017</td>
										<td>&pound;252000</td>
										<td><span class="label label-primary">PAID</span></td>
										<td><a href="#" class="btn btn-primary">View</a></td>
									</tr>
								</tbody>
							</table>
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