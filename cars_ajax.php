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
											<option value="1">Audi</option>
											<option value="4">BMW</option>
										</select><br>
										<label>Model</label>
										<select class="form-control" name="model" onchange="getCars();">
											<option selected value="">--- Choose a Model ---</option>
											<option>3 Series</option>
											<option>R8</option>
										</select><br>
										<label>Min Price</label>
										<select class="form-control" name="minprice" onchange="updateMax();getCars();">
											<option value="">--- Choose a min price ---</option>
											<option value="0">£0</option>
											<option value="10000">£10000</option>
											<option value="30000">£30000</option>
											<option value="50000">£50000</option>
											<option value="100000">£100000</option>
											<option value="200000">£200000</option>
										</select><br>
										<label>Max Price</label>
										<select class="form-control" name="maxprice" onchange="getCars();">
											<option value="">--- Choose a max price ---</option>
											<option value="0">£0</option>
											<option value="10000">£10000</option>
											<option value="30000">£30000</option>
											<option value="50000">£50000</option>
											<option value="100000">£100000</option>
											<option value="200000">£200000</option>
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
					.car-listing a.btn {
						font-weight: bold;
						padding: 10px;
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
								<h4>1 - 10 of 50 Listings</h4>
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

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
				+ '&model=' + document.getElementsByName('model')[0].value
				+ '&minprice=' + document.getElementsByName('minprice')[0].value
				+ '&maxprice=' + document.getElementsByName('maxprice')[0].value
				+ '&name=' + document.getElementsByName('name')[0].value
				+ '&sortby=' + document.getElementsByName('sortby')[0].value
				+ '&grid=' + grid
				});
		}
		var prices = [0, 10000, 30000, 50000, 100000, 200000];
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

