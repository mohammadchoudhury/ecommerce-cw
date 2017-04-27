<?php
session_start();
include_once '../config.inc.php';
$car_id = $_POST['car_id'];
if (isset($_POST) && !empty($_POST) && @$_POST['action'] == "add") {
	$car_id = $_POST['car_id'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$sql = "INSERT INTO tbl_review(customer_id, car_id, rating, review) VALUES (?, ?, ?, ?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("iiis", $_SESSION['user']['c_id'], $car_id, $rating, $review);
	$stmt->execute();
	$stmt->close();
}

if (isset($_POST) && !empty($_POST) && @$_POST['action'] == "del") {
	$review_id = $_POST['review_id'];
	$sql = "DELETE FROM tbl_review WHERE customer_id = ? AND review_id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ii", $_SESSION['user']['c_id'], $review_id);
	$stmt->execute();
	$stmt->close();
}

if (!isset($_SESSION['user'])): ?>
<div class="row" id="post-review-box">
	<div class="col-md-12">
		<div class="well"><h2>Login to leave a review</h2></div>
	</div>
</div>
<?php else: ?>
<div class="row" id="post-review-box">
	<div class="col-md-12">
		<form method="POST" action="" name="review_form">
			<textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea>
			<input type="hidden" id="car_id" name="car_id" value="<?=$car_id?>">
			<input type="hidden" id="rating" name="rating" value="0">
			<br>
			<div class="pull-left">
				<div id="stars"><span class="glyphicon glyphicon-star-empty" onclick="setRating(1);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(2);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(3);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(4);"></span><span class="glyphicon glyphicon-star-empty" onclick="setRating(5);"></span></div>
			</div>
			<div class="pull-right">
				<button class="btn btn-danger" type="reset" style="margin-right: 10px;" onclick="setRating(0)"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button class="btn btn-success" type="button" onclick="postReview();"><span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
			</div>
		</form>
	</div>
</div>
<?php endif; ?>
<br>

<div class="row">
	<?php
	$sql = "SELECT * FROM tbl_review r, tbl_customer c WHERE c.customer_id = r.customer_id AND car_id = ? ORDER BY review_date DESC";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("i", $car_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	while ($row = $result->fetch_assoc()):
	?>
	<div class="well clearfix">
		<p><b><?=$row['first_name']." ".$row['last_name']?></b> - <?=$row['rating']?>/5</p>
		<p class="small"><?=$row['review_date']?></p>
		<p><?=$row['review']?></p>
		<?php if (@$_SESSION['user']['c_id'] == $row['customer_id']): ?>
			<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteReview(<?=$row['review_id']?>);"><span class="glyphicon glyphicon-erase"></span></button>
		<?php endif; ?>
	</div>
	<?php
	endwhile;
	?>
</div>