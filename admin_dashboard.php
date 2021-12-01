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




<!-- Menu Row  -->
			<div class="row">


				<div class="col-md-3">
					
					<?php if (isset($_SESSION['admin_fname'], $_SESSION['admin_lname'], $_SESSION['admin_phone'], $_SESSION['admin_email'], $_SESSION['admin_gender'], $_SESSION['admin_staffno'])) { ?>
					<div class="alert alert-success" style="padding: 20px; font-weight:bold">
						
					<h5><?php echo $success." ".$_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></h5>
					
					<?php 
						} else {

					$emailname = explode("@", $_SESSION['admin_email']);

					?>
					<div class="alert alert-success" style="padding: 20px; font-weight:bold">
					<h5><?php echo $success." ".$emailname[0]; ?></h5>
					<?php } ?>
					</div>

					<a href="admin_dashboard.php" class="btn btn-block btn-light text-left">DASHBOARD</a>
					<a href="all_orders.php" class="btn btn-block btn-light text-left">ORDERS</a>
					<a href="customers.php" class="btn btn-block btn-light text-left">CUSTOMERS</a>
					<a href="admin_retailers.php" class="btn btn-block btn-light text-left">VIEW RETAILERS</a>
					<a href="admin_upload_equip.php" class="btn btn-block btn-light text-left">UPLOAD EQUIPMENT</a>
					<a href="equipment_list.php" class="btn btn-block btn-light text-left">VIEW EQUIPMENT</a>
					<a href="admin_add_category.php" class="btn btn-block btn-light text-left">ADD CATEGORIES</a>
					<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
					<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
				</div>

			
				<div class="col-md-7">
					<?php if (isset($_SESSION['admin_fname'], $_SESSION['admin_lname'], $_SESSION['admin_phone'], $_SESSION['admin_email'], $_SESSION['admin_gender'], $_SESSION['admin_staffno']))  { ?>
					<div style="padding: 20px">
					<h5>My DASHBOARD</h5>
					<h5>Here are your Signup Details:</h5>
					<ul>
						<li>Name: <?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></li>
						<li>Phone Number: <?php echo $_SESSION['admin_phone']; ?></li>
						<li>Email: <?php echo $_SESSION['admin_email']; ?></li>
						<li>Gender: <?php echo $_SESSION['admin_gender']; ?></li>
						<li>Address: <?php echo $_SESSION['admin_staffno']; ?></li>
					</ul>
					</div>
					<?php 
						} else {
					?>
					<div>
						<h5>My DASHBOARD</h5>
						<p>You are welcome: <b><?php echo $_SESSION['admin_email']; ?></b></p>
						<p>Please ensure you have appropriate authorization to be on this page due to highly sensitive data contained.</p>
						<p>If you need help navigating, please ask for support!</p>
					</div>
					<?php } ?>
				</div>

			</div>
<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>
