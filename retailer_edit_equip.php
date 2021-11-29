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

				<div class="col-md-4 offset-md-2">
					<h4>EDIT UPLOADED EQUIPMENT</h4><br>
					<?php 
						if (isset($_REQUEST['equipment_btn']) && $_REQUEST['equipment_btn'] =='SUBMIT') {
							$errorfound = array();
							if (empty($_REQUEST['equip_name'])) {
								$errorfound[] = "Name is required";
							}
							if (empty($_REQUEST['equip_brand'])) {
								$errorfound[] = "Brand is required";
							}
							if (empty($_REQUEST['category_id'])) {
								$errorfound[] = "Category is required";
							}
							if (empty($_REQUEST['equip_price'])) {
								$errorfound[] = "Price is required";
							}
							if (empty($_REQUEST['equip_avail'])) {
								$errorfound[] = "Availability is required";
							}
							if (empty($_REQUEST['retailers_code'])) {
								$errorfound[] = "Retailers Code is required";
							}

							if(!empty($errorfound)) {
								echo "<ul class='alert alert-danger'>";
								foreach ($errorfound as $key => $value) {
									echo "<li>$value</li>";
								}
								echo "</ul>";
							}
						
								$objequip = new MyEquipment;
								$output = $objequip->updateEquipment($_REQUEST['equip_name'], $_REQUEST['equip_brand'], $_REQUEST['category_id'], $_REQUEST['equip_price'], $_REQUEST['equip_avail'], $_FILES['equip_photo'], $_REQUEST['retailers_code']);

									if (key($output) == 'success') {
						                $message = $output['success'];
						                echo "<div class='alert alert-success'>$message</div>";
						              }
						              else {
						                echo "<div class='alert alert-danger'>".$output['error']."</div>";
						              }
							
						}
					?>
					<form method="post" action="" name="equipment_form" class="form-group" enctype="multipart/form-data">
						<label>Name of Equipment</label>
						<input type="text" name="equip_name" class="form-control">
						<label>Brand</label>
						<input type="text" name="equip_brand" class="form-control">
						<label>Category</label>
						<select name="category_id" class="form-control">
							<option name="select" value="">--Select category--</option>
							<option name="theatre" value="1">Theatre</option>
							<option name="laboratory" value="2">Laboratory</option>
							<option name="ophthalmic" value="3">Ophthalmic</option>
							<option name="dental" value="4">Dental</option>
							<option name="ENT" value="5">ENT</option>
							<option name="orthopedic" value="6">Orthopedic</option>
							<option name="general" value="7">General</option>
							<option name="consumables" value="8">Consumables</option>
							<option name="hospital_furniture" value="9">Hospital Furniture</option>
						</select>
						<label>Price</label>
						<input type="text" name="equip_price" class="form-control">
						<label>Available Quantity</label>
						<input type="text" name="equip_avail" class="form-control">
						<label>Equipment Image</label>
						<input type="file" name="equip_photo" class="form-control">
						<small>Images only (png, jpg, jpeg, gif) with max-size: 2MB</small><br><br>
						<label>Retailers Code</label>
						<input type="text" name="retailers_code" class="form-control"><br>
						<input type="submit" name="equipment_btn" value="SUBMIT" class="btn btn-block btn-secondary">
						</form>
				</div>

			</div>





<?php  

include_once("memfooter.php");
?>