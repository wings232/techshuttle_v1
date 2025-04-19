
<div class="sign_view"><!--sign_view Starts-->
								<div class="login_head"><!--login_head Starts-->
									<div class="head"><!--head Starts-->
										Students Portal
									</div><!--head Ends-->
								</div><!--login_head Ends-->
								<div class="form_feild"><!-- form_feild starts -->
									<div class="form_center">
										<form class="login_feild" method="post">
											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-user" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="name" name="name" class="input" type="text" placeholder=" " />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Name</div>
											     </div>
											</div>
<?php  /*
											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-calendar" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="date_of_birth" name="date_of_birth" class="input" type="text" placeholder=" " />

											        <span class="focus-input"></span>
											        <script type="text/javascript">
                                                                $(document).ready(function(){
                                                                 $("#date_of_birth").datepicker({
                                                                        dateFormat:'d-M-yy',
                                                                        timepicker:false,
                                                                        scrollInput: false,
                                                                        changeYear:true,
                                                                        changeMonth:true,
                                                                        changeYear: true,
                                                                        yearRange: '1900:c',
                                                                        onClose: function(){
                                                                            $(this).valid();
                                                                         },
                                                                        closeOnDateSelect:true,
                                                                        minDate: new Date(1900, 10 - 1, 25),
                                                                        maxDate: "+2M",
                                                                        beforeShow:function(textbox, instance){
                                                                            $('.date_picks_placers').append($('#ui-datepicker-div'));
                                                                               // onShow: function() {
                                                                                  $('.date_picks_placer').append(this)
                                                                                }                                                          
                                                                            },

                                                                        onSelect: function() {
									                                       var birthDay = document.getElementById("date_of_birth").value;
									                                        var DOB = new Date(birthDay);
									                                        var today = new Date();
									                                        var ageInMilliseconds = today.getTime() - DOB.getTime();
									                                        age = Math.floor(ageInMilliseconds / (1000 * 60 * 60 * 24 * 365.25));
									                                        document.getElementById('age_c').value = age+" Years Old";
									                                    }
                                                                        //minTime:'11:00',
                                                                        //maxTime:'15:00',
                                                                        //initTime:false,
                                                                        
                                                                        //hours12:false,
                                                                        //step: 15 
                                                                  });
                                                                });
                                                            </script>
                                                            <div class="date_picks_placers"></div>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Date of Birth</div>
											        <div class="age_count">
								                        <input type="text" id="age_c" value="Age" readonly="readonly"/>
								                    </div> 
											     </div>
											</div>
*/
?>

											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-phone"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="mobile_number" name="mobile_number" class="input" type="text" placeholder=" " />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Mobile Number</div>
											     </div>
											</div>

											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-envelope" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="email" name="email" class="input" type="text" placeholder=" " />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Email</div>											        
											     </div>
											</div>

											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-user" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="password" name="password" class="input" type="password" placeholder=" " />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Password</div>
											     </div>
											</div>

											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-user" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="confirm_password" name="confirm_password" class="input" type="password" placeholder=" " />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Confirm Password</div>
											     </div>
											</div>
<?php
											/*<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-intersex"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="gender" name="gender" class="input gender_drop_head" type="text" placeholder=" " readonly="readonly" />
											        
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Gender</div>
											        <input id="gender_id" name="gender_id" class="gender_id" type="hidden"/>
											        <div class="gender_drop">
											        	<ul>
											        		<li gender='1'>Male</li>
											        		<li gender='2'>Female</li>
											        		<li gender='3'>Transgender</li>
											        	</ul>
											        </div>
											     </div>
											</div>*/
?>

											<div class="feild_check">
	      										<div class="feild_image_c">
	      											<div class="squaredThree">
												      <input type="checkbox" value="None" id="sign_agree" name="sign_agree" />
												      <label for="sign_agree"></label>
												    </div>
	      										</div>
	      										<div class="feild_box">
											       <p> By signing up, I agree to the Privacy Policy, Terms and Conditions of Techshuttle
											       </p>
											     </div>
											</div>
											

											<div class="feild_button">
	      										
	      										<div class="feild_box">

											       
											       		
														   <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
														   		<input  class="sec-btn" type="button" value="Sign Up" onclick="sign_up_one()" />
															</div>
											       		<div class="btn">
											       			<div class="btn_inner"></div>
											       		</div>
											       	
											        <!-- <span class="focus-input"></span> -->
											         <!-- <div class="cut"></div> -->
											        <!-- <div class="placeholder">Mobile Number</div> -->
											     </div>
											</div>
											<div class="sign_info">
											</div>
											<div class="verify_para">
											  <p>
											  	Already have an account? <span onclick="forLogin_ad()">Sign In</span>
											  </p>
											</div>
										</form>
									</div>
								</div><!-- form_feild Ends -->
							</div><!-- sign_view Ends -->
							<script type="text/javascript">
								login_verify();
							</script>