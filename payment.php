<?php session_start();
include_once("classes.php");
include_once("paystackclass.php");
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
					<a href="transactions.php" class="btn btn-block btn-light text-left">TRANSACTIONS</a>
					<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
					<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
				</div>

				<div class="col-md-5 offset-1">

					<h4 class="mt-4 mb-3">PAYMENT</h4>
				
				    <?php 
				      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				        // create payment object
				        $payobj = new Payment;
				        // use initializePaystack method
				        $output = $payobj->initializePaystack($_POST['email'], $_POST['amount']);

				        echo "<pre>";
				        print_r($output->data->authorization_url);
				        echo "</pre>";


				        $redirecturl = $output->data->authorization_url;
				        $reference = $output->data->reference;

				        // insert transaction details & redirect to paystack
				        if (!empty($redirecturl)) {
				          $payobj->insertTransactionDetails($_SESSION['user_id'], $_POST['amount'], $reference);
				          header("Location: $redirecturl");
				          exit;
				        }


				      }
				        


				    ?>

					<form method="post" action="">
			        	<label>&#8358; 5,000.00</label> <!-- naira &#8358;-->
			        	<input type="hidden" name="email" value="<?php echo $_SESSION['cust_email'] ?>">
			        	<input type="hidden" name="amount" value="5000"><br>
			        	<input type="submit" name="submit" value="Pay Due">
			        </form>
				</div>

			</div>

<?php include_once("memfooter.php") ?>
