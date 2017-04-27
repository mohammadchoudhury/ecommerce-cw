<?php
include_once '../config.inc.php';

$limit = 4;

$sql = "SELECT * FROM tbl_car c, tbl_make m WHERE c.make_id = m.make_id";
if (!empty($_GET['make'])) {
	$sql .= " AND m.make_id = ".$mysqli->real_escape_string($_GET['make']);
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
$num_rows = $result->num_rows;
if (@$_GET['page']) {
	$sql .= " LIMIT ".$_GET['page']--*$limit.", $limit";
} else {
	$sql .= " LIMIT 0, $limit";	
}

$result = $mysqli->query($sql);
?>

<div class="panel-body">
	<?php
	session_start();
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
						<li><?=$row['top_speed']?> MPH</li>
						<li><?=$row['body_shape']?></li>
						<li><?=$row['transmission']?> Transmission</li>
						<li><?=$row['seating_capacity']?> Seats</li>
						<li><?=$row['engine_type']?> Engine</li>
						<li><?=$row['fuel_type']?></li>
					</ul>
					<a class="btn btn-primary pull-left" href="car_details.php?id=<?=$row['car_id']?>">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					<?php if (!$row['stock']): ?>
						<button type="button" class='btn btn-danger pull-right disabled' onclick="alert('Sorry. This vehicle is out of stock')">Out of Stock</span></button>
					<?php elseif (isset($_SESSION['cars'][$row['car_id']])): ?>
						<button type="button" class='btn btn-danger pull-right' onclick='updateBasket("del", <?=$row['car_id']?>);getCars();'>Remove from basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
					<?php else: ?>
						<button type="button" class='btn btn-success pull-right' onclick='updateBasket("add", <?=$row['car_id']?>);getCars();'>Add to basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
					<?php endif; ?>
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
					<li><?=$row['top_speed']?> MPH</li>
					<li><?=$row['body_shape']?></li>
					<li><?=$row['transmission']?> Transmission</li>
					<li><?=$row['seating_capacity']?> Seats</li>
					<li><?=$row['engine_type']?> Engine</li>
					<li><?=$row['fuel_type']?></li>
				</ul>
				<a class="btn btn-primary pull-left" href="car_details.php?id=<?=$row['car_id']?>">View Details <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
				<?php if (!$row['stock']): ?>
					<button type="button" class='btn btn-danger pull-right disabled' onclick="alert('Sorry. This vehicle is out of stock')">Out of Stock</span></button>
				<?php elseif (isset($_SESSION['cars'][$row['car_id']])): ?>
					<button type="button" class='btn btn-danger pull-right' onclick='updateBasket("del", <?=$row['car_id']?>);getCars();'>Remove from basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
				<?php else: ?>
					<button type="button" class='btn btn-success pull-right' onclick='updateBasket("add", <?=$row['car_id']?>);getCars();'>Add to basket <span class='glyphicon glyphicon-shopping-cart'></span></button>
				<?php endif; ?>
			</div>
		</div>

		<?php 
		endwhile;
		endif;
		?>
	</div>
	<div class="panel-footer text-center">
		<ul class="pagination">
			<?php
			$num_page = ceil($num_rows/$limit); 
			for ($i=1; $i < $num_page; $i++): ?>
			<li <?=($i-1==$_GET['page'])?"class='active'":"";?>><a onclick="getCars(g,<?=$i?>)"><?=$i?></a></li>				
			<?php endfor?>
		</ul>
	</div>
	<script type="text/javascript">
		$("#total_listings").html("<?=$num_rows?> listing(s) found");
	</script>













