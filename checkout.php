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
				<form action="" method="get">
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-pills nav-justified">
								<li class="active">
									<a href="#address" data-toggle="tab">
										<i class="glyphicon glyphicon-map-marker"></i> Address
									</a>
								</li>
								<li class="disabled">
									<a href="#delivery-method" data-toggle="tab" disabled>
										<i class="glyphicon glyphicon-road"></i> Delivery Method
									</a>
								</li>
								<li class="disabled">
									<a href="#payment" data-toggle="tab">
										<i class="glyphicon glyphicon-credit-card"></i> Payment
									</a>
								</li>
								<li class="disabled">
									<a href="#order-review" data-toggle="tab">
										<i class="glyphicon glyphicon-shopping-cart"></i> Order Review
									</a>
								</li>
							</ul>
						</div>
						<style type="text/css">
							#checkout div.btn {
								width: 100%;
								margin-top: 10px;
								margin-bottom: 10px;
							}
							#checkout div.btn-primary.active {
								background-color: #337ab7;
								border-color: #2e6da4;
								box-shadow: none;
							}
							#checkout div.btn-primary.active:hover,
							#checkout div.btn-primary:active {
								background-color: #286090;
								border-color: #204d74;
							}
							#checkout div.btn-default.active {
								background-color: #fff;
								border-color: #ccc;
								box-shadow: none;
							}
							#checkout div.btn-default.active:hover,
							#checkout div.btn-default:active {
								background-color: #e6e6e6;
								border-color: #adadad;
							}
							#checkout div.focus {
								box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.125) inset;
							}
							#checkout li.disabled {
								cursor: not-allowed;
							}
							#checkout li.disabled a {
								pointer-events: none;
							}
						</style>
						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content">
									<div class="panel-body tab-pane fade in active" id="address">
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Home</h3>
												<p>Northampton Square, London, EC1V 0HB</p>
												<input type="radio" name="address" value="1" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Office</h3>
												<p>Northampton Square, London, EC1V 0HB</p>
												<input type="radio" name="address" value="2" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Warehouse</h3>
												<p>Northampton Square, London, EC1V 0HB</p>
												<input type="radio" name="address" value="3" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Head Office</h3>
												<p>Northampton Square, London, EC1V 0HB</p>
												<input type="radio" name="address" value="4" required>
											</div>
										</div>
									</div>
									<div class="panel-body tab-pane fade" id="delivery-method">
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Next Day</h3>
												<p>Free next working day delivery</p>
												<input type="radio" name="delivery">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Weekend</h3>
												<p>Delivery during weekend</p>
												<input type="radio" name="delivery">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Anytime hour slot</h3>
												<p>Choose an hour any day between 9AM - 9PM</p>
												<input type="radio" name="delivery">
											</div>
										</div>
									</div>
									<div class="panel-body tab-pane fade" id="payment">
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Paypal</h3>
												<p>Use paypal gateway</p>
												<input type="radio" name="payment">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Credit/Debit Card</h3>
												<p>Pay using your saved cards</p>
												<input type="radio" name="payment">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Cash</h3>
												<p>Cash on delivery</p>
												<input type="radio" name="payment">
											</div>
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
								<a id="nextTab" class="btn btn-primary" href="#delivery-method" onclick="selectTab(this.hash);">Continue <i class="glyphicon glyphicon-arrow-right"></i></a>
								<button type="submit" class="btn btn-primary" style="display: none;">Proceed <i class="glyphicon glyphicon-arrow-right"></i>
								</button>
							</div>
						</div>
					</div>
				</form>
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
	<script type="text/javascript">
		selectTab();
		function getAnchor() {
			return document.location.toString().split('#')[1];
		}
		function selectTab(hash) {
			if (hash) {
				$('.nav-pills a[href="' + hash + '"]').tab('show');
			} else {
				$('.nav-pills a[href="#' + getAnchor() + '"]').tab('show');
			}
		}
		$('.nav-pills a').on('shown.bs.tab', function (e) {
			window.location.hash = e.target.hash;
			nextTab = document.getElementById("nextTab");
			console.log(nextTab);
			console.log(nextTab.nextElementSibling);
			switch(getAnchor()) {
				case '':
				case 'address':
					nextTab.style.display = 'inline-block';
					nextTab.nextElementSibling.style.display = "none";
					nextTab.hash = "delivery-method";
					break;
				case 'delivery-method':
					nextTab.style.display = 'inline-block';
					nextTab.nextElementSibling.style.display = "none";
					nextTab.hash = "payment";
					break;
				case 'payment':
					nextTab.style.display = 'inline-block';
					nextTab.nextElementSibling.style.display = "none";
					nextTab.hash = "order-review";
					break;
				case 'order-review':
					nextTab.style.display = 'none';
					nextTab.nextElementSibling.style.display = "inline-block";
					break;
				default:
			}
		});
	</script>

</body>
</html>