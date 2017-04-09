<?php
include_once '../config.inc.php';

$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id";
if (!empty($_GET['make'])) {
	$sql .= " AND m.make_id = ".$mysqli->real_escape_string($_GET['make']);
}
if (!empty($_GET['model'])) {
	$sql .= " AND model = '".$mysqli->real_escape_string($_GET['model'])."'";
}
if (!empty($_GET['minprice'])) {
	$sql .= " AND price >= ".$mysqli->real_escape_string($_GET['minprice']);
}
if (!empty($_GET['maxprice'])) {
	$sql .= " AND price <= ".$mysqli->real_escape_string($_GET['maxprice']);
}
if (!empty($_GET['name'])) {
	$sql .= " AND CONCAT_WS(' ', make_name, model) LIKE '%".$mysqli->real_escape_string($_GET['name'])."%'";
}
if (!empty($_GET['sortby'])) {
	switch ($_GET['sortby']) {
		case 2:
		$sql .= " ORDER BY make_name DESC, model DESC";
		break;
		case 3:
		$sql .= " ORDER BY price ASC";
		break;
		case 4:
		$sql .= " ORDER BY price DESC";
		break;
		default:
		$sql .= " ORDER BY make_name ASC, model ASC";
		break;
	}
}
$result = $mysqli->query($sql);
?>

<div class="panel-body">
<?php
if (!empty($_GET['grid']) && $_GET['grid'] == "on"):
?>
<div class="row">
	<?php
	while ($row = $result->fetch_assoc()):
	?>
		<div class="col-md-6">
			<div class="car-listing gray-bg">
				<div class="img">
					<img src="<?=$row['image_url']?>" width="100%">
				</div>
				<div class="car-details">
					<h3><?=$row['make_name'] . " " .$row['model']?></h3>
					<p><?="£".$row['price'];?></p>
					<ul>
						<li>Top Speed: <?=$row['top_speed']?></li>
						<li>Body Shape: <?=$row['body_shape']?></li>
						<li>Transmission: <?=$row['transmission']?></li>
						<li>Seats: <?=$row['seating_capacity']?></li>
						<li>Engine Type: <?=$row['engine_type']?></li>
						<li>Fuel Type: <?=$row['fuel_type']?></li>
					</ul>
					<a class="btn btn-primary" href="car_details.php?id=<?=$row['car_id']?>">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					<a class="btn btn-success" href="#">Add to basket <span class="glyphicon glyphicon-shopping-cart"></span></a>
				</div>
			</div>
		</div>
<?php
	endwhile;
?>
</div>
<?php
else:
	while ($row = $result->fetch_assoc()):
?>

<div class="car-listing gray-bg">
	<div class="col-md-4 img">
		<img src="<?=$row['image_url']?>" class="img-responsive" width="100%">
	</div>
	<div class="col-md-8 car-details">
		<h3><?=$row['make_name'] . " " .$row['model']?></h3>
		<p><?="£".$row['price'];?></p>
		<ul>
			<li>Top Speed: <?=$row['top_speed']?></li>
			<li>Body Shape: <?=$row['body_shape']?></li>
			<li>Transmission: <?=$row['transmission']?></li>
			<li>Seats: <?=$row['seating_capacity']?></li>
			<li>Engine Type: <?=$row['engine_type']?></li>
			<li>Fuel Type: <?=$row['fuel_type']?></li>
		</ul>
		<a class="btn btn-primary" href="car_details.php?id=<?=$row['car_id']?>">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
		<a class="btn btn-success" href="#">Add to basket <span class="glyphicon glyphicon-shopping-cart"></span></a>
	</div>
</div>

<?php 
	endwhile;
endif;
?>
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













