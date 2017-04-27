<?php
session_start();
if (!isset($_SESSION['user'])):
	header('Location: login.php');
endif;

include 'config.inc.php';
include 'functions.php';

if (isset($_POST) && !empty($_POST) && isset($_POST['option'])) {
	$_SESSION['checkout']['payment'] = $_POST['option'];
	header('Location: checkout_review.php');
}

$msg = [];
$name = '';
$card_type = '';
$card_number = '';
$month = '';
$year = '';
$cvv = '';
$holder_name = '';
if (isset($_POST) && !empty($_POST) && $_POST['submit']=="payment") {
	$name = $_POST['name'];
	$card_type = $_POST['type'];
	$card_number = $_POST['card_number'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$cvv = $_POST['cvv'];
	$holder_name = $_POST['holder_name'];
	if (!$name || !$card_type || !$card_number || !$month || !$year || !$cvv || !$holder_name) {
		array_push($msg, array("Please fill in all fields", 0));
	}
	$name_regex = "/^[a-z]+[a-z ]*[a-z]+$/i";
	if ($name && !preg_match($name_regex, $name)) {
		array_push($msg, array("Name must not have special characters", 0));
	}
	if (!$card_type) {
		array_push($msg, array("Please select a card type", 0));
	}
	if ($card_number && !validCard($card_number)) {
		array_push($msg, array("Card number is invalid", 0));
	}
	if ($month && !($month >= 1 && $month <= 12)) {
		array_push($msg, array("Month is invalid", 0));
	}
	if ($year && !($year >= 17 && $year <= 99)) {
		array_push($msg, array("Year is invalid", 0));
	}
	if ($cvv && ($card_type == 'AX' && strlen($cvv) != 4) || ($card_type != 'AX' && strlen($cvv) != 3)) {
		array_push($msg, array("CVV is invalid", 0));
	}
	$name_regex = "/^[a-z]+[a-z ]*[a-z]+$/i";
	if ($name && !preg_match($name_regex, $name)) {
		array_push($msg, array("Card holder name must not have special characters", 0));
	}
	if (!count($msg)) {
		$sql = "INSERT INTO tbl_payment_card(customer_id, card_number, type_code, name, holder_name, month, year, cvv) value (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("issssiii", $_SESSION['user']['c_id'], $card_number, $card_type, $name, $holder_name, $month, $year, $cvv);
		if ($stmt->execute()) {
			array_push($msg, array("Card successfully added", 1));
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
		$stmt->close();
		$name = '';
		$card_type = '';
		$card_number = '';
		$month = '';
		$year = '';
		$cvv = '';
		$holder_name = '';
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
						<li><a href="index.php">Home</a></li>
						<li>Checkout</li>
						<li>Payment</li>
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
								<li>
									<a href="checkout_address.php">
										<i class="glyphicon glyphicon-map-marker"></i> Address
									</a>
								</li>
								<li class="active">
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
							#checkout #paymentForm {
								margin-top: 20px;
							}
						</style>
						<div class="row">
							<div class="col-xs-12">
								<?php
								$sql = "SELECT * FROM tbl_payment_card WHERE customer_id = ?";
								$stmt = $mysqli->prepare($sql);
								$stmt->bind_param("i", $_SESSION['user']['c_id']);
								$stmt->execute();
								$result = $stmt->get_result();
								$stmt->close();
								?>
								<div class="panel-body tab-pane fade in active">
									<form id="addressOption" method="post">
										<?php while($row = $result->fetch_assoc()): ?>
											<div class="col-sm-6">
												<div class="btn btn-primary" data-toggle="buttons">
													<h3><?=$row['name']?></h3>
													<p><?="XXXX-XXXX-XXXX-".substr($row['card_number'], -4) .", ". $row['month'] ."/". $row['year'] .", ". $row['holder_name']?></p>
													<input type="radio" name="option" value="<?=$row['card_id']?>" onchange="selected(this);" required>
												</div>
											</div>
										<?php endwhile; ?>
										<div class="col-sm-6">
											<div class="btn btn-primary" data-toggle="buttons">
												<h3>Paypal</h3>
												<p>Use paypal account</p>
												<input type="radio" name="option" value="paypal" onchange="selected(this);">
											</div>
										</div>
									</form>
									<div class="col-sm-6">
										<div class="btn btn-primary" data-toggle="buttons">
											<h3>Other</h3>
											<p>Add a new card</p>
											<input type="radio" name="option" value="other" onchange="selected(this);">
										</div>
									</div>
									<div class="row">
										<div id="paymentForm" class="col-md-6 col-md-offset-3 well" style="display: none;">
											<form method="post">
												<div id="error"><?=generateMessages($msg);?></div>
												<div class="form-group">
													<input type="text" class="form-control" name="name" placeholder="Payment Name (e.g: current visa debit)" maxlength="16" value="<?=$name?>">
												</div>
												<div class="form-group">
													<select name="type" class="form-control">
														<option value="0" selected>--- Choose a card type ---</option>
														<?php
														$sql = "SELECT * FROM tbl_card_type ORDER BY name";
														$stmt = $mysqli->prepare($sql);
														$stmt->execute();
														$result = $stmt->get_result();
														$stmt->close();
														while ($row = $result->fetch_assoc()):
														?>
														<option value="<?=$row['type_code']?>" <?=($row['type_code']==$card_type)?"selected":""?>><?=$row['name']?></option>
													<?php endwhile; ?>
													</select>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="card_number" placeholder="Card Number (e.g: 4929728423938485)" maxlength="16" value="<?=$card_number?>">
												</div>
												<div class="form-inline form-group">
													<input type="number" style="width: 49%;" class="form-control" name="month" placeholder="Month (e.g: 01)" value="<?=$month?>">
													<input type="number" style="width: 49%;" class="form-control" name="year" placeholder="Year (e.g: 21)" value="<?=$year?>">
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="cvv" placeholder="CVV Code" maxlength="4" value="<?=$cvv?>">
												</div>
												<div class="form-group">
												<input type="text" class="form-control" name="holder_name" placeholder="Card Holder Name" value="<?=$holder_name?>">
												</div>
												<div class="pull-left">
													<button type="reset" class="btn btn-danger">Reset <i class="glyphicon glyphicon-erase"></i></button>
												</div>
												<div class="pull-right">
													<button type="submit" class="btn btn-primary" name="submit" value="payment">Add card <i class="glyphicon glyphicon-plus"></i></button>
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
								<button type="submit" form="addressOption" class="btn btn-primary">Select Payment <i class="glyphicon glyphicon-arrow-right"></i>
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
			var option = '<?=(isset($_SESSION['checkout']['payment']))?$_SESSION['checkout']['payment']:"other";?>';
			$("[value="+option+"]").prop('checked', true);
			if (option == "other") {	
				document.getElementById('paymentForm').style.display = 'block';
			}

		});
		function selected(elm) {
			if (elm.value == 'other') {
				document.getElementById('paymentForm').style.display = 'block';
			} else {
				document.getElementById('paymentForm').style.display = 'none';
			}
			$("[name=option]").prop('checked', false);
			$(elm).prop('checked', true);
		}
	</script>

</body>
</html>