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
				<?php
				include_once 'config.inc.php';
				$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id ORDER BY car_id DESC LIMIT 5";
				$stmtf = $mysqli->prepare($sql);
				$stmtf->execute();
				$result = $stmtf->get_result();
				$stmtf->close();
				while ($latest = $result->fetch_assoc()):?>
				<li><a href="car_details.php?id=<?=$latest['car_id']?>"><?=$latest['make_name']." ".$latest['model']?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="col-xs-4 col-sm-3">
			<h3>Popular Cars</h3>
			<ul>
				<?php
				include_once 'config.inc.php';
				$sql = "SELECT c.car_id, make_name, model, SUM(quantity) AS total FROM tbl_car c, tbl_make m, tbl_order_details o WHERE c.make_id = m.make_id AND c.car_id = o.car_id GROUP BY c.car_id ORDER BY total DESC LIMIT 5";
				$stmtf = $mysqli->prepare($sql);
				$stmtf->execute();
				$result = $stmtf->get_result();
				$stmtf->close();
				while ($latest = $result->fetch_assoc()):?>
				<li><a href="car_details.php?id=<?=$latest['car_id']?>"><?=$latest['make_name']." ".$latest['model']?></a></li>
				<?php endwhile; ?>
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