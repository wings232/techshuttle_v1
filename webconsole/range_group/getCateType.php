<option value=''>Select Range Type</option>
<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$categories_type = isset($_REQUEST['categories_type'])?$_REQUEST['categories_type']:'';
	$selectCategoriesGroup = selectCategoriesGroupMulRecord('tbl_categories_group',$categories_type);
	$selectCategoriesGroup_json = json_decode($selectCategoriesGroup, true);
	$selectCategoriesGroup_json_count = isset($selectCategoriesGroup_json['categories_groupMul_count'])?$selectCategoriesGroup_json['categories_groupMul_count']:"";

		if($selectCategoriesGroup_json_count != ""){
			foreach ($selectCategoriesGroup_json['categories_groupMul_details'] as $cate_group_details) {
					$cate_group_id = $cate_group_details['cate_group_id'];
					$categories_group_name = $cate_group_details['categories_group_name'];
					$categories_type = $cate_group_details['categories_type'];
				
			?>							
			<option value='<?php echo $cate_group_id; ?>'><?php echo $categories_group_name; ?></option>
			<?php
			}
		}	
?>