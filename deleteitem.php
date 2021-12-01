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



		<div class="col-md-3 offset-md-2 mt-5">
			<?php 
                    		if(isset($_POST['btn-buy1']) &&  $_POST['btn-buy1']=='DELETE') {
                    			
                    				$objcart = new MyCart;
                    			
									$newcart = $objcart->deleteItemIncart($_POST['cart_id']);
									
									// to go a step further, add a special key to authenticate who is in session.
									$_SESSION['mem'] = "@@Exec_2090%";

									header("Location: cart.php?msg=Successfully deleted");
									exit;
                    		}
                    	?>
			<form name="cartform" method="post" action="" class="form-group">

				<label>Cart ID</label>
				<input type="number" name="cart_id"><br>
				<input type="submit" class="btn btn-success btn-block" name="btn-buy1" value="DELETE">
			</form>
		</div>
	
	</div>		




<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>