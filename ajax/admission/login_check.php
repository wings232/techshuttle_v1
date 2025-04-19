<?php
	include '../../dbconn.php';
    include "../../func_templates/func_code.php";  
    //include "ip_plat_browser.php";
    $username = isset($_REQUEST['username'])?$_REQUEST['username']:""; 
    $password = isset($_REQUEST['password'])?$_REQUEST['password']:"";
	
	$admin_ids = isset($_REQUEST['admin_id'])?$_REQUEST['admin_id']:""; 
    $admin_ms = isset($_REQUEST['admin_m'])?$_REQUEST['admin_m']:"";
	
	$identity_crp = md5($password);
	
	$selectLoginCheck = selectLoginCheck('tbl_customer_login',$username,$identity_crp);
		$selectLoginCheck_json = json_decode($selectLoginCheck, true);
		$selectLoginCheck_json_count = isset($selectLoginCheck_json['selectLoginCheck_count'])?$selectLoginCheck_json['selectLoginCheck_count']:"";
		if($selectLoginCheck_json_count == 0){
?>
	<div class="already_exist">
			<div class="al_images">
				<div class="al_img_center">
					<img src="images/portal/social_01.webp">
				</div>				
			</div>
			<div class="exist_code">
				Please check your username or password
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
			echo trim("valid");
			foreach ($selectLoginCheck_json['selectLoginCheck_details'] as $techId) {
		        $techIds  = $techId["regId"];
		        $techName  = $techId["firstName"];		        
		    }

		    session_start();
			$_SESSION['tsWebUserId'] = $techIds;
			$_SESSION['tsWebUserName'] = $techName;
			$_SESSION['tsAdmisId'] = $admin_ids;
			$_SESSION['tsAdmisMobile'] = $admin_ms;

		}
	/*if($submit_login == 'Login'){		
		$login_sql = "SELECT * from login where employee_id = '$emp_id' and password = '$identity_crp'";
		$login_query = $conn->query($login_sql);
		$num_rows = $login_query->num_rows;
		if($num_rows == 1){
			$login_result = $login_query->fetch_assoc();
			$_SESSION['user_id'] = $login_result['user_id'];
			$_SESSION['role_ids'] = $login_result['role_level'];
			header("Location:dashboard.php");
		}
	}*/
?>