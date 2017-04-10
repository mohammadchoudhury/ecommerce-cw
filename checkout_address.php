<?php
include_once 'config.inc.php';
include_once 'functions.php';
session_start();
$msg = [];
if (isset($_POST) && !empty($_POST)) {
	$c_id = $_SESSION['user']['c_id'];
	$address = $_POST['address'];
	$town = $_POST['town'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$sql = "INSERT INTO tbl_address(customer_id, address, town, city, postcode) value (?, ?, ?, ?, ?)";
	$stmt = $mysqli->prepare($sql);
	if ($stmt){
		$stmt->bind_param("issss",$c_id, $address, $town, $city, $postcode);
		if ($stmt->execute()) {
			$_SESSION['checkout']['address'] = $mysqli->insert_id;
			header('Location: checkout_payment.php');
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
	} else {
		array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
	}
}
?>
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
					<!-- <form action="" method="get"> -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-pills nav-justified">
								<li class="active">
									<a href="#address" data-toggle="tab">
										<i class="glyphicon glyphicon-map-marker"></i> Address
									</a>
								</li>
								<!-- <li class="disabled">
									<a href="#delivery-method" data-toggle="tab" disabled>
										<i class="glyphicon glyphicon-road"></i> Delivery Method
									</a>
								</li> -->
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
						<div class="panel-body">
							
							<div><?=generateMessages($msg)?></div>
							<div class="row">
								<div class="col-xs-12">
									<div class="tab-content">
										<div class="panel-body tab-pane fade in active" id="address">
											<div class="col-md-6 col-md-push-3">
												<form id="form" action="" method="POST">
													<input type="text" class="form-control" name="address" placeholder="Address" required=""><br>
													<input type="text" class="form-control" name="town" placeholder="Town" required=""><br>
													<input type="text" class="form-control" name="city" placeholder="City" required=""><br>
													<input type="text" class="form-control" name="postcode" placeholder="Postcode" required=""><br>
												</form>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer clearfix">
							<div class="pull-right">
								<button id="nextTab" class="btn btn-primary" type="submit" form="form">Continue <i class="glyphicon glyphicon-arrow-right"></i></button>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
				<div class="col-md-3">
					<!-- <div class="panel panel-default" id="order-summary">
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
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.js"></script>
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