<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$Prices = isset($_REQUEST['Prices'])?$_REQUEST['Prices']:"";
	
	$sposted_Dates = new DateTime(isset($_REQUEST['sposted_dates'])?$_REQUEST['sposted_dates']:"");
	$sposteds_Dates= $sposted_Dates->format('Y-m-d');
	$sexpiry_dates = new DateTime(isset($_REQUEST['sexpiry_dates'])?$_REQUEST['sexpiry_dates']:"");
	$sexpirys_dates= $sexpiry_dates->format('Y-m-d');
	//echo $Spostedtimestamp = strtotime($sposted_dates);
	//echo date('d/M/Y H:i:s', $timestamp);
	/*$content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
	$media_content_hentities = htmlentities($content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/

	
	
	//echo $sexpirytimestamp = strtotime($sexpiry_dates);
	echo $price_type_sel = isset($_REQUEST['price_type_sel'])?$_REQUEST['price_type_sel']:"";

	$price_descrips = isset($_REQUEST['price_descrips'])?$_REQUEST['price_descrips']:"";
	
	$social_Upost_Id = isset($_REQUEST['social_Upost_Id'])?$_REQUEST['social_Upost_Id']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$social_Status_select = isset($_REQUEST['status_sel'])?$_REQUEST['status_sel']:"";

	$update_data = array(  

           	"base_price" => $Prices,
			"price_type" => $price_type_sel,
			"start_date" => $sposteds_Dates,
			"end_date" => $sexpirys_dates,
            'price_descrip'  => $price_descrips,
            'update_user' => $social_Upost_Id,
            'status' =>  $social_Status_select,
            'update_time'   =>    $currentdates  
      );  
      $where_condition = array(  
           'price_id'     =>     $articlesId  
      );  
      if(update("tbl_price_setup", $update_data, $where_condition))  
      {  
           //echo 'good';
       
      $selectCatebasedRecord = selectCatebasedRecord('tbl_price_setup','courses');
	  $selectCatebasedRecord_json = json_decode($selectCatebasedRecord, true);
	  $selectCatebasedRecord_json_count = isset($selectCatebasedRecord_json['selectCatebasedRecord_count'])?$selectCatebasedRecord_json['selectCatebasedRecord_count']:"";
		if($selectCatebasedRecord_json_count != ""){
		foreach ($selectCatebasedRecord_json['selectCatebasedRecord_details'] as $navmultiple_details) {
			$nav_id = $navmultiple_details["price_id"];
			$product_name = $navmultiple_details["product_name"];
			$product_primary_id = $navmultiple_details["product_primary_id"];
			$price_type = $navmultiple_details["price_type"];
			$base_price = $navmultiple_details["base_price"];
			$status = $navmultiple_details["status"];
?>
<tr>   
 	  <td><?php echo $product_name; ?></td>   
      <td><?php echo $price_type; ?></td>
      <td><?php echo $base_price; ?></td>
      <td><?php echo $status; ?></td>
      <td><div class="c_update_button" onclick="update_course_fee('<?php echo $nav_id; ?>','<?php echo $product_primary_id; ?>')">View</div></td>
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

