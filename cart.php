<?php session_start();
include_once("classes.php");
include_once("paystackclass.php");
include_once("memheader.php");
if(!isset($_SESSION['cust_email'])) {
	header("Location: login.php?msg=Please login");
}
elseif ((!isset($_SESSION['mem'])) && ($_SESSION['mem'] != '@@Exec_2090%')) {
  
	header("Location: login.php?msg=Please login");
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
			<a href="cart.php" class="btn btn-block btn-light text-left">ITEMS ON CART</a>
			<a href="settings.php" class="btn btn-block btn-light text-left">SETTINGS</a>
			<a href="logout.php" class="btn btn-block btn-light text-left">LOGOUT</a>
			
		</div>


		<div class="col-md-6 offset-md-1 mt-5">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Cart ID</th>
						<th>Session ID</th>
						<th>Name of Equipment</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
					
				</thead>

				<tbody>
					<?php
						if (isset($_SESSION['mycart'])) {
							 
						$objcart = new MyCart;
						$newcart = $objcart->getFromCart($session_id = $_SESSION['mycart']);

						if(!empty($newcart)) {
						
						$counter = 0;
						$paydue = 0;

						foreach ($newcart as $key => $value) {
						
					?>
					<tr>
						<td><?php echo ++$counter ?></td>
						<td><?php echo $value['cart_id'] ?></td>
						<td><?php echo $value['session_id'] ?></td>
						<td><?php echo $value['equip_name'] ?></td>
						<td><?php echo $value['quantity'] ?></td>
						<td><?php echo number_format($value['equip_price'], 2) ?></td>
						<td><?php 
							$qty = $value['quantity'];
							$prc = $value['equip_price'];
							$total = array();
							$total = $qty * $prc;
							$paydue+= $total;
							echo number_format($total, 2);
						?></td>
						<td>
							<a href="edititem.php?action=edit&id=<?php echo $value["session_id"]; ?>"><i class="fa fa-edit"></i></a><br>
							<a href="deleteitem.php?action=delete&id=<?php echo $value["session_id"]; ?>"><span class="text-danger"><i class="fa fa-trash"></i></span></a>
						</td>
					</tr>
					
					<?php 
								}	

							}
						}
					?>
					<tr>
						<td></td>
						<td></td>
						<td>Payment Due</td>
						<td></td>
						<td></td>
						<td></td>
						<td> <?php
							if(!empty($paydue)) {
							echo (number_format($paydue, 2));
							}
							else {
								echo "0";
							}
						?></td>
						<td>
						 <?php 
					      if (isset($_POST['submit']) && $_POST['submit'] == 'PAY') {
					        // create payment object
					        $payobj = new Payment;
					        $_POST['email'] = $_SESSION['cust_email'];
					        $_POST['amount'] = $paydue;
					        // use initializePaystack method
					        $output = $payobj->initializePaystack($_POST['email'], $_POST['amount']);

					        // echo "<pre>";
					        // print_r($output);
					        // echo "</pre>";


					        $redirecturl = $output->data->authorization_url;
					        $reference = $output->data->reference;

					        // insert transaction details & redirect to paystack
					        if (!empty($redirecturl)) {
					          $payobj->insertTransactionDetails($_SESSION['mycart'], $_POST['amount'], $reference);
					          header("Location: $redirecturl");
					          exit;
					        }
					      }
					    ?>
						<form method="post" action="" name="payform">
			        	<input type="hidden" name="email" value=" <?php echo $_SESSION['cust_email'] ?> ">
			        	<input type="hidden" name="amount" value=" <?php echo $paydue ?> ">
			        	<input type="submit" class="btn btn-success btn-block" name="submit" value="PAY">
			        </form>
						</td>
					</tr> 
				</tbody>
			</table>
		</div>

		

	</div>



<?php 
include_once("whatsapp.php");
include_once("memfooter.php");

?>