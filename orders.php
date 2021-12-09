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


		<div class="col-md-2 mt-5">
			<label>Choose Order Type</label><br>
			<select id="ordertype" class="form-control">
				<option value="">--Select--</option>
				<option value="New Order">New Order</option>
				<option value="Pending Order">Pending Order</option>
				<option value="Successful Order">Successful Order</option>
			</select>
		</div>

		<div class="col-md-6 mt-2">
			<h6 class="text-center">My Orders</h6>
			<hr>
			<table class="table table-striped table-bordered" id="orderdiv">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Name of Equipment</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
					
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
						<td><?php echo $value['equip_name'] ?></td>
						<td> <div id="quantity"><?php echo $value['quantity'] ?></div>
							
							<div id="editquantity" style="display:none">
								<?php 
                    		if(isset($_POST['edit']) &&  $_POST['edit']=='EDIT') {
                    			if(empty($_POST['quantity']) || $_POST['quantity']<1) {
                    				echo "<div class='alert alert-danger'>Minimum = 1</div>";
                    			}
                    			else {
                    				$objcart = new MyCart;
                    				$equip_name = $_POST['equip_name'];
                    				$equip_price = $_POST['equip_price'];
                    				$quantity = $_POST['quantity'];
                    				$session_id = $_SESSION['mycart'];
									$newcart = $objcart->editCart($_POST['quantity'], $_POST['cart_id']);
									
									// to go a step further, add a special key to authenticate who is in session.
									$_SESSION['mem'] = "@@Exec_2090%";

									header("Location: cart.php?msg=Successfuly edited");
									exit;
		                    			}
		                    		}
		                    	?>
								<form name="cartform" method="post" action="" class="form-group">
									<input type="hidden" name="cart_id" value="<?php echo $value['cart_id'] ?>"><br>
									<input type="hidden" name="equip_name" value="<?php echo $value['equip_name'] ?>">
									<input type="text" name="quantity" id="qty" size="2px" style="text-align:center"><br>
									<input type="hidden" name="equip_price" value="<?php echo $value['equip_price'] ?>">
									<br>
									<input type="submit" class="btn btn-info btn-block" name="edit" value="EDIT">
								</form>
							</div>
						</td>
						<td><?php echo number_format($value['equip_price'], 2) ?></td>
						<td><?php 
							$qty = $value['quantity'];
							$prc = $value['equip_price'];
							$total = array();
							$total = $qty * $prc;
							$paydue+= $total;
							echo number_format($total, 2);
						?></td>
						
					</tr>
					
					<?php 
								}	

							}
						}
					?>
					<tr>
						<td></td>
						<td>Payment Due</td>
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
					        $email= $_SESSION['cust_email'];
					        $paydue = $_POST['amount'];
					        // use initializePaystack method
					        $output = $payobj->initializePaystack($email, $paydue);
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
			        	<input type="submit" class="btn btn-success btn-block" name="submit" id="paybtn" value="PAY">
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