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
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="#address" data-toggle="tab">
										<i class="glyphicon glyphicon-map-marker"></i> Address
									</a>
								</li>
								<li>
									<a href="#delivery" data-toggle="tab">Delivery Method</a>
								</li>
								<li>
									<a href="#payment" data-toggle="tab">Payment</a>
								</li>
								<li>
									<a href="#order-review" data-toggle="tab">Order Review</a>
								</li>
							</ul>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content">
									<div class="panel-body tab-pane fade in active" id="address">
										<div class="col-sm-6">
											<h3>Home</h3>
											<p>Northampton Square, London, EC1V 0HB</p>
											<input type="radio" name="address">
										</div>
										<div class="col-sm-6">
											<h3>Office</h3>
											<p>Northampton Square, London, EC1V 0HB</p>
											<input type="radio" name="address">
										</div>
										<div class="col-sm-6">
											<h3>Warehouse</h3>
											<p>Northampton Square, London, EC1V 0HB</p>
											<input type="radio" name="address">
										</div>
										<div class="col-sm-6">
											<h3>Head Office</h3>
											<p>Northampton Square, London, EC1V 0HB</p>
											<input type="radio" name="address">
										</div>
									</div>
									<div class="panel-body tab-pane fade" id="delivery">
										<div class="col-sm-6">
											<h3>Next Day</h3>
											<p>Free next working day delivery</p>
											<input type="radio" name="delivery">
										</div>
										<div class="col-sm-6">
											<h3>Weekend</h3>
											<p>Delivery during weekend</p>
											<input type="radio" name="delivery">
										</div>
										<div class="col-sm-6">
											<h3>Anytime hour slot</h3>
											<p>Choose an hour any day between 9AM - 9PM</p>
											<input type="radio" name="delivery">
										</div>
									</div>
									<div class="panel-body tab-pane fade" id="payment">
										<div class="col-sm-6">
											<h3>Paypal</h3>
											<p>Use paypal gateway</p>
											<input type="radio" name="payment">
										</div>
										<div class="col-sm-6">
											<h3>Credit/Debit Card</h3>
											<p>Pay using your saved cards</p>
											<input type="radio" name="payment">
										</div>
										<div class="col-sm-6">
											<h3>Cash</h3>
											<p>Cash on delivery</p>
											<input type="radio" name="payment">
										</div>
									</div>
									<div class="tab-pane fade" id="order-review">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th colspan="2">Product</th>
														<th>Quantity</th>
														<th>Unit price</th>
														<th>Discount</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center"><a href="#"><img class="img-thumbnail" src="http://www.freeiconspng.com/uploads/car-icon-27.png"></a></td>
														<td><a href="#">BMW 3 Series M Sport</a></td>
														<td>2</td>
														<td>£10,000.00</td>
														<td>£0.00</td>
														<td>£20,000.00</td>
													</tr>
													<tr>
														<td class="text-center"><a href="#"><img class="img-thumbnail" src="http://www.freeiconspng.com/uploads/car-icon-27.png"></a></td>
														<td><a href="#">BMW 3 Series M Sport</a></td>
														<td>1</td>
														<td>£15,000.00</td>
														<td>£0.00</td>
														<td>£15,000.00</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<th class="text-right" colspan="5">Subtotal</th>
														<th colspan="2">£35,000.00</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer clearfix">
							<div class="pull-left">
								<a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Continue shopping</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Proceed <i class="glyphicon glyphicon-arrow-right"></i>
								</button>
							</div>
						</div>
					</div>
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