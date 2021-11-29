<?php session_start();

$equip_id = $_GET['equip_id'];

if (!empty($equip_id)) {
	$_SESSION['cart'] = [];

	if (empty($_SESSION['cart'][$equip_id])) {
		$_SESSION['cart'][$equip_id] = 1;
	}
	else {
		$_SESSION['cart'][$equip_id]++;
	}
	die("I got here");

}


?>