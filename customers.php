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

		<h2 class="text-center">ALL MEM CUSTOMERS</h2>
		<table class="table table-striped table-bordered mt-4">
			<thead>
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$objcustomer = new MyCustomers;
					$customers = $objcustomer->getCustomers();
					foreach ($customers as $key => $value) {

				?>
				
				<tr>
					<td><?php echo $value['cust_id']; ?></td>
					<td><?php echo $value['cust_firstname']; ?></td>
					<td><?php echo $value['cust_lastname']; ?></td>
					<td><?php echo $value['cust_phone']; ?></td>
					<td><?php echo $value['cust_email']; ?></td>
					<td><?php echo $value['cust_username']; ?></td>
					<td><?php echo $value['cust_gender']; ?></td>
					<td><?php echo $value['cust_address']; ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['created_at'])); ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['updated_at'])); ?></td>
					<td>
						<a href="edit.php"><i class="fa fa-edit"></i></a><br>
						<a href="delete.php"><i class="fa fa-trash"></i></a>
					</td>
				</tr>

				<?php } ?>
			</tbody>


		</table>
	</div>



			
<?php include_once("dashboard_footer.php"); ?>

<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php"); ?>
