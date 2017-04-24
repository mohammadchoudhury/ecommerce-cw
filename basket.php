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

							<?php
							include_once 'config.inc.php';
							if (@sizeof($_SESSION['cars']) == 0):
								?>
							<div class="panel-heading"><h4>You currently have no cars in the basket</h4></div>
							<?php
							else:
								?>

							<div class="panel-heading"><h4>You currently have <?=@sizeof($_SESSION['cars'])?> individual car(s) in your basket</h4></div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Product</th>
											<th>Quantity</th>
											<th>Unit price</th>
											<th colspan="4">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id AND car_id = ?";
										$stmt = $mysqli->prepare($sql);
										$total = 0;
										foreach ($_SESSION['cars'] as $id => $quantity):
											$stmt->bind_param("i",$id);
											$stmt->execute();
											$result = $stmt->get_result();
											$row = $result->fetch_assoc();
										?>
										<tr>
											<td class="text-center"><a href="car_details.php?id=<?=$row['car_id']?>"><img class="img-thumbnail" src="<?=$row['image_url']?>"></a></td>
											<td><a href="car_details.php?id=<?=$row['car_id']?>"><?=$row['make_name'] . " " .$row['model']?></a></td>
											<td><input class="form-control" type="number" min="1" max="9" maxlength="1" value="<?=$quantity?>" name="quantity<?=$row['car_id']?>" onchange='updateBasket("upd", <?=$row['car_id']?>);'></td>
											<td>&pound;<?=$row['price']?></td>
											<td>&pound;<?=$row['price']*$quantity?></td>
											<td class="text-center"><a onclick="updateBasket('del', <?=$row['car_id']?>);"><i class="glyphicon glyphicon-trash"></i></a>
											</td>
										</tr>

										<?php
											$total += $row['price']*$quantity;
										endforeach;
										?>
									</tbody>
									<tfoot>
										<tr>
											<th class="text-right" colspan="5">Subtotal</th>
											<th colspan="2">&pound;<?=$total?></th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="panel-footer clearfix">
								<div class="pull-left">
									<a href="cars.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Continue shopping</a>
								</div>
								<div class="pull-right">
								<?php 
								if (!empty($_SESSION['user']['email'])) {
									echo '<a href="checkout_address.php" class="btn btn-primary">Proceed to checkout <i class="glyphicon glyphicon-arrow-right"></i></a>';
								} else {
									echo "<h4>Please login to continue with purchase.</h4>";
								}
								?>
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
											<th>&pound;<?=$total?></th>
										</tr>
										<tr>
											<td>Tax</td>
											<th>&pound;<?=$total*0.2?></th>
										</tr>
										<tr class="total">
											<td>Total</td>
											<th>&pound;<?=$total*=1.2?></th>
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
				<?php
				endif;
				?>

			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function updateBasket(action, id, result) {
			$.ajax({
				url: "ajax/basket.php",
				success: function(result){
					$(".nav li span.badge").html(result);
				},
				type: 'POST',
				data: action + "=" + id
					+ "&quantity=" + document.getElementsByName("quantity"+id)[0].value
			});
			location.reload();
		}
	</script>

</body>
</html>