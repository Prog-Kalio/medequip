<?php session_start();

include_once("classes.php");
include_once("memheader.php");



	
?>


	<div class="title-div"><h3>REGISTRATION</h3></div>
	<div class="row cnt-row" id="loginrow">
		<div class="col-md-4 loginclass" id="loginrow1">
			<div id="div-reg">
				<h5>No one is left out... <span><button class="btn btn-info" id="fa-times" style="display:none"><i class="fa fa-times"></i></button></span></h5>
				<input type="radio" class="user" name="user" id="existingUser"> Existing Buyer?
				<input type="radio" class="user" name="user" id="newUser"> New Buyer?<br>
				<input type="radio" class="retailer" name="retailer" id="existingSeller"> Existing Seller?
				<input type="radio" class="retailer" name="retailer" id="newSeller"> New Seller?<br>
			</div>

			<div id="PicsDiv">
				<img src="images/security.png" class="img-fluid" alt="registration pics" id="regPics" width="200" height="250">
			</div>

		</div>


		<div class="col-md-4 loginclass" id="loginrow2">
<!-- PHP Signup for customers -->
			<?php  

			if (isset($_POST['cust_signup_btn']) && $_POST['cust_signup_btn'] == 'Sign Up') {

				// next we validate the fields, but first let's open an array to store all received feedback or errors

				$errors = array();

				if (empty($_POST['cust_firstname'])) {
					$errors[] = "Firstname is required!";
				}
				if (empty($_POST['cust_lastname'])) {
					$errors[] = "Lastname is required!";
				}
				if (empty($_POST['cust_phone'])) {
					$errors[] = "Phone Number is required!";
				}
				if (empty($_POST['cust_email'])) {
					$errors[] = "Email Address is required!";
				}
				if (empty($_POST['cust_username'])) {
					$errors[] = "Username is required!";
				}
				if (empty($_POST['cust_password'])) {
					$errors[] = "Password is required!";
				}
				elseif (strlen(trim($_POST['cust_password'])) < 6) {
					$errors[] = "Password must be more than six characters!";
				}
				if (empty($_POST['cust_CFpassword'])) {
					$errors[] = "Password Confirmation field cannot be empty!";
				}
				if (($_POST['cust_password']) !== ($_POST['cust_CFpassword'])) {
					$errors[] = "Passwords do not match!";
				}
				if (empty($_POST['cust_gender'])) {
					$errors[] = "Gender is required!";
				}
				if (empty($_POST['cust_address'])) {
					$errors[] = "Address is required!";
				}
				if (empty($_POST['terms'])) {
					$errors[] = "You are yet to agree to our Terms!";
				}


				if(empty($errors)) {
					$objuser = new MyCustomers;

					// check if email address exists
	              if ($objuser->checkEmailAddress($_POST['cust_email']) == true) {
	                echo "<div class='alert alert-danger'>Email Address already taken!</div>";
	              }
	              else {
	              	// register
					$new_User = $objuser->addCustomers($_POST['cust_firstname'], $_POST['cust_lastname'], $_POST['cust_phone'], $_POST['cust_email'], $_POST['cust_username'], $_POST['cust_password'], $_POST['cust_gender'], $_POST['cust_address']);

						// so create session variables
					
						$_SESSION['cust_firstname'] = $_POST['cust_firstname'];
						$_SESSION['cust_lastname'] = $_POST['cust_lastname'];
						$_SESSION['cust_phone'] = $_POST['cust_phone'];
						$_SESSION['cust_email'] = $_POST['cust_email'];
						$_SESSION['cust_username'] = $_POST['cust_username'];
						$_SESSION['cust_gender'] = $_POST['cust_gender'];
						$_SESSION['cust_address'] = $_POST['cust_address'];
						// to go a step further, add a special key to authenticate who is in session.
						$_SESSION['mem'] = "@@Exec_2090%";

					header("Location: customer_dashboard.php?msg=Successfuly logged in");
					exit;
					}
				}

				// next we alert the errors found

				if (!empty($errors)) {

					echo "<ul class='alert alert-danger'>";
             		foreach ($errors as $key => $value) {
                	echo "<li>$value</li>";
              			}
              		echo "</ul>";
				}

			}

			?>

			<div id="regPicsDiv">
			
			<div>
					
