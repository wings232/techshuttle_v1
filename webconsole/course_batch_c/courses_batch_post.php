<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";

	$batch_name = isset($_REQUEST['batch_name'])?$_REQUEST['batch_name']:"";
	$batch_content = isset($_REQUEST['batch_content'])?$_REQUEST['batch_content']:"";
	$media_content_hentities = htmlentities($batch_content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);
	$sbatch_mode = isset($_REQUEST['sbatch_mode'])?$_REQUEST['sbatch_mode']:"";
	$sStartTime = isset($_REQUEST['sStartTime'])?$_REQUEST['sStartTime']:"";
	$sEndTime = isset($_REQUEST['sEndTime'])?$_REQUEST['sEndTime']:"";
	$seat_count = isset($_REQUEST['seat_count'])?$_REQUEST['seat_count']:"";
	$ssession_c = isset($_REQUEST['ssession_c'])?$_REQUEST['ssession_c']:"";
	$batch_running_days = isset($_REQUEST['patient_take_id'])?$_REQUEST['patient_take_id']:"";
	$dura_hrs = isset($_REQUEST['dura_hrs'])?$_REQUEST['dura_hrs']:"";
	$dura_days = isset($_REQUEST['dura_days'])?$_REQUEST['dura_days']:"";
	$dura_mnt = isset($_REQUEST['dura_mnt'])?$_REQUEST['dura_mnt']:"";
	$dura_full = $dura_hrs."~".$dura_days."~".$dura_mnt;
	$scourse_level = isset($_REQUEST['scourse_level'])?$_REQUEST['scourse_level']:"";
	$smodeofTraining = isset($_REQUEST['smodeofTraining'])?$_REQUEST['smodeofTraining']:"";
	$socialUpostId = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";
	$post_type = "courses";
	
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$currentMon = date("m");
	$currentYear = date("y");
	$currentDay = date("d");
	//$stamptime = substr(strtotime($currentdates),6);
	//date('m/d/Y H:i:s', 1685171498)
	$stamptime = strtotime($currentdates);
	$part_prefix = substr($batch_name,0,3);
	$package_web_code = strtoupper("TS".$part_prefix.$stamptime);
	

	$social_Status_select = "Waiting For Approval";
	$socialUpost_Id = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";

	$selectCourseBatchCheck= selectCourseBatchCheck('tbl_batch_setup',$batch_name,$sbatch_mode,$ssession_c,$scourse_level,$smodeofTraining);
	$selectCourseBatchCheck_json = json_decode($selectCourseBatchCheck, true);
		
			//print_r($socialmedia_list_json);
	$selectCourseBatchCheck_json_count = isset($selectCourseBatchCheck_json['selectCoursebatchCheck_count'])?$selectCourseBatchCheck_json['selectCoursebatchCheck_count']:"";
	if($selectCourseBatchCheck_json_count >= 1){
?>

<div class="social_close">
	X
</div>
<div class="social_result">
	<div class="res">
		Record Already exist
	</div>
</div>

<?php
	 }else{
	 	$course_batch_insert = array(
			"batch_name" => $batch_name,
			"batch_descrip" => $mediahtml_entity_decode,			
			"batch_type" => $sbatch_mode,
			"batch_timing_in" => $sStartTime,
			"batch_timing_out" => $sEndTime,
			"seat_count" => $seat_count,
			"batch_session" => $ssession_c,			
			"batch_code" => $package_web_code,
			"batch_running_days" => $batch_running_days,
			"post_by" => $socialUpost_Id,			
			"insert_time" => $currentdates,	
			"duration" => $dura_full,
			"course_level" => $scourse_level,			
			"mode_of_training" => $smodeofTraining,
			"status" => $social_Status_select,
			"post_type" => $post_type,		
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_batch_setup",$course_batch_insert)){
?>
			<div class="social_close">
	X
</div>
			<div class="social_result">
				<div class="res">
					<span><?php echo $batch_name; ?></span> Inserted successfully
				</div>
			</div>
<?php
		}
	}
?>