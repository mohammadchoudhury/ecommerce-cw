<?php
include_once '../config.inc.php';

session_start();

if (!empty($_POST['add'])) {
	$id = $_POST['add'];
	if (is_numeric($id)) {
		if (isset($_POST['quantity'])) {
			$_SESSION['cars'][$id] = $_POST['quantity'];
		} else {
			$_SESSION['cars'][$id] = 1;
		}
	}
}
if (!empty($_POST['del'])) {
	$id = $_POST['del'];
	if (is_numeric($id)) {
		if (isset($_SESSION['cars'][$id])) {
			unset($_SESSION['cars'][$id]);
		}
	}
}

if (!empty($_POST['upd'])) {
	$id = $_POST['upd'];
	if (is_numeric($id)) {
		if ($_POST['quantity'] == 0) {
			unset($_SESSION['cars'][$id]);
		} else {
			$_SESSION['cars'][$id] = $_POST['quantity'];
		}
	}
}

echo sizeof($_SESSION['cars']);
?>