<!DOCTYPE HTML>
<html>
  <head>
	 <title>our Resort's special offer</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="keywords" content="Cambodia Resort , Pine resort Cambodia, Kirirom resort, Mountain resort cambodia">
	  <meta name="description" content="vKirirom Pine Resort is a newly built Resort in Kirirom Mountain, located about 112 Km northwest of Phnom Penh Capital City and in Kompong Speu Province">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
	  <link href="css/PromoteStyle.css" rel="stylesheet" type="text/css"/>
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
						<li><a href="https://plus.google.com/u/0/102004631432389725270/posts"><img src="images/googleplus.svg" title="google pluse" /></a></li>
						<li><a href="https://twitter.com/vKirirom"><img src="images/twitter.svg" title="twitter" /></a></li>
					</ul>
					<div  style="margin-top: 15px;">
					<div class="fb-like" data-href="https://www.facebook.com/vkirirom" data-width="250" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<!--start-top-nav-->
			<div class="top-nav">
				<div class="top-nav-left">
					<ul>
						<li><a href="index.php">vKirirom Resort</a></li>
						<li class="active"><a href="specialoffer.php">Special Offers</a></li>
						<li><a href="accommodation.php">Accommodation</a></li>
						<li><a href="restaurant.php">Restaurant</a></li>
						<li><a href="gallery.php">Activities</a></li>
						<li><a href="services.php">Services & Facilities</a></li>
						<li><a href="contact.php">Contact</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				
				<div class="clear"> </div>
			</div>
			 <!--Start import drop down menu-->
			 <div class="top-nav-1">
				 <nav class="clearfix">
					 <ul>
						 <li class="active"><a href="index.php">vKirirom Resort</a></li>
						 <li><a href="specialoffer.php">Special Offers</a></li>
						 <li><a href="restaurant.php">Restaurant</a></li>
						 <li><a href="gallery.php">Activities</a></li>
						 <li><a href="accommodation.php">Accommodation</a></li>
						 <li><a href="services.php">Services & Facilities</a></li>
						 <li><a href="contact.php">Contact</a></li>
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
		 <!---start-content---->
		 		<div class="wrap">
					<!--start pop up booking menu-->
					<div id="popup-booking">
						<div class="pop-up-online_reservation">
							<div class="pop-up-b_room">
								<div class="pop-up-booking_room">
									<h4 class="pop-up-booking">Booking & Reservation</h4>
									<p> </p>
								</div>
								<div class="clear"></div>
								<div class="pop-up-reservation">
									<ul>
										<li class="pop-up-span1_of_1">
											<h5>type of room:</h5>
											<!--start section_room-->
											<div class="pop-up-section_room">
												<select id="room" onchange="change_country(this.value)" class="frm-field required">
													<option value="null">Bungalow</option>
													<option value="null">PipeRoom</option>
													<option value="AX">LuxuryTent</option>
													<option value="AX">Auto-Camping</option>
													<option value="AX">KhmerCottage</option>
													<option value="AX">Villa A</option>
													<option value="AX">Villa R</option>
												</select>
											</div>
										</li>
										<li  class="pop-up-span1_of_1 pop-up-left">
											<h5>check-in-date:</h5>
											<div class="pop-up-book_date">
												<form>
													<input class="date" id="datepicker" type="text" value="MM/DD/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
												</form>

											</div>
										</li>
										<li  class="pop-up-span1_of_1 pop-up-left">
											<h5>check-out-date:</h5>
											<div class="pop-up-book_date">
												<form>
													<input class="date" id="datepicker1" type="text" value="MM/DD/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
												</form>
											</div>
										</li>
										<li class="pop-up-span1_of_2 pop-up-left">
											<h5>Amount:</h5>
											<!--start section_room-->
											<div class="pop-up-section_room">
												<select id="country" onchange="change_country(this.value)" class="frm-field required">
													<option value="null">1</option>
													<option value="null">2</option>
													<option value="AX">3</option>
													<option value="AX">5</option>
													<option value="AX">6</option>
													<option value="AX">7</option>
													<option value="AX">8</option>
													<option value="AX">9</option>
													<option value="AX">10</option>
												</select>
											</div>
										</li>
										<li class="pop-up-span1_of_3">
											<div class="date_btn">
												<form action="https://book.securebookings.net/roomrate?id=ea3bbb2b-8b09-45cb-b465-7d4d5c9c6626" method="POST">
													<input type="submit" value="book now" />
												</form>
											</div>
										</li>
										<li class="cancelButton">
											<div class="date_btn">
												<form>
													<input type="reset" class="cancel" onmouseup="document.getElementById('popup-booking').style.display='none';" value="Cancel">
												</form>
											</div>
										</li>
										<div class="clear"></div>
									</ul>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!--End pop up boooking-->
					<div class="two-column">
						<div class="left-nav">
							<div class="promo-header">
								<span><i class="fa fa-star-o"></i> SPECIAL OFFERS <i class="fa fa-star-o"></i></span>
							</div>
							<div class="promo-list">
								<ul class="promo-ul tab">
									<li class="tab-link current" data-tab ="vilasuit"><a href="javascript:void(0)"><i class="fa fa-modx"></i> VILLA SUITE PACKAGE</a></li>
									<li class="tab-link" data-tab ="bungalow"><a href="javascript:void(0)"><i class="fa fa-modx"></i> BUNGALOW PACKAGE</a></li>
									<li class="tab-link" data-tab ="luxurytent"><a href="javascript:void(0)"><i class="fa fa-modx"></i> LUXURY TENT PACKAGE</a></li>
									<li class="tab-link" data-tab ="piperoom"><a  href="javascript:void(0)"><i class="fa fa-modx"></i> PIPE ROOM PACKAGE</a></li>
									<li class="tab-link" data-tab ="khmercottage"><a href="javascript:void(0)"><i class="fa fa-modx"></i> KHMER COTTAGE PACKAGE</a></li>
									<li class="tab-link" data-tab ="camping"><a href="javascript:void(0)"><i class="fa fa-modx"></i> CAMPING PACKAGE</a></li>
									<li class="tab-link" data-tab ="pineview"><a href="javascript:void(0)"><i class="fa fa-modx"></i> PINE VIEW KITCHEN</a></li>
									<li class="tab-link" data-tab ="lumheikai"><a href="javascript:void(0)"><i class="fa fa-modx"></i> LUM HEI KAI PROMOTION</a></li>
								</ul>
							</div>
						</div>


						<!-- Vila Suit Promotional-->
						<div class="right-content">
							<div class="div-clear-top"></div>
							<div class="tab-container">
								<div class="tab-content" id="vilasuit">
									<h3 class="promo-title">
										VILLA SUITE PACKAGE USD 250/night stay
									</h3>
									<div style="z-index: 1000;" class="promo-img"><a class="img-lightbox" href="images/SpecialOffer/VILLA_SUITE/boreyA.jpg"><img src="images/SpecialOffer/VILLA_SUITE/boreyA.jpg" class="ïmg-responsive"></a></div>
									<div class="promo-more-img">
										<ul clsss="promo-img-ul">
											<li><a href="images/SpecialOffer/VILLA_SUITE/food1.JPG" class="img-lightbox"> <img src="images/SpecialOffer/VILLA_SUITE/food1.JPG" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/VILLA_SUITE/food2.JPG" class="img-lightbox"><img src="images/SpecialOffer/VILLA_SUITE/food2.JPG" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/VILLA_SUITE/food3.JPG" class="img-lightbox"><img src="images/SpecialOffer/VILLA_SUITE/food3.JPG" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/VILLA_SUITE/food4.JPG" class="img-lightbox"><img src="images/SpecialOffer/VILLA_SUITE/food4.JPG" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/VILLA_SUITE/Fruit plater.jpg" class="img-lightbox"><img src="images/SpecialOffer/VILLA_SUITE/Fruit plater.jpg" class="img-responsive img-scale"></a> </li>
										</ul>
									</div>
									<div class="clear"></div>
									<h3 class="promo-head">Benefits</h3>
										<ul>
											<li>Accommodation with villa suite one night stay 6 persons</li>
											<li>Complimentary welcome drink and fruit platter upon guest arrival</li>
											<li>Complimentary breakfast 6 persons</li>
											<li>Free Pine View Kitchen USD 30 coupon</li>
											<li>Complimentary 6 bicycle for traveling</li>
											<li>Free BBQ Equipment Rental 1 set for 10 persons</li>
										</ul>

									<h3 class="promo-head">Terms & Conditions</h3>
										<ul>
											<li>Above all the promotion Sunday to Friday on weekday only</li>
											<li>Above all the promotion reserves the right to change without notice.</li>
											<li>Above all the promotion will not include saturday and Peak season ( Khmer Public Holiday )</li>
											<li>A free cancellation should notified 3 days prior to arrival date; otherwise, full room nights charge penalty will be levied for any late cancellation.</li>
											<li>Please do not hesitate to contact us at the following email address vkirirom@pineresort.com we are always on hand to assist with your inquiry.</li>
										</ul>
									<h3 class="promo-head">Children policy</h3>
										<ul>
											<li>Child aged between 05 to 10 years maximum stay free by using the existing bed with parent with maximum 02 children per room. Breakfast is charged at 50%.</li>
										</ul>
									<div class="special-btn-div">
										<a href="javascript:void(0)" onclick="document.getElementById('popup-booking').style.display='block';" class="special-book-btn">Book Now</a>
									</div>
								</div>

								<!-- Bungalow Promotional-->
								<div class="tab-content current" id="bungalow">
									<h3 class="promo-title">
										BUNGALOW ROOM OR VILLA JASMINE PACKAGE USD 120/night stay
									</h3>
									<div class="promo-img"><a class="img-lightbox" href="images/SpecialOffer/BANGALOW/bungalow1.jpg"><img src="images/SpecialOffer/BANGALOW/bungalow.jpg" class="ïmg-responsive"></a></div>
									<div class="promo-more-img">
										<ul clsss="promo-img-ul">
											<li><a href="images/SpecialOffer/BANGALOW/Cake.jpg" class="img-lightbox"> <img src="images/SpecialOffer/BANGALOW/Cake.jpg" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/BANGALOW/Amouk fish.jpg" class="img-lightbox"><img src="images/SpecialOffer/BANGALOW/Amouk fish.jpg" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/BANGALOW/Hot dog.jpg" class="img-lightbox"><img src="images/SpecialOffer/BANGALOW/Hot dog.jpg" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/BANGALOW/Chocollate cake.jpg" class="img-lightbox"><img src="images/SpecialOffer/BANGALOW/Chocollate cake.jpg" class="img-responsive img-scale"></a> </li>
											<li><a href="images/SpecialOffer/BANGALOW/Spaghetti.jpg" class="img-lightbox"><img src="images/SpecialOffer/BANGALOW/Spaghetti.jpg" class="img-responsive img-scale"></a> </li>
										</ul>
									</div>
									<div class="clear"></div>
									<h3 class="promo-head">Benefits</h3>
									<ul>
										<li>Accommodation with Bungalow or Villa jasmine one night stay 2 persons</li>
										<li>Complimentary welcome drink and fruit platter upon guest arrival</li>
										<li>Complimentary breakfast 2 persons</li>
										<li>Complimentary lunch 2 persons, Asian menu ( no drinks ) in Pine View Kitchen</li>
										<li>Free use of swimming pool, Steam room, Sauna & Jacuzzi.</li>
										<li>Free  2 Bicycle fo