<?php
session_start();
if (!isset($_SESSION['user'])):
	header('Location: login.php');
endif;

include 'config.inc.php';
include 'functions.php';

if (isset($_POST) && !empty($_POST) && isset($_POST['confirm'])) {
	$confirm = $_POST['confirm'];
	if ($confirm == "yes") {
		if ($_SESSION['checkout']['payment'] == "paypal") {
			$sql = "INSERT INTO tbl_order (customer_id, address_id, subtotal, total) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("iidd", $_SESSION['user']['c_id'], $_SESSION['checkout']['address'], $_POST['subtotal'], $_POST['total']);
		} else {
			$sql = "INSERT INTO tbl_order (customer_id, address_id, card_id, subtotal, total) VALUES (?, ?, ?, ?, ?)";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("iiidd", $_SESSION['user']['c_id'], $_SESSION['checkout']['address'],  $_SESSION['checkout']['payment'], $_POST['subtotal'], $_POST['total']);
		}
		$stmt->execute();
		$stmt->close();
		$order_id = $mysqli->insert_id;
		$sql = "INSERT INTO tbl_order_details (order_id, car_id, quantity) VALUES (?, ?, ?);";
		$stmt_insert = $mysqli->prepare($sql);
		$sql = " UPDATE tbl_car SET stock = stock - ? WHERE car_id = ?;";
		$stmt_update = $mysqli->prepare($sql);
		foreach ($_SESSION['cars'] as $car_id => $quantity) {
			$stmt_insert->bind_param("iii", $order_id, $car_id, $quantity);
			$stmt_insert->execute();
			$stmt_update->bind_param("ii", $quantity, $car_id);
			$stmt_update->execute();
		}
		unset($_SESSION['cars']);
		header('Location: order_history.php?id='.$order_id);
	} else {
		unset($_SESSION['cars']);
		header('Location: basket.php');
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
						<li>Order Review</li>
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
								<li>
									<a href="checkout_payment.php">
										<i class="glyphicon glyphicon-credit-card"></i> Payment
									</a>
								</li>
								<li class="active">
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
						</style>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<table class="table-condensed">
										<?php
										$sql = "SELECT * FROM tbl_address WHERE address_id = ?";
										$stmt = $mysqli->prepare($sql);
										$stmt->bind_param("i", $_SESSION['checkout']['address']);
										$stmt->execute();
										$result = $stmt->get_result();
										$stmt->close();
										$row = $result->fetch_assoc();
										?>
										<tr>
											<th>Address Name</th>
											<td><?=$row['name']?></td>
										</tr>
										<tr>
											<th>Address</th>
											<td><?=$row['address']?></td>
										</tr>
										<tr>
											<th>Town</th>
											<td><?=$row['town']?></td>
										</tr>
										<tr>
											<th>City</th>
											<td><?=$row['city']?></td>
										</tr>
										<tr>
											<th>Postcode</th>
											<td><?=$row['postcode']?></td>
										</tr>
									</table>
								</div>
								<div class="col-md-6">
									<table class="table-condensed">
										<?php
										if ($_SESSION['checkout']['payment'] == "paypal"):
											?>
										<tr>
											<th>Payment Type</th>
											<td>Paypal</td>
										</tr>
										<tr>
											<th>Email</th>
											<td><?=$_SESSION['user']['email']?></td>
										</tr>
										<?php
										else:
											$sql = "SELECT card_number, c.name AS c_name, holder_name, month, year, t.name AS t_name FROM tbl_payment_card c, tbl_card_type t WHERE c.type_code = t.type_code AND card_id = ?";
										$stmt = $mysqli->prepare($sql);
										$stmt->bind_param("i", $_SESSION['checkout']['payment']);
										$stmt->execute();
										$result = $stmt->get_result();
										$stmt->close();
										$row = $result->fetch_assoc();
										?>
										<tr>
											<th>Card Name</th>
											<td><?=$row['c_name']?></td>
										</tr>
										<tr>
											<th>Card Type</th>
											<td><?=$row['t_name']?></td>
										</tr>
										<tr>
											<th>Card Holder Name</th>
											<td><?=$row['holder_name']?></td>
										</tr>
										<tr>
											<th>Card Number</th>
											<td><?="XXXX-XXXX-XXXX-".substr($row['card_number'], -4)?></td>
										</tr>
										<tr>
											<th>Date of Expiry</th>
											<td><?=$row['month']."/".$row['year']?></td>
										</tr>
									<?php endif; ?>
								</table>
							</div>
						</div>
					</div>
					<div class="table-responsive" id="basket">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Quantity</th>
									<th>Unit price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id AND car_id = ?";
								$stmt = $mysqli->prepare($sql);
								$subtotal = 0;
								foreach ($_SESSION['cars'] as $id => $quantity):
									$stmt->bind_param("i",$id);
								$stmt->execute();
								$result = $stmt->get_result();
								$row = $result->fetch_assoc();
								?>
								<tr>
									<td class="text-center"><a href="car_details.php?id=<?=$row['car_id']?>"><img class="img-thumbnail img-responsive" src="<?=$row['image_url']?>" style="height: 50px;"></a></td>
									<td><a href="car_details.php?id=<?=$row['car_id']?>"><?=$row['make_name'] . " " .$row['model']?></a></td>
									<td><?=$quantity?></td>
									<td>&pound;<?=$row['price']?></td>
									<td>&pound;<?=$row['price']*$quantity?></td>
								</tr>
								<?php
								$subtotal += $row['price']*$quantity;
								endforeach;
								?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-right" colspan="4">Subtotal</th>
									<th>&pound;<?=$subtotal?></th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-left">
							<a href="cars.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Continue shopping</a>
						</div>
						<div class="pull-right">
							<form method="post">
								<button type="submit" class="btn btn-danger" name="confirm" value="no">Cancel Purchase <i class="glyphicon glyphicon-trash"></i>
								</button>
								<input type="hidden" name="subtotal" value="<?=$subtotal?>">
								<input type="hidden" name="total" value="<?=$subtotal*1.2?>">
								<button type="submit" class="btn btn-primary" name="confirm" value="yes">Confirm Purchase <i class="glyphicon glyphicon-shopping-cart"></i>
								</button>
							</form>
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
</script>

</body>
</html>