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
	<?php
		include 'header.php';
		include_once 'config.inc.php';
	?>
	
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
						<li>Cars</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="text-uppercase">Search Car</h3>
							</div>
							<div class="panel-body">
								<form action="" method="get">
									<label for="">Name of car</label>
									<input type="text" name="name" class="form-control" placeholder="Enter name of car" onkeyup="getCars();" value="<?=(isset($_GET['name'])?$_GET['name']:'')?>"><br>
									<button type="submit" class="btn btn-primary form-control">Search</button>
								</form>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="text-uppercase">Filter Results</h3>
							</div>
							<div class="panel-body">
								<form action="" method="get">

									<div class="form-group">
										<label>Make</label>
										<select class="form-control" name="make" onchange="getCars();">
											<option value="">--- Choose a Make ---</option>
											<?php
											$sql = "SELECT * FROM tbl_make";
											$stmt = $mysqli->prepare($sql);
											$stmt->execute();
											$result = $stmt->get_result();
											$num_rows = $result->num_rows;
											while ($make = $result->fetch_assoc()) {
												echo "<option value='$make[make_id]'>$make[make_name]</option>";
											}
											?>
										</select><br>
										<label>Min Price</label>
										<select class="form-control" name="minprice" onchange="updateMax();getCars();">
											<option value="">--- Choose a min price ---</option>
											<option value="0">£0</option>
											<option value="20000">£20000</option>
											<option value="50000">£50000</option>
											<option value="100000">£100000</option>
											<option value="200000">£200000</option>
											<option value="500000">£500000</option>
											<option value="750000">£750000</option>
											<option value="1000000">£1000000</option>
											<option value="1500000">£1500000</option>
											<option value="2000000">£2000000</option>
										</select><br>
										<label>Max Price</label>
										<select class="form-control" name="maxprice" onchange="getCars();">
											<option value="">--- Choose a max price ---</option>
											<option value="20000">£20000</option>
											<option value="50000">£50000</option>
											<option value="100000">£100000</option>
											<option value="200000">£200000</option>
											<option value="500000">£500000</option>
											<option value="750000">£750000</option>
											<option value="1000000">£1000000</option>
											<option value="1500000">£1500000</option>
											<option value="2000000">£2000000</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary form-control">Filter</button><br><br>
									<button type="reset" class="btn btn-danger form-control" onclick="getCars();">Reset</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">
					#cars .panel-body {
						padding-bottom: 0px;
					}

					#cars .panel-heading * {
						display: inline-block;
					}
					#cars .panel-heading option {
						display: block;
					}
					
					.car-listing {
						margin-bottom: 15px;
						overflow: hidden;
					}
					.car-listing h3 {
						font-weight: 900;
						margin-top: 0px;
					}
					.car-listing .img {
						padding-left: 0px;
						padding-right: 0px;
					}
					.car-details {
						padding: 15px;
					}
					.car-listing .btn {
						font-weight: bold;
						padding: 10px;
						margin-bottom: 15px;
					}
					.car-listing ul {
						list-style: none;
						padding: 0px;
					}
					.car-listing li {
						display: inline-block;
						width: 32%;
						font-weight: bold;
						padding-top: 10px;
						padding-bottom: 10px;
					}
				</style>
				<div class="col-md-9" id="cars">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<div class="pull-left">
								<h4>1 - 17 of 17 Listings</h4>
							</div>
							<div class="pull-right">
								<p>Sort by:</p>
								<form action="#" method="get">
									<select name="sortby" class="form-control" onchange="getCars();">
										<option value="1">Name (Ascending)</option>
										<option value="2">Name (Descending)</option>
										<option value="3">Price (low to high)</option>
										<option value="4">Price (high to low)</option>
									</select>
								</form>
								<a class="btn btn-primary" onclick="getCars('off')"><span class="glyphicon glyphicon-th-list"></span></a>
								<a class="btn btn-primary" onclick="getCars('on')"><span class="glyphicon glyphicon-th-large"></span></a>
							</div>
						</div>
						<div id="ajax"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {getCars('off');});
		$("[name=make]").val(<?=(isset($_GET['make'])?$_GET['make']:'')?>);
		$("[name=model]").val(<?=(isset($_GET['model'])?$_GET['model']:'')?>);
		$("[name=minprice]").val(<?=(isset($_GET['minprice'])?$_GET['minprice']:'')?>);
		$("[name=maxprice]").val(<?=(isset($_GET['maxprice'])?$_GET['maxprice']:'')?>);

		function getCars(grid, result) {
			$.ajax({
				url: "ajax/cars.php",
				success: function(result){
					$("#ajax").html(result);
				},
				type: 'GET',
				data: 
				'&make=' + document.getElementsByName('make')[0].value
				+ '&minprice=' + document.getElementsByName('minprice')[0].value
				+ '&maxprice=' + document.getElementsByName('maxprice')[0].value
				+ '&name=' + document.getElementsByName('name')[0].value
				+ '&sortby=' + document.getElementsByName('sortby')[0].value
				+ '&grid=' + grid
				});
		}

		function updateBasket(action, id, result) {
			$.ajax({
				url: "ajax/basket.php",
				success: function(result){
					$(".nav li span.badge").html(result);
				},
				type: 'POST',
				data: action + "=" + id
			});
		}

		var prices = [0, 20000, 50000, 100000, 200000, 500000, 750000, 1000000, 1500000, 2000000];
		function updateMax() {
			var elm = document.getElementsByName('maxprice')[0];
			var min = document.getElementsByName('minprice')[0].value;
			while (elm.options.length > 1) {
				elm.options.remove(1);
			}
			for (i in prices) {
				elm.options.add(new Option('£'+prices[i], prices[i]));
			}
			while (elm.options[1].value < min) {
				elm.options[1].remove();
			}
		}
	</script>

</body>
</html>

