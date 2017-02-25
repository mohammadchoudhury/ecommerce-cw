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
					<h1>Basket</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li>Basket</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-9" id="basket">
					<form method="post" action="">
						<div class="panel panel-default">
							<div class="panel-heading"><h4>You currently have 3 item(s) in your basket</h4></div>
							
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Product</th>
											<th>Quantity</th>
											<th>Unit price</th>
											<th>Discount</th>
											<th colspan="4">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center"><a href="#"><img class="img-thumbnail" src="http://www.freeiconspng.com/uploads/car-icon-27.png"></a></td>
											<td><a href="#">BMW 3 Series M Sport</a></td>
											<td><input class="form-control" type="number" min="1" max="9" maxlength="1" value="2"></td>
											<td>&pound;10,000.00</td>
											<td>&pound;0.00</td>
											<td>&pound;20,000.00</td>
											<td class="text-center"><a href="#"><i class="glyphicon glyphicon-trash"></i></a>
											</td>
										</tr>
										<tr>
											<td class="text-center"><a href="#"><img class="img-thumbnail" src="http://www.freeiconspng.com/uploads/car-icon-27.png"></a></td>
											<td><a href="#">BMW 3 Series M Sport</a></td>
											<td><input class="form-control" type="number" min="1" max="9" maxlength="1" value="1"></td>
											<td>&pound;15,000.00</td>
											<td>&pound;0.00</td>
											<td>&pound;15,000.00</td>
											<td class="text-center"><a href="#"><i class="glyphicon glyphicon-trash"></i></a>
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th class="text-right" colspan="5">Subtotal</th>
											<th colspan="2">&pound;35,000.00</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="panel-footer clearfix">
								<div class="pull-left">
									<a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Continue shopping</a>
								</div>
								<div class="pull-right">
									<button class="btn btn-success">Update cart <i class="glyphicon glyphicon-refresh"></i></button>
									<button type="submit" class="btn btn-primary">Proceed to checkout <i class="glyphicon glyphicon-arrow-right"></i>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-3">
					<div class="panel-group">
						<div class="panel panel-default" id="order-summary">
							<div class="panel-heading">
								<h3 class="text-uppercase">Order summary</h3>
							</div>
							<!-- <div class="panel-body"> -->
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
							<!-- </div> -->
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="text-uppercase">Coupon code</h4>
							</div>
							<div class="panel-body">
								<p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
								<form lpformnum="1">
									<div class="input-group">
										<input class="form-control" type="text">
										<span class="input-group-btn">
											<button class="btn btn-warning" type="button"><i class="glyphicon glyphicon-gift"></i></button>
										</span>
									</div>
								</form>
							</div>
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