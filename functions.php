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


function validCard($card_number) {
    $sum = 0;
    $alt = false;
    for($i = strlen($card_number) - 1; $i >= 0; $i--) {
        if($alt) {
           $temp = $card_number[$i];
           $temp *= 2;
           $card_number[$i] = ($temp > 9) ? $temp = $temp - 9 : $temp;
        }
        $sum += $card_number[$i];
        $alt = !$alt;
    }
    return $sum % 10 == 0;
}


?>