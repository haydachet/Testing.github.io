<?php 
    $path = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE HTML>
<html>
  <head>
	 <title>vKirirom Pine Resort - Cambodia Resorts</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="keywords" content="Cambodia Resort , Pine resort Cambodia, Kirirom resort, Mountain resort cambodia">
	  <meta name="description" content="vKirirom Pine Resort is a newly built Resort in Kirirom Mountain, located about 112 Km northwest of Phnom Penh Capital City and in Kompong Speu Province">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  <link rel="icon" href="images/HomePage/favicon.png" type="image/x-icon"/>
	  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
	  <link href="css/PromoteStyle.css" rel="stylesheet" type="text/css"/>
	  <link href="css/slider.css" rel="stylesheet" type="text/css"  media="all" />
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	  <script type="text/javascript" src="js/jquery.min.js"></script>
	  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	  <script type="text/javascript" src="js/camera.min.js"></script>
	  <script type="text/javascript" src="js/jquery.lightbox.js"></script>
	  <script type="text/javascript" src="js/customtabs.js"></script>
	  <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	  <!--Start drop menu-->
	 
	  <script>
		  $(function() {
			  var pull 		= $('#pull');
			  menu 	= $('nav ul');
			  menuHeight	= menu.height();

			  $(pull).on('click', function(e) {
				  e.preventDefault();
				  menu.slideToggle();
			  });

			  $(window).resize(function(){
				  var w = $(window).width();
				  if(w > 320 && menu.is(':hidden')) {
					  menu.removeAttr('style');
				  }
			  });
		  });
	  </script>
	  <!--End drop menu-->
	  <script src="js/fbplugin.js"></script>
 </head>
	<body>
	<!--start-header-->
	 <div class="header">
	     <div class="wrap">
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/HomePage/vKirirom.svg" title="logo" /></a>
				</div>
				<div class="social-icons">
					<ul>
						<li><a href="https://www.facebook.com/vkirirom"><img src="images/facebook.svg" title="facebook" /></a></li>
						<li><a href="https://www.youtube.com/channel/UCCIu3JTn0s4UX5Kze5Hse0g"><img src="images/youtube.svg" title="youtube" /></a></li>
						<li><a href="https://www.instagram.com/vkirirom/"><img src="images/instagram.svg" title="instagram" /></a></li>
						<li><a href="https://plus.google.com/u/0/102004631432389725270/posts"><img src="images/googleplus.svg" title="google plus" /></a></li>
						<li><a href="https://twitter.com/vKirirom"><img src="images/twitter.svg" title="twitter" /></a></li>
					</ul>
					<div  style="margin-top: 15px;float:right;">
						<div class="row">
							<a id="book" href="reservation.php">Book Now</a>
							<div class="fb-like" data-href="https://www.facebook.com/vkirirom" data-width="250" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
						</div>
					</div>
					
				</div>
				<div class="clear"> </div>
			</div>
			<!--start-top-nav-->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li class="<?php if(preg_match('/index/i', $path)){ echo 'active';} ?>"><a href="index.php">Concept</a></li>
						<li class="<?php if(preg_match('/specialoffer/i', $path)){ echo 'active';} ?>"><a href="specialoffer.php">Special Offers</a></li>
						<li class="<?php if(preg_match('/services/i', $path)){ echo 'active';} ?>"><a href="services.php">Services & Facilities</a></li>
						<li class="<?php if(preg_match('/gallery/i', $path)){ echo 'active';} ?>"><a href="gallery.php">Activities</a></li>
						<li class="<?php if(preg_match('/accommodation/i', $path)){ echo 'active';} ?>"><a href="accommodation.php">Accommodation</a></li>
						<li class="<?php if(preg_match('/restaurant/i', $path)){ echo 'active';} ?>"><a href="restaurant.php">Restaurant</a></li>
						<li class="<?php if(preg_match('/contact/i', $path)){ echo 'active';} ?>"><a href="contact.php">Contact</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				
				<div class="clear"> </div>
			</div>
			 <!--Start import drop down menu-->
			 <div class="top-nav-1">
				 <nav class="dropdown">
					 <ul>
						<li class="<?php if(preg_match('/index/i', $path)){ echo 'active';} ?>"><a href="index.php">Concept</a></li>
						<li class="<?php if(preg_match('/specialoffer/i', $path)){ echo 'active';} ?>"><a href="specialoffer.php">Special Offers</a></li>
						<li class="<?php if(preg_match('/services/i', $path)){ echo 'active';} ?>"><a href="services.php">Services & Facilities</a></li>
						<li class="<?php if(preg_match('/gallery/i', $path)){ echo 'active';} ?>"><a href="gallery.php">Activities</a></li>
						<li class="<?php if(preg_match('/accommodation/i', $path)){ echo 'active';} ?>"><a href="accommodation.php">Accommodation</a></li>
						<li class="<?php if(preg_match('/restaurant/i', $path)){ echo 'active';} ?>"><a href="restaurant.php">Restaurant</a></li>
						<li class="<?php if(preg_match('/contact/i', $path)){ echo 'active';} ?>"><a href="contact.php">Contact</a></li>
						<div class="clear"> </div>
					 </ul>
					 <a href="#" id="pull">Menu</a>
				 </nav>
				 <div class="clear"></div>
			 </div>
			 <!--end drop down menu-->
			<!---End-top-nav---->
		</div>
	</div>
   <!----End-header----->