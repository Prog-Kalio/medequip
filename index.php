<?php 
include_once("memheader.php");
include_once("classes.php");
?>



<!-- Row 2 -->
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

				<div class="col-md-7 r2c" id="r2c2">
					<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
					    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
					    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
					  </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="images/banner2.png" class="d-block w-100" alt="Shop from work">
					    </div>
					    <div class="carousel-item">
					      <img src="images/banner1.png" class="d-block w-100" alt="Some medical equipment">
					    </div>
					    <div class="carousel-item">
					      <img src="images/banner4.png" class="d-block w-100" alt="Surgery">
					    </div>
					    <div class="carousel-item">
					      <img src="images/banner3.png" class="d-block w-100" alt="ICU items">
					    </div>
					    <div class="carousel-item">
					      <img src="images/banner5.png" class="d-block w-100" alt="Theatre Items">
					    </div>
					  </div>
					</div>
				</div>

				<div class="col-md-3 r2c" id="r2c3">
					<h5>Endorsed By:</h5>
					<div id="regPicsDiv">
						<img src="images/nma_logo.png" class="img-fluid" alt="registration pics" id="regPics" width="360" height="150">
						<h5>Secured By:</h5>
						<img src="images/security.png" class="img-fluid" alt="registration pics" id="img2" width="360" height="150">
					</div>
				</div>

			</div>


<!-- Row 3 -->
		<div class="inb-div"><h6>CATEGORIES</h6></div>

			<div class="row cnt-row" id="r3">
				<div class="col-md-4 r3c" id="r3c1">
					<a href="products.php"><img src="images/disp-1.png" class="img-fluid" alt="Orthopedic Equipment" id="orthopedic" width="480" height="400"></a>	
				</div>
				<div class="col-md-4 r3c" id="r3c2">
					<a href="products.php"><img src="images/disp-2.png" class="img-fluid" alt="Theatre Equipment" id="theatre" width="480" height="400"></a>
				</div>
				<div class="col-md-4 r3c" id="r3c3">
					<a href="products.php"><img src="images/disp-3.png" class="img-fluid" alt="Medical Consumables" id="consumables" width="480" height="400"></a>
				</div>
			</div>



<!-- Row 5 -->
			<div class="inb-div"><h6>PAID ADs</h6></div>
				<div class="row cnt-row" id="r5">
					<div class="col-md-6 r5c" id="r5c1">
						<img src="images/gme-1.png" class="img-fluid" alt="Ventilator" id="ventilator" width="400" height="400">
					</div>

					<div class="col-md-6 r5c" id="r5c2">
						<img src="images/covid.png" class="img-fluid" alt="Covid" id="covid" width="50" height="50">
						<p>Covid 19 is real. Stay safe.</p>
						<h5>Ventilator Machine</h5>
						<p><span class="span-buy">N</span>1,890,500</p>
						<a href="ventilator.php"><button class="btn bannerBtn" id="bannerBtn1">Buy</button></a>
					</div>
					
				</div>


<!-- Row 4 -->
		<div class="inb-div"><h6>TOP SELLING</h6></div>

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



<!-- Row 7 -->
		<div class="inb-div"><h6></h6></div>
			<div class="row" id="r7">
				<div class="col-md-8 r7c" id="r7c1">
					<a href="#"><img src="images/blackfriday1.png" class="img-fluid" alt="Black Friday Sales"></a>
				</div>
				<div class="col-md-2 r7c" id="r7c2">
					<a href="autoclave.php"><img src="images/off-1.png" class="img-fluid" alt="AutoClave"></a>
					<p><b>Autoclave</b><br>
					<span class="span-buy">N</span>320,000</p>
				</div>
				<div class="col-md-2 r7c" id="r7c3">
					<a href="trolley.php"><img src="images/off-2.png" class="img-fluid" alt="Trolley"></a>
					<p><b>Trolley</b><br>
					<span class="span-buy">N</span>50,000</p>
				</div>
			</div>



<!-- Row 9 -->
			<div class="inb-div"><h6>PAID ADs</h6></div>
				<div class="row cnt-row" id="r9">
					<div class="col-md-7 r9c" id="r9c1">
						<p>"Little Angel" as it's often called</p>
						<h5>Extracorporeal lithotripter ESWL-109</h5>
						<p>Lithotripsy with non X -ray radiation; Zero electromagnetic radiation; work of low energy; enhanced the quality of core components of shock wave source, extend the working life and reduce treatment costs, real micro- carbon technologies.</p>
						<p><span class="span-buy">N</span>1,890,500</p>
						<a href="lithotripter.php"><button class="btn bannerBtn" id="bannerBtn2">Buy</button></a>
					</div>

					<div class="col-md-5 r9c" id="r9c2">
						<img src="images/smallbanner.png" class="img-fluid" alt="lithotripter" id="lithotripter" width="400" height="400">
					</div>
					
				</div>


<?php include_once("memfooter.php") ?>