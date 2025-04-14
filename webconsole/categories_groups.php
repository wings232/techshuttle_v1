<?php
	include "dbconn.php";
	include_once "func_templates/main_func_code.php";
	include "check_ses_list.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='js/tech_valid.js'></script>
</head>
<body>
	<div class="right_container">
		<div class='levels_create'>
		</div>
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class='main_cate'>
			<div class="create_level_one">
				<input type="button" name="create_main" value="Create Main" id='create_main' onclick='category_level_one("1","insert_query")'/>
				<input type="hidden" id='call_id' value="<?php echo $user_session; ?>"/>
			</div>
		</div>
		<div class="content_table">
			<table class="level_menus_head">
				<tr>
					<th>S.no</th>
					<th>Category name</th>
					<th>Category slug</th>
					<th>Action</th>				
				</tr>
			</table>
			<?php

				$selectNavigationRecordlevel= selectNavigationRecordlevel('tbl_categories_groups',1);
				$selectNavigationRecordlevel_json = json_decode($selectNavigationRecordlevel, true);
					
						//print_r($socialmedia_list_json);
				$selectNavigationRecordlevel_json_count = isset($selectNavigationRecordlevel_json['navigation_level_count'])?$selectNavigationRecordlevel_json['navigation_level_count']:"";
				if($selectNavigationRecordlevel_json_count != 0){
				foreach ($selectNavigationRecordlevel_json['navigation_level_details'] as $navigation_details) {
							//$articlesTitleSn = $location_details["sn"];
							
							$cate_id = $navigation_details['menu_id'];
							$pubName = $navigation_details['menu_name'];
							$slug_info = $navigation_details['menu_slug'];
				/*$level_one_sql="select * from tbl_location where level = '1'";
				$level_one_query_sel=$conn->query($level_one_sql);
				$level_one_query_sel=$conn->query($level_one_sql);
				while($level_one_result = $level_one_query_sel->fetch_assoc()){
					$cate_id = $level_one_result['Location_Id'];
					$pubName = $level_one_result['location_name'];
					$slug_info = $level_one_result['location_slug'];*/
				
			?>
			<table class="level_one_table">
				<tr>
				
					<td><?php echo $cate_id; ?></td>
					<td><?php echo $pubName; ?></td>
					<td><?php echo $slug_info; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick='categoryTwo("<?php  echo $cate_id; ?>","2","insert_query")'/></td>
					
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='categoryUpdate("<?php  echo $pubName; ?>","<?php  echo $slug_info; ?>","<?php  echo $cate_id; ?>","1","Update_query")'/></td>
					<td><!-- <input type="button" name="delete_second" value="Delete" id='delete' onclick='locationDelete("<?php  // echo $cate_id; ?>","1","delete_query")'/> --></td>
				</tr>
				
			</table>
			<?php
				$selectNavigationRecordMultilevel= selectNavigationRecordMultilevel('tbl_categories_groups',2,$cate_id);
				$selectNavigationRecordMultilevel_json = json_decode($selectNavigationRecordMultilevel, true);
					
						//print_r($socialmedia_list_json);
				$selectNavigationRecordMultilevel_json_count = isset($selectNavigationRecordMultilevel_json['navigation_levelmul_count'])?$selectNavigationRecordMultilevel_json['navigation_levelmul_count']:"";
				if($selectNavigationRecordMultilevel_json_count > 0){
				foreach ($selectNavigationRecordMultilevel_json['navigation_levelmul_details'] as $navigationmul_details) {
					$cate_ids = $navigationmul_details['menu_id'];
					$pubNames = $navigationmul_details['menu_name'];
					$slug_infos = $navigationmul_details['menu_slug'];
				/*$level_two_sql="select * from tbl_location where level='2' and sub_id='$cate_id'";
				$level_two_query_sel=$conn->query($level_two_sql);
				while($level_two_result = $level_two_query_sel->fetch_assoc()){
					$cate_ids = $level_two_result['Location_Id'];
					$pubNames = $level_two_result['location_name'];
					$slug_infos = $level_two_result['location_slug'];*/
				
			?>
			<table class="level_two_table">
				<tr>
					<td><?php echo $cate_ids; ?></td>
					<td><?php echo $pubNames; ?></td>
					<td><?php echo $slug_infos; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick="categoryTwo('<?php  echo $cate_ids; ?>','3','insert_query')" /></td>
					
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='categoryUpdate("<?php  echo $pubNames; ?>","<?php  echo $slug_infos; ?>","<?php  echo $cate_ids; ?>","2","Update_query")'/></td>
					<td><!-- <input type="button" name="delete_second" value="Delete" id='delete' onclick='locationDelete("<?php  // echo $cate_ids; ?>","2","delete_query")'/> --></td>
				</tr>

			</table>
			<?php
				$selectNavigationRecordMultilevel= selectNavigationRecordMultilevel('tbl_categories_groups',3,$cate_ids);
				$selectNavigationRecordMultilevel_json = json_decode($selectNavigationRecordMultilevel, true);
					
						//print_r($socialmedia_list_json);
				$selectNavigationRecordMultilevel_json_count = isset($selectNavigationRecordMultilevel_json['navigation_levelmul_count'])?$selectNavigationRecordMultilevel_json['navigation_levelmul_count']:"";
				if($selectNavigationRecordMultilevel_json_count > 0){
				foreach ($selectNavigationRecordMultilevel_json['navigation_levelmul_details'] as $navigationmul_details) {
					$cate_idss = $navigationmul_details['menu_id'];
					$pubNamess = $navigationmul_details['menu_name'];
					$slug_infoss = $navigationmul_details['menu_slug'];
				/*$level_three_sql="select * from tbl_location where level='3' and sub_id='$cate_ids'";
				$level_three_query_sel=$conn->query($level_three_sql);
				while($level_three_result = $level_three_query_sel->fetch_assoc()){
					$cate_idss = $level_three_result['Location_Id'];
					$pubNamess = $level_three_result['location_name'];
					$slug_infoss = $level_three_result['location_slug'];*/
				
			?>
			<table class="level_three_table" >
				<tr>
					<td><?php echo $cate_idss; ?></td>
					<td width='60%'><?php echo $pubNamess; ?></td>
					<td><?php echo $slug_infoss; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick="categoryTwo('<?php  echo $cate_idss; ?>','4','insert_query')" /> </td>
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='categoryUpdate("<?php  echo $pubNamess; ?>","<?php  echo $slug_infoss; ?>","<?php  echo $cate_idss; ?>","3","Update_query")'/></td>
					<td><!-- <input type="button" name="delete_second" value="Delete" id='delete' onclick='locationDelete("<?php  // echo $cate_idss; ?>","3","delete_query")'/> --></td>
				</tr>

			</table>


			<?php
				$selectNavigationRecordMultilevel= selectNavigationRecordMultilevel('tbl_categories_groups',4,$cate_idss);
				$selectNavigationRecordMultilevel_json = json_decode($selectNavigationRecordMultilevel, true);
					
						//print_r($socialmedia_list_json);
				$selectNavigationRecordMultilevel_json_count = isset($selectNavigationRecordMultilevel_json['navigation_levelmul_count'])?$selectNavigationRecordMultilevel_json['navigation_levelmul_count']:"";
				if($selectNavigationRecordMultilevel_json_count > 0){
				foreach ($selectNavigationRecordMultilevel_json['navigation_levelmul_details'] as $navigationmul_details) {
					$cate_idss_four = $navigationmul_details['menu_id'];
					$pubNamess_four = $navigationmul_details['menu_name'];
					$slug_infoss_four = $navigationmul_details['menu_slug'];
				/*$level_three_sql="select * from tbl_location where level='3' and sub_id='$cate_ids'";
				$level_three_query_sel=$conn->query($level_three_sql);
				while($level_three_result = $level_three_query_sel->fetch_assoc()){
					$cate_idss = $level_three_result['Location_Id'];
					$pubNamess = $level_three_result['location_name'];
					$slug_infoss = $level_three_result['location_slug'];*/
				
			?>
			<table class="level_three_table three_four" >
				<tr>
					<td><?php echo $cate_idss_four; ?></td>
					<td width='60%'><?php echo $pubNamess_four; ?></td>
					<td><?php echo $slug_infoss_four; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick="categoryTwo('<?php  echo $cate_idss_four; ?>','5','insert_query')" /> </td>
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='categoryUpdate("<?php  echo $pubNamess_four; ?>","<?php  echo $slug_infoss_four; ?>","<?php  echo $cate_idss_four; ?>","4","Update_query")'/></td>
					<td><!-- <input type="button" name="delete_second" value="Delete" id='delete' onclick='locationDelete("<?php  // echo $cate_idss_four; ?>","4","delete_query")'/> --></td>
				</tr>

			</table>

			<?php
				$selectNavigationRecordMultilevel= selectNavigationRecordMultilevel('tbl_categories_groups',5,$cate_idss_four);
				$selectNavigationRecordMultilevel_json = json_decode($selectNavigationRecordMultilevel, true);
					
						//print_r($socialmedia_list_json);
				$selectNavigationRecordMultilevel_json_count = isset($selectNavigationRecordMultilevel_json['navigation_levelmul_count'])?$selectNavigationRecordMultilevel_json['navigation_levelmul_count']:"";
				if($selectNavigationRecordMultilevel_json_count > 0){

				

				foreach ($selectNavigationRecordMultilevel_json['navigation_levelmul_details'] as $navigationmul_details) {
					$cate_idss_five = $navigationmul_details['menu_id'];
					$pubNamess_five = $navigationmul_details['menu_name'];
					$slug_infoss_five = $navigationmul_details['menu_slug'];
				/*$level_three_sql="select * from tbl_location where level='3' and sub_id='$cate_ids'";
				$level_three_query_sel=$conn->query($level_three_sql);
				while($level_three_result = $level_three_query_sel->fetch_assoc()){
					$cate_idss = $level_three_result['Location_Id'];
					$pubNamess = $level_three_result['location_name'];
					$slug_infoss = $level_three_result['location_slug'];*/
				
			?>

			<table class="level_three_table three_five" >
				<tr>
					<td><?php echo $cate_idss_five; ?></td>
					<td width='60%'><?php echo $pubNamess_five; ?></td>
					<td><?php echo $slug_infoss_five; ?></td>
					<!-- <td><input type="button" name="create_second" value="Create" id='create' onclick="navigationTwo('<?php  //echo $cate_idss_five; ?>','5','insert_query')" /> </td> -->
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='categoryUpdate("<?php  echo $pubNamess_five; ?>","<?php  echo $slug_infoss_five; ?>","<?php  echo $cate_idss_five; ?>","5","Update_query")'/></td>
					<td><!-- <input type="button" name="delete_second" value="Delete" id='delete' onclick='locationDelete("<?php  // echo $cate_idss_five; ?>","5","delete_query")'/> --></td>
				</tr>

			</table>
			<?php
											} // Level Five foreach ends
										} // Level Five count ends 
									}// Level Four foreach ends
								}	// Four level If Condition
							}// For Each Third level
						} // Third level If Condition
					}// For Each Second level
					}// Second level If Condition
				} // For Each First level
			} // First level If Condition
			?>
		</div>
	</div>
	
</body>
</html>