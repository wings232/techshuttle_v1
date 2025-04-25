<?php
	include '../../check_ses_list.php';
	include '../../dbconn.php';	
	include_once "../../func_templates/func_code.php";
?>
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