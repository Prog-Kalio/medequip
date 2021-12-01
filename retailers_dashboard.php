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




<!-- Menu Row  -->
			<div class="row">

				<div class="col-md-3">
					<?php if (isset($_SESSION['retailers_firstname'], $_SESSION['retailers_lastname'], $_SESSION['retailers_company'], $_SESSION['retailers_phone'], $_SESSION['retailers_email'])) { ?>
					<div class="alert alert-success" style="padding: 20px; font-weight:bold">
						
					<h5><?php echo $success." ".$_SESSION['retailers_company']; ?></h5>
					
					<?php 
						} else {

					$emailname = explode("@", $_SESSION['retailers_email']);

					?>
					<div class="alert alert-success" style="padding: 20px; font-weight:bold">
					<h5><?php echo $success." ".$emailname[0]; ?></h5>
					<?php } ?>
					</div>
					
					<a href="retailers_dashboard.php" class="btn btn-block btn-light text-left">DASHBOARD</a>
					<a href="equipment.php" class="btn btn-block btn-light text-left">EQUIPMENT</a>
					<a href="retailers_viewequip.php" class="btn btn-block btn-light text-left">VIEW EQUIPMENT</a>
					<a href="transactions.php" class="btn btn-block btn-light text-left">TRANSACTIONS</a>
					<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
					<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
					
				</div>

				<div class="col-md-7">
					<?php if (isset($_SESSION['retailers_firstname'], $_SESSION['retailers_lastname'], $_SESSION['retailers_company'], $_SESSION['retailers_phone'], $_SESSION['retailers_email'])) { ?>
					<div style="padding: 20px">
					<h5>My DASHBOARD</h5>
					<h5>Here are your Signup Details:</h5>
					<ul>
					<li>Name: <?php echo $_SESSION['retailers_firstname']." ".$_SESSION['retailers_lastname']; ?></li>
					<li>Company Name: <?php echo $_SESSION['retailers_company']; ?></li>
					<li>Phone Number: <?php echo $_SESSION['retailers_phone']; ?></li>
					<li>Email: <?php echo $_SESSION['retailers_email']; ?></li>
					</ul>
					</div>
					<?php 
						} else {
					?>
					<div>
						<h5>My DASHBOARD</h5>
						<p>You are welcome: <b><?php echo $_SESSION['retailers_email']; ?></b></p>
						<p>What would you like to do today?</p>
					</div>
					<?php } ?>
				</div>


			</div>

<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>
