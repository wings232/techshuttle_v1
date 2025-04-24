<?php
    include "../../check_ses_list.php";
    include "../../dbconn.php";
    include_once "../../func_templates/func_code.php";
    include "../../constantconfig.php";
    require('config.php');	
	require('razorpay-php/Razorpay.php');
	use Razorpay\Api\Api;
	use Razorpay\Api\Errors\SignatureVerificationError;

    $payment_id_f = isset($_REQUEST['payment_id_f'])?$_REQUEST['payment_id_f']:"";
    $admissions_ids = isset($_REQUEST['admissions_ids'])?$_REQUEST['admissions_ids']:"";
    $admissions_Nos = isset($_REQUEST['admissions_Nos'])?$_REQUEST['admissions_Nos']:"";

    $api = new Api($keyId, $keySecret);
	//$payment_ids = $_POST['razorpay_payment_id'];
	$razorpayPayment = $api->payment->fetch($payment_id_f);
	// echo "<pre>";
	// print_r($razorpayPayment);
	// echo "</pre>";
    date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:s"); 
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


    $admission_insert = array(
        
        "student_name" => $aNames,
        "course_slug" => $course_id,
        "admis_id" => $admissions_ids,
        "admis_no" => $admissions_Nos,        
        "trans_status" => "",       
        "trans_orderid" => $tech_orderId,
        "gate_order_id" => $orderid_razor,
		"gate_pay_id" => $payment_id_f,
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
        "status" => "failed",
        "gateway_name" => "rp",
		"user_id" => $user_session,
    );
    //$obj->insert_records("sign_up",$myArray)

    if(recordsToInsert("tbl_transaction_pay",$admission_insert)){
        echo "failed";
	}
?>