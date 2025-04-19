<?php
	include "check_ses_list.php";
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "constantconfig.php";
	if($user_session == ""){
		header("Location:index.php");
	}	
	$user_session;
	$user_name;
	$admissionId = $_SESSION['tsAdmisId'];
	$admissionMobile = $_SESSION['tsAdmisMobile'];
	// $batch_map_id = $_SESSION['batch_map_id'];
	// $price_itl = $_SESSION['price_id_ilt'];
	// $course_id = $_SESSION['course_ids'];
	// $price_slv = $_SESSION['price_id_slv'];
	// $price_key = $_SESSION['price_id_key'];
	

	


	$selectLoginDetails= selectLoginDetails("tbl_customer_login",$user_session);
	$selectLoginDetails_json = json_decode($selectLoginDetails, true);
	//print_r($accopany_filter_List_json);
	$selectLoginDetails_json_count = isset($selectLoginDetails_json['selectLoginDetails_count'])?$selectLoginDetails_json['selectLoginDetails_count']:"";
	if($selectLoginDetails_json_count > 0){  
	  foreach ($selectLoginDetails_json['selectLoginDetails_details'] as $login_details) {
	      $firstName  = $login_details["firstName"];
	      $email  = $login_details["email"];
	      $mobileNo  = $login_details["mobileNo"];
	  }
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
	<link rel="stylesheet" href="css/admission/admission.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script src='js/jquery.validate.js'></script>
    <script src='js/additional-methods.min.js'></script>
    <!-- <script src='js/page_valid.js'></script> -->
	<script type="text/javascript" src="js/validate_page.js"></script>
    <script type="text/javascript" src="js/tech_valid.js"></script>
    
    
</head>
<body>
<div class="container"><!--Container Starts -->

	

	<div class='header_con'><!--header_con Starts -->
		<?php include "header.php"; ?>
	</div><!--header_con Ends -->    
	

	

	<div class="admin_form_con"><!--admin_form_con Starts -->
		<div class="admin_form_center"><!--admin_form_center Starts -->
			<div class="admin_form"><!--admin_form Starts -->
				<div class="admin_form_image"><!--admin_form Starts -->
					<div class="image_form">
						<div class="form_head">
							<div class="head">
								Hi <span><?php echo $firstName; ?></span>
							</div>
						</div>
						<div class="form_para">
							<div class="para">
								<p>Find Jobs, Employment & Career Opportunities. Some of the companies we've helped recruit excellent applicants over the years.</p>
							</div>
						</div>
					</div>
					<div class="image">
						<img src="images/icons/filling-form.svg"/>
					</div>
				</div>
				<div class="form_filling"><!--form_filling Starts -->
					<div class="filling_center"><!--filling_center Starts -->
						<div class="filling_con"><!--filling_con Starts -->
							<form method="post" class="admission_check">
								<div class="feild_box"><!--feild_box Starts -->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Name</div>
										</div>
										<div class="feild_action">
											<input type="text" name="names_admin" id="names_admin" readonly='readonly' value="<?php echo $firstName; ?>" >
										</div>
									</div><!-- input_box loop Ends-->
									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Mobile No</div>
										</div>
										<div class="feild_action">
											<input type="text" name="mobile_no" id="mobile_no" readonly='readonly' value="<?php echo $mobileNo; ?>">
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Email Id</div>
										</div>
										<div class="feild_action">
											<input type="text" name="email_id" id="email_id" readonly='readonly' value="<?php echo $email; ?>">
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Address Proof</div>
										</div>
										<div class="feild_action">
											<div class="new_select">
												<select id='address_proof' name="address_proof">
													<option value=''>Select Address Proof</option>
													<option value='Adhaar Card'>Adhaar Card</option>
												</select>
											</div>
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Address</div>
										</div>
										<div class="feild_action">
											<textarea name='address' id='address' placeholder=""></textarea>
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">City</div>
										</div>
										<div class="feild_action">
											<input type="text" name="city" id="city">
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">State</div>
										</div>
										<div class="feild_action">
											<input type="text" name="state" id="state">
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Country</div>
										</div>
										<div class="feild_action">
											<input type="text" name="country" id="country">
										</div>
									</div><!-- input_box loop Ends-->

									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_head">
											<div class="head">Pincode</div>
										</div>
										<div class="feild_action">
											<input type="text" name="pincode" id="pincode"/>
										</div>
									</div><!-- input_box loop Ends-->
									<div class='shows'></div>
									<div class="input_box"><!-- input_box loop Start-->
										<div class="feild_action">
											<input type="button" name="adms_form" value="Next" onclick="create_admission()" />
											
											<input type="hidden" name="admissionId" id='admissionId' value="<?php echo $admissionId; ?>"/>
											<input type="hidden" name="admissionMobile" id='admissionMobile' value="<?php echo $admissionMobile; ?>"/>
											<input type="hidden" name="social_upost_id" id='social_upost_id' value="<?php echo $user_session; ?>"/>
											<!-- <div class="spinner_one"><img src="images/gif/loading_01.gif"></div> -->
										</div>
									</div><!-- input_box loop Ends-->
								</div><!--feild_box Ends -->
							</form>
						</div><!--admin_form Ends -->
					</div><!--filling_center Ends -->
				</div><!--form_filling Ends -->
			</div><!--admin_form Ends -->
		</div><!--admin_form_center Ends -->
	</div><!--admin_form_con Ends -->

	<div class="footer_con"><!--footer_con Starts -->
		<?php
			include "footer.php";
		?>
	</div><!--footer_con Ends -->
</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
