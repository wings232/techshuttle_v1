<?php
	include '../../check_ses_list.php';
	include '../../dbconn.php';	
	include_once "../../func_templates/func_code.php";


	$selectLoginDetails= selectLoginDetails("tbl_customer_login",$user_session,"Guest","Active");
    $selectLoginDetails_json = json_decode($selectLoginDetails, true);
    //print_r($accopany_filter_List_json);
    $selectLoginDetails_json_count = isset($selectLoginDetails_json['selectLoginDetails_count'])?$selectLoginDetails_json['selectLoginDetails_count']:"";
    if($selectLoginDetails_json_count > 0){  
      foreach ($selectLoginDetails_json['selectLoginDetails_details'] as $loginDetails) {
		$firstName  = isset($loginDetails["firstName"])?$loginDetails["firstName"]:"-";
		$lastName  = isset($loginDetails["lastName"])?$loginDetails["lastName"]:"-";
		$email  = isset($loginDetails["email"])?$loginDetails["email"]:"-";
		$mobileNo  = isset($loginDetails["mobileNo"])?$loginDetails["mobileNo"]:"-";
		$gender  = isset($loginDetails["gender"])?$loginDetails["gender"]:"-";
		$city  = isset($loginDetails["city"])?$loginDetails["city"]:"-";
		$state  = isset($loginDetails["state"])?$loginDetails["state"]:"-";
		$country  = isset($loginDetails["country"])?$loginDetails["country"]:"-";
		$status  =isset($loginDetails["status"])?$loginDetails["status"]:"-";		
	  }

	}
?>
<div class="user_nav">
	<ul>
		<li><i class="fa fa-home"></i></li>
		<li>Accounts</li>
		<li>My Profile</li>
	</ul>
</div>
<div class="profile_list">
	<div class="profile_set">
		<ul>
			<li>
				<div class="column_l">
					Name
				</div>
				<div class="column_r">
					<?php echo $firstName." ".$lastName; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Email
				</div>
				<div class="column_r">
					<?php echo $email; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Mobile No
				</div>
				<div class="column_r">
					<?php echo $mobileNo; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Gender
				</div>
				<div class="column_r">
					<?php echo $gender; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					City
				</div>
				<div class="column_r">
					<?php echo $city; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					State
				</div>
				<div class="column_r">
					<?php echo $state; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Country
				</div>
				<div class="column_r">
					<?php echo $country; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Status
				</div>
				<div class="column_r">
					<?php echo $status; ?>
				</div>
			</li>
			<li>
				<div class="column_l">
					Enrolled Courses
				</div>
				<div class="column_r">
					5 Courses
				</div>
			</li>
		</ul>
	</div>
</div>