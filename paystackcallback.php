<?php 

include_once("paystackclass.php");

$payobj = new Payment;
$output = $payobj->verifyPaystack($_REQUEST['reference']);

if ($output->data->status==='success') {
	$updatetrans = $payobj->updateTransactionDetails($_REQUEST['reference']);

	if ($updatetrans === true) {
		header("Location: customer_dashboard.php?successmsg=Transaction Successful");
		exit;
	}
}

?>