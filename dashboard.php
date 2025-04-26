<?php
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "check_ses_list.php";
	include "constantconfig.php";
	if($user_session == ""){
		header("Location:index.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/dashboard/stud_dash.css"/>
	<link rel="stylesheet" href="css/dashboard/stud_dash_mobile.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="container"><!--Container Starts -->

		<div class='header_con'><!--header_con Starts -->
            <?php include "header.php"; ?>
        </div><!--header_con Ends -->

		

		<div class="stud_portal_con"><!--stud_portal_con Ends -->
			<div class="stud_portal_center"><!--stud_portal_center Ends -->
				<div class="stud_portal"><!--stud_portal Ends -->
					<div class="leftside_bar">
						<div class="sidebar_button" assign='0'>
							<i class="fa fa-arrow-circle-o-right"></i>
						</div>

						<div class="left_side">
							<?php
								/*
							?>
							<div class="user_name_board">
								<input type="hidden" name="genders_images" id="genders_images" value="<?php echo $profile_image; ?>">
								<div class="user_image image_user">
									<center>
										<div class="image">
											<div class="im_con">
												<img src="images/patient_portal/user_image/<?php echo $profile_pic; ?>" onerror="this.src='images/patient_portal/<?php  echo $profile_image; ?>'">
												
											</div>
											<div class="imageUpload">									
												<div class="input_box"><!-- input_box loop Start-->
													<div class="feild_action">
														<input type="file" name="mediab_image" id='mediab_image' class="mediab_image" />

														<div class="button_up">
															<div class="up_img">
																<i class="fa fa-pencil"></i>
															</div>
														</div>
														<div class="file_out">
															<input type='hidden' id='sfile_image' value="<?php echo isset($file_name)?$file_name:''; ?>" />
														</div>
													</div>
												</div><!-- input_box loop Ends-->
											</div>
										</div>
										
									</center>
								</div>
								<div class="user_name">
									<div class="name">Jaheer Hussain A</div>
								</div>
								<div class="user_dob">
									<div class="dob_a">
										<div class="dob">09-02-1991</div>
										<div class="age">32 Years</div>
									</div>
								</div>
								<?php if($profile_area != ""){ ?>
									<div class="user_area">
										<center>
											<div class="area_u">Medavakkam, Chennai</div>
										</center>
									</div>
								<?php } ?>
							</div>
							*/
							?>
							<div class="user_menu">
								<div class="user_li">
									<ul>
										<li onclick="leaf('user_dashboard')">
											<div class="user_m_img slides user_active" >
												<div class="image"><center><i class="fa fa-tachometer" aria-hidden="true"></i></center></div>
												<div class="img_name">Dashboard</div>
											</div>
										</li>
										<li onclick="leaf('mycourse')">
											<div class="user_m_img slides">
												<div class="image"><center><i class='fas fa-book-open'></i></center></div>
												<div class="img_name">My Course</div>
											</div>
										</li>
										<li onclick="leaf('user_appoint_list_v1')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-heart" aria-hidden="true"></i></center></div>
												<div class="img_name">My Favorite</div>
											</div>
										</li>
										<li>
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-user-circle" aria-hidden="true"></i></center></div>
												<div class="img_name">Accounts</div>
											</div>
											<div class="leaf_drop">
												<ul>
													<li>
														<div class="user_m_img" onclick="leaf('myprofile')">
															<div class="image"><center><i class="fa fa-user" aria-hidden="true"></i></center></div>
															<div class="img_name">My Profile</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('change_pass')">
															<div class="image"><center><i class="fa fa-address-book"></i></center></div>
															<div class="img_name">Change Password</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('book_health_check')">
															<div class="image"><center><i class="fa fa-address-book"></i></center></div>
															<div class="img_name">Address Book</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('hsc_v2')">
															<div class="image"><center><i class="fa fa-cog" aria-hidden="true"></i></center></div>
															<div class="img_name">Profile Settings</div>
														</div>
													</li>												
												</ul>
											</div>
										</li>
										<li onclick="leaf('user_appoint_list_v1')">
											<div class="user_m_img slides">
												<div class="image"><center><i class='fas fa-toggle-off'></i></center></div>
												<div class="img_name">Deativate Account</div>
											</div>
										</li>
										
										
										<!-- <li onclick="leaf('book_health_check')">
											<div class="user_m_img slides">
												<div class="image"><center><i class='fa fa-user-md'></i></center></div>
												<div class="img_name">Health Checkup</div>
											</div>
										</li>	 -->	

										<!-- <li onclick="leaf('hsc')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-flask" aria-hidden="true"></i></center></div>
												<div class="img_name">Home Sample Collection</div>
											</div>
										</li> -->	
										<!-- <li>
											<div class="user_m_img slides">
												<div class="image"><center><i class='fa fa-user-md'></i></center></div>
												<div class="img_name">Health Records</div>
											</div>
											<div class="leaf_drop">
												<ul>
													<li>
														<div class="user_m_img" onclick="leaf('hrs')">
															<div class="image"><center><i class="fa fa-bed" aria-hidden="true"></i></center></div>
															<div class="img_name">In-Patient</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('hrs')">
															<div class="image"><center><i class="fa fa-stethoscope" aria-hidden="true"></i></center></div>
															<div class="img_name">Out-Patient</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('hrs')">
															<div class="image"><center><i class="fa fa-stethoscope" aria-hidden="true"></i></center></div>
															<div class="img_name">Day Care</div>
														</div>
													</li>
												</ul>
											</div>
										</li> -->					
										<li onclick="leaf('hrs')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-bell" aria-hidden="true"></i></center></div>
												<div class="img_name">Notification</div>
											</div>
										</li>

										<!-- <li>
											<div class="user_m_img slides">
												<div class="image"><center><i class='fa fa-user-md'></i></center></div>
												<div class="img_name">Make payments</div>
											</div>
											<div class="leaf_drop">
												<ul>
													<li>
														<div class="user_m_img" onclick="leaf('inpatient_pay')">
															<div class="image"><center><i class="fa fa-bed" aria-hidden="true"></i></center></div>
															<div class="img_name">In-Patient</div>
														</div>
													</li>
													<li>
														<div class="user_m_img" onclick="leaf('hrs')">
															<div class="image"><center><i class="fa fa-stethoscope" aria-hidden="true"></i></center></div>
															<div class="img_name">Out-Patient</div>
														</div>
													</li>
													 <li>
														<div class="user_m_img" onclick="leaf('hrs')">
															<div class="image"><center><i class="fa fa-stethoscope" aria-hidden="true"></i></center></div>
															<div class="img_name">Day Care</div>
														</div>
													</li> 
												</ul>
											</div>
										</li> -->
										

										
										<li onclick="leaf('make_payments')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-envelope-open"></i></center></div>
												<div class="img_name">Email Preference</div>
											</div>
										</li>

										<li onclick="leaf('e_medicine')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-thumbs-up" aria-hidden="true"></i></center></div>
												<div class="img_name">Recommendations for you</div>
											</div>
										</li>
										<li onclick="leaf('user_pro_set')">
											<div class="user_m_img slides">
												<div class="image"><center><i class='fas fa-wallet'></i></center></div>
												<div class="img_name">Wallet</div>
											</div>
										</li>
										<li onclick="leaf('user_pro_set')">
											<div class="user_m_img slides">
												<div class="image"><center><i class="fa fa-cog" aria-hidden="true"></i></center></div>
												<div class="img_name">Techshuttle Zone</div>
											</div>
										</li>
										
										<!-- <li onclick="leaf('user_fav')">
											<div class="user_m_img">
												<div class="image"><center><i class="fa fa-star" aria-hidden="true"></i></center></div>
												<div class="img_name">Favourites</div>
											</div>
										</li>
										<li onclick="leaf('user_bil')">
											<div class="user_m_img">
												<div class="image"><center><i class="fa fa-file" aria-hidden="true"></i></center></div>
												<div class="img_name">Billing</div>
											</div>
										</li>

										<li onclick="leaf('user_med_det')">
											<div class="user_m_img">
												<div class="image"><center><i class="fa fa-medkit"></i></center></div>
												<div class="img_name">Medical Details</div>
											</div>
										</li> -->								

										<li onclick="leaflog('sign_off')">
											<div class="user_m_img slides" >
												<div class="image"><center><i class="fa fa-sign-out" aria-hidden="true"></i></center></div>
												<div class="img_name">Logout</div>
											</div>
										</li>
										

									</ul>
								</div>
							</div>
						</div>
					</div>
				
					<div class="rightside_bar"><!--rightside_bar Starts-->
						<div class="right_side"><!--right_side Starts-->						
							<div class="spinners"><!--spinners Starts-->
								<center><img src="images/icons/new_spinner.gif"></center>
								<div class="pls_wait">Please Wait...</div>
							</div><!--spinners Ends-->
							<div class="right_ajax"><!--right_ajax Starts-->
								<div class="user_nav">
									<ul>
										<li><i class="fa fa-home"></i></li>
										<li>Dashboard</li>
									</ul>
								</div>
								<div class="user_intro">
									<div class="user_nav_one"><!--user_nav_one Starts -->
										<div class="intro_user">
											<div class="userdash_image">
												<img src="images/portal/dashboard.webp"/>
											</div>
											<div class="intro_content">
												<div class="your_name">
													<div class="head">
														Hi <?php echo $user_name; ?>,
													</div>
												</div>
												<div class="first_head">
													<div class="head">
														Learn With Effectively With Us!
													</div>
												</div>
												<div class="sec_head">
													<div class="head">
														Get 30% off every course on january.
													</div>
												</div>
												<div class="head_list">
													<ul>
														<li>
															<div class="image">
																<div class="img">
																	<i class="fa fa-graduation-cap"></i>	
																</div>			
															</div>
															<div class="image_txt">
																<div class="num_txt">
																	Students
																</div>
																<div class="number">
																	75,000+
																</div>
															</div>
														</li>

														<li>
															<div class="image">
																<div class="img">
																	<i class="fa fa-user"></i>
																</div>
															</div>
															<div class="image_txt">
																<div class="num_txt">
																	Expert Mentors
																</div>
																<div class="number">
																	200+
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div><!--user_nav_one Ends -->
									<div class="user_nav_one"><!--user_nav_one Starts -->
										<?php
											$profile_gender = "Male";
											$profile_image = "";
		            				
					            				if($profile_gender == "Male"){
					            					$profile_image = "avatar18.gif";
					            				}

					            				if($profile_gender == "Female"){
					            					$profile_image = "avatar20.gif";
					            				}
										?>
										<div class="user_con"><!--user_con Starts -->
											<div class="user_image image_user"><!--user_image Starts -->
												<center>
													<div class="image"><!--image Starts -->
														<div class="im_con"><!--im_con Starts -->
															<img src="images/icons/<?php echo $profile_pic; ?>" onerror="this.src='images/icons/<?php  echo $profile_image; ?>'">
															
														</div><!--im_con Ends -->
														<div class="imageUpload"><!--imageUpload Starts -->								
															<div class="input_box"><!-- input_box loop Start-->
																<div class="feild_action">
																	<input type="file" name="mediab_image" id='mediab_image' class="mediab_image" />

																	<div class="button_up">
																		<div class="up_img">
																			<i class="fa fa-pencil"></i>
																		</div>
																	</div>
																	<div class="file_out">
																		<input type='hidden' id='sfile_image' value="<?php echo isset($file_name)?$file_name:''; ?>" />
																	</div>
																</div>
															</div><!-- input_box loop Ends-->
														</div><!--imageUpload Ends -->		
													</div><!--image Ends -->
													
												</center>
											</div><!--user_image Ends -->

											<div class="user_profile">
												<div class="user_name">
													<div class="name">Jaheer Hussain A</div>
												</div>
												<div class="user_email">
													<div class="name">jaheerabdul@techshuttle.com</div>
												</div>
												<div class="profile_edit">
													<div class="proedit_center">
														<div class="pro_edit">
															Edit Profile
														</div>
													</div>
												</div>
												<!-- <div class="user_dob">
													<div class="dob_a">
														<div class="dob">09-02-1991,</div>
														<div class="age">32 Years</div>
													</div>
												</div> -->
											</div>
										</div><!--user_con Ends -->
									</div><!--user_nav_one Ends -->

									<div class="course_pro">
										<div class="course_center">
											<div class="head_con_p">
												<div class="head">
													How It <span>Works?</span>
												</div>
												<div class="head_para">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
													</p>
												</div>
											</div>
											<div class="head_pro">
												<ul>
													<li><!--Loop Starts -->
														<div class="list_con">
															<div class="image">
																<div class="img">
																	<div class="img_p">
																		<i class="fa fa-search-location"></i>
																	</div>
																</div>
															</div>
															<div class="head_p">
																<div class="head">
																	Find Courses
																</div>
															</div>
															<div class="head_para">
																<p>
																	We have helped over 3,400 new students to get into the most popular tech teams.
																</p>
															</div>
														</div>
													</li><!--Loop Ends -->

													<li><!--Loop Starts -->
														<div class="list_con">
															<div class="image">
																<div class="img">
																	<div class="img_p">
																		<i class="fa fa-calendar-week"></i>
																	</div>
																</div>
															</div>
															<div class="head_p">
																<div class="head">
																	Book Your Seat
																</div>
															</div>
															<div class="head_para">
																<p>
																	We have helped over 3,400 new students to get into the most popular tech teams.
																</p>
															</div>
														</div>
													</li><!--Loop Ends -->

													<li><!--Loop Starts -->
														<div class="list_con">
															<div class="image">
																<div class="img">
																	<div class="img_p">
																		<i class="fa fa-award"></i>
																	</div>
																</div>
															</div>
															<div class="head_p">
																<div class="head">
																	Get Certificate
																</div>
															</div>
															<div class="head_para">
																<p>
																	We have helped over 3,400 new students to get into the most popular tech teams.
																</p>
															</div>
														</div>
													</li><!--Loop Ends -->
												</ul>
											</div>
										</div>
									</div>
									
								</div>
							</div><!--right_ajax Ends-->
						</div><!--right_side Ends-->
					</div><!--rightside_bar Ends-->
				</div><!--stud_portal Ends -->
			</div><!--stud_portal_center Ends -->
		</div><!--stud_portal_con Ends -->



		<div class="footer_con"><!--footer_con Starts -->
			<?php
				//include "footer.php";
			?>
		</div><!--footer_con Ends -->
	</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/s_portal/code_portal.js"></script>