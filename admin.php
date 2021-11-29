<?php session_start();
include_once("classes.php");
include_once("memheader.php");
?>

<div class="row">
	
		<div class="col-md-4">
			<h3>ADMIN PAGE </h3>

			<p class="text-right"><span><button class="btn btn-info" id="fa-times" style="display:none"><i class="fa fa-times"></i></button></span></p>
			<div id="admin">
				<input type="radio" name="admin" value="admin_login" id="admin_login"> Login
				<input type="radio" name="admin" value="admin_signup" id="admin_signup"> Sign Up
			</div>

			<img src="images/security.png" class="img-fluid" alt="registration pics" id="regPics" width="200" height="250">
		</div>


		<div class="col-md-4" id="adminpix_div">

			<?php 
					if(isset($_POST['adminsignup-btn']) && $_POST['adminsignup-btn']=='Sign Up') {

						$logerrors = array();

						if(empty($_POST['admin_fname'])) {
							$logerrors[] = "Firstname is required"; 
						}
						if(empty($_POST['admin_lname'])) {
							$logerrors[] = "Lastname is required"; 
						}
						if(empty($_POST['admin_phone'])) {
							$logerrors[] = "Phone Number is required"; 
						}
						if(empty($_POST['admin_email'])) {
							$logerrors[] = "Email Address is required"; 
						}
						if(empty($_POST['admin_password'])) {
							$logerrors[] = "Password is required"; 
						}
						if(empty($_POST['admin_gender'])) {
							$logerrors[] = "Gender is required"; 
						}
						if(empty($_POST['admin_staffno'])) {
							$logerrors[] = "Staff No is required"; 
						}

						if (!empty($logerrors)) {
							echo "<ul class='alert alert-danger'>";
							foreach ($logerrors as $key => $value) {
								echo "<li>$value</li>";
							}
							echo "</ul>";
						}

						elseif (empty($logerrors)) {
							$objadmin = new MyAdmin;
							$_POST['admin_password'] = md5($_POST['admin_password']);

							if ($objadmin->confirmemailaddress($_POST['admin_email']) == true) {
								echo "<p>Email already exists</p>";
							}
							else {
								$output = $objadmin->addAdmin($_POST['admin_fname'], $_POST['admin_lname'], $_POST['admin_phone'], $_POST['admin_email'], $_POST['admin_password'], $_POST['admin_gender'], $_POST['admin_staffno']);

								$_SESSION['admin_id'] = $this->dbcon->insert_id;
								$_SESSION['admin_fname'] = $_POST['admin_fname'];
								$_SESSION['admin_lname'] = $_POST['admin_lname'];
								$_SESSION['admin_phone'] = $_POST['admin_phone'];
								$_SESSION['admin_email'] = $_POST['admin_email'];
								$_SESSION['admin_gender'] = $_POST['admin_gender'];
								$_SESSION['admin_staffno'] = $_POST['admin_staffno'];
								// to go a step further, add a special key to authenticate who is in session.
								$_SESSION['mem'] = "@@Exec_2090%";
							
								header("Location: admin_dashboard.php?msg=Successfully logged in");
								exit;
						} 
							}
					

					}
				?>

			<img src="images/reg.png" class="img-fluid" alt="registration pics" id="regPics" width="480" height="400">

						<?php 

					if(isset($_POST['adminlogin_btn']) && $_POST['adminlogin_btn']=='Log In') {

						$catcherrors = array();

						if(empty($_POST['admin_email'])) {
							$catcherrors[] = "Email Address is required"; 
						}
						if(empty($_POST['admin_password'])) {
							$catcherrors[] = "Password is required"; 
						}

						if(!empty($catcherrors)) {
							echo "<ul class='alert alert-danger'>";
							foreach ($catcherrors as $key => $value) {
								echo "<li>$value</li>";
							}
							echo "</ul>";
						}

						elseif(empty($catcherrors)) {
							$objlogin = new MyAdmin;
							$_POST['admin_password'] = md5($_POST['admin_password']);

							$admin = $objlogin->adminLogin($_POST['admin_email'], $_POST['admin_password']);
							if(!$admin) {
								echo "<p class='alert alert-danger'>Invalid credentials</p>";
							}
							else {
								$_SESSION['admin_email'] = $_POST['admin_email'];
								// to go a step further, add a special key to authenticate who is in session.
								$_SESSION['mem'] = "@@Exec_2090%";
								header("Location: admin_dashboard.php?msg=Successfully logged in");
								exit;	
							}
							
						}

					}
				?>
		</div>

		<div class="col-md-4" style="display:none;" id="adminlogin_formdiv">
			<form method="post" action="" name="adminlogin_form" class="form-group">
				<label>Email Address</label>
				<input type="email" name="admin_email" class="form-control">

				<label>Password</label>
				<input type="password" name="admin_password" class="form-control"><br>

				<input type="submit" class="btn btn-block btn-secondary" name="adminlogin_btn" value="Log In">
			</form>
		</div>

		<div class="col-md-4" style="display:none;" id="adminsignup_formdiv">
			<form method="post" action="" name="adminsignup_form" class="form-group" enctype="multitype/form-data">
				<label>Firstname</label>
				<input type="text" name="admin_fname" class="form-control">
				<label>Lastname</label>
				<input type="text" name="admin_lname" class="form-control">
				<label>Phone</label>
				<input type="text" name="admin_phone" class="form-control">
				<label>Email Address</label>
				<input type="text" name="admin_email" class="form-control">
				<label>Password</label>
				<input type="password" name="admin_password" class="form-control"><br>
				<label>Gender</label>&nbsp;
				<input type="radio" name="admin_gender" value="male"> Male
				<input type="radio" name="admin_gender" value="female"> Female<br>
				<label>Staff No</label>
				<input type="text" name="admin_staffno" class="form-control"><br>
				<input type="submit" name="adminsignup-btn" class="btn btn-block btn-secondary" value="Sign Up">

			</form>
		</div>

		<div class="col-md-4">
			<p style="color:midnightblue; padding: 10px;">“When a delicate task has been assigned to you, it is because they trust in your capabilities; so do it with a touch of excellence, leaving no stones unturned. And do not take bribe or soil your reputation simply because you are in a position to. Remember, karma awaits you ahead in life.” – Mr. Kalio</p>
		</div>
	
</div>






<?php include_once("memfooter.php") ?>

