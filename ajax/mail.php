<?php
include_once '../config.inc.php';

session_start();

$email = $_POST['email'];
$sql = "SELECT * FROM tbl_mail_list WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($result->num_rows) {
	echo "<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>You are already on the list</div>";
} else {
	$sql = "INSERT INTO tbl_mail_list(email) VALUES (?);";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("s", $email);
	if ($stmt->execute()) {
		echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>You have been added to the list</div>";
	} else {
		echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>Something went wrong. Try again later.</div>";
	}
}
?>
