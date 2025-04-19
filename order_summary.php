<?php
	include "check_ses_list.php";
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "constantconfig.php";
	if($user_session == ""){
		header("Location:index.php");
	}	
	$admission_number =  $_SESSION['tsAdmisId'];
	$admission_number_s =  base64_encode($_SESSION['tsAdmisId']);
	//echo $user_session;
	date_default_timezone_set('Asia/Calcutta');
	$dateGen = date('Ymdhis');
	$orderIdGen = $dateGen.$admission_number;
	//$_SESSION['orderIdGen'] = $orderIdGen;
	$course_id = $_SESSION['course_ids'];
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

	$selectAdmissionDetails= selectAdmissionDetails("tbl_adminission_form",$user_session,$course_id,$admission_number);
	$selectAdmissionDetails_json = json_decode($selectAdmissionDetails, true);
	//print_r($accopany_filter_List_json);
	$selectAdmissionDetails_json_count = isset($selectAdmissionDetails_json['selectAdmissionDetails_count'])?$selectAdmissionDetails_json['selectAdmissionDetails_count']:"";
	if($selectAdmissionDetails_json_count > 0){  
	  foreach ($selectAdmissionDetails_json['selectAdmissionDetails_details'] as $admission_details) {
	    $admission_id  = $admission_details["admission_id"];
	   	$admission_id_en = base64_encode($admission_id);
	    $actual_fees  = $admission_details["actual_fees"];
	    $gst_amount  = $admission_details["gst_amount"];
	    $gst_amount_s_c = $gst_amount / 2;
	    $course_fees  = $admission_details["course_fees"];
	    $batch_mapping_id  = $admission_details["batch_mapping_id"];
	    $aNames  = $admission_details["aName"];
	    $mobiles  = $admission_details["mobile"];
	    $emails  = $admission_details["email"];
	    $citys  = $admission_details["city"];
	    $states  = $admission_details["state"];
	    $countrys  = $admission_details["country"];
	    $address  = $admission_details["address"];
	    $pincodes  = $admission_details["pincode"];
	  }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<base href='<?php echo $baseUrl; ?>' > 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/orders/order_s.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script src='js/jquery.validate.js'></script>
    <script src='js/additional-methods.min.js'></script>
    <!-- <script src='js/page_valid.js'></script> -->
	
    <script type="text/javascript" src="js/tech_valid.js"></script>
</head>
<body>
<div class="container"><!--Container Starts -->
	<div class='header_con'><!--header_con Starts -->
		<?php include "header.php"; ?>
	</div><!--header_con Ends -->   
	<div class="order_summary_con"><!--order_summary_con Starts -->
		<div class="order_summary_center"><!--order_summary_center Starts -->
			<div class="order_summary"><!--order_summary Starts -->
				<div class="user_nav">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">Order Summary</a></li>
					</ul>
				</div>

				<div class="summary_content">
					<div class="sum_leftside">
						<div class="product_list">
							<div class="list_head">
								<ul>
									<li>Product Image</li>
									<li>Course Name</li>
									<li>Start Date</li>
									<li>Course Fees</li>
									<li>Action</li>
								</ul>
							</div>
							<div class="list_content">
								<ul>
<?php
$selectAdmissionBatchMapping= selectAdmissionBatchMapping("tbl_batch_mapping",$batch_mapping_id,'Active');
	$selectAdmissionBatchMapping_json = json_decode($selectAdmissionBatchMapping, true);
	//print_r($accopany_filter_List_json);
	$selectCourseBatchMapping_json_count = isset($selectAdmissionBatchMapping_json['selectAdmissionBatchMapping_count'])?$selectAdmissionBatchMapping_json['selectAdmissionBatchMapping_count']:"";
	if($selectCourseBatchMapping_json_count > 0){  
	  foreach ($selectAdmissionBatchMapping_json['selectAdmissionBatchMapping_details'] as $batchRecord) {
	      //$batch_mapping_id  = $batchRecord["batch_mapping_id"];
	      //$batch_name  = $batchRecord["batch_name"];
	      $batch_id  = $batchRecord["batch_id"];
	      $batch_name  = $batchRecord["batch_name"];
	      $product_primary_id  = $batchRecord["product_primary_id"];
	      $product_primary_slug  = $batchRecord["product_primary_slug"];
	      $course_names = str_replace('-',' ',strtolower($batchRecord["product_primary_slug"]));
	      $seat_count  = $batchRecord["seat_count"];
	      $start_date_batch = new DateTime(isset($batchRecord["start_date"])?$batchRecord["start_date"]:"");
		  $start_date_batchs= $start_date_batch->format('d-M-Y');


		/*	$selectCourseBatchSetup= selectCourseBatchSetup("tbl_batch_setup",$batch_id,'Active');
			$selectCourseBatchSetup_json = json_decode($selectCourseBatchSetup, true);
			//print_r($accopany_filter_List_json);
			$selectCourseBatchSetup_json_count = isset($selectCourseBatchSetup_json['selectCourseBatchSetup_count'])?$selectCourseBatchSetup_json['selectCourseBatchSetup_count']:"";
			if($selectCourseBatchMapping_json_count > 0){  
			  foreach ($selectCourseBatchSetup_json['selectCourseBatchSetup_details'] as $batchRecord) {
			      $batch_code = $batchRecord["batch_code"];
			      
			      $batch_running_days = $batchRecord["batch_running_days"];
			      $batch_type = $batchRecord["batch_type"];
			      $course_level = $batchRecord["course_level"];
			      $mode_of_training = $batchRecord["mode_of_training"];
			      $batch_session = $batchRecord["batch_session"];
			      $batch_timing_in = new DateTime(isset($batchRecord["batch_timing_in"])?$batchRecord["batch_timing_in"]:"");
				  $batch_timing_ins= $batch_timing_in->format('Y-m-d');
				  $batch_timing_out = new DateTime(isset($batchRecord["batch_timing_out"])?$batchRecord["batch_timing_out"]:"");
				  $batch_timing_outs= $batch_timing_out->format('Y-m-d');
				}
			} */

		}
	}

	$forCourseSingleDetailsId= forCourseSingleDetailsId("tbl_navigation_details",$course_id,4);
	$forCourseSingleDetailsId_json = json_decode($forCourseSingleDetailsId, true);
	//print_r($accopany_filter_List_json);
	$forCourseSingleDetailsId_json_count = isset($forCourseSingleDetailsId_json['forCourseSingleDetailsId_count'])?$forCourseSingleDetailsId_json['forCourseSingleDetailsId_count']:"";
	if($forCourseSingleDetailsId_json_count > 0){  
	  foreach ($forCourseSingleDetailsId_json['forCourseSingleDetailsId_details'] as $courseSingleRecordId) {
	      //$menu_ids_f  = $courseSingleRecordId["parent_id"];
	      $menu_names_f = $courseSingleRecordId["menu_name"];
	      $main_image = $courseSingleRecordId["course_thumb_image"];
	  }
	}
?>
									<li>
										<div class="img_list">
											<div class="image_con column_d">
												<div class="image">
													<div class="img_center">
														<img src="images/course/thumb/<?php echo $main_image ?>"/>
													</div>
												</div>
											</div>
											<div class="image_name column_d">
												<div class="name"><?php echo $menu_names_f ?></div>
											</div>
											<div class="image_date column_d">
												<div class="date"><?php //echo $start_date_batchs ?></div>
											</div>
											<div class="image_date column_d">
												<div class="date">Rs. <?php echo $course_fees ?>/-</div>
											</div>
											<div class="image_button column_d">
												<div class="but">
													<div class="button">View Details</div>
												</div>
											</div>
											<div class="sum_list">
												
												<ul>
													<li>
														<div class="head">Name</div>
														<div class="head_l">
															<?php echo $aNames; ?>
														</div>
													</li>
													<li>
														<div class="head">Mobile</div>
														<div class="head_l">
															<?php echo $mobiles; ?>
														</div>
													</li>
													<li>
														<div class="head">Email</div>
														<div class="head_l">
															<?php echo $emails; ?>
														</div>
													</li>
													<li>
														<div class="head">City</div>
														<div class="head_l">
															<?php echo $citys; ?>
														</div>
													</li>
													<li>
														<div class="head">State</div>
														<div class="head_l">
															<?php echo $states; ?>
															<input type="hidden" id="aces" name="aces" value="<?php echo $admission_id_en; ?>" readonly="readonly">
															<input type="hidden" id="aces_no" name="aces_no" value="<?php echo $admission_number_s; ?>" readonly="readonly">
														</div>
													</li>
													<li>
														<div class="head">Country</div>
														<div class="head_l">
															<?php echo $countrys; ?>
														</div>
													</li>
													<li>
														<div class="head">Code</div>
														<div class="head_l">
															<?php //echo $batch_code; ?>
														</div>
													</li>
													<li>
														<div class="head">Type</div>
														<div class="head_l">
															<?php //echo $batch_type; ?>
														</div>
													</li>
													<li>
														<div class="head">Seat Count</div>
														<div class="head_l">
															<?php //echo $seat_count; ?>
														</div>
													</li>
													<li>
														<div class="head">Session Code</div>
														<div class="head_l">
															<?php //echo $batch_session; ?>
														</div>
													</li>
													<li>
														<div class="head">Course Level</div>
														<div class="head_l">
															<?php //echo $course_level; ?>
														</div>
													</li>
													<li>
														<div class="head">Mode of Training</div>
														<div class="head_l">
															<?php //echo $mode_of_training; ?>
														</div>
													</li>
													<li>
														<div class="head">Certification Shipping Address</div>
														<div class="head_l">
															<?php echo $address.", ".$citys."-".$pincodes ?>
														</div>
													</li>
													
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>

							<div class="promo_con">
								<div class="promo_head">
									<div class="head">Have a promo code ?</div>
								</div>
								<div class="promo_type">
									<div class="promo_box">
										<input type="text" />
									</div>
									<div class="promo_button">
										<input type="button" value="Apply"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sum_rightside">
						<div class="fees_det">
							<div class="fees_head">
								Fees Details
							</div>
							<div class="fees_details">
								<div class="det_set">
									<div class="det_head">
										<div class="head">
											Course Fees
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. <?php echo $actual_fees; ?> /-</div>
									</div>
								</div>
								<div class="det_set">
									<div class="det_head">
										<div class="head">
											CGST Charges
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. <?php echo $gst_amount_s_c; ?> /-</div>
									</div>
								</div>
								<div class="det_set">
									<div class="det_head">
										<div class="head">
											SGST Charges
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. <?php echo $gst_amount_s_c; ?> /-</div>
									</div>
								</div>
								<div class="det_set">
									<div class="det_head">
										<div class="head">
											Sub Total
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. <?php echo $course_fees; ?> /-</div>
									</div>
								</div>
								<div class="det_set">
									<div class="det_head">
										<div class="head">
											Promo Code Discount
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. 0 /-</div>
									</div>
								</div>

								<div class="det_set">
									<div class="det_head">
										<div class="head">
											Total
										</div>
									</div>
									<div class="det_sub">
										<div class="subs">Rs. <?php echo $course_fees; ?> /- </div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="proceed_button">
							<div class="proceed_but">
								<div class="proceed_center">
									<div class="button" name="card_pay" onclick="choose_card()">
										<div class="button_name">
											Choose Payment Gateway
										</div>
										<div class="button_img">
											<i class='fas fa-hand-point-right'></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--order_summary Ends -->
		</div><!--order_summary_center Ends -->
	</div><!--order_summary_con Ends -->
	<div class="footer_con"><!--footer_con Starts -->
		<?php
			// include "footer.php";
		?>
	</div><!--footer_con Ends -->
</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/validate_page.js"></script>
