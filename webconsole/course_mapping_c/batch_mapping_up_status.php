<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$useat_count = isset($_REQUEST['useat_count'])?$_REQUEST['useat_count']:"";


	$uposted_dates = new DateTime(isset($_REQUEST['uposted_dates'])?$_REQUEST['uposted_dates']:"");
	$suposteds_dates= $uposted_dates->format('Y-m-d');
	$uexpiry_dates = new DateTime(isset($_REQUEST['uexpiry_dates'])?$_REQUEST['uexpiry_dates']:"");
	$suexpirys_dates= $uexpiry_dates->format('Y-m-d');
	//$sfile_images_banner = isset($_REQUEST['sfile_images_banner'])?$_REQUEST['sfile_images_banner']:"";

	/*$content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
	$media_content_hentities = htmlentities($content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/
	
	$social_Upost_Id = isset($_REQUEST['social_Upost_Id'])?$_REQUEST['social_Upost_Id']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$social_Status_select = isset($_REQUEST['ustatus_sel'])?$_REQUEST['ustatus_sel']:"";

	$update_data = array(  
			"seat_count" => $useat_count,
			"start_date" => $suposteds_dates,
           	"end_date" => $suexpirys_dates,
            'status' =>  $social_Status_select,
            'update_time'   =>    $currentdates,  
            'update_user'   =>    $social_Upost_Id,  
      );  
      $where_condition = array(  
           'batch_mapping_id'     =>     $articlesId  
      );  
      if(update("tbl_batch_mapping", $update_data, $where_condition))  
      {  
           //echo $sposteds_Dates;
       
      $selectMulRecFromnavStatus = selectMultipleRecordFromNavStatus('tbl_batch_mapping',"'Waiting For Approval','Active','Inactive'","courses");
	  $selectMulRecFromnavStatus_json = json_decode($selectMulRecFromnavStatus, true);
	  $selectMulRecFromnavStatus_json_count = isset($selectMulRecFromnavStatus_json['navMultipleRecordStatus_count'])?$selectMulRecFromnavStatus_json['navMultipleRecordStatus_count']:"";
		if($selectMulRecFromnavStatus_json_count != ""){
		foreach ($selectMulRecFromnavStatus_json['navMultipleRecordStatus_details'] as $navmultiple_details) {
			$nav_id = $navmultiple_details["batch_mapping_id"];
			$blog_name = $navmultiple_details["product_primary_slug"];
			$menu_name = str_replace('-',' ',strtolower($blog_name));
			
			$product_type = $navmultiple_details["batch_name"];
			$seat_count = $navmultiple_details["seat_count"];
			$status = $navmultiple_details["status"];
?>
<tr>     
      <td style="width:35%"><?php echo $menu_name; ?></td>
      <td style="width:25%"><?php echo $product_type; ?></td>
      <td><?php echo $seat_count; ?></td>
      <td><?php echo $status; ?></td>
      <td><div class="c_update_button" onclick="batch_mapping('<?php echo $nav_id; ?>','<?php echo $product_type; ?>')">View</div></td>
    </tr>

<?php
	}
}
}

?>

