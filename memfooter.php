
<!-- Row 10 -->
		<div class="inb-div"></div>
			<div class="row" id="r10">
				<div class="col-md-4 r10c" id="r10c1">
					<h5>ABOUT US</h5>
					<p>MEM is an acronym for Medical Equipment Market. It's an online market where all Medical Professionals can purchase any brand of medical equipment. This site also takes away the burden of advertising off the retailers and distributors. It also creates a platform for Procurement Officers to view prices before awarding contracts.</p>
					<p><a href="#">FAQ</a><br>
					<a href="#">Delivery</a><br>
					<a href="#">Career</a><br>
					<a href="admin.php">Admin</a></p>

					<h5>PAYMENT PLATFORMS</h5>
					<a href="login.php"><img src="images/mastercard.png" class="img-fluid" alt="Mastercard"></a>&nbsp;
					<a href="login.php"><img src="images/visa.png" class="img-fluid" alt="Visa"></a>&nbsp;
					<a href="login.php"><img src="images/verve.png" class="img-fluid" alt="Verve"></a>&nbsp;
					<a href="login.php"><img src="images/quickteller.png" class="img-fluid" alt="Quickteller"></a>
				</div>

				<div class="col-md-4 r10c" id="r10c2">
					<h5>CONTACT US</h5>
					<form action="" method="post" class="form-group">
						<input type="name" name="fname" id="cont-fname" placeholder="Firstname Lastname" class="form-control" required><br>
						<input type="email" name="email" id="cont-email" placeholder="Email Address" class="form-control" required><br>
						<input type="text" name="phone" id="cont-phone" placeholder="Phone Number" class="form-control" required><br>
						<textarea id="cont-message" placeholder="Enter your Enquiry or Message" rows="5" class="form-control"></textarea><br>
						<input type="file" name="file" id="cont-file" placeholder="Choose file" class="form-control" ><br>
						<input type="submit" class="btn btn-success btn-block" name="button" id="cont-btn" value="SUBMIT">
					</form>
				</div>

				<div class="col-md-4 r10c" id="r10c3">
					<h5>REACH US</h5>
					<iframe id="map1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.427081810277!2d3.356124514623912!3d6.593722095231526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b92404fc53e8b%3A0x541d10234b33485f!2sMoat%20Academy%20for%20Developers!5e0!3m2!1sen!2sng!4v1636289713266!5m2!1sen!2sng" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" class="img-fluid" alt="map to our address"></iframe>
					<hr id="r10hr">
					<div>
						<p><i class="fa fa-home"></i> 2 Irewole Street, Awoshika,<br>Opebi Road, Ikeja, Lagos<br>
						<i class="fa fa-phone"></i> 08186705771 <br>
						<i class="fa fa-envelope"></i> info@mem.com</p>
					</div>
					<hr id="r10hr">
					<a href="#"><img src="images/facebook.png" class="img-fluid" alt="Facebook"></a>
					<a href="#"><img src="images/twitter.png" class="img-fluid" alt="Twitter"></a>
					<a href="#"><img src="images/linkedin.png" class="img-fluid" alt="LinkedIn"></a>
					<a href="#"><img src="images/instagram.png" class="img-fluid" alt="Instagram"></a>
				</div>
			</div>