<!-- PHP Signup for Retailers -->
			<?php  

			if (isset($_POST['retailers_signup_btn']) && $_POST['retailers_signup_btn'] == 'Sign Up') {

				// next we validate the fields, but first let's open an array to store all received feedback or errors

				$pickerrors = array();

				if (empty($_POST['retailers_firstname'])) {
					$pickerrors[] = "Firstname is required!";
				}
				if (empty($_POST['retailers_lastname'])) {
					$pickerrors[] = "Lastname is required!";
				}
				if (empty($_POST['retailers_phone'])) {
					$pickerrors[] = "Phone Number is required!";
				}
				if (empty($_POST['retailers_company'])) {
					$pickerrors[] = "Company Name is required!";
				}
				if (empty($_POST['retailers_email'])) {
					$pickerrors[] = "Email Address is required!";
				}
				if (empty($_POST['retailers_password'])) {
					$pickerrors[] = "Password is required!";
				}
				if (empty($_POST['retailers_address'])) {
					$pickerrors[] = "Address is required!";
				}
				if (empty($_POST['terms'])) {
					$pickerrors[] = "You are yet to agree to our Terms!";
				}

				// next we alert the errors found

				if (!empty($pickerrors)) {

					echo "<ul class='alert alert-danger'>";
             		foreach ($pickerrors as $key => $value) {
                	echo "<li>$value</li>";
              			}
              		echo "</ul>";
				}

				elseif(empty($pickerrors)) {
					$objsign = new MyRetailers;

					// check if email address exists
	              if ($objsign->checkEmail($_POST['retailers_email']) == true) {
	                echo "<div class='alert alert-danger'>Email Address already taken!</div>";
	              }
	              else {
	              	// register
					$new_seller = $objsign->addRetailers($_POST['retailers_firstname'], $_POST['retailers_lastname'], $_POST['retailers_phone'], $_POST['retailers_company'], $_POST['retailers_email'], $_POST['retailers_password'], $_POST['retailers_address']);

						// echo "<pre>";
						// print_r($new_seller);
						// echo "</pre>";
						// so create session variables
						
							$_SESSION['retailers_company'] = $_POST['retailers_company'];
							$_SESSION['retailers_firstname'] = $_POST['retailers_firstname'];
							$_SESSION['retailers_lastname'] = $_POST['retailers_lastname'];
							$_SESSION['retailers_email'] = $_POST['retailers_email'];
							$_SESSION['retailers_phone'] = $_POST['retailers_phone'];
							$_SESSION['retailers_address'] = $_POST['retailers_address'];
							// to go a step further, add a special key to authenticate who is in session.
							$_SESSION['mem'] = "@@Exec_2090%";

					header("Location: retailers_dashboard.php?msg=Successfuly logged in");
					exit;
					}
				}

			}

			?>
				</div>
				
				<img src="images/reg.png" class="img-fluid" alt="registration pics" id="regPics" width="480" height="400">
				<div>
<!-- PHP Login for customers -->
			<?php  

					if (isset($_POST['cust_signin_btn']) && $_POST['cust_signin_btn']== 'Sign In') {

						$formerrors = array();

						if (empty($_POST['cust_email'])) {
							$formerrors[] = "Email field is required";
						}

						if (empty($_POST['cust_password'])) {
							$formerrors[]= "Password field is required";
						}

						if (!empty($formerrors)) {
							echo "<ul class='alert alert-danger mt-2'>";
							foreach ($formerrors as $key => $value) {
								echo "<li>$value</li>";
							}
							echo "</ul>";
						}
						elseif (empty($formerrors)) {
							$objlogin = new MyCustomers;
							$_POST['cust_password'] = md5($_POST['cust_password']);

							$output = $objlogin->login($_POST['cust_email'], $_POST['cust_password']); 
							if (!$output) {
								echo "<p class='alert alert-danger'>Invalid Login credentials</p>";
							}
							else {
								// so create session variables
							$_SESSION['cust_email'] = $_POST['cust_email'];

							// to go a step further, add a special key to authenticate who is in session.
							$_SESSION['mem'] = "@@Exec_2090%";
								header("Location: customer_dashboard.php");
								exit;
								
							}
						}

					}

			?>
		</div>

		<div>
<!-- PHP Login for Retailers -->
			<?php  

				if (isset($_POST['retailers_login_btn']) && $_POST['retailers_login_btn']== 'Log In') {

					$allerrors = array();

					if (empty($_POST['retailers_email'])) {
						$allerrors[] = "Email field is required";
					}

					if (empty($_POST['retailers_password'])) {
						$allerrors[]= "Password field is required";
					}

					if (!empty($allerrors)) {
						echo "<ul class='alert alert-danger mt-2'>";
						foreach ($allerrors as $key => $value) {
							echo "<li>$value</li>";
						}
						echo "</ul>";
					}
					elseif (empty($allerrors)) {
						$objlog = new MyRetailers;

						$myOutput = $objlog->loginRetailer($_POST['retailers_email'], $_POST['retailers_password']); 
						if (!$myOutput) {
							echo "<p class='alert alert-danger'>Invalid Login credentials</p>";
						}
						else {

							// so create session variables
							$_SESSION['retailers_email'] = $_POST['retailers_email'];

							// to go a step further, add a special key to authenticate who is in session.
							$_SESSION['mem'] = "@@Exec_2090%";

							// echo "<pre>";
							// print_r($myOutput);
							// echo "</pre>";
							header("Location: retailers_dashboard.php?msg=Successfully logged in");
							exit;
						}
					}

				}

		?>
			</div>
			</div>

