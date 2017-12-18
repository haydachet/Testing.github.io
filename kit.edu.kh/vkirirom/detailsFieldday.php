<?php include_once('include/header.php'); ?>
<!--start-content-->
<div class="content">
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
								<select id="country" onchange="change_country(this.value)" class="frm-field required">
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
									<input class="date" id="datepicker" type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
								</form>

							</div>
						</li>
						<li  class="pop-up-span1_of_1 pop-up-left">
							<h5>check-out-date:</h5>
							<div class="pop-up-book_date">
								<form>
									<input class="date" id="datepicker1" type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
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
								<form>
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
	<div class="about-us">
		<div class="wrap">
			<div class="about-header">
				<h3 id="Bungalow">More Details : <span class="detail_title">Field day</span></h3>
				<div class="clear"> </div>
			</div>
			<div class="about-info">
				<p>You can have a field day in vKirirom pine resort. We have 12 items and you can pick up items as provided which make the customers perfectly enjoy.</p>
			</div>
			<div class="specials">
				<div class="specials-grids">
					<!--Line1-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Warmup.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/PullLine.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/Pullbat.JPG" title="image-name">
					</div>
					<!--End Line1-->
					<!--Line2-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/PipeLine.JPG" title="image-name">
					</div>
					<div class="special-grid ">
						<img src="images/Activity/FieldDayPic/throwEgg.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/Happy.JPG" title="image-name">
					</div>
					<!--End Line2-->
					<!--Line3-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Winner.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Pullbat1.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/PullBat2.JPG" title="image-name">
					</div>
					<!--End Line3-->
					<!--Line4-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Bubble3.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Bubble4.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/Bubble2.JPG" title="image-name">
					</div>
					<!--End Line4-->
					<!--Line5-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Struckout.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Struckout1.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/Struckout2.JPG" title="image-name">
					</div>
					<!--End Line5-->
					<!--Line6-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/TreasureHunting.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/TreasureHunting1.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/TreasureHunting2.JPG" title="image-name">
					</div>
					<!--End Line6-->
					<!--Line7-->
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/DiskGoal.JPG" title="image-name">
					</div>
					<div class="special-grid">
						<img src="images/Activity/FieldDayPic/Walkracing1.JPG" title="image-name">
					</div>
					<div class="special-grid spe-grid">
						<img src="images/Activity/FieldDayPic/TreasureHunting.JPG" title="image-name">
					</div>
					<!--End Line7-->
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="testmonials">
			<div class="wrap">
				<div class="testmonial-grid">
					<h3>Activity List</h3>
					<p class="para">1. Rope Climbing 
								<br>2. Bubble soccer 
								<br>3. Khmer Clay Plot
								<br>4. Dodgeball
								<br>5. Local net
								<br>6. Strickout Ball
								<br>7. SASUKE Rally
								<br>8. Small ball with red color
								<br>9. Small ball with green color
								<br>10. Black, Green, yellow, Boots
								<br>11. Volleyball net
								<br>12. Volleyball
								<br>13. Bedminton
								<br>14. Petanque
								<br>15. Disc golf
								<br>16. Telescope 
								<br>17. Netball
								<br>18. Futsal / Football field
								<br>19. Futsal net
								<br>20. Plastic Rope Jumping
								<br>21. Unicycle
								<br>22. Kickboard / Scooter
								<br>22. Flying disc
									
									</p>
					<div class="row button-home-back">
						<a href="index.php"><img src="images/detailsimage/home.png" title="Home" ></a>
						<a href="gallery.php"><img src="images/detailsimage/back.png" title="Back" ></a>
					</div>
					
			</div>
		</div>
	</div>
</div>
<!---End-content---->
<?php include_once('include/footer.php'); ?>