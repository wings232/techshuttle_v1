<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$parent_val = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$sub_val = isset($_REQUEST['sub_val'])?$_REQUEST['sub_val']:"";
	$cate_group_val = isset($_REQUEST['cate_group_val'])?$_REQUEST['cate_group_val']:"";
	$menu_slug = isset($_REQUEST['menu_slug'])?$_REQUEST['menu_slug']:"";
	$cate_levelVal = isset($_REQUEST['cate_levelVal'])?$_REQUEST['cate_levelVal']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";
	$email_id = isset($_REQUEST['email_id'])?$_REQUEST['email_id']:"";
	$mobile = isset($_REQUEST['mobile'])?$_REQUEST['mobile']:"";
	$meta_title = isset($_REQUEST['meta_title'])?$_REQUEST['meta_title']:"";
	$meta_description = isset($_REQUEST['meta_description'])?$_REQUEST['meta_description']:"";
	$meta_keywords = isset($_REQUEST['meta_keyword'])?$_REQUEST['meta_keyword']:"";
	$sfile_image = isset($_REQUEST['sfile_image'])?$_REQUEST['sfile_image']:"";
	$sfile_image_banner = isset($_REQUEST['sfile_image_banner'])?$_REQUEST['sfile_image_banner']:"";
	/*$media_Content = isset($_REQUEST['mediaContent'])?$_REQUEST['mediaContent']:"";
	$media_content_hentities = htmlentities($media_Content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/
	$overall_priority = isset($_REQUEST['overall_priority'])?$_REQUEST['overall_priority']:"";
	$dept_priority = isset($_REQUEST['dept_priority'])?$_REQUEST['dept_priority']:"";
	$social_Status_select = "Waiting For Approval";
	$socialUpost_Id = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India

	$nav_check= selectSingleRecordFromNav('tbl_navigation_details',$parent_val);
	$nav_check_json = json_decode($nav_check, true);
		
			//print_r($socialmedia_list_json);
	$nav_check_json_count = isset($nav_check_json['navSingleRecord_count'])?$nav_check_json['navSingleRecord_count']:"";
	if($nav_check_json_count >= 1){
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
	 	$course_insert = array(
			"menu_name" => $head_services,
			"sub_id" => $sub_val,
			"parent_id" => $parent_val,
			"categories_group" => $cate_group_val,
			"menu_slug" => $menu_slug,
			"level" => $cate_levelVal,
			"course_thumb_image" => $sfile_image,
			"course_main_image" => $sfile_image_banner,
			"email" => $email_id,
			"Phone" => $mobile,			
			"overall_priority" => $overall_priority,
			"dept_priority" => $dept_priority,

			"meta_title" => $meta_title,
			"meta_description" => $meta_description,
			"meta_keywords" => $meta_keywords,
			"insert_time" => $currentdates,
			"post_by_user" => $socialUpost_Id,
			"status" => $social_Status_select,
			/*"area_name" => $_POST["area_name"],
			"country" => $_POST["country"],
			"state" => $_POST["state"],
			"city" => $_POST["city"],
			"year_est" => $_POST["year_est"]*/
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_navigation_details",$course_insert)){
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