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
		

		<h2 class="text-center">ALL ORDERS MADE SO FAR</h2>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					
					<th>Order ID</th>
					<th>Session ID</th>
					<th>Amount</th>
					<th>Transaction Reference</th>
					<th>Transaction Status</th>
					<th>Due Year</th>
					<th>Date Paid</th>
					<th>Payment Mode</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>

			<tbody>
					<?php 

						$objorder = new MyOrderDetails;
						$output = $objorder->getFromOrderDetails();
						 
						foreach ($output as $key => $value) {

					?>
				<tr>
		
					<td><?php echo $value['orderdetails_id']; ?></td>
					<td><?php echo $value['session_id']; ?></td>
					<td><?php echo $value['amount']; ?></td>
					<td><?php echo $value['transref']; ?></td>
					<td><?php echo $value['transstatus']; ?></td>
					<td><?php echo $value['dueyear']; ?></td>
					<td><?php echo $value['datepaid']; ?></td>
					<td><?php echo $value['paymentmode']; ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['created_at'])); ?></td>
					<td><?php echo date('Y-m-d h:i:s', strtotime($value['updated_at'])); ?></td>
					
				</tr>

					<?php 
						
						}	
					?>
			</tbody>
		</table>
	</div>


<?php include_once("dashboard_footer.php"); ?>
<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>