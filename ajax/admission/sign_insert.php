<?php

	include '../../dbconn.php';
    include "../../func_templates/func_code.php";  
    //include "ip_plat_browser.php";
    $patName = isset($_REQUEST['patName'])?$_REQUEST['patName']:""; 
    $patMobile = isset($_REQUEST['patMobile'])?$_REQUEST['patMobile']:"";

    $patEmail = isset($_REQUEST['patEmail'])?$_REQUEST['patEmail']:""; 
   	$password = isset($_REQUEST['password'])?$_REQUEST['password']:"";     
    $userIdentityCrp = md5($password); 
    date_default_timezone_set('Asia/Calcutta'); 
    $currentdates = date("Y-m-d H:i:s"); // time in India

    	$selectEmailMobileCheck = selectEmailMobileCheck('tbl_customer_login',$patEmail,$patMobile);
		$selectEmailMobileCheck_json = json_decode($selectEmailMobileCheck, true);
		$selectEmailMobileCheck_json_count = isset($selectEmailMobileCheck_json['selectEmailMobileCheck_count'])?$selectEmailMobileCheck_json['selectEmailMobileCheck_count']:"";
		if($selectEmailMobileCheck_json_count > 0){
?>
		<div class="already_exist">
			<div class="al_images">
				<div class="al_img_center">
					<img src="images/portal/social_01.webp">
				</div>				
			</div>
			<div class="exist_code">
				You are already registered. Please log in or check your email or mobile No.
			</div>
		</div>
		<div class="multiple_button">
			<ul>
				<li onclick="forRegisteration_ad()">Register</li>
				<li onclick="forLogin_ad()">Sign In</li>
			</ul>
		</div>

<?php
		}else{
			$student_regs = array(
	            'firstName' => $patName,
	            'email' => $patEmail,
	            'mobileNo' => $patMobile,
	            'password' => $userIdentityCrp,	            
	            'status' => 'Active',
	            'userStatus' => 'Guest',
	            'insertTime' => $currentdates,
	        );
	    //$obj->insert_records("sign_up",$myArray)

	      if(recordsToInsert("tbl_customer_login",$student_regs)){
	      	echo trim("valid");
	      	$selectEmailMobileCheck = selectEmailMobileCheck('tbl_customer_login',$patEmail,$patMobile);
			$selectEmailMobileCheck_json = json_decode($selectEmailMobileCheck, true);
			$selectEmailMobileCheck_json_count = isset($selectEmailMobileCheck_json['selectEmailMobileCheck_count'])?$selectEmailMobileCheck_json['selectEmailMobileCheck_count']:"";

			    foreach ($selectEmailMobileCheck_json['selectEmailMobileCheck_details'] as $techId) {
			        $techIds  = $techId["regId"];
			        $techName  = $techId["firstName"];
			        
			    }
			
	      	session_start();
			$_SESSION['tsWebUserId'] = $techIds;
			$_SESSION['tsWebUserName'] = $techName;
			/*$_SESSION['pInterUserId'] = $PatientRegId ;
			$_SESSION['pInterRegId'] = $RegisterId;
			$_SESSION['PatientNameL'] = $PatientName;*/
	      }
		}
		
?>