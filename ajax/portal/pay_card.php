<?php
	include "../../check_ses_list.php";
	include "../../dbconn.php";
	include_once "../../func_templates/func_code.php";
	//include('Crypto.php')
	//include "Crypto.php";
	//require_once "config.php";
	$sAces = isset($_REQUEST['sAces'])?$_REQUEST['sAces']:"";
	$sAces_no = isset($_REQUEST['sAces_no'])?$_REQUEST['sAces_no']:"";
	$_SESSION['admission_ids'] = $sAces;
    $_SESSION['admission_no'] = $sAces_no;
	$admissions_ids = base64_decode($sAces);
	$admissions_Nos = base64_decode($sAces_no);



	$selectAdmissionCheck= selectAdmissionCheck("tbl_adminission_form",$admissions_ids,$admissions_Nos,"process");
	$selectAdmissionCheck_json = json_decode($selectAdmissionCheck, true);
	//print_r($accopany_filter_List_json);
	$selectAdmissionCheck_json_count = isset($selectAdmissionCheck_json['selectAdmissionCheck_count'])?$selectAdmissionCheck_json['selectAdmissionCheck_count']:"";
	if($selectAdmissionCheck_json_count > 0){  
	  foreach ($selectAdmissionCheck_json['selectAdmissionCheck_details'] as $admission_detail_check) {
	  		$admission_id  = $admission_detail_check["admission_id"];
	    	$actual_fees  = $admission_detail_check["actual_fees"];
	    	$gst_amount  = $admission_detail_check["gst_amount"];
	    	$course_feess  = $admission_detail_check["course_fees"];
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

	date_default_timezone_set('Asia/Calcutta');
	$dateGen = date('Ymdhis');
	// mandatory Information
	$orderIdGen = $dateGen.$admissions_Nos;
	$tid = $dateGen;
	$merchant_id = 2241157;
	$amount_paid = $course_feess;
	$currency = "INR";
	$redirect_url = "https://www.techshuttle.com/gateway/ccavenue-payment-gateway-integration/ccavResponseHandler.php";
	$cancel_url = "https://www.techshuttle.com/gateway/ccavenue-payment-gateway-integration/ccavResponseHandler.php";

	// Other Information
	echo "good";


?>

