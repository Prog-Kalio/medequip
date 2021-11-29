<?php session_start();
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


	<div class="mt-4">
		<div class="alert alert-success text-right" style="padding: 20px; font-weight: bold">
			<?php 
				if(isset($_SESSION['admin_email'])) {
					$emailname = explode("@", $_SESSION['admin_email']);
					echo $success." ".$emailname[0]."<br>";
				}
			?>
		</div>
		

		<h2 class="text-center">ALL RETAILERS AND THEIR EQUIPMENT</h2>

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

						$objretailer = new MyRetailers;
						$output = $objretailer->getAllRetailers();
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
					<a href="admin_edit_equip.php"><i class="fa fa-edit"></i></a><br>
						<a href="delete.php"><i class="fa fa-trash"></i></a>
					</td>
				</tr>

					<?php 
						
						}	
					?>
			</tbody>
		</table>
	</div>


<?php include_once("dashboard_footer.php"); ?>

<?php include_once("memfooter.php") ?>