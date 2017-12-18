<?php include_once('include/sendemail.php'); ?>
<?php include_once('include/header.php'); ?>
		 <!---start-content---->
		 <div class="content">
		 	<!---start-contact---->
		 	<div class="contact">
		 		<div class="wrap">
				<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h3>Find Us Here</h3>
			    	 		<div id="map-canvas">
			    	 		</div>
      				</div>
      			<div class="company_address">
				     	<h3>Information :</h3>
				     	<p>vKirirom Pine Resort is 112 kms southwest of Phnom Penh, located about 30 kms to the west of National Highway #4. On the bottom of Kirirom Mountain, you will find SOKIMEX with Kirirom Mart along the National Highway #4.</p><br>
						<p>Resort: <a href="#" style="color: #816943">+855 78 777 284</a></p>
						<p>Sale: <a href="#" style="color: #816943">+855 78 777 343 / 69 2222 735</a></p>
				 	 	<p>Email: <span><a href="#">info@vKirirom.com</span></a></p>
				   		<p>Follow on: <span><a href="https:/www.facebook.com/vkirirom">Facebook</a></span>, <span><a href="#">Google+</a></span>, <span><a href="https://www.instagram.com/vkirirom/">Instagram</a></span>, <span><a href="https://twitter.com/vKirirom">Twitter</a></span></p>
						

				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form id="defaultForm" class="form-horizontal" method="post" action="?">
					    	<div class="form-group">
						    	<span><label>NAME</label></span>
						    	<span><input name="userName" type="text" class="form-control textbox" /></span>
						    </div>
						    <div class="form-group">
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="form-control textbox" /></span>
						    </div>
						    <div class="form-group">
						     	<span><label>MOBILE</label></span>
						    	<span><input name="userPhone" type="text" class="form-control textbox" /></span>
						    </div>
						    <div class="form-group">
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="userMsg" class="form-control textbox"> </textarea></span>
						    </div>
						   <div class="form-group">
						   		<span><button name="sendMsg" type="submit" class="btn btn-primary mybutton" value="Submit">Submit</button></span>
						  </div>
					    </form>

				    </div>
  				</div>				
			  </div>
			</div>
			</div>
		 	<!---End-contact---->
		 <!---End-content---->
<?php include_once('include/footer.php'); ?>
