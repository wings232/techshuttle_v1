<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$statusUpdates = isset($_REQUEST['status_updates'])?$_REQUEST['status_updates']:"";
	$remarks_BlogM = isset($_REQUEST['remarks_BlogM'])?$_REQUEST['remarks_BlogM']:"";
	$social_Upost_Id =  $user_session; 
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India

	if($statusUpdates == 'Approve'){
		$statusUpdates = 'Active';
	}

	if($statusUpdates == 'Reject'){
		$statusUpdates = 'Inactive';
	}

	
	/*$update_status = "UPDATE doctor_vids SET approve_remark = '$remarks_BlogM',user_approved_by='$social_Upost_Id', vids_status ='$statusUpdates' WHERE id = '$articlesId'";
	$update_status_query=$conn->query($update_status);*/

	$update_data = array(  
           'approve_remark' => $remarks_BlogM,  
           'user_approved_by' => $social_Upost_Id,
           'status' => $statusUpdates,  
           'update_time'   =>    $currentdates  
      );  
      $where_condition = array(  
           'nav_id'     =>     $articlesId  
      );  
      if(update("tbl_navigation_details", $update_data, $where_condition))  
      {  
           echo 'good';
      } 
	
?>


				
<?php
$selectMulRecFromnavStatus = selectMultipleRecordFromNavStatus('tbl_navigation_details',"'Waiting For Approval'",'courses');
$selectMulRecFromnavStatus_json = json_decode($selectMulRecFromnavStatus, true);
$selectMulRecFromnavStatus_json_count = isset($selectMulRecFromnavStatus_json['navMultipleRecordStatus_count'])?$selectMulRecFromnavStatus_json['navMultipleRecordStatus_count']:"";

if($selectMulRecFromnavStatus_json_count != 0){
	foreach ($selectMulRecFromnavStatus_json['navMultipleRecordStatus_details'] as $navmultiple_details) {
		$nav_id = $navmultiple_details["nav_id"];
		$menu_name = $navmultiple_details["menu_name"];
		$banner = $navmultiple_details["banner"];
		$status = $navmultiple_details["status"];
?>
			<tr>      
			      <td><?php echo $menu_name; ?></td>
			      <td><?php echo $banner; ?></td>
			      <td><?php echo $status; ?></td>
			      <td><div class="c_update_button" onclick="course_approved('<?php echo $nav_id; ?>','<?php echo $menu_name; ?>')">View</div></td>
			    </tr>

<?php
	}
}else{
	?>
	<tr>      
		<td>No Results to Show</td>
	</tr>
<?php
}


?>

					

			
				
				