<?php
	include "../../check_ses_list.php";
	include "../../dbconn.php";
	include_once "../../func_templates/func_code.php";
	include "../../constantconfig.php";
	require('config.php');	
	require('razorpay-php/Razorpay.php');
	use Razorpay\Api\Api;
	use Razorpay\Api\Errors\SignatureVerificationError;
	$success = true;
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
</head>
<body>
<div class="container"><!--Container Starts -->
<div class='header_con'><!--header_con Starts -->
		<?php include "../../header.php"; ?>
	</div><!--header_con Ends -->   
	<div class="order_success_con">
		<div class="order_success_center">
			<div class="order_success">
				<div class="user_nav">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">Order Confirmation</a></li>
					</ul>
				</div>
<?php
	
	
	
	
	
	$error = "Payment Failed";
	//echo $_SESSION['razorpay_order_id'];
	//print_r($_POST);
	//pay_QLFp3x6tr7QriG for wallet
	//pay_QLG0OoaDKGVUlr for card
	//pay_QKxl3YEaPfCjJV for net banking
	//pay_QLIrSuxuZrIwxG

	//pay_QLOZjVFZwMNtKH failed
	$_SESSION['razorpay_order_id'];
	$api = new Api($keyId, $keySecret);
	$payment_ids = $_POST['razorpay_payment_id'];
	$razorpayPayment = $api->payment->fetch($payment_ids);
	// echo "<pre>";
	// print_r($razorpayPayment);
	// echo "</pre>";

	$orderid_razor = $razorpayPayment['order_id'];	
	$amount = $razorpayPayment['amount'] / 100;	
	$status = $razorpayPayment['status'];
	$currency = $razorpayPayment['currency'];
	$captured = $razorpayPayment['captured'];
	
	if($status == "captured"){
		$status = 'Success'; 
	}	
	$payment_method = $razorpayPayment['method'];	

	$payment_card_id = $razorpayPayment['card_id'];	
	$payment_bank = $razorpayPayment['bank'];
	if($payment_card_id != ""){
		echo $card_type = $razorpayPayment['card']['type'];
		echo $payment_bank = $razorpayPayment['card']['issuer'];
	}

	$payment_wallet = $razorpayPayment['wallet'];
	if($payment_wallet != ""){
		$payment_bank = $payment_wallet;
	}

	
	
	$tech_orderId = $razorpayPayment['notes']['merchant_order_id'];	
	$admissions_ids = $razorpayPayment['notes']['admission_id'];	
	$admissions_Nos = $razorpayPayment['notes']['admission_no'];
	if($payment_wallet != ""){
		$transaction_id = $razorpayPayment['acquirer_data']['transaction_id'];
	}
	if($payment_method == "netbanking"){
		$transaction_id = $razorpayPayment['acquirer_data']['bank_transaction_id'];
	}

	if($payment_method == "card"){
		$transaction_id = $razorpayPayment['acquirer_data']['auth_code'];
	}

	if($payment_method == "upi"){
		$transaction_id = $razorpayPayment['acquirer_data']['upi_transaction_id'];
	}


	//for Error
	$eCode = $razorpayPayment['error_code'];
	$error_description = $razorpayPayment['error_description'];
	$error_source = $razorpayPayment['error_source'];
	$error_step = $razorpayPayment['error_step'];
	$error_reason = $razorpayPayment['error_reason'];
	
	
	
	$payment_date = $razorpayPayment['created_at'];

	$selectAdmissionCheck= selectAdmissionCheck("tbl_adminission_form",$admissions_ids,$admissions_Nos,"process");
    $selectAdmissionCheck_json = json_decode($selectAdmissionCheck, true);
    //print_r($accopany_filter_List_json);
    $selectAdmissionCheck_json_count = isset($selectAdmissionCheck_json['selectAdmissionCheck_count'])?$selectAdmissionCheck_json['selectAdmissionCheck_count']:"";
    if($selectAdmissionCheck_json_count > 0){  
      foreach ($selectAdmissionCheck_json['selectAdmissionCheck_details'] as $admission_detail_check) {
            $admission_id  = $admission_detail_check["admission_id"];
            $actual_fees  = $admission_detail_check["actual_fees"];
            $gst_amount  = $admission_detail_check["gst_amount"];
			$gst_amount_s_c = $gst_amount / 2;
            $course_feess  = $admission_detail_check["course_fees"];
			$course_id  = $admission_detail_check["course_id"];
            $aNames  = $admission_detail_check["aName"];
            $mobiles  = $admission_detail_check["mobile"];
            $emails  = $admission_detail_check["email"];
            $citys  = $admission_detail_check["city"];
            $states  = $admission_detail_check["state"];
            $countrys  = $admission_detail_check["country"];
            $address  = $admission_detail_check["address"];
            $pincodes  = $admission_detail_check["pincode"];
			
         }
    }
	$formatted_decimal = sprintf('%08.2f', $course_feess);
	$dateFormat = date('l ,m F Y', $payment_date);

	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:s");
	
	$selectCourseName= selectCourseName("tbl_navigation_setup",$course_id);
    $selectCourseName_json = json_decode($selectCourseName, true);
    //print_r($accopany_filter_List_json);
    $selectCourseName_json_count = isset($selectCourseName_json['selectCourseName_count'])?$selectCourseName_json['selectCourseName_count']:"";
    if($selectCourseName_json_count > 0){  
      foreach ($selectCourseName_json['selectCourseName_details'] as $courseName) {
            $menu_name  = $courseName["menu_name"];
	  }
	}
	
