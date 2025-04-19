<?php
    include "../../check_ses_list.php";
    include "../../dbconn.php";
    include_once "../../func_templates/func_code.php";
    include "../../constantconfig.php";

    $admissionId = isset($_REQUEST['admissionId'])?$_REQUEST['admissionId']:"";
    $admissionMobile = isset($_REQUEST['admissionMobile'])?$_REQUEST['admissionMobile']:"";
    $sAddress_proof = isset($_REQUEST['sAddress_proof'])?$_REQUEST['sAddress_proof']:"";
	$sAddress = isset($_REQUEST['sAddress'])?$_REQUEST['sAddress']:"";
	$sCity = isset($_REQUEST['sCity'])?$_REQUEST['sCity']:"";
	$sState = isset($_REQUEST['sState'])?$_REQUEST['sState']:"";
	$sCountry = isset($_REQUEST['sCountry'])?$_REQUEST['sCountry']:"";
	$sPincode = isset($_REQUEST['sPincode'])?$_REQUEST['sPincode']:"";
	$social_upost_id = isset($_REQUEST['social_upost_id'])?$_REQUEST['social_upost_id']:"";

    $selectAdmissionGetDetails= selectAdmissionGetDetails("tbl_adminission_form",$admissionMobile,$admissionId);
	$selectAdmissionGetDetails_json = json_decode($selectAdmissionGetDetails, true);
	//print_r($accopany_filter_List_json);
	$selectAdmissionGetDetails_json_count = isset($selectAdmissionGetDetails_json['selectAdmissionGetDetails_count'])?$selectAdmissionGetDetails_json['selectAdmissionGetDetails_count']:"";
	if($selectAdmissionGetDetails_json_count > 0){  
	  foreach ($selectAdmissionGetDetails_json['selectAdmissionGetDetails_details'] as $admission_det) {
	      $base_price  = $admission_det["course_fees"];
	      $course_id  = $admission_det["course_id"];
	  }
	}

    

	$_SESSION['course_ids'] = $course_id;

    $gst_amount = $base_price - ($base_price *(100 / (100 + 18)));
	$gst_AmountD = number_format($gst_amount, 2, '.', '');	
	$originalAmount = $base_price - $gst_AmountD;

	// $selectPriceSetup= selectPriceSetup("tbl_price_setup",$course_id,$pro_type,'courses','Active');
	// $selectPriceSetup_json = json_decode($selectPriceSetup, true);
	// //print_r($accopany_filter_List_json);
	// $selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	// if($selectPriceSetup_json_count > 0){  
	//   foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $price_details) {
	//       $base_price  = $price_details["base_price"];
	//       $price_ids  = $price_details["price_id"];
    //       $end_date  = $price_details["end_date"];
    //   }
    // }

    $update_data = array(  

            "register_id" => $social_upost_id,
			
			
			"aproof" => $sAddress_proof,
			"address" => $sAddress,
			"actual_fees" => $originalAmount,
			"gst_amount"=>$gst_AmountD,			
			"city" => $sCity,
			"state" => $sState,
			"country" => $sCountry,
			"pincode" => $sPincode,
					
			"status" => "process",
			"course_status" => "Start",
    );  
    $where_condition = array(  
        'mobile' => $admissionMobile,
        'admin_gen_id' => $admissionId,  
    );  
    if(update("tbl_adminission_form", $update_data, $where_condition))  
    { 
        echo "valid";
    }

   

?>