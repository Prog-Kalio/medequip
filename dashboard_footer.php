<?php 
include_once("classes.php");	
include_once("memheader.php");	

if(!isset($_SESSION['admin_email'])) {
	header("Location: index.php?msg=Please login");
}
elseif ((!isset($_SESSION['mem'])) && ($_SESSION['mem'] != '@@Exec_2090%')) {
  
	header("Location: index.php?msg=Please login");
}
else {
	$success = "Welcome";
}
?>

<div class="dashb-container">
	<div class="row d-menu-row mt-4 alert alert-dark" id="d-menurow-id">

		<div class="col-md-4 d-menu-col" id="d-menucol1-id">
			<a href="admin_dashboard.php" class="btn btn-block btn-light text-left">DASHBOARD</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol2-id">
			<a href="admin_orders.php" class="btn btn-block btn-light text-left">ORDERS</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol3-id">
			<a href="customers.php" class="btn btn-block btn-light text-left">CUSTOMERS</a>
		</div>
	</div>

	<div class="row d-menu-row mt-4 alert alert-dark" id="d-menurow-id">
		<div class="col-md-4 d-menu-col" id="d-menucol4-id">
			<a href="admin_retailers.php" class="btn btn-block btn-light text-left">VIEW RETAILERS</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol5-id">
			<a href="admin_upload_equip.php" class="btn btn-block btn-light text-left">UPLOAD EQUIPMENT</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol6-id">
			<a href="equipment_list.php" class="btn btn-block btn-light text-left">VIEW EQUIPMENT</a>
		</div>
	</div>

	<div class="row d-menu-row mt-4 alert alert-dark" id="d-menurow-id">
		<div class="col-md-4 d-menu-col" id="d-menucol7-id">
			<a href="admin_add_category.php" class="btn btn-block btn-light text-left">ADD CATEGORIES</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol8-id">
			<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
		</div>
		<div class="col-md-4 d-menu-col" id="d-menucol9-id">
			<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
		</div>
	</div>

</div>