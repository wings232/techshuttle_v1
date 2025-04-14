<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$parent_val = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$sub_val = isset($_REQUEST['sub_val'])?$_REQUEST['sub_val']:"";
	$cate_group_val = isset($_REQUEST['cate_group_val'])?$_REQUEST['cate_group_val']:"";
	$menu_slug = isset($_REQUEST['menu_slug'])?$_REQUEST['menu_slug']:"";
	$cate_levelVal = isset($_REQUEST['cate_levelVal'])?$_REQUEST['cate_levelVal']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";
	$course_fees = isset($_REQUEST['course_fees'])?$_REQUEST['course_fees']:"";
	$price_type = isset($_REQUEST['price_type'])?$_REQUEST['price_type']:"";
	
	$sposted_date = new DateTime(isset($_REQUEST['sposted_date'])?$_REQUEST['sposted_date']:"");
	$ssposteds_dates= $sposted_date->format('Y-m-d');
	$sexpiry_date = new DateTime(isset($_REQUEST['sexpiry_date'])?$_REQUEST['sexpiry_date']:"");
	$sexpirys_dates= $sexpiry_date->format('Y-m-d');
	//$sexpirytimestamp = strtotime($sexpiry_date);
	$fee_content = isset($_REQUEST['fee_content'])?$_REQUEST['fee_content']:"";
	$media_content_hentities = htmlentities($fee_content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);

	$social_Status_select = "Waiting For Approval";
	$socialUpost_Id = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India

	$selectCourseFeeCheck= selectCourseFeeCheck('tbl_price_setup',$parent_val,$price_type,$cate_group_val);
	$selectCourseFeeCheck_json = json_decode($selectCourseFeeCheck, true);
		
			//print_r($socialmedia_list_json);
	echo $selectCourseFeeCheck_json_count = isset($selectCourseFeeCheck_json['selectCourseFeeCheck_count'])?$selectCourseFeeCheck_json['selectCourseFeeCheck_count']:"";
	if($selectCourseFeeCheck_json_count >= 1){
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
	 	$course_fee_insert = array(
			"product_primary_id" => $parent_val,
			"product_name" => $head_services,			
			"base_price" => $course_fees,
			"price_type" => $price_type,
			"categories_group" => $cate_group_val,
			"status" => $social_Status_select,
			"start_date" => $ssposteds_dates,			
			"end_date" => $sexpirys_dates,
			"price_descrip" => $mediahtml_entity_decode,
			"post_by_user" => $socialUpost_Id,			
			"insert_time" => $currentdates,		
			
			// "area_name" => $_POST["area_name"],
			// "country" => $_POST["country"],
			// "state" => $_POST["state"],
			// "city" => $_POST["city"],
			// "year_est" => $_POST["year_est"]
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_price_setup",$course_fee_insert)){
?>
			<div class="social_close">
	X
</div>
			<div class="social_result">
				<div class="res">
					<span><?php echo $head_services; ?></span> Inserted successfully
				</div>
			</div>
<?php
		}
	}
?>