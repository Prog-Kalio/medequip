<?php session_start();
include_once("classes.php");
include_once("memheader.php");
if(!isset($_SESSION['retailers_email'])) {
	header("Location: index.php?msg=Please login");
}
elseif ((!isset($_SESSION['mem'])) && ($_SESSION['mem'] != '@@Exec_2090%')) {
  
	header("Location: index.php?msg=Please login");
}
else {
	$success = "Welcome";
}

?>


	<div class="mt-3">

		<div class="alert alert-success text-right" style="padding: 20px; font-weight: bold">
			<?php if (isset($_SESSION['retailers_firstname'], $_SESSION['retailers_lastname'], $_SESSION['retailers_company'], $_SESSION['retailers_phone'], $_SESSION['retailers_email'])) { ?>
			<div class="alert alert-success" style="padding: 20px; font-weight:bold">
				
			<h5><?php echo $success." ".$_SESSION['retailers_company']; ?></h5>
			<?php 
				} else {

			$emailname = explode("@", $_SESSION['retailers_email']);

			?>
			<h5><?php echo $success." ".$emailname[0]; ?></h5>
			<?php } ?>
			</div>
		</div>

		<h2 class="text-center">ALL EQUIPMENTS UPLOADED</h2>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Name of Equipment</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Available Quantity</th>
					<th>Retailers Company</th>
					<th>Retailers Code</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>

			<tbody>
					<?php 
						if (isset($_SESSION['retailers_code'])) {
						$retailers_code = $_SESSION['retailers_code'];
						$objretailer = new MyRetailers;
						$output = $objretailer->getSpecificRetailer($retailers_code);
						$counter = 0;
						foreach ($output as $key => $value) {

					?>
				<tr>
					<td><?php echo ++$counter; ?></td>
					<td><?php echo $value['equip_name']; ?></td>
					<td><?php echo $value['equip_brand']; ?></td>
					<td><?php echo $value['equip_price']; ?></td>
					<td><?php echo $value['equip_avail']; ?></td>
					<td><?php echo $value['retailers_company']; ?></td>
					<td><?php echo $value['retailers_code']; ?></td>
					<td><?php echo $value['retailers_phone']; ?></td>
					<td><?php echo $value['retailers_address']; ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['created_at'])); ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['updated_at'])); ?></td>
					<td>
						<a href="retailer_edit_equip.php"><i class="fa fa-edit"></i></a><br>
						<a href="retailer_delete_equip.php"><i class="fa fa-trash"></i></a>
					</td>
				</tr>

					<?php 
							} 
						}	
					?>
			</tbody>
		</table>
	</div>

<div class="alert alert-dark" style="width: 96%; margin: auto">
	<div class="row mt-4">

		<div class="col-md-4">
			<a href="retailers_dashboard.php" class="btn btn-block btn-light text-left">DASHBOARD</a>
		</div>
		<div class="col-md-4">
			<a href="equipment.php" class="btn btn-block btn-light text-left">EQUIPMENT</a>
		</div>
		<div class="col-md-4">
			<a href="retailers_viewequip.php" class="btn btn-block btn-light text-left">VIEW EQUIPMENT</a>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-md-4">
			<a href="transactions.php" class="btn btn-block btn-light text-left">TRANSACTIONS</a>
		</div>
		<div class="col-md-4">
			<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
		</div>
		<div class="col-md-4">
			<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
		</div>
	</div>
</div>

<?php include_once("memfooter.php") ?>