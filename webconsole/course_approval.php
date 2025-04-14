<?php	
	include "dbconn.php";
	include "check_ses_list.php";
	include_once "func_templates/main_func_code.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>KMH Dashboards</title>
	<script src='js/tech_valid.js'></script>

</head>

<body>
	<div class="right_container"><!--right_container Starts -->
		<div class="bread_crumbs"><!--bread_crumbs Starts -->
			<?php include 'breadcrumbs.php'; ?>
		</div><!--bread_crumbs Ends -->
		<!-- <input type="button" value='views' onclick="url_pass('menu_setup.php')" /> -->
		<div class="services_app_con">
			<div class="services_app_cen">
				<div class="services_app">
					<div class="table_design table_spec_data">
						<?php
							$selectMulRecFromnavStatus = selectMultipleRecordFromNavStatus('tbl_navigation_details',"'Waiting For Approval'",'courses');
							$selectMulRecFromnavStatus_json = json_decode($selectMulRecFromnavStatus, true);
							$selectMulRecFromnavStatus_json_count = isset($selectMulRecFromnavStatus_json['navMultipleRecordStatus_count'])?$selectMulRecFromnavStatus_json['navMultipleRecordStatus_count']:"";
							

									
						?>
						<table class="info_media_heads">
				            <tr>              
					            <th>Speciality Name</th>
					            <th>Banner</th>
					            <th>Post Status</th>
					            <th>Action</th>
				            </tr>
						 </table>
						 <table class="info_media_contents">
						 	<?php
						 		if($selectMulRecFromnavStatus_json_count > 0){
								foreach ($selectMulRecFromnavStatus_json['navMultipleRecordStatus_details'] as $navMultiplenavStatus) {
									$navigation_id = $navMultiplenavStatus["nav_id"];
									$navigation_name = $navMultiplenavStatus["menu_name"];
									$navigation_banner = $navMultiplenavStatus["course_thumb_image"];
									$navigation_status = $navMultiplenavStatus["status"];
						 	?>
							    <tr>      
							        <td><?php echo $navigation_name; ?></td>
							        <td><?php echo $navigation_banner; ?></td>
							        <td><?php echo $navigation_status; ?></td>
							        <td><div class="c_update_button" onclick="course_approved('<?php echo $navigation_id; ?>','<?php echo $navigation_id; ?>')">View</div></td>
							    </tr>

						    <?php
						    	}
						    }else{
							?>
						    	<tr>      
									<td>No Results to Show</td>
								</tr>
							<?php
						    }

						    ?>
						</table>
						
					</div>

					<div class="update_con">
						<div class="update_center">
							<div class="update">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--right_container Ends -->
	
</body>
</html>