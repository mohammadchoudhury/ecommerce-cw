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
					<h1>Cars</h1>
				</div>
				<div class="col-md-5">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a>
						</li>
						<li><a href="cars.php">Cars</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		#car_details {
			overflow: hidden;
		}

		#car_details .panel-heading * {
			display: inline-block;
		}

		#stars {
			color: #337ab7;
			font-size: 25px;
		}
	</style>
	<section class="gray-bg">
		<div class="container">
			<div class="col-md-9" id="car_details">
				<div class="panel panel-default">
					<?php
					include_once 'config.inc.php';
					include_once 'functions.php';
					$msg = [];
					$car_id = (isset($_GET['id']) ? $_GET['id'] : '');
					$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id AND car_id = ?";
					$stmt = $mysqli->prepare($sql);
					if ($stmt){
						$stmt->bind_param("i",$car_id);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							?>
							<div class="panel-heading clearfix">
								<h3><b><?=$row['make_name']." ".$row['model']?></b> - &pound;<?=$row['price']?></span></h3>
							</div>
							<div class="panel-body">
								<?php
								$sql = "SELECT * FROM tbl_image WHERE car_id = ?";
								$stmt = $mysqli->prepare($sql);
								if ($stmt){
									$stmt->bind_param("i",$car_id);
									$stmt->execute();
									$result = $stmt->get_result();
									$num_rows = $result->num_rows;
								}
								?>
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php
										for ($i=0; $i < $num_rows; $i++) { 
											echo ($i==0 ? "<li data-target='#myCarousel' data-slide-to='0' class='active'></li>" : "<li data-target='#myCarousel' data-slide-to='$i'></li>");
										}
										?>
									</ol>
									<div class="carousel-inner">
										<?php
										$i = 1;
										while ($row2 = $result->fetch_assoc()) {
											echo ($i==1 ? "<div class='item active'><img src='$row2[image_url]'></div>" : "<div class='item'><img src='$row2[image_url]'></div>");
											$i++;
										}
										?>
									</div>
									<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
								<br>
								<ul class="nav nav-pills nav-justified">
									<li class="active"><a href="#overview" data-toggle="tab">Car Overview</a></li>
									<li><a href="#specification" data-toggle="tab">Specification</a></li>
									<li><a href="#extras" data-toggle="tab">Extras</a></li>
									<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
								</ul>
								<div class="tab-content" style="padding: 15px">
									<div id="overview" class="tab-pane fade in active">
										<h3>Totally random text (Nothing to do with car)</h3>
										<?=$row['description']?>
									</div>
									<div id="specification" class="tab-pane fade">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th colspan="2">BASIC INFO</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Price</td>
													<td>&pound;<?=$row['price']?></td>
												</tr>
												<tr>
													<td>Body Shape</td>
													<td><?=$row['body_shape']?></td>
												</tr>
												<tr>
													<td>Transmission</td>
													<td><?=$row['transmission']?></td>
												</tr>
												<tr>
													<td>Fuel Type</td>
													<td><?=$row['fuel_type']?></td>
												</tr>
											</tbody>
										</table>
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th colspan="2">TECHNICAL SPECIFICATION</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Engine Type</td>
													<td><?=$row['engine_type']?></td>
												</tr>
												<tr>
													<td>Top Speed</td>
													<td><?=$row['top_speed']?> MPH</td>
												</tr>
												<tr>
													<td>Horse Power</td>
													<td><?=$row['horse_power']?> HP</td>
												</tr>
												<tr>
													<td>Torque</td>
													<td><?=$row['torque']?> lb-ft</td>
												</tr>
												<tr>
													<td>No. of Doors</td>
													<td><?=$row['doors']?></td>
												</tr>
												<tr>
													<td>Emissions</td>
													<td><?=$row['emissions']?> g/km</td>
												</tr>
												<tr>
													<td>Seating Capacity</td>
													<td>5</td>
												</tr>
												<tr>
													<td>Fuel Capacity</td>
													<td><?=$row['fuel_capacity']?> L</td>
												</tr>
												<tr>
													<td>Seating Capacity</td>
													<td><?=$row['seating_capacity']?></td>
												</tr>
												<tr>
													<td>No. of Cylinders</td>
													<td><?=$row['no_of_cylinders']?></td>
												</tr>
											</tbody>
										</table>
										<p>Specification correct as of 2017 and provided by manufacturer</p>
									</div>
									<style type="text/css">
										td .glyphicon-remove {color: red;}
										td .glyphicon-ok {color: green;}
									</style>
									<div id="extras" class="tab-pane fade">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th colspan="2">Extras</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Air Conditioning</td>
													<td align="center">
														<?=($row['air_conditioning']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Antilock Braking System</td>
													<td align="center">
														<?=($row['antilock_braking_system']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Automatic Headlamps</td>
													<td align="center">
														<?=($row['automatic_headlamps']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Brake Assist</td>
													<td align="center">
														<?=($row['brake_assist']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>CD Player</td>
													<td align="center">
														<?=($row['cd_player']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Central Locking System</td>
													<td align="center">
														<?=($row['central_locking']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Crash Sensor</td>
													<td align="center">
														<?=($row['crash_sensor']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Driver Airbag</td>
													<td align="center">
														<?=($row['driver_airbag']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Engine Check Warning Light</td>
													<td align="center">
														<?=($row['engine_check_warning']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Leather Seats</td>
													<td align="center">
														<?=($row['leather_seats']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Passenger Airbag</td>
													<td align="center">
														<?=($row['passenger_airbag']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Power Door Locks</td>
													<td align="center">
														<?=($row['power_door_locks']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Power Steering</td>
													<td align="center">
														<?=($row['power_steering']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
												<tr>
													<td>Power Windows</td>
													<td align="center">
														<?=($row['power_windows']==0) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>"?>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div id="reviews" class="tab-pane fade">
										<!-- <div class="row" id="post-review-box">
											<div class="col-md-12">
												<form method="POST" action="">
													<textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea>
													<input type="hidden" id="rating" name="rating" value="0">
													<br>
													<div class="pull-left">
														<div id="stars"><span class="glyphicon glyphicon-star-empty" onclick="setRating(1);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(2);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(3);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(4);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(5);"></span></div>
													</div>
													<div class="pull-right">
														<button class="btn btn-danger" type="reset" style="margin-right: 10px;" onclick="setRating(0)"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
														<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
													</div>
												</form>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="well">
												<p><b>John Smith</b> - 5/5</p>
												<p>This car is sick bruv.</p>
											</div>
											<div class="well">
												<p><b>John Smith</b> - 5/5</p>
												<p>This car is sick bruv.</p>
											</div>
											<div class="well">
												<p><b>John Smith</b> - 5/5</p>
												<p>This car is sick bruv.</p>
											</div>
											<div class="well">
												<p><b>John Smith</b> - 5/5</p>
												<p>This car is sick bruv.</p>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<style type="text/css">
						#share-panel .panel-body {
							text-align: center;
						}
						#share-panel img {
							height: auto;
							width: 20%;
							padding: 10px;
						}

						#share-panel img:hover {
							background: #d5d5d5;
							border-radius: 25%;
						}
					</style>
					<div class="col-md-3">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="text-uppercase">Buy</h3>
								</div>
								<div class="panel-body">
									<form action="" method="get">
										<div class="form-group">
											<label>Stock</label>
											<?php if (!$row['stock']): ?>
												<div>Out of Stock</div>
											<?php elseif ($row['stock']<10): ?>
												<div><?=$row['stock']?> available</div>
											<?php else: ?>
												<div>10+ available</div>
											<?php endif ?>
										</div>
										<div class="form-group">
											<label>Price</label>
											<div id="price">&pound;<?=$row['price']?></div>
										</div>
										<?php if (!$row['stock']): ?>
											<button type="button" class="btn btn-danger form-control disabled" onclick="alert('Sorry. This vehicle is out of stock')">Out of Stock</button>
										<?php else: ?>
											<div class="form-group">
												<label>Quantity</label>
												<input type="number" name="quantity" class="form-control" min="1" max="<?=($row['stock']<9)?$row['stock']:9?>" placeholder="Enter quantity" value="1" required>
											</div>
											<?php if (isset($_SESSION['cars'][$row['car_id']])): ?>
												<button type="button" id="add_btn" class='btn btn-success pull-right form-control' onclick='updateBasket("add", <?=$row['car_id']?>)' style="display: none">Add to basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
												<button type="button" id="del_btn" class='btn btn-danger pull-right form-control' onclick='updateBasket("del", <?=$row['car_id']?>)'>Remove from basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
											<?php else: ?>
												<button type="button" id="del_btn" class='btn btn-danger pull-right form-control' onclick='updateBasket("del", <?=$row['car_id']?>)'  style="display: none">Remove from basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
												<button type="button" id="add_btn" class='btn btn-success pull-right form-control' onclick='updateBasket("add", <?=$row['car_id']?>)'>Add to basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
											<?php endif; ?>
										<?php endif; ?>
									</form>
								</div>
							</div>
							<div class="panel panel-default" id="share-panel">
								<div class="panel-heading">
									<h3 class="text-uppercase">Share car</h3>
								</div>
								<div class="panel-body">
									<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//example.com/car_details.php?id=?"><img src="img/share/facebook-logo.svg"></a>
									<a href="https://twitter.com/home?status=Check%20out%20this%20car%20I%20am%20looking%20at.%20Take%20a%20look.%0Ahttp%3A//example.com/car_details.php?id=?"><img src="img/share/twitter-logo.svg"></a>
									<a href="https://plus.google.com/share?url=http%3A//example.com/car_details.php?id=?"><img src="img/share/google-logo.svg"></a>
									<a href="mailto:?&subject=Check out this car&body=Here%20is%20a%20link%20to%20the%20car%20I%20am%20looking%20at.%20Take%20a%20look.%0A%0Ahttp%3A//example.com/car_details.php?id=?"><img src="img/share/mail-logo.svg"></a>
								</div>
							</div>
						</div>
					</div>
					<?php
				} else { 
					array_push($msg, array("Car details not found", 0));
					?>
					<div class="panel-heading clearfix">
						<h3>Car not found</h3>
					</div>
					<div class="panel-body">
						<div id="msg"><?=generateMessages($msg)?></div>
					</div>
				</div>
				<?php
			}
		} else {
			array_push($msg, array("An error has occurred on our end<br>Please try again later", 0));
		}
		?>
	</div>
</div>
</div>
</section>

<?php include 'footer.php'; ?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
	function setRating(rating) {
		document.getElementById('rating').value = rating;
		colorStars(rating);
	}

	function colorStars(rating) {
		var s = document.getElementById('stars');
		var i = 0;
		while (i < rating) {
			s.childNodes[i].className = 'glyphicon glyphicon-star';
			i++;
		}
		while (i < 5) {
			s.childNodes[i].className = 'glyphicon glyphicon-star-empty';
			i++;
		}
	}

	function updateBasket(action, id, result) {
		$.ajax({
			url: "ajax/basket.php",
			success: function(result){
				$(".nav li span.badge").html(result);
			},
			type: 'POST',
			data: action + "=" + id
			+ "&quantity=" + document.getElementsByName("quantity")[0].value
		});
		switch(action) {
			case "add":
			$("#add_btn").toggle();
			$("#del_btn").toggle();
			break;
			case "del":
			$("#add_btn").toggle();
			$("#del_btn").toggle();
		}
	}

	$(document).ready(function() {getReview();});

	function getReview() {
		$.ajax({
			url: "ajax/review.php",
			success: function(result){
				$("#reviews").html(result);
			},
			type: 'POST',
			data: 'car_id=' + <?=$car_id?>
		});
	}

	function postReview() {
		$.ajax({
			url: "ajax/review.php",
			success: function(result){
				$("#reviews").html(result);
			},
			type: 'POST',
			data: 
				'action=add' + 
				'&car_id=' + document.forms["review_form"]["car_id"].value +
				'&rating=' + document.forms["review_form"]["rating"].value +
				'&review=' + document.forms["review_form"]["comment"].value
		});
	}

	function deleteReview(id) {
		$.ajax({
			url: "ajax/review.php",
			success: function(result){
				$("#reviews").html(result);
			},
			type: 'POST',
			data: 
				'car_id=' + <?=$car_id?> +
				'&action=del' +
				'&review_id=' + id
		});
	}

</script>

</body>
</html>

