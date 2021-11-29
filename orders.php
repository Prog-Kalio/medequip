<?php session_start();
include_once("classes.php");
include_once("memheader.php");
if(!isset($_SESSION['cust_email'])) {
	header("Location: index.php?msg=Please login");
}
elseif ((!isset($_SESSION['mem'])) && ($_SESSION['mem'] != '@@Exec_2090%')) {
  
	header("Location: index.php?msg=Please login");
}
else {
	$success = "Welcome";
}

?>

	<div class="row">
		<div class="col-md-3">
			<?php if (isset($_SESSION['cust_firstname'], $_SESSION['cust_lastname'], $_SESSION['cust_phone'], $_SESSION['cust_email'], $_SESSION['cust_username'], $_SESSION['cust_gender'], $_SESSION['cust_address'])) { ?>
			<div class="alert alert-success" style="padding: 20px; font-weight:bold">
				
			<h5><?php echo $success." ".$_SESSION['cust_firstname']; ?></h5>
			<?php 
				} else {

			$emailname = explode("@", $_SESSION['cust_email']);

			?>
			<div class="alert alert-success" style="padding: 20px; font-weight:bold">
			<h5><?php echo $success." ".$emailname[0]; ?></h5>
			<?php } ?>
			</div>

			<a href="customer_dashboard.php" class="btn btn-block btn-light text-left">DASHBOARD</a>
			<a href="orders.php" class="btn btn-block btn-light text-left">ORDERS</a>
			<a href="payment.php" class="btn btn-block btn-light text-left">PAYMENT</a>
			<a href="transactions.php" class="btn btn-block btn-light text-left">TRANSACTIONS</a>
			<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
			<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
			
		</div>


		<div class="col-md-3 offset-md-1 mt-5">
			<label>Choose Order Type</label><br>
			<select id="ordertype" class="form-control">
				<option value="">--Select--</option>
				<option value="New Order">New Order</option>
				<option value="Pending Order">Pending Order</option>
				<option value="Successful Order">Successful Order</option>
			</select>
		</div>

		<div id="optionsdiv" class="col-md-4 mt-2 offset-md-1">
			<h6 class="text-center">My Orders</h6>
			<hr>

		</div>

	</div>




		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// Adding .load method of AJAX to the Orders Dashboard for customers
				$('#ordertype').change(function(){
					$type = $('#ordertype').val();

					$('#optionsdiv').load("orderoptions.php", {ordertype: type});
				})
			});
		</script>

<?php 

include_once("memfooter.php");

?>