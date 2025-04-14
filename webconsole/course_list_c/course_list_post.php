<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$parent_val = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$menu_sub_ids = isset($_REQUEST['menu_sub_ids'])?$_REQUEST['menu_sub_ids']:"";
	$menu_level = isset($_REQUEST['menu_level'])?$_REQUEST['menu_level']:"";
	$menu_slug = isset($_REQUEST['menu_slug'])?$_REQUEST['menu_slug']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";
	$list_type = isset($_REQUEST['list_type'])?$_REQUEST['list_type']:"";
	$post_type = isset($_REQUEST['post_type'])?$_REQUEST['post_type']:"";
	$social_Status_select = isset($_REQUEST['list_status'])?$_REQUEST['list_status']:"";

	$socialUpost_Id = isset($_REQUEST['socialUpostId'])?$_REQUEST['socialUpostId']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$product_list = isset($_REQUEST['product_list'])?$_REQUEST['product_list']:"";
	
	$product_lists = explode("\n", $product_list);
    if($product_list != ""){
        foreach ($product_lists as $products_lists) {
            /*$sql_blogs = "INSERT into blog_about(blog_id,blog_about) values('$blogIds','$blog_abouts')";
            $blog_querys = $conn->query($sql_blogs);*/
            $media_content_hentities = htmlentities($products_lists);
			$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
			$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);
			if($mediahtml_entity_decode != ""){
				//echo $mediahtml_entity_decode."<br>";
				$course_list_insert = array(
					"product_primary_id" => $parent_val,
					"product_pri_slug" => $menu_slug,			
					"product_list" => $mediahtml_entity_decode,
					"product_type" => $list_type,
					"categories_group" => $post_type,
					"sub_id" => $menu_sub_ids,
					"level" => $menu_level,
					"status" => $social_Status_select,
					
					"post_by_user" => $socialUpost_Id,			
					"insert_time" => $currentdates,		
					
				);
				//$obj->insert_records("sign_up",$myArray)

				if(recordsToInsert("tbl_product_list",$course_list_insert)){
					
				}
			}
            
        }
    }

	

	/*$selectCourseFeeCheck= selectCourseFeeCheck('tbl_price_setup',$parent_val,$price_type,$cate_group_val);
	$selectCourseFeeCheck_json = json_decode($selectCourseFeeCheck, true);
		
			//print_r($socialmedia_list_json);
	echo $selectCourseFeeCheck_json_count = isset($selectCourseFeeCheck_json['selectCourseFeeCheck_count'])?$selectCourseFeeCheck_json['selectCourseFeeCheck_count']:"";
	if($selectCourseFeeCheck_json_count >= 1){*/
?>

<!-- <div class="social_close">
	X
</div>
<div class="social_result">
	<div class="res">
		Record Already exist
	</div>
</div> -->

<?php
	/* }else{
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

		if(recordsToInsert("tbl_price_setup",$course_fee_insert)){*/
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
/*
		}
	}*/
?>