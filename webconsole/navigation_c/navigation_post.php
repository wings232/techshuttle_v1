<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$cate_name = isset($_REQUEST['cate_name'])?$_REQUEST['cate_name']:'';
	$menu_Url = isset($_REQUEST['menuUrl'])?$_REQUEST['menuUrl']:'';
	$updateIds = isset($_REQUEST['updateIds'])?$_REQUEST['updateIds']:'';
	$subId = isset($_REQUEST['sub_id'])?$_REQUEST['sub_id']:'';
	$levels = isset($_REQUEST['levels'])?$_REQUEST['levels']:'';
	$menuQueryKeys = isset($_REQUEST['menuQueryKeys'])?$_REQUEST['menuQueryKeys']:'';
	$sfile_image = isset($_REQUEST['sfile_image'])?$_REQUEST['sfile_image']:"";
	$media_slug = isset($_REQUEST['media_slug'])?$_REQUEST['media_slug']:'';
	$menu_prioritys = isset($_REQUEST['menu_prioritys'])?$_REQUEST['menu_prioritys']:'';
	$categories_list_id = isset($_REQUEST['categories_list_id'])?$_REQUEST['categories_list_id']:'';
	$categories_list = isset($_REQUEST['categories_list'])?$_REQUEST['categories_list']:'';
	$categories_status = isset($_REQUEST['categories_status'])?$_REQUEST['categories_status']:'';
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$user_call_id = isset($_REQUEST['user_call_id'])?$_REQUEST['user_call_id']:'';
		$selectNavDetailsCheck= selectNavDetailsCheck("tbl_navigation_setup",$cate_name,$media_slug,$levels,$subId);
		$selectNavDetailsCheck_json = json_decode($selectNavDetailsCheck, true);
		//print_r($accopany_filter_List_json);
		$selectNavDetailsCheck_json_count = isset($selectNavDetailsCheck_json['selectNavDetailsCheck_count'])?$selectNavDetailsCheck_json['selectNavDetailsCheck_count']:"";
		if($selectNavDetailsCheck_json_count == 0){

			if($menuQueryKeys == "insert_query"){
				$navigation_insert = array(
					"menu_name" => $cate_name,
					"menu_slug" => $media_slug,
					"menu_url" => $menu_Url,
					"sub_id" => $subId,
					"level" => $levels,
					"cate_group_id" => $categories_list_id,
					"categories_group" => $categories_list,
					"cate_status" => $categories_status,
					"post_user"=>$user_call_id,
					"banner" => $sfile_image,
					"priority" => $menu_prioritys,
					"insert_time" => $currentdates,
					/*"area_name" => $_POST["area_name"],
					"country" => $_POST["country"],
					"state" => $_POST["state"],
					"city" => $_POST["city"],
					"year_est" => $_POST["year_est"]*/
				);
				//$obj->insert_records("sign_up",$myArray)

				if(recordsToInsert("tbl_navigation_setup",$navigation_insert)){
					echo "Record Inserted successfully";
				}
				/*$menu_post_sql="Insert into tbl_location(location_name,location_slug,location_sub_id,Location_level) values('$cate_name','$menu_Url','$subId','$levels')";
				$menu_post_query= $conn->query($menu_post_sql);
				if($menu_post_query){
					echo "Record Inserted successfully";
				}*/
			}

		}else{
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
		}

	if($menuQueryKeys == "Update_query"){
		$update_data = array(  
            "menu_name" => $cate_name,
			"menu_slug" => $media_slug,
			"menu_url" => $menu_Url,
			"sub_id" => $subId,
			"level" => $levels,
			"cate_group_id" => $categories_list_id,
			"categories_group" => $categories_list,
			"cate_status" => $categories_status,
			"update_user"=>$user_call_id,
			"priority" => $menu_prioritys,
			"banner" => $sfile_image,
      );  
      $where_condition = array(  
           'menu_id'     =>     $updateIds  
      );  
      if(update("tbl_navigation_setup", $update_data, $where_condition))  
      {  
           echo 'good';
      } 
		/*$updateSql = "update tbl_location set location_name = '$cate_name', location_slug = '$menu_Url'  where Location_Id  ='$subId'";
		$updatesql_Query = $conn->query($updateSql);
		if($updatesql_Query){
			echo "Updated Record successfully";
		}*/
	}

	if($menuQueryKeys == "delete_query"){
		$delete_querys = "delete from tbl_navigation_setup where menu_id  = '$subId'";
		$delete_sql_query = $conn->query($delete_querys);
		echo mysqli_error($conn);
		if($delete_sql_query){
			echo "Delete Record successfully";
		}
	}
	
	//header("location:menu_enroll.php");
?>