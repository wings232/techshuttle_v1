<?php
	include "../dbconn.php";
	$cate_name = isset($_REQUEST['cate_name'])?$_REQUEST['cate_name']:'';
	$menu_Url = isset($_REQUEST['menuUrl'])?$_REQUEST['menuUrl']:'';
	$subId = isset($_REQUEST['sub_id'])?$_REQUEST['sub_id']:'';
	$levels = isset($_REQUEST['levels'])?$_REQUEST['levels']:'';
	$menuQueryKeys = isset($_REQUEST['menuQueryKeys'])?$_REQUEST['menuQueryKeys']:'';
	if($menuQueryKeys == "insert_query"){
		$menu_post_sql="Insert into menu_setup(menu_name,menu_url,sub_id,level) values('$cate_name','$menu_Url','$subId','$levels')";
		$menu_post_query= $conn->query($menu_post_sql);
		if($menu_post_query){
			echo "Record Inserted successfully";
		}
	}

	if($menuQueryKeys == "Update_query"){
		$updateSql = "update menu_setup set menu_name = '$cate_name', menu_url = '$menu_Url'  where cate_id ='$subId'";
		$updatesql_Query = $conn->query($updateSql);
		if($updatesql_Query){
			echo "Updated Record successfully";
		}
	}

	if($menuQueryKeys == "delete_query"){
		$delete_querys = "delete from menu_setup where cate_id = '$subId'";
		$delete_sql_query = $conn->query($delete_querys);
		echo mysqli_error($conn);
		if($delete_sql_query){
			echo "Delete Record successfully";
		}
	}
	
	//header("location:menu_enroll.php");
?>