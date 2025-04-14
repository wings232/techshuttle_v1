<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$sfileImage = isset($_REQUEST['sfileImage'])?$_REQUEST['sfileImage']:"";
	$sfile_images_banner = isset($_REQUEST['sfile_images_banner'])?$_REQUEST['sfile_images_banner']:"";

	/*$content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
	$media_content_hentities = htmlentities($content);
	$media_content_hentities_real = $conn -> real_escape_string($media_content_hentities);
	$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/

	
	$overall_prioritys = isset($_REQUEST['overall_prioritys'])?$_REQUEST['overall_prioritys']:"";
	$dept_prioritys = isset($_REQUEST['dept_prioritys'])?$_REQUEST['dept_prioritys']:"";

	$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
	$Phone = isset($_REQUEST['Phone'])?$_REQUEST['Phone']:"";
	$meta_title = isset($_REQUEST['meta_title'])?$_REQUEST['meta_title']:"";
	$meta_description = isset($_REQUEST['meta_description'])?$_REQUEST['meta_description']:"";
	$meta_keywords = isset($_REQUEST['meta_keywords'])?$_REQUEST['meta_keywords']:"";
	$social_Upost_Id = isset($_REQUEST['social_Upost_Id'])?$_REQUEST['social_Upost_Id']:"";
	date_default_timezone_set('Asia/Calcutta'); 
	$currentdates = date("Y-m-d H:i:s"); // time in India
	$social_Status_select = "Waiting For Approval";

	$update_data = array(  

           	"course_thumb_image" => $sfileImage,
			"course_main_image" => $sfile_images_banner,
			"overall_priority" => $overall_prioritys,
			"dept_priority" => $dept_prioritys,
            'email'  => $email,
            'Phone'   => $Phone,  
            'meta_title'     => $meta_title,  
            'meta_description'  => $meta_description,  
            'meta_keywords'  => $meta_keywords, 
            'update_user' => $social_Upost_Id,
            'status' =>  $social_Status_select,
            'update_time'   =>    $currentdates  
      );  
      $where_condition = array(  
           'nav_id'     =>     $articlesId  
      );  
      if(update("tbl_navigation_details", $update_data, $where_condition))  
      {  
           echo 'good';
       
      $selectMulRecFromnavStatus = selectMultipleRecordFromNavStatus('tbl_navigation_details',"'Waiting For Approval'");
	  $selectMulRecFromnavStatus_json = json_decode($selectMulRecFromnavStatus, true);
	  $selectMulRecFromnavStatus_json_count = isset($selectMulRecFromnavStatus_json['navMultipleRecordStatus_count'])?$selectMulRecFromnavStatus_json['navMultipleRecordStatus_count']:"";
		if($selectMulRecFromnavStatus_json_count != ""){
		foreach ($selectMulRecFromnavStatus_json['navMultipleRecordStatus_details'] as $navmultiple_details) {
			$nav_id = $navmultiple_details["nav_id"];
			$menu_name = $navmultiple_details["menu_name"];
			$banner = $navmultiple_details["course_thumb_image"];
			$status = $navmultiple_details["status"];
?>
<tr>   
 		<td><?php echo $sfileImage; ?></td>   
      <td><?php echo $menu_name; ?></td>
      <td><?php echo $banner; ?></td>
      <td><?php echo $status; ?></td>
      <td><div class="speciality_button" onclick="update_course('<?php echo $nav_id; ?>','<?php echo $menu_name; ?>')">View</div></td>
    </tr>

<?php
	}
}
}

?>

