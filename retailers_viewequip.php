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

				

		<div class="col-md-2 offset-md-3 card card-body alert alert-dark mt-5">
			<?php 

				if (isset($_POST['retailers_view_btn']) && $_POST['retailers_view_btn'] == 'View Equipment') { 
					if(empty($_POST['retailers_code'])) {
						echo "<p class='alert alert-danger'>Your Retailers code is required</p>";
					}
					else {
						$_SESSION['retailers_code'] = $_POST['retailers_code'];
						header("Location: retailers_equipment_list.php");
						exit;
					}
				}

			?>
			<form name="retailers_login_form" action="" method="post" class="form-group">
				<label>RETAILERS CODE</label>
				<input type="text" name="retailers_code" class="form-control" placeholder="MEM/RET/XXXX">
				<br>
				<input type="submit" name="retailers_view_btn" class="btn btn-dark" value="View Equipment">
			</form>
		</div>


			</div>


<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>
