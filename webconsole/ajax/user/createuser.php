<div class="user_cre_re">
	<div class="head_cre">
		Message Box
	</div>
	<div class="message_delivery">

<?php
	include '../../dbconn.php';
	$roleSelect = isset($_REQUEST['role_Select'])?$_REQUEST['role_Select']:"";
	$emp_level_select = isset($_REQUEST['emp_level_select'])?$_REQUEST['emp_level_select']:"";
	$empId = isset($_REQUEST['emp_Id'])?$_REQUEST['emp_Id']:"";
	$userName = isset($_REQUEST['user_Name'])?$_REQUEST['user_Name']:"";
	$userPass = isset($_REQUEST['user_Pass'])?$_REQUEST['user_Pass']:"";
	$userIdentityCrp = md5($userPass);
	$userFullname = isset($_REQUEST['user_Fullname'])?$_REQUEST['user_Fullname']:"";
	$userStatus = isset($_REQUEST['user_Status'])?$_REQUEST['user_Status']:"";
	$userMail = isset($_REQUEST['user_Mail'])?$_REQUEST['user_Mail']:"";
	$userMobile = isset($_REQUEST['user_Mobile'])?$_REQUEST['user_Mobile']:"";
	$userDepartment = isset($_REQUEST['user_Department'])?$_REQUEST['user_Department']:"";
	$userBranch = isset($_REQUEST['user_Branch'])?$_REQUEST['user_Branch']:"";
	$userDesignation = isset($_REQUEST['user_Designation'])?$_REQUEST['user_Designation']:"";
	$userGender = isset($_REQUEST['user_Gender'])?$_REQUEST['user_Gender']:"";
	$userworkerType = isset($_REQUEST['worker_Type'])?$_REQUEST['worker_Type']:"";
	$userfileImage = isset($_REQUEST['file_Image'])?$_REQUEST['file_Image']:"";
	$userpostBy = isset($_REQUEST['userpost_By'])?$_REQUEST['userpost_By']:"";

	$user_select_sql = "SELECT * From login where employee_id = '$empId'";
	$user_select_query = $conn->query($user_select_sql);
	$user_select_row_count = $user_select_query->num_rows;

	if($user_select_row_count >= 1){
		echo "User Account Is Already Exist";
	}else{
		 $user_insert_sql= "INSERT into login(emp_level,employee_id,username,password,role_level,userfullname,status,emailaddress,phoneno,department,branch,designation,gender,worker_type,user_img,postbyuser) values('$emp_level_select','$empId','$userName','$userIdentityCrp','$roleSelect','$userFullname','$userStatus','$userMail','$userMobile','$userDepartment','$userBranch','$userDesignation','$userGender','$userworkerType','$userfileImage','$userpostBy')";
		$user_insert_query = $conn->query($user_insert_sql);
		if($user_insert_query){
			echo "User Account Created Successfully";
		}else{
			echo "error";
		}
	}

	

?>
</div>
</div>