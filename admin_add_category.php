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
					<a href="admin_orders.php" class="btn btn-block btn-light text-left">ORDERS</a>
					<a href="customers.php" class="btn btn-block btn-light text-left">CUSTOMERS</a>
					<a href="retailers.php" class="btn btn-block btn-light text-left">RETAILERS</a>
					<a href="" class="btn btn-block btn-light text-left">UPLOAD EQUIPMENT</a>
					<a href="equipment_list.php" class="btn btn-block btn-light text-left">VIEW EQUIPMENT</a>
					<a href="admin_add_category.php" class="btn btn-block btn-light text-left">ADD CATEGORIES</a>
					<a href="admin_view_category.php" class="btn btn-block btn-light text-left">VIEW CATEGORIES</a>
					<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
					<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
				</div>

				<div class="col-md-3 offset-md-2 card card-body alert alert-dark mt-5">
					<h4>ADD EQUIPMENT CATEGORIES</h4><br>
					<?php 
						if (isset($_REQUEST['category_add_btn']) && $_REQUEST['category_add_btn'] =='Add Category') {
							
							if (empty($_REQUEST['category_name'])) {
								$error = "Please fill category";
							}
						
								$objequip = new MyCategory;
								$output = $objequip->addcategory($_REQUEST['category_name']);

								if(!empty($output)) {
								 	echo "<div class='alert alert-success'>Category added successfully!</div>";
								 	
								 	}
							
						}
					?>
		
			<form name="retailers_login_form" action="" method="post" class="form-group">
				<label>Name of Equipment Category</label>
				<input type="text" name="category_name" class="form-control">
				<br>
				<input type="submit" name="category_add_btn" class="btn btn-block btn-dark" value="Add Category">
			</form>
		</div>
	</div>

			





<?php  
include_once("whatsapp.php");
include_once("memfooter.php");
?>