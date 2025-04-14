<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";

	$parent_val = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$cate_group_val = isset($_REQUEST['cate_group_val'])?$_REQUEST['cate_group_val']:"";	
	$menu_slug = isset($_REQUEST['menu_slug'])?$_REQUEST['menu_slug']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";

	$parent_val_s = isset($_REQUEST['parent_val_s'])?$_REQUEST['parent_val_s']:"";
	$level_s = isset($_REQUEST['level_s'])?$_REQUEST['level_s']:"";
	$head_services_s = isset($_REQUEST['head_services_s'])?$_REQUEST['head_services_s']:"";
	

	$sposted_date = new DateTime(isset($_REQUEST['sposted_date'])?$_REQUEST['sposted_date']:"");
	$ssposteds_dates= $sposted_date->format('Y-m-d');
	$sexpiry_date = new DateTime(isset($_REQUEST['sexpiry_date'])?$_REQUEST['sexpiry_date']:"");
	$sexpirys_dates= $sexpiry_date->format('Y-m-d');

	/*$media_Content = isset($_REQUEST['mediaContent'])?$_REQUEST['mediaContent']:"";
	$media_content_hentities = htmlentities($media_Content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/
	
	//$newDateTimes = time();
	
	$social_Status_select = isset($_REQUEST['descrip_status'])?$_REQUEST['descrip_status']:"";;
	$socialUpost_Id = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India

	$selectBatchMapRecord= selectBatchMapRecord('tbl_batch_mapping',$parent_val_s,$parent_val,$ssposteds_dates);
	$selectBatchMapRecord_json = json_decode($selectBatchMapRecord, true);
		
			//print_r($socialmedia_list_json);
	$selectBatchMapRecord_json_count = isset($selectBatchMapRecord_json['selectBatchMapRecord_count'])?$selectBatchMapRecord_json['selectBatchMapRecord_count']:"";
	if($selectBatchMapRecord_json_count >= 1){
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
		 
	 	$batch_mapping = array(
			"product_primary_id" => $parent_val,
			"product_primary_slug" => $menu_slug,
			"categories_group" => $cate_group_val,
			"batch_id" => $parent_val_s,
			"batch_name" => $head_services_s,

			"seat_count" => $level_s,
			"start_date" => $ssposteds_dates,			
			"end_date" => $sexpirys_dates,	
			"post_by_user" => $socialUpost_Id,			
			"insert_time" => $currentdates,				
			"status" => $social_Status_select,
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_batch_mapping",$batch_mapping)){
?>

<div class="social_close">
	X
</div>
<div class="social_result">
	<div class="res">
		<span><?php echo $head_services; ?></span> is mapped to <span><?php echo $head_services_s; ?></span> and  Inserted successfully
	</div>
</div>
<?php
		}
	}
	
?>