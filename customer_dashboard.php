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





<!-- Menu Row  -->
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
					<a href="cart.php" class="btn btn-block btn-light text-left">ITEMS ON CART</a>
					<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
					<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
					
				</div>


				<div class="col-md-7">
					<?php if (isset($_SESSION['cust_firstname'], $_SESSION['cust_lastname'], $_SESSION['cust_phone'], $_SESSION['cust_email'], $_SESSION['cust_username'], $_SESSION['cust_gender'], $_SESSION['cust_address']))  { ?>
					<div style="padding: 20px">
					<h5>My DASHBOARD</h5>
					<h5>Here are your Signup Details:</h5>
					<ul>
						<li>Name: <?php echo $_SESSION['cust_firstname']." ".$_SESSION['cust_lastname']; ?></li>
						<li>Phone Number: <?php echo $_SESSION['cust_phone']; ?></li>
						<li>Email: <?php echo $_SESSION['cust_email']; ?></li>
						<li>Username: <?php echo $_SESSION['cust_username']; ?></li>
						<li>Gender: <?php echo $_SESSION['cust_gender']; ?></li>
						<li>Address: <?php echo $_SESSION['cust_address']; ?></li>
					</ul>
					</div>
					<?php 
						} else {
					?>
					<div>
						<h5>My DASHBOARD</h5>
						<p>You are welcome: <b><?php echo $_SESSION['cust_email']; ?></b></p>
						<p>Just incase, you didn't check your mail; we've got amazing new medical equipment at great prices too!</p>
						<p>What would you like to buy today?</p>
					</div>
					<?php } ?>
				</div>

			</div>
<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>
