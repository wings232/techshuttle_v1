<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";

	$uproduct_lists = isset($_REQUEST['uproduct_lists'])?$_REQUEST['uproduct_lists']:"";
	$media_content_hentities = htmlentities($uproduct_lists);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);

	$social_Upost_Id = isset($_REQUEST['social_Upost_Id'])?$_REQUEST['social_Upost_Id']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$social_Status_select = isset($_REQUEST['ustatus_sel'])?$_REQUEST['ustatus_sel']:"";

	$update_data = array(  
			"product_list" => $mediahtml_entity_decode,
            'update_user' => $social_Upost_Id,
            'status' => $social_Status_select,
            'update_time' => $currentdates  
      );  
      $where_condition = array(  
           'product_list_id' => $articlesId  
      );  
      if(update("tbl_product_list", $update_data, $where_condition))  
      {  
           //echo 'good';
       
      $selectCatebasedRecord = selectCatebasedRecord('tbl_product_list','courses');
	  $selectCatebasedRecord_json = json_decode($selectCatebasedRecord, true);
	  $selectCatebasedRecord_json_count = isset($selectCatebasedRecord_json['selectCatebasedRecord_count'])?$selectCatebasedRecord_json['selectCatebasedRecord_count']:"";
		if($selectCatebasedRecord_json_count != ""){
		foreach ($selectCatebasedRecord_json['selectCatebasedRecord_details'] as $navmultiple_details) {
			$nav_id = $navmultiple_details["product_list_id"];
			$product_pri_slug = $navmultiple_details["product_pri_slug"];
			$menu_name = str_replace('-',' ',strtolower($navmultiple_details["product_pri_slug"]));
			$product_type = $navmultiple_details["product_type"];
			$categories_group = $navmultiple_details["categories_group"];
			$status = $navmultiple_details["status"];
?>
<tr>   
 	  <td style="width:35%"><?php echo $menu_name; ?></td>   
      <td style="width:25%"><?php echo $product_type; ?></td>
      <td><?php echo $categories_group; ?></td>
      <td><?php echo $status; ?></td>
      <td><div class="c_update_button" onclick="update_course_fee('<?php echo $nav_id; ?>','<?php echo $product_pri_slug; ?>')">View</div></td>
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