<!-- Row 11 -->
			<div class="row" id="r11">
				<div class="col-md-12 r11c" id="r11c1">
					<p>Designed by Medical Equipment Market. All rights reserved &copy; MEM</p>
				</div>
			</div>


		</div>
	</div>


	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	
		

		<script type="text/javascript">


			$(document).ready(function(){


				// jQuery AJAX for search engine on memheader

				$('#searchdiv').hide();

				$('#pagesearch').keyup(function(){

					var searchdata = $('#pagesearch').val();

					$.ajax({
						url: "search.php",
						type: "post",
						data: "names="+searchdata,
						success: function(response) {
							$('#searchdiv').show();
							$('#searchdiv').html(response);
						}

					});
				});


				$('#pagesearch').blur(function(){
					$('#searchdiv').hide();
				});

			// the end of jqueryAJAX 

				$('#existingUser').click(function(){
					$('.retailer').hide();
					$('#regPicsDiv').hide();
					$('#newUser').hide();
					$('#div-ExtUser').show();
					$('#div-ExtUser').addClass('animate__animated animate__bounceInDown');
					$('#fa-times').show();
				});


				$('#existingSeller').click(function(){
					$('.user').hide();
					$('#regPicsDiv').hide();
					$('#newSeller').hide();
					$('#div-ExtSeller').show();
					$('#div-ExtSeller').addClass('animate__animated animate__fadeInBottomLeft');
					$('#fa-times').show();
				});

				
				$('#newUser').click(function(){
					$('.retailer').hide();
					$('#regPicsDiv').hide();
					$('#existingUser').hide();
					$('#div-NewUser').show();
					$('#div-NewUser').addClass('animate__animated animate__rotateIn');
					$('#fa-times').show();
				});


				$('#newSeller').click(function(){
					$('.user').hide();
					$('#regPicsDiv').hide();
					$('#existingSeller').hide();
					$('#div-NewSeller').show();
					$('#div-NewSeller').addClass('animate__animated animate__backInUp');
					$('#fa-times').show();
				});

				$('#admin_signup').click(function(){
					$('#adminpix_div').hide();
					$('#adminlogin_formdiv').hide();
					$('#adminsignup_formdiv').show();
					$('#adminsignup_formdiv').addClass('animate__animated animate__rotateIn');
					$('#fa-times').show();
				});

				$('#admin_login').click(function(){
					$('#adminpix_div').hide();
					$('#adminsignup_formdiv').hide();
					$('#adminlogin_formdiv').show();
					$('#adminlogin_formdiv').addClass('animate__animated animate__bounceInDown');
					$('#fa-times').show();
				});

				$('#fa-times').click(function(){
					location.reload(true);
				});


				$('#tono1').click(function(){
						$('#tonometer1').show();
						$('#tonometer2').hide();
						$('#tonometer3').hide();
						$('#tonometer4').hide();
				});

				$('#tono2').click(function(){
						$('#tonometer2').show();
						$('#tonometer1').hide();
						$('#tonometer3').hide();
						$('#tonometer4').hide();
				});

				$('#tono3').click(function(){
						$('#tonometer3').show();
						$('#tonometer1').hide();
						$('#tonometer2').hide();
						$('#tonometer4').hide();
				});

				$('#tono4').click(function(){
						$('#tonometer4').show();
						$('#tonometer1').hide();
						$('#tonometer2').hide();
						$('#tonometer3').hide();
				});

				$('#editlink').click(function(){
						$('#quantity').hide();
						$('#editquantity').show();	
				})

				$('#deletelink').click(function(){
						$('#deleteitem').show();
						$('#deletelink').hide();	
				})
				
				// $('paybtn').click(function(){
				// 	$('orderdiv').location.reload(true);
				// 	$('cartdiv').location.reload(true);
				// })
				
		});
	</script>




	<!-- Button trigger modal -->
		<!-- Modal -->
		<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>
		        	<b>AGREEMENT TO TERMS</b>

					These Terms and Conditions constitute a legally binding agreement made between you, whether personally or on behalf of an entity (“you”) and [business entity name] (MEDICAL EQUIPMENT MARKET), concerning your access to and use of the [www.mem.com] website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively, the “Site”).

					You agree that by accessing the Site, you have read, understood, and agree to be bound by all of these Terms and Conditions. If you do not agree with all of these Terms and Conditions, then you are expressly prohibited from using the Site and you must discontinue use immediately.

					Supplemental terms and conditions or documents that may be posted on the Site from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Terms and Conditions at any time and for any reason.

					We will alert you about any changes by updating the “Last updated” date of these Terms and Conditions, and you waive any right to receive specific notice of each such change.

					It is your responsibility to periodically review these Terms and Conditions to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Terms and Conditions by your continued use of the Site after the date such revised Terms and Conditions are posted.

					The information provided on the Site is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country.

					Accordingly, those persons who choose to access the Site from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable.

					These terms and conditions were generated by Medical Equipment Market.
				</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
</body>
</html>
<?php 
ob_flush();
?>