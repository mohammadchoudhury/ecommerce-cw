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
			<div class="row">
				<div class="col-md-9" id="car_details">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3>BMW 3 Series</h3>
						</div>
						<div class="panel-body">

							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
									<li data-target="#myCarousel" data-slide-to="3"></li>
									<li data-target="#myCarousel" data-slide-to="4"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img src="img/bmw/3-series-1.jpg">
									</div>
									<div class="item">
										<img src="img/bmw/3-series-2.jpg">
									</div>
									<div class="item">
										<img src="img/bmw/3-series-3.jpg">
									</div>
									<div class="item">
										<img src="img/bmw/3-series-4.jpg">
									</div>
									<div class="item">
										<img src="img/bmw/3-series-5.jpg">
									</div>
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
								<li role="presentation" class="active"><a href="#overview" data-toggle="tab">Car Overview</a></li>
								<li role="presentation"><a href="#specification" data-toggle="tab">Specification</a></li>
								<li role="presentation"><a href="#extras" data-toggle="tab">Extras</a></li>
								<li role="presentation"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
							<div class="tab-content" style="padding: 15px">
								<div id="overview" class="tab-pane fade in active">
									<h3>Blah Blah Blah</h3>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
												<td>Model Year</td>
												<td>2010</td>
											</tr>
											<tr>
												<td>No. of Owners</td>
												<td>4</td>
											</tr>
											<tr>
												<td>KMs Driven</td>
												<td>30,000</td>
											</tr>
											<tr>
												<td>Fuel Type</td>
												<td>Diesel</td>
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
												<td>TDCI Diesel Engine</td>
											</tr>
											<tr>
												<td>Engine Description</td>
												<td>1.5KW</td>
											</tr>
											<tr>
												<td>No. of Cylinders</td>
												<td>4</td>
											</tr>
											<tr>
												<td>Mileage-City</td>
												<td>22.4kmpl</td>
											</tr>
											<tr>
												<td>Mileage-Highway</td>
												<td>25.83kmpl</td>
											</tr>
											<tr>
												<td>Fuel Tank Capacity</td>
												<td>40 (Liters)</td>
											</tr>
											<tr>
												<td>Seating Capacity</td>
												<td>5</td>
											</tr>
											<tr>
												<td>Transmission Type</td>
												<td>Manual</td>
											</tr>
										</tbody>
									</table>
									<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div id="extras" class="tab-pane fade">
									
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th colspan="2">Technical Specification</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Engine Type</td>
												<td>TDCI Diesel Engine</td>
											</tr>
											<tr>
												<td>Engine Description</td>
												<td>1.5KW</td>
											</tr>
											<tr>
												<td>No. of Cylinders</td>
												<td>4</td>
											</tr>
											<tr>
												<td>Mileage-City</td>
												<td>22.4kmpl</td>
											</tr>
											<tr>
												<td>Mileage-Highway</td>
												<td>25.83kmpl</td>
											</tr>
											<tr>
												<td>Fuel Tank Capacity</td>
												<td>40 (Liters)</td>
											</tr>
											<tr>
												<td>Seating Capacity</td>
												<td>5</td>
											</tr>
											<tr>
												<td>Transmission Type</td>
												<td>Manual</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div id="reviews" class="tab-pane fade">
									<div class="row" id="post-review-box">
										<div class="col-md-12">
											<form method="POST" action="">
											<textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea>
											<input type="hidden" id="rating" name="" value="0">
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
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer text-center">
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
							<h3 class="text-uppercase">Finance Calculator</h3>
						</div>
						<div class="panel-body">
							<form action="" method="get">
								<div class="form-group">
									<label for="">Price</label>
									<input type="number" name="Price" class="form-control" value="100000" disabled><br>
									<label for="">Model</label>
									<select class="form-control">
										<option selected value="">--- Choose years ---</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary form-control">Filter</button>
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
		</div>
	</div>
</section>

<?php include 'footer.php'; ?>

<script src="js//jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function setRating(rating) {
		console.log(rating);
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

	</script>

</body>
</html>

