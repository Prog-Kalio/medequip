<?php session_start();
include_once("memheader.php");
include_once("classes.php");
?>

<!-- Row 4 -->

			<div class="row cnt-row" id="r2">

				<div class="col-md-2 r2c" id="r2c1">
					<div class="btn-group-vertical btn-block" id="btn-category" role="group" aria-label="Button group with nested dropdown">
					  <button type="button" class="btn btn-dark"><b>CATEGORIES</b></button>
					  	<?php 
							$objcategory = new MyCategory;
							$newcat = $objcategory->getCategory();
							if(!empty($newcat)) {
							foreach ($newcat as $key => $value) {
							
						?>
					  <a href="category.php?category_id=<?php echo $value['category_id'];?>"><button type="button" class="btn btn-ctg"><?php echo $value['category_name'] ?></button></a>
					  <?php 
								} 

							}
					  ?>
					</div>
				</div>

			
				<?php 
				$objprofile = new MyCategory;
				$category_id = $_GET['category_id'];
				$output = $objprofile->getSpecificCategory($category_id);
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
					<br><br><br>
					<p><b><?php echo $value['equip_name']; ?></b></p>
					<p><span class="span-buy">N</span><?php echo $value['equip_price']; ?></p>
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


<?php include_once("memfooter.php") ?>
