<?php
function generateMessages($msg_arr) {
	$errors = "";
	foreach ($msg_arr as $key => $msg) {
		switch ($msg[1]) {
			case 1:
				$alert_type = "success";
				break;
			default:
				$alert_type = "danger";
		}
		$errors .= "<div class='alert alert-".$alert_type." alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>".$msg[0]."</div>";
	}
	return $errors;
}





?>