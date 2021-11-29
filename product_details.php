<?php 
include_once("memheader.php");
include_once("classes.php");

?>



<!-- Row 12 About Us -->
			<div class="inb-div"><h5>PRODUCT DETAILS</h5></div>
			<div class="row cnt-row" id="equp-row">
				<?php $equip_id=$_GET['equipment_id'];
				$objprofile = new MyEquipment;
				$value = $objprofile->getEquipmentById($equip_id);
				if(!empty($value)) {
				
				?>
				<div class="col-md-5 equip-col" id="equip1-col1" >
					<div class="main-gallery-div">
						<?php if(empty($value['equip_photo'])) { ?>
						<img src="images/lab-5.png" class="img-fluid main-galleryimg" alt="<?php echo $value['equip_name'];?>" id="tonometer1">
						<?php } else { ?>
						<img src="uploads/<?php echo $value['equip_photo'] ?>" class="img-fluid main-galleryimg" alt="Tonometer" id="tonometer1">
						<?php } ?>
						<img src="images/tono1.png" class="img-fluid main-galleryimg" alt="<?php echo $value['equip_name'];?>" id="tonometer2" style="display: none;">
						<img src="uploads/<?php echo $value['equip_photo'] ?>" class="img-fluid main-galleryimg" alt="<?php echo $value['equip_name'];?>" id="tonometer3" style="display: none;">
						
					</div>
					
					<div class="gallery-div">
						<img src="uploads/<?php echo $value['equip_photo'] ?>" class="img-fluid gallery-img" alt="<?php echo $value['equip_name'];?>" id="tono1">
						<img src="images/tono1.png" class="img-fluid gallery-img" alt="<?php echo $value['equip_name'];?>" id="tono2">
						<img src="uploads/<?php echo $value['equip_photo'] ?>" class="img-fluid gallery-img" alt="<?php echo $value['equip_name'];?>" id="tono3">
						
					</div>
				
				</div>

				<div class="col-md-5 equip-col" id="equip-col2">
					<h3><?php echo $value['equip_name']; ?></h3>
					<h6><span class="span-buy">N</span><?php echo $value['equip_price']; ?></h6>
					<div class="approval">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                    </div>

                    <div>
                    	<label>Qty: </label>
                    	<input type="text" name="qty" id="qty" size="2px" style="text-align:center">
                    	<a href="cart.php>"><i class="fa fa-cart-plus"></i></a>
                    </div><br>
					<a href="login.php"><button class="btn btn-success btn-block" id="btn-buy1">Proceed to payment</button></a>
					<br><br>
					<h5>FEATURES:</h5>
					<p>
						<b>The intelligence inside </b> The Keeler intelligent puff system giving you a quantum leap forwards in accuracy and ease of use. intelliPuff embodies electronic and optical technology to deliver you the speed, accuracy and ease of use you and your patients deserve. <br> <b>Our softest puff ever</b> Gentle is understating the new system - if the patient has high pressures the puff will automatically increase for the next measurement. Kind, intelligent and simple. Technology working for you. <br> <b>Desktop or wall mount</b> Save valuable space Pulsair intelliPuff uses less than 50% of the space of conventional non contact tonometers and is the only model that can be wall mounted. Whether you wall mount or prefer to place it on your desk you win the 'space war' every time. No special instrument table is required - put it where you want it. Move it when you want to.
					</p>
				</div>

				<div class="col-md-2 equip-col" id="equip-col3">
					<embed width="100%" height="250" src="images/keeler_tonometer.pdf">
					<br>
					<div class="retailer-info">
						<h6>Retailer's details:</h6>
						<p><b> XYZ Nigeria Ltd</b></p>
						<p><i class="fa fa-home"></i> Opebi Road, Ikeja, Lagos</p>
						<p><i class="fa fa-phone"></i> 08186705771</p>
					</div>
				</div>

				<?php 
					 

				}
			?>
			</div>


<!-- Row 4 -->
		<div class="inb-div"><h6>RELATED PRODUCTS</h6></div>

			<div class="row cnt-row" id="rel-prod">
				<div class="col-md-3 related equipment" id="rel-prod1">
					<img src="images/tonorel1.png" class="img-fluid" alt="Keeler NCT desktop" id="keelerdsk" width="250" height="250">
					<p><b>Tonometer</b></p>
					<p><span class="span-buy">N</span>2,450,000</p>	
				</div>
				<div class="col-md-3 related equipment" id="rel-prod2">
					<img src="images/tonorel2.png" class="img-fluid" alt="Keeler NCT handheld" id="keelerhh" width="250" height="250">
					<p><b>AutoRef</b></p>
					<p><span class="span-buy">N</span>1,580,000</p>
				</div>
				<div class="col-md-3 related equipment" id="rel-prod3">
					<img src="images/tonorel3.png" class="img-fluid" alt="Nidek NCT" id="nidek" width="250" height="250">
					<p><b>Combi Unit</b></p>
					<p><span class="span-buy">N</span>2,600,000</p>
				</div>
				<div class="col-md-3 related equipment" id="rel-prod4">
					<img src="images/tonorel4.png" class="img-fluid" alt="Huvitz NCT" id="huvitz" width="250" height="250">
					<p><b>Slit Lamp</b></p>
					<p><span class="span-buy">N</span>3,300,000</p>
				</div>
			</div>



<?php include_once("memfooter.php") ?>
