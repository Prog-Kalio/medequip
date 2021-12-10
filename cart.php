<?php session_start();
include_once("classes.php");
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
			<table class="table table-striped table-bordered" id="cartdiv">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Name of Equipment</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Edit</th>
						<th>Delete</th>
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
						<td>
							<div id="editlink">
							<span class="text-primary"><i class="fa fa-edit"></i></span>
							</div>
							
						</td>
						<td>
							<div class="deletelink">
							<span class="text-danger"><i class="fa fa-trash" id="deletelink"></i></span>
							</div>

							<div id="deleteitem" style="display:none">
							<?php 
	                    		if(isset($_POST['delete']) &&  $_POST['delete']=='DELETE') {
	                    			
	                    				$objcart = new MyCart;
	                    			
										$newcart = $objcart->deleteItemIncart($_POST['cart_id']);
										
										// to go a step further, add a special key to authenticate who is in session.
										$_SESSION['mem'] = "@@Exec_2090%";

										header("Location: cart.php?msg=Successfully deleted");
										exit;
	                    		}
	                    	?>
							<form name="cartform" method="post" action="" class="form-group">
								<input type="hidden" name="cart_id" value="<?php echo $value['cart_id'] ?>"><br>
								<input type="submit" class="btn btn-danger btn-block" name="delete" value="DELETE">
							</form>
						</div>
						</td>
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
	                    		if(isset($_POST['proceed']) &&  $_POST['proceed']=='PROCEED') {
	                    						
										// to go a step further, add a special key to authenticate who is in session.
										$_SESSION['mem'] = "@@Exec_2090%";

										header("Location: orders.php?msg=confirmed for payment");
										exit;
	                    		}
	                    	?>
							<form name="confirmation_form" method="post" action="" class="form-group">
								<input type="submit" class="btn btn-success btn-block" name="proceed" value="PROCEED">
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