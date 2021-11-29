<?php
include_once("classes.php");

$objsearch = new MyEquipment;

$output = $objsearch->searchEquipment($_REQUEST['names']);
if(!empty($output)) {
	foreach ($output as $key => $value) {
	echo "<div>".$value['equip_name']." ".$value['equip_brand']."</div>";
	}
}


?>