<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$ubatch_mode_type = isset($_REQUEST['ubatch_mode_type'])?$_REQUEST['ubatch_mode_type']:"";	
	
	$ucontent = isset($_REQUEST['ucontent'])?$_REQUEST['ucontent']:"";
	$media_content_hentities = htmlentities($ucontent);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);
	$ubatch_mode_type = isset($_REQUEST['ubatch_mode_type'])?$_REQUEST['ubatch_mode_type']:"";
	$uStartTimes = isset($_REQUEST['uStartTimes'])?$_REQUEST['uStartTimes']:"";
	$uEndTimes = isset($_REQUEST['uEndTimes'])?$_REQUEST['uEndTimes']:"";
	$useat_count = isset($_REQUEST['useat_count'])?$_REQUEST['useat_count']:"";
	$bat_running_days = isset($_REQUEST['bat_running_days'])?$_REQUEST['bat_running_days']:"";
	
	//echo $sexpirytimestamp = strtotime($sexpiry_dates);
	echo $ubatch_session = isset($_REQUEST['ubatch_session'])?$_REQUEST['ubatch_session']:"";
	$udurations_hrs = isset($_REQUEST['udurations_hrs'])?$_REQUEST['udurations_hrs']:"";
	$udurations_days = isset($_REQUEST['udurations_days'])?$_REQUEST['udurations_days']:"";
	$udurations_mnt = isset($_REQUEST['udurations_mnt'])?$_REQUEST['udurations_mnt']:"";
	$duras_fulls = $udurations_hrs."~".$udurations_days."~".$udurations_mnt;
	$ucourse_level = isset($_REQUEST['ucourse_level'])?$_REQUEST['ucourse_level']:"";
	$umode_of_training = isset($_REQUEST['umode_of_training'])?$_REQUEST['umode_of_training']:"";
	
	$social_Upost_Id = isset($_REQUEST['social_upost_id'])?$_REQUEST['social_upost_id']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$social_Status_select = isset($_REQUEST['status_sel'])?$_REQUEST['status_sel']:"";

	$update_data = array(  

           	"batch_descrip" => $mediahtml_entity_decode,
			"batch_type" => $ubatch_mode_type,
			"batch_timing_in" => $uStartTimes,
			"batch_timing_out" => $uEndTimes,
            'seat_count'  => $useat_count,
            'batch_session' => $ubatch_session,
            'batch_running_days'  => $bat_running_days,
            'duration' => $duras_fulls,
            'course_level'  => $ucourse_level,
            'mode_of_training' => $umode_of_training,
            'update_user' => $social_Upost_Id,
            'status' =>  $social_Status_select,
            'update_time'   =>    $currentdates   
      );  
      $where_condition = array(  
           'batch_id'     =>     $articlesId  
      );  
      if(update("tbl_batch_setup", $update_data, $where_condition))  
      {  
           //echo 'good';
       
      $selectCatebasedBatchRecord = selectCatebasedBatchRecord('tbl_batch_setup','courses');
	  $selectCatebasedBatchRecord_json = json_decode($selectCatebasedBatchRecord, true);
	  $selectCatebasedBatchRecord_json_count = isset($selectCatebasedBatchRecord_json['selectCatebasedBatchRecord_count'])?$selectCatebasedBatchRecord_json['selectCatebasedBatchRecord_count']:"";
		if($selectCatebasedBatchRecord_json_count != ""){
		foreach ($selectCatebasedBatchRecord_json['selectCatebasedBatchRecord_details'] as $navmultiple_details) {
			$nav_id = $navmultiple_details["batch_id"];
			$product_name = $navmultiple_details["batch_name"];
			$batch_type = $navmultiple_details["batch_type"];
			$course_level = $navmultiple_details["course_level"];
			
			$status = $navmultiple_details["status"];
?>
<tr>   
 	  <td style="width:35%"><?php echo $product_name; ?></td>   
      <td style="width:25%"><?php echo $batch_type; ?></td>
      <td><?php echo $course_level; ?></td>
      <td><?php echo $status; ?></td>
      <td><div class="c_update_button" onclick="update_course_batch('<?php echo $nav_id; ?>','<?php echo $product_name; ?>')">View</div></td>
    </tr>

<?php
	}
}
}
/*goodSELECT * FROM tbl_price_setup where status IN ('Waiting For Approval') and categories_group='courses'
Notice: Undefined index: nav_id in D:\xampp\htdocs\studies\techshuttle\webconsole\courses_fee_c\course_fee_up_status.php on line 49

Notice: Undefined index: menu_name in D:\xampp\htdocs\studies\techshuttle\webconsole\courses_fee_c\course_fee_up_status.php on line 50

Notice: Undefined index: course_thumb_image in D:\xampp\htdocs\studies\techshuttle\webconsole\courses_fee_c\course_fee_up_status.php on line 51*/
?>

