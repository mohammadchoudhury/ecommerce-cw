<?php
include_once '../config.inc.php';

session_start();

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM tbl_order WHERE customer_id = ? AND order_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $_SESSION['user']['c_id'], $order_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$row = $result->fetch_assoc();
?>

<div class="modal-header gray-bg">
	<?php
	$color = 'primary';
	switch ($row['status']) {
		case 'DELIVERED':
		$color = 'success';
		break;
		case 'REFUNDED':
		$color = 'danger';
		break;
	}
	?>
	<h4 class="modal-title">Order #<?=$row['order_id']?> - <span class="label label-<?=$color?>"><?=$row['status']?></span><span class="text-info pull-right"><?=$row['order_date']?></span></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="text-center">
			<h4>Customer Details</h4>
			<p>#<?=$_SESSION['user']['c_id']?> - <?=$_SESSION['user']['name']?></p>
		</div>
		<div class="col-md-6">
			<table class="table-condensed">
				<?php
				$sql = "SELECT * FROM tbl_address WHERE address_id = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("i", $row['address_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$stmt->close();
				$address = $result->fetch_assoc();
				?>
				<tr>
					<th>Address Name</th>
					<td><?=$address['name']?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?=$address['address']?></td>
				</tr>
				<tr>
					<th>Town</th>
					<td><?=$address['town']?></td>
				</tr>
				<tr>
					<th>City</th>
					<td><?=$address['city']?></td>
				</tr>
				<tr>
					<th>Postcode</th>
					<td><?=$address['postcode']?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table-condensed">
				<?php
				if ($row['card_id'] == "0"):
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
				$stmt->bind_param("i", $row['card_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$stmt->close();
				$card_details = $result->fetch_assoc();
				?>
				<tr>
					<th>Card Name</th>
					<td><?=$card_details['c_name']?></td>
				</tr>
				<tr>
					<th>Card Type</th>
					<td><?=$card_details['t_name']?></td>
				</tr>
				<tr>
					<th>Card Holder Name</th>
					<td><?=$card_details['holder_name']?></td>
				</tr>
				<tr>
					<th>Card Number</th>
					<td><?="XXXX-XXXX-XXXX-".substr($card_details['card_number'], -4)?></td>
				</tr>
				<tr>
					<th>Date of Expiry</th>
					<td><?=$card_details['month']."/".$card_details['year']?></td>
				</tr>
				<?php endif; ?>
			</table>
		</div>
	</div>
	<br>
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
				$sql = "SELECT * FROM tbl_car c, tbl_make m, tbl_order_details o WHERE c.make_id = m.make_id AND o.car_id = c.car_id AND o.order_id = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("i", $row['order_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($order_details = $result->fetch_assoc()):
				?>
				<tr>
					<td class="text-center"><a href="car_details.php?id=<?=$order_details['car_id']?>"><img class="img-thumbnail img-responsive" src="<?=$order_details['image_url']?>" style="height: 50px;"></a></td>
					<td><a href="car_details.php?id=<?=$order_details['car_id']?>"><?=$order_details['make_name'] . " " .$order_details['model']?></a></td>
					<td><?=$order_details['quantity']?></td>
					<td>&pound;<?=$order_details['price']?></td>
					<td>&pound;<?=$order_details['price']*$order_details['quantity']?></td>
				</tr>
				<?php
				endwhile;
				?>
			</tbody>
			<tfoot>
				<tr>
					<th class="text-right" colspan="4">Subtotal</th>
					<th>&pound;<?=$row['subtotal']?></th>
				</tr>
				<tr>
					<th class="text-right" colspan="4">VAT</th>
					<th>&pound;<?=$row['subtotal']*0.2?></th>
				</tr>
				<tr>
					<th class="text-right" colspan="4">Total</th>
					<th>&pound;<?=$row['total']?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<div class="modal-footer gray-bg">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