if($status == 'Success'){
	$admission_insert = array(
        
        "student_name" => $aNames,
        "course_slug" => $course_id,
        "admis_id" => $admissions_ids,
        "admis_no" => $admissions_Nos,        
        "trans_status" => "",       
        "trans_orderid" => $tech_orderId,
        "gate_order_id" => $orderid_razor,
		"gate_pay_id" => $payment_ids,
		"trans_mid" => "",
		"trans_amount" => $course_feess,
		"trans_pay_mode" => $payment_method,
		"trans_currency" => $currency,
		"trans_date" => $payment_date,
		"trans_resposecode" => $captured,
		"trans_resposemsg" => "",
		"trans_gateway" => $payment_bank,
		"trans_bank_id" => $transaction_id,
		"trans_bankname" => $payment_bank,
		"insert_time" => $currentdates,        
        "status" => "success",
        "gateway_name" => "rp",
		"user_id" => $user_session,
    );
    //$obj->insert_records("sign_up",$myArray)

	if( recordsToInsert("tbl_transaction_pay",$admission_insert)){
		$success_update_sql = "UPDATE tbl_adminission_form set status = 'success',admission_order_id='$tech_orderId' where admin_gen_id ='$admissions_Nos' and mobile='$mobiles'";
		$success_update_query = $conn->query($success_update_sql);
	}
	
?>

				<div class="order_head_center"><!--order_head_center Starts -->
					<div class="order_left">
						<div class="image_form">
							<div class="form_head">
								<div class="head">
									<?php echo $aNames; ?>, your order was submitted successfully!
									
								</div>
							</div>
							<div class="form_para">
								<div class="para">
									<p>
										Hi <span class="name"><?php echo $aNames; ?></span>, Thank you for your interest in <span class="course"><?php echo $menu_name; ?></span> , your Course fee <span class="rupee">₹</span><span class="amount"> <?php echo $formatted_decimal; ?></span>   (Inclusive of GST) has been successfully received . your transaction id is <span class="trans"><?php echo $transaction_id; ?></span>
									</p>
									<p>
										Your booking details has been sent to: 
										<span class="email"><?php echo $emails; ?></span>
									</p>
								</div>
							</div>
						</div>
						<div class="image">
							<img src="images/icons/filling-form.svg"/>
						</div>
					</div>
					<div class="order_right">						
						<div class="order_head_con">
							<div class="order_image">
								<i class="fas fa-check-circle"></i>
								<!-- <i class="fa fa-times-circle"></i> -->
							</div>
							<div class="order_head">
								<div class="head">Payment Successful</div>
								<div class="head_para">
									<p>
										We are processing the same and you will be notified via email.
									</p>
								</div>
							</div>
							<div class="list_details">
								<div class="table_center">
									<table>
										<tbody>
											<tr>
												<td>Booked On</td>
												<td>:</td>
												<td><?php echo $dateFormat; ?></td>
											</tr>
											<tr>
												<td>Your Reference ID</td>
												<td>:</td>
												<td><?php echo $tech_orderId; ?></td>
											</tr>
										
											<tr>
												<td>Actual Fees</td>
												<td>:</td>
												<td><?php echo $actual_fees; ?></td>
											</tr>
										
											<tr>
												<td>CGST Amount</td>
												<td>:</td>
												<td><?php echo $gst_amount_s_c; ?> &nbsp; (9% GST)</td>
											</tr>
											<tr>
												<td>SGST Amount</td>
												<td>:</td>
												<td><?php echo $gst_amount_s_c; ?> &nbsp; (9% GST)</td>
											</tr>
												<tr><td>Amount paid</td>
												<td>:</td>
												<td><?php echo $course_feess; ?></td>
											</tr>
											<tr>
												<td>Status</td>
												<td>:</td>
												<td style="color:#4BB543;"><?php echo $status; ?></td>
											</tr>
											
											<tr>
												<td>Bank Transaction Id</td>
												<td>:</td>
												<td><?php echo $transaction_id; ?></td>
											</tr>
											<tr>
												<td>Pay Mode</td>
												<td>:</td>
												<td><?php echo $payment_method; ?> - <?php echo $payment_bank; ?></td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!--order_head_center Ends -->
<?php  
}
if($status == 'failed'){

	
	?>
	
					<div class="order_head_center"><!--order_head_center Starts -->
						<div class="order_left">
							<div class="image_form">
								<div class="form_head">
									<div class="head">
										<?php echo $aNames; ?>, your order was submitted Failed!
										
									</div>
								</div>
								<div class="form_para">
									<div class="para">
										<p>
											Hi <span class="name"><?php echo $aNames; ?></span>, Thank you for your interest in <span class="course"><?php echo $menu_name; ?></span> , your Course fee <span class="rupee">₹</span><span class="amount"> <?php echo $formatted_decimal; ?></span>   (Inclusive of GST) has been  declined by the bank. Try another payment method or contact your bank. your transaction id is <span class="trans"><?php echo $transaction_id; ?></span>
											
										</p>
										<p>
											Your booking details has been sent to: 
											<span class="email"><?php echo $emails; ?></span>
										</p>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="images/icons/filling-form.svg"/>
							</div>
						</div>
						<div class="order_right">						
							<div class="order_head_con">
								<div class="order_image">
									
									<i style='color:red' class="fa fa-times-circle"></i> 
								</div>
								<div class="order_head">
									<div class="head">Payment Failed</div>
									<div class="head_para">
										<p>
											We are processing the same and you will be notified via email.
										</p>
									</div>
								</div>
								<div class="list_details">
									<div class="table_center">
										<table>
											<tbody>
												<tr>
													<td>Booked On</td>
													<td>:</td>
													<td><?php echo $dateFormat; ?></td>
												</tr>
												<tr>
													<td>Your Reference ID</td>
													<td>:</td>
													<td><?php echo $tech_orderId; ?></td>
												</tr>
											
												<tr>
													<td>Actual Fees</td>
													<td>:</td>
													<td><?php echo $actual_fees; ?></td>
												</tr>
											
												<tr>
													<td>CGST Amount</td>
													<td>:</td>
													<td><?php echo $gst_amount_s_c; ?> &nbsp; (9% GST)</td>
												</tr>
												<tr>
													<td>SGST Amount</td>
													<td>:</td>
													<td><?php echo $gst_amount_s_c; ?> &nbsp; (9% GST)</td>
												</tr>
													<tr><td>Amount paid</td>
													<td>:</td>
													<td><?php echo $course_feess; ?></td>
												</tr>
												<tr>
													<td>Status</td>
													<td>:</td>
													<td style="color:red;"><?php echo $status; ?></td>
												</tr>
												
												<tr>
													<td>Bank Transaction Id</td>
													<td>:</td>
													<td><?php echo $transaction_id; ?></td>
												</tr>
												<tr>
													<td>Pay Mode</td>
													<td>:</td>
													<td><?php echo $payment_method; ?> - <?php echo $payment_bank; ?></td>
												</tr>
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div><!--order_head_center Ends -->
	<?php  
	}
	?>				
			</div>
		</div>
	</div>
	<div class="footer_con"><!--footer_con Starts -->
		<?php
			 include "../../footer.php";
		?>
	</div><!--footer_con Ends -->
</div><!--Container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>