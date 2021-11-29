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


	<div class="mt-4">
		<div class="alert alert-success text-right" style="padding: 20px; font-weight: bold">
			<?php 
				if(isset($_SESSION['admin_email'])) {
					$emailname = explode("@", $_SESSION['admin_email']);
					echo $success." ".$emailname[0]."<br>";
				}
			?>
		</div>
		

		<h2 class="text-center">ALL CATEGORIES</h2>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Equipment Name</th>
					<th>Name of Category</th>
					<th>Category ID</th>
				</tr>
			</thead>

			<tbody>
					<?php 

						$objcat = new MyCategory;
						$output = $objcat->getAllCategory();
						 $counter = 0;
						foreach ($output as $key => $value) {

					?>
				<tr>
					<td><?php echo ++$counter; ?></td>
					<td><?php echo $value['equip_name']; ?></td>
					<td><?php echo $value['category_name']; ?></td>
					<td><?php echo $value['category_id']; ?></td>
				</tr>

					<?php 
						
						}	
					?>
			</tbody>
		</table>
	</div>


<?php include_once("dashboard_footer.php"); ?>

<?php include_once("memfooter.php") ?>