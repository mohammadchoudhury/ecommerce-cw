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
						<div class="panel panel-default" id="order-summary">
							<div class="panel-heading">
								<h3 class="text-uppercase">Filter Results</h3>
							</div>
							<div class="panel-body">
								<form action="" method="get">

									<div class="form-group">
										<label for="">Make</label>
										<select class="form-control">
											<option selected value="">--- Choose a Make ---</option>
											<option>Test</option>
											<option>Test</option>
										</select><br>
										<label for="">Model</label>
										<select class="form-control">
											<option selected value="">--- Choose a Model ---</option>
											<option>Test</option>
											<option>Test</option>
										</select><br>
										<label>Min Price</label>
										<select class="form-control">
											<option selected value="">--- Choose a min price ---</option>
											<option>£0</option>
											<option>£10000</option>
											<option>£30000</option>
											<option>£50000</option>
										</select><br>
										<label>Max Price</label>
										<select class="form-control">
											<option selected value="">--- Choose a max price ---</option>
											<option>£0</option>
											<option>£10000</option>
											<option>£30000</option>
											<option>£50000</option>
										</select><br>
									</div>
									<button type="submit" class="btn btn-primary form-control">Filter</button>
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
						width: 49%;
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
								<form action="#" method="post">
									<select name="sortby" class="form-control">
										<option>Price (low to high)</option>
										<option>Price (high to low)</option>
									</select>
								</form>
								<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-th-large"></span></a>
								<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="car-listing gray-bg">
										<div class="img">
											<img src="https://is2-ssl.mzstatic.com/image/thumb/Purple111/v4/b1/bd/b0/b1bdb0f4-820f-8820-f48a-d95aa3b06f2d/source/256x256bb.jpg" class="img-responsive" width="100%">
										</div>
										<div class="car-details">
											<h3>BMW 3 Series</h3>
											<p>£13500</p>
											<ul>
												<li>Diesel</li>
												<li>Manual</li>
												<li>5 Seats</li>
												<li>Air Conditioning</li>
												<li>Spare Tyre</li>
												<li>Finance Available</li>
											</ul>
											<a class="btn btn-primary" href="#">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="car-listing gray-bg">
										<div class="img">
											<img src="https://is2-ssl.mzstatic.com/image/thumb/Purple111/v4/b1/bd/b0/b1bdb0f4-820f-8820-f48a-d95aa3b06f2d/source/256x256bb.jpg" class="img-responsive" width="100%">
										</div>
										<div class="car-details">
											<h3>BMW 3 Series</h3>
											<p>£13500</p>
											<ul>
												<li>Diesel</li>
												<li>Manual</li>
												<li>5 Seats</li>
												<li>Air Conditioning</li>
												<li>Spare Tyre</li>
												<li>Finance Available</li>
											</ul>
											<a class="btn btn-primary" href="#">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="car-listing gray-bg">
										<div class="img">
											<img src="https://is2-ssl.mzstatic.com/image/thumb/Purple111/v4/b1/bd/b0/b1bdb0f4-820f-8820-f48a-d95aa3b06f2d/source/256x256bb.jpg" class="img-responsive" width="100%">
										</div>
										<div class="car-details">
											<h3>BMW 3 Series</h3>
											<p>£13500</p>
											<ul>
												<li>Diesel</li>
												<li>Manual</li>
												<li>5 Seats</li>
												<li>Air Conditioning</li>
												<li>Spare Tyre</li>
												<li>Finance Available</li>
											</ul>
											<a class="btn btn-primary" href="#">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="car-listing gray-bg">
										<div class="img">
											<img src="https://is2-ssl.mzstatic.com/image/thumb/Purple111/v4/b1/bd/b0/b1bdb0f4-820f-8820-f48a-d95aa3b06f2d/source/256x256bb.jpg" class="img-responsive" width="100%">
										</div>
										<div class="car-details">
											<h3>BMW 3 Series</h3>
											<p>£13500</p>
											<ul>
												<li>Diesel</li>
												<li>Manual</li>
												<li>5 Seats</li>
												<li>Air Conditioning</li>
												<li>Spare Tyre</li>
												<li>Finance Available</li>
											</ul>
											<a class="btn btn-primary" href="#">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer text-center">
							<ul class="pagination">
								<li><a href="#">&laquo;</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js//jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>

