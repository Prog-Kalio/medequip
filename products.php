<?php session_start();
include_once("memheader.php");
include_once("classes.php");
?>

<!-- Row 4 -->
		<div class="title-div"><h3>PRODUCT CATEGORIES</h3></div>

			<div class="row cnt-row" id="r4">

				<?php 
				$objprofile = new MyEquipment;
				$output = $objprofile->getEquipment();
				if(!empty($output)) {
				foreach ($output as $key => $value) {
				
				?>

				<div class="col-md-3 r4c equipment card card-body mt-5" id="r4c1">
					<a href="product_details
					.php?equipment_id=<?php echo $value['equip_id'];?>">
					<?php if(empty($value['equip_photo'])) { ?>
					<img class="card-img-top" src="images/lab-5.png" class="img-fluid" alt="Equipment" width="250" height="250">	
					<?php } else { ?>
					<img class="card-img-top" src="uploads/<?php echo $value['equip_photo'] ?>" alt="equipments" width="250" height="250">
					<?php } ?>
					<p><b><?php echo $value['equip_name']; ?></b></p>
					<p><span class="span-buy">N</span><?php echo number_format($value['equip_price'], 2); ?></p>
					<div class="approval">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                    </div>
                	</a>
				</div>
				<?php 
					} 

				}
			?>
			</div>
				

			<div class="row cnt-row" id="r4">

				<?php 
				$objprofile = new MyEquipment;
				$output = $objprofile->getEquipment();
				if(!empty($output)) {
				foreach ($output as $key => $value) {
				
				?>

				<div class="col-md-3 r4c equipment card card-body mt-5" id="r4c1">
					<a href="product_details
					.php?equipment_id=<?php echo $value['equip_id'];?>">
					<?php if(empty($value['equip_photo'])) { ?>
					<img class="card-img-top" src="images/lab-5.png" class="img-fluid" alt="Equipment" width="250" height="250">	
					<?php } else { ?>
					<img class="card-img-top" src="uploads/<?php echo $value['equip_photo'] ?>" alt="equipments" width="250" height="250">
					<?php } ?>
					<p><b><?php echo $value['equip_name']; ?></b></p>
					<p><span class="span-buy">N</span><?php echo number_format($value['equip_price'], 2); ?></p>
					<div class="approval">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                    </div>
                	</a>
				</div>
				<?php 
					} 

				}
			?>
			</div>

<?php include_once("whatsapp.php") ?>
<?php include_once("memfooter.php") ?>
