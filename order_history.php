<?php
session_start();
if (!isset($_SESSION['user'])):
	header('Location: login.php');
endif;
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
						<?php
						$sql = "SELECT * FROM tbl_order WHERE customer_id = ? ORDER BY order_date DESC";
						$stmt = $mysqli->prepare($sql);
						$stmt->bind_param("i", $_SESSION['user']['c_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();

						if ($result->num_rows == 0):
							?>
						<div class="panel-heading">
							<h3 class="text-uppercase">No previous orders</h3>
						</div>
						<?php
						else:				
							?>
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
									<?php
									while ($row = $result->fetch_assoc()):
										?>
									<tr>
										<td>#<?=$row['order_id']?></td>
										<td><?=$row['order_date']?></td>
										<td>&pound;<?=$row['total']?></td>
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
										<td><span class="label label-<?=$color?>"><?=$row['status']?></span></td>
										<td><button type="button" class="btn btn-primary" onclick="getOrderDetails(<?=$row['order_id']?>);" id="view_<?=$row['order_id']?>">View</button></td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div id="order_modal" class="modal fade" style="z-index: 10000">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div id="order_modal_content" class="modal-content">
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function getOrderDetails(id) {
		$.ajax({
			url: "ajax/order_details.php",
			success: function(result){
				$("#order_modal_content").html(result);
			},
			type: 'GET',
			data: "order_id=" + id
		});
		$("#order_modal").modal();
	}

	$(document).ready(function() {
		console.log();
		if (getUrlVars()['id'] != undefined) {
			$("#view_"+getUrlVars()['id']).click();
		}
	});
	function getUrlVars(){
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++){
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}
</script>
</body>
</html>