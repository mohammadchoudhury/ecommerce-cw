<?php
session_start();
if (!isset($_SESSION['user'])):
	header('Location: login.php');
endif;

include 'config.inc.php';
include 'functions.php';

if (isset($_POST) && !empty($_POST) && isset($_POST['option'])) {
	$_SESSION['checkout']['address'] = $_POST['option'];
	header('Location: checkout_payment.php');
}

$msg = [];
$name = '';
$address = '';
$town = '';
$city = '';
$postcode = '';
if (isset($_POST) && !empty($_POST) && $_POST['submit']=="address") {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$town = $_POST['town'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	if (!$name || !$address || !$town || !$city || !$postcode) {
		array_push($msg, array("Please fill in all fields", 0));
	}
	$name_regex = "/^[a-z]+(-)?[a-z]*$/i";
	if ($name && !preg_match($name_regex, $name)) {
		array_push($msg, array("Name must not have special characters", 0));
	}
	$address_regex = "/^[0-9a-z ]+$/i";
	if ($address && !preg_match($address_regex, $address)) {
		array_push($msg, array("Address must not have special characters", 0));
	}
	$regex = "/^[a-z ]+$/i";
	if ($town && !preg_match($regex, $town)) {
		array_push($msg, array("Town must not have special characters", 0));
	}
	if ($city && !preg_match($regex, $city)) {
		array_push($msg, array("City must not have special characters", 0));
	}
	$postcode_regex = "/^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}$/i";
	if ($postcode && !preg_match($postcode_regex, $postcode)) {
		array_push($msg, array("Enter a valid postcode", 0));
	}
	if (!count($msg)) {
		$sql = "INSERT INTO tbl_address(customer_id, name, address, town, city, postcode) value (?, ?, ?, ?, ?, ?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("isssss", $_SESSION['user']['c_id'], $name, $address, $town, $city, $postcode);
		if ($stmt->execute()) {
			array_push($msg, array("Address successfully added", 1));
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
		$stmt->close();
		$name = '';
		$address = '';
		$town = '';
		$city = '';
		$postcode = '';
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-pills nav-justified">
								<li class="active">
									<a href="checkout_address.php">
										<i class="glyphicon glyphicon-map-marker"></i> Address
									</a>
								</li>
								<li class="disabled">
									<a href="checkout_payment.php">
										<i class="glyphicon glyphicon-credit-card"></i> Payment
									</a>
								</li>
								<li class="disabled">
									<a href="checkout_review.php">
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
							#checkout #addressForm {
								margin-top: 20px;
							}
						</style>
						<div class="row">
							<div class="col-xs-12">
								<?php
								$sql = "SELECT * FROM tbl_address WHERE customer_id = ?";
								$stmt = $mysqli->prepare($sql);
								$stmt->bind_param("i", $_SESSION['user']['c_id']);
								$stmt->execute();
								$result = $stmt->get_result();
								$stmt->close();
								?>

								<div class="panel-body tab-pane fade in active" id="address">
									<form id="addressOption" method="post">
										<?php while($row = $result->fetch_assoc()): ?>
											<div class="col-sm-6">
												<div class="btn btn-primary" data-toggle="buttons">
													<h3><?=$row['name']?></h3>
													<p><?=$row['address'] .", ". $row['town'] .", ". $row['city'] .", ". $row['postcode']?></p>
													<input type="radio" name="option" value="<?=$row['address_id']?>" onchange="selected(this);" required>
												</div>
											</div>
										<?php endwhile; ?>
									</form>
									<div class="col-sm-6">
										<div class="btn btn-primary" data-toggle="buttons">
											<h3>Other</h3>
											<p>Add a new address</p>
											<input type="radio" name="option" value="other" onchange="selected(this);">
										</div>
									</div>
									<div class="row">
										<div id="addressForm" class="col-md-6 col-md-offset-3 well" style="display: none;">
											<form method="post">
												<div id="error"><?=generateMessages($msg);?></div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														<input type="text" class="form-control" name="name" placeholder="Address Name (e.g Home)" value="<?=$name?>">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														<input type="text" class="form-control" name="address" placeholder="Address" value="<?=$address?>">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
														<input type="text" class="form-control" name="town" placeholder="Town" value="<?=$town?>">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
														<input type="text" class="form-control" name="city" placeholder="City" value="<?=$city?>">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
														<input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?=$postcode?>">
													</div>
												</div>
												<div class="pull-left">
													<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
												</div>
												<div class="pull-right">
													<button type="submit" class="btn btn-primary" name="submit" value="address">Add address <i class="glyphicon glyphicon-plus"></i></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer clearfix">
							<div class="pull-left">
								<a href="cars.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Continue shopping</a>
							</div>
							<div class="pull-right">
								<button type="submit" form="addressOption" class="btn btn-primary">Select Address <i class="glyphicon glyphicon-arrow-right"></i>
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
	<script type="text/javascript">
		$(document).ready(function() {
			var option = <?=(isset($_SESSION['checkout']['address']))?$_SESSION['checkout']['address']:"'other'";?>;
			$("[value="+option+"]").prop('checked', true);
			if (option == "other") {	
				document.getElementById('addressForm').style.display = 'block';
			}

		});
		function selected(elm) {
			if (elm.value == 'other') {
				document.getElementById('addressForm').style.display = 'block';
			} else {
				document.getElementById('addressForm').style.display = 'none';
			}
			$("[name=option]").prop('checked', false);
			$(elm).prop('checked', true);
		}
	</script>

</body>
</html>