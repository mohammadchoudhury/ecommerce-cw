<style type="text/css">
	footer {
		padding-top: 20px;
	}

	footer ul {
		list-style: none;
		padding-left: 0;
	}

	footer a:hover {
		text-decoration: none;
		color: white;
	}

</style>
<footer class="dark-blue-bg">
	<div class="container">
		<div class="col-xs-4 col-sm-3">
			<h3>Quick Links</h3>
			<ul>
				<li><a href="#">List of Cars</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">My Account</a></li>
			</ul>
		</div>
		<div class="col-xs-4 col-sm-3">
			<h3>Latest Cars</h3>
			<ul>
				<li><a href="car_details.php?id=30">BMW 7 Series</a></li>
				<li><a href="car_details.php?id=27">Pagani Zonda F</a></li>
				<li><a href="car_details.php?id=26">Mitsubishi Outlander</a></li>
				<li><a href="car_details.php?id=25">Mercedes-Benz S-Class</a></li>
			</ul>
		</div>
		<div class="col-xs-4 col-sm-3">
			<h3>Popular Cars</h3>
			<ul>
				<li><a href="car_details.php?id=21">Lamborghini Gallardo</a></li>
				<li><a href="car_details.php?id=18">Ferrari 488 Spider</a></li>
				<li><a href="car_details.php?id=10">Bently Continental GT</a></li>
				<li><a href="car_details.php?id=17">Chevrolet Camaro</a></li>
			</ul>
		</div>
		<div class="col-sm-3">
			<h3>Join the mailing list</h3>
			<div class="row">
				<div id="mail_result"></div>
				<input type="email" class="form-control" placeholder="Email" id="mail_list">
				<button class="btn btn-primary form-control" type="button" onclick="joinMailList();">Join mailing list </button>
				<script type="text/javascript">
					function joinMailList() {
						$.ajax({
							url: "ajax/mail.php",
							success: function(result){
								$("#mail_result").html(result);
							},
							type: 'POST',
							data: 'email=' + $('#mail_list').val()
						});
						$('#mail_list').val("");
					}
				</script>
			</div>
		</div>
	</div>
	<div class="text-center bg-primary" style="padding: 15px 0; margin-top: 30px;">
		<h4>Copyright &copy; 2017 - Mohammad Choudhury</h4>
	</div>
</footer>