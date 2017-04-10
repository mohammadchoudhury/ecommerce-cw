<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 100%;
			margin: auto;
		}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="img/carousel/Bugatti-Veyron.jpg">
				<div class="carousel-caption">
					<h1>Bugatti Veyron</h1>
					<p>Some thing about Bugatti Veyron</p>
					<p><a class="btn btn-lg btn-primary" href="car_details.php?id=16">Read More</a></p>
				</div>
			</div>

			<div class="item">
				<img src="img/carousel/Ferrari-488-Spider.jpg">
				<div class="carousel-caption">
					<h1>Ferrari 488 Spider</h1>
					<p>Some thing about Ferrari 488 Spider</p>
					<p><a class="btn btn-lg btn-primary" href="car_details.php?id=18">Read More</a></p>
				</div>
			</div>

			<div class="item">
				<img src="img/carousel/McLaren-650S.jpg">
				<div class="carousel-caption">
					<h1>McLaren 650S</h1>
					<p>Some thing about McLaren 650S</p>
					<p><a class="btn btn-lg btn-primary" href="car_details.php?id=24">Read More</a></p>
				</div>
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

	<section class="gray-bg">
		<div class="container">
			<div class="row">				
				<h1 class="text-center" style="color: #2c3e50;">Why choose us</h1>
			</div>
			<div class="row text-center">
				<div class="col-sm-4">
					<div class="usp-item">
						<span class="glyphicon glyphicon-list icon"></span>
						<h2>Free advice and reviews</h2>
						<p>We have many reviews which you may read. Or can give us a call and we'll be able to help as much as possible.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="usp-item">
						<span class="glyphicon glyphicon-gbp icon"></span>
						<h2>Car Finance Available</h2>
						<p>Finance is available on all our vehicles. Please call us to get a quote.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="usp-item">
						<span class="glyphicon glyphicon-globe icon"></span>
						<h2>Free d2d delivery</h2>
						<p>All purchases are deliveried to you next-day.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="blue-bg">
		<div class="container">
			<h1>Some filler text</h1>
			<h2>Lorem Ipsum</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
			<p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
			<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</p>
			<p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.</p>
			<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum.</p>
		</div>
	</section>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>