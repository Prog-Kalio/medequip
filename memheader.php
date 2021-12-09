<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="medical equipment, ">
	<meta name="description" content="Medical Equipment Market MEM is an online market where Medical Professionals can get any category of either pocket-friendly or high-end medical equipment brands; irrespective of their location. It's a home for also Procurement officers to confirm prices of medical equpment before awarding contracts. Retailers, Distributors and Original Equipment Manufacturers can showcase their brands too.">
	<meta name="author" content="Mr. Kalio Tamunotonye">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Medical Equipment Market MEM</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link type='text/css' rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<style type="text/css">

		* {
			padding: 0;
			margin:  0;
			box-sizing: border-box;
		}

		.container-fluid {
			min-height: 500px;
			max-width: 100%;
			background-color: rgb(245,245,245);
		}

		.myContainer {
			width: 97%;
			margin: auto;
			background-color: #fff;
		}

		#r1 {
			min-height: 80px;
			background-color: rgb(38,42,44);
		}

		#r2 {
			margin: 20px 0;
			margin: auto;
		}

		#r3 {
			margin: 20px 0;
			padding: 10px;
			padding-right: 15px;
			width: 96%;
			margin: auto;
		}

		#r5 {
			margin: 20px 0;
			width: 96%;
			margin: auto;
			padding: 10px;
		}

		#r4, #r6, #r8 {
			margin: 20px 0px;
			padding: 10px;
			width: 96%;
			margin: auto;
		}
		
		#home-cart {
			font-size: 30px;
			text-align: right;
			color: rgb(245,245,245);
		}

		#r1 .r1c {
			height: 60px;
			align-self: center;
		}

		#r1 #r1c2 {
			text-align: center;
		}

		#r1c2 h3 {
			color: rgb(245,245,245);
		}
		a:link {
			text-decoration: none;
		}
		#loginrow {
			margin: 20px 0;
			margin: auto;
		}

		#loginrow .loginclass {
			min-height: 600px;
			padding: 35px 10px 15px 10px;
			background-color: rgb(245,245,245);
		}

		#loginrow1, #loginrow2, #loginrow3 {
			background-color: rgb(245,245,245);
			padding-top: 10px;
		}

		#r2 .r2c {
			min-height: 430px;
			padding: 10px;
			background-color: rgb(245,245,245);
		}

		#r2c1, #r2c3 {
			background-color: rgb(245,245,245);
		}

		.dropdown-item:hover {
			border-bottom: 1px solid #000;
			text-align: left;
			background-color: #e0e0e0;
		}

		#r3 .r3c {
			height: 350px;
			box-shadow: 0 10px 10px 0 rgb(245,245,245);
			transition: transform 0.5s;
			border-radius: 10px;
		}

		#r3 .r3c:hover {
			transform: translateY(-10px);
		}

		.r5c {
			min-height: 350px;
			width: 96%;
			margin: auto;
			background: linear-gradient(to top, rgb(244,246,245), rgb(240,239,244), rgb(244,246,245));
		}
		#r5c1 {
			text-align: right;
			padding:  10px;
		}
		#r5c1 img {
			border-radius: 10px;
			margin-right: 30px;
		}
		#r5c2 {
			padding-top: 50px;
			font-size: 20px;
		}

		#r5c2 h5 {
			font-size: 35px;
		}

		#r7 {
			width: 98%;
			margin: auto;
		}

		#r7 .r7c {
			min-height: 250px;
			background: linear-gradient(to top, rgb(244,246,245), rgb(240,239,244), rgb(244,246,245));
			padding: 10px;
			width: 96%;
			margin: auto;
			border-radius: 10px;
		}

		#r7c2, #r7c3 {
			box-shadow: 0 10px 20px 0 rgb(245,245,245);
			max-height: 250px;
		}
	
		.equipment {
			border: 3px solid white;
			border-radius: 10px;
			height: 350px;
			line-height: 3px;
			padding-top: 10px;
			background: linear-gradient(to top, rgb(244,246,245), rgb(240,239,244), rgb(244,246,245));
			box-shadow: 0 10px 20px 0 rgb(245,245,245);
			transition: transform 0.5s;
		}

		.equipment:hover {
			transform: translateY(-15px);
		}

		.equipment img {
			width: 100%;
		}

		#r4 .r4c p, .r6c p, .r8c p {
			padding-top: 8px;
		}

		#btn-category .btn-ctg {
			padding:  2px;
			text-align: left;
		}

		#active {
			background-color: #e0e0e0;
		}

		#btn-category .btn-ctg:hover {
			border-bottom: 1px solid #000;
			padding: 3px;
			background-color: #e0e0e0;
		}

		#div-ExtUser {
			margin-top: 30px;
		}

		#newUser {
			margin-left: 20px;
		}

		#div-ExtSeller {
			margin-top: 27px;
		}
		#newSeller {
			margin-left: 15px;
		}
		#div-reg h5 span {
			margin-left: 20px;
			font-size: 16px;
		}
		#div-reg {
			font-size: 15px;
		}
		.span-buy {
			text-decoration-line: line-through;
			font-weight: bold;
		}
		#fa-times {
			filter: grayscale(100%);
		}
		#fa-times:hover {
			filter: grayscale(0%);
		}
		.btn-buy {
			margin-right: 15px;
			filter: grayscale(100%);
		}
		.btn-buy:hover {
			filter: grayscale(0%);
		}
		.buy-cart {
			background-color: rgb(250,230,158);
			filter: grayscale(100%);
		}
		.buy-cart:hover {
			filter: grayscale(0%);
		}
		.bannerBtn {
			padding:  3px;
			width: 85px;
			border-radius: 15px;
			background-color: lightskyblue;
			filter: grayscale(100%);
		}
		.bannerBtn:hover {
			width: 95px;
			filter: grayscale(0%);
			font-size: 18px;
			color: rgb(245,245,245);
		}
		.approval .fa {
			font-size: 12px;
			padding-bottom: 3px;
   			color: rgba(194,218,170,0.6);
		}
		#regPicsDiv {
			margin-top: 20px;
		}

		#regPicsDiv #img2 {
			height: 240px;
		}

		#r6, #r7, #r8, #r9, #r10 {
			margin: 20px 0;
		}
		#r9 {
			width: 96%;
			margin: auto;
			padding: 10px;
		}
		#r9 .r9c {
			min-height: 350px;
			width: 96%;
			margin: auto;
			background: linear-gradient(to top, rgb(244,246,245), rgb(240,239,244), rgb(244,246,245));
			border-radius: 10px;
		}
	
		#r9c1 {
			text-align: left;
			padding:  10px;
			font-size: 18px;
		}

		#r9c1 img {
			border-radius: 10px;
			margin-left: 10px;
		}

		#r9c2 {
			padding-top: 10px;
		}

		#r9c1 h5 {
			font-size: 32px;
		}

		#r10 {
			width: 96%;
			margin: auto;
			padding: 10px;
			border-top-radius: 10px;
		}

		#r10 .r10c {
			min-height: 550px;
			width: 96%;
			margin: auto;
			background-color: rgb(11,21,45);
			padding: 10px;
			color: rgb(245,245,245);
			text-align: center;
		}
		#r10c1 p {
			text-align: left;
		}
		#r10c3 img {
			filter: grayscale(70%);
		}

		#r10c3 img:hover {
			filter: grayscale(0%);
		}
		#r10hr {
			background-color: rgb(245,245,245);
			width: 90%;
			margin-left: 20px;
		}

		.inb-div {
			min-height: 40px;
			padding: 15px;
			background-color: rgb(245,245,245);
		}

		#map1 {
			width: 100%;
			height: 250px;
		}

		#r11 {
			width: 95%;
			margin: auto;
			border-top: 1px solid white;
		}
		
		#r11 .r11c {
			width: 95%;
			margin: auto;
			height: 50px;
			padding: 20px;
			background-color: rgb(11,21,45);
			color: rgb(245,245,245);
			text-align: center;
		}

		#r10c2 form {
			width: 96%;
			margin: auto;
			padding: 10px;
		}

		.main-gallery-div {
			width: 96%;
			margin: auto;
			max-height: 350px;
			margin-bottom: 40px;
		}
		
		.main-galleryimg {
			width: 96%;
			margin: auto;
		}
		 
		.gallery-div {
			width: 94%;
			margin-top: 5px;
			height: 70px;
			margin: auto;
		}

		.gallery-img {
			width: 22%;
			height: 100px;
		}

		.retailer-info {
			margin-top: 30px;
			background-color: rgb(250,250,250);
			padding: 5px;
		}

		#rel-prod {
			margin: 20px 0px;
			padding: 10px;
			width: 96%;
			margin: auto;
		}

		.related {
			max-height: 300px;
		}

		#rel-prod .related p{
			padding-top: 8px;
		}

		.title-div {
			padding-top: 20px;
			min-height: 60px;
			width: 94%;
			margin: auto;
			background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.4)), url("images/titlebanner.jpg");
			background-size: cover;
			text-align: left;
			color: white;
			padding-bottom: 15px;
		}

		.dashb-container {
			padding-top: 20px;
			min-height: 300px;
			max-width: 100%;
			margin: auto;
			background-color: rgb(245,245,245);
		}

		.d-menu-col {
			max-height: 80px;
		}

		#searchdiv {
			width: 91%;
			background-color: #fff;
			border: 1px solid black;
			position: absolute;
			top: 40px;
			z-index: 1;
		}

		/* -------Whatsapp ---------*/

		.whatsapp {
		    position: fixed;
		    right: 2%;
		    bottom: 4%;
		}

		.fa-whatsapp {
		    size: 100%;
		    background-color: green;
		    color: white;
		    padding: 35%;
		    border-radius: 50%;
		}

		/*Media queries*/

		// Extra small devices: portrait phones, less than 576px
		@media (max-width: 575.98px) { 



		 }

		// Small devices: landscape phones, 576px and up
		@media (min-width: 576px) and (max-width: 767.98px) {  


		 }

		// Medium devices: tablets, 768px and up
		@media (min-width: 768px) and (max-width: 991.98px) { 


		 }

		// Large devices: desktops, 992px and up
		@media (min-width: 992px) and (max-width: 1199.98px) { 


		 }

		// Extra large devices: large desktops, 1200px and up
		@media (min-width: 1200px) { 


		 }

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="myContainer">
<!-- Row 1 -->
			<div class="row cnt-row" id="r1">
				<div class="col-md-1 r1c" id="r1c1">
					<div class="dropdown">
					  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
					    <i class="fa fa-bars"></i>
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item" id="home" href="index.php">Home</a>
					    <a class="dropdown-item" id="about" href="#r10">About</a>
					    <a class="dropdown-item" id="products" href="products.php">Products</a>
					    <a class="dropdown-item" id="contact" href="#r10">Contact</a>
					    <a class="dropdown-item" id="complaints" href="#r10">Complaints</a>
					    <a class="dropdown-item" id="registration" href="login.php">Registration</a>
					  </div>
					</div>
				</div>
				<div class="col-md-7 r1c" id="r1c2">
					<a href="index.php"><h3>MEDICAL EQUIPMENT MARKET</h3></a>
				</div>

				<div class="col-md-3 r1c" id="r1c3">
					<input type="text" name="pagesearch" id="pagesearch" placeholder="Search equipment name" class="form-control">

					<div id="searchdiv">Display Member here</div>

				</div>

				<div class="col-md-1 r1c" id="r1c4">
					<a href="cart.php"><i class="fa fa-cart-plus" id="home-cart"></i></a>
				</div>
			</div>