<!-- Customers login form -->
			<div id="div-ExtUser" style="display:none" class="animate__animated animate__bounceInDown">
				<h6>Existing Buyer</h6><br>

				<form name="form-ExtUser" action="" method="post" class="form-group">
					<label>Email Address</label>
					<input type="email" name="cust_email" class="form-control" placeholder="Email address">
					<label>Password</label>
					<input type="password" name="cust_password" class="form-control" placeholder="Password"><br>
					<input type="submit" name="cust_signin_btn" class="btn btn-block btn-dark" value="Sign In">
				</form>
			</div>


<!-- Customers signup form -->
			<div id="div-NewUser" style="display:none" class="animate__animated animate__rotateIn">
				<h6>New Buyer</h6>
						<form id="form-newUser" action="" method="post" class="form-group" name="NewUser-Form">
			
							<label>Firstname</label>
							<input type="text" name="cust_firstname" class="form-control" placeholder="Firstname">
							<label>Lastname</label>
							<input type="text" name="cust_lastname" class="form-control" placeholder="Lastname">
							<label>Phone Number</label>
							<input type="text" name="cust_phone" class="form-control" placeholder="Phone Number">
							<label>Email Address</label>
							<input type="email" name="cust_email" class="form-control" placeholder="Email Address">
							<label>Username</label>
							<input type="text" name="cust_username" class="form-control" placeholder="Username">
							<label>Password</label>
							<input type="password" name="cust_password" class="form-control" placeholder="Password">
							<label>Confirm Password</label>
							<input type="password" name="cust_CFpassword" class="form-control" placeholder="Confirm Password">
							<label>Select Gender</label>
							<input type="radio" name="cust_gender" value="male"> Male
							<input type="radio" name="cust_gender" value="female"> Female<br>
							<label>Address</label>
							<textarea id="cust_address" placeholder="Enter Address" name="cust_address" class="form-control" rows="3"></textarea>
							<input type="checkbox" name="terms"> I agree to <a href="#" data-toggle="modal" data-target="#staticBackdrop">Terms & Conditions</a>
							<input type="submit" id="cust_signup_btn" class="btn btn-block btn-dark" name="cust_signup_btn" value="Sign Up">
						</form>
			</div>

<!-- Retailers login form -->
			<div id="div-ExtSeller" style="display:none" class="animate__animated animate__fadeInBottomLeft" >
				<h6>Existing Seller</h6>
				<form name="retailers_login_form" action="" method="post" class="form-group">
					<label>Email Address</label>
					<input type="email" name="retailers_email" class="form-control" placeholder="Email">
					<label>Password</label>
					<input type="password" name="retailers_password" class="form-control" placeholder="Password"><br>
					<input type="submit" name="retailers_login_btn" class="btn btn-block btn-dark" value="Log In">
				</form>
			</div>

<!-- Retailers signup form -->
			<div id="div-NewSeller" style="display:none" class="animate__animated animate__backInUp">
				<h6>New Seller</h6>
				<form name="retailers_signup_form" action="" method="post" class="form-group">
					<label>Firstname</label>
					<input type="text" name="retailers_firstname" class="form-control" placeholder="Firstname">
					<label>Lastname</label>
					<input type="text" name="retailers_lastname" class="form-control" placeholder="Lastname">
					<label>Phone Number</label>
					<input type="text" name="retailers_phone" class="form-control" placeholder="Phone Number">
					<label>Company Name</label>
					<input type="text" name="retailers_company" class="form-control" placeholder="Email Address">
					<label>Email Address</label>
					<input type="email" name="retailers_email" class="form-control" placeholder="Email">
					<label>Password</label>
					<input type="password" name="retailers_password" class="form-control" placeholder="Password">
					<label>Address</label>
					<textarea name="retailers_address" placeholder="Enter Address" class="form-control" rows="3"></textarea>

					<input type="checkbox" name="terms"> I agree to <a href="#" data-toggle="modal" data-target="#staticBackdrop">Terms & Conditions</a>
					<input type="submit" name="retailers_signup_btn" class="btn btn-block btn-dark" value="Sign Up">
				</form>
			</div>
				
		</div>

		<div class="col-md-4 loginclass" id="loginrow3">

			<p style="color:midnightblue; padding: 10px;">“A customer is the most important visitor on our premises, he is not dependent on us. We are dependent on him. He is not an interruption in our work. He is the purpose of it. He is not an outsider in our business. He is part of it. We are not doing him a favor by serving him. He is doing us a favor by giving us an opportunity to do so.” – Mahatma Gandhi</p>

		</div>
	</div>
	

<?php include_once("memfooter.php") ?>