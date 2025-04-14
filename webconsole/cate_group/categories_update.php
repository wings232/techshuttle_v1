<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$group_names = strtolower(isset($_REQUEST['group_names'])?$_REQUEST['group_names']:'');
	$group_types = isset($_REQUEST['group_types'])?$_REQUEST['group_types']:'';

	$cate_group_list= selectCategoriesGroupRecord('tbl_categories_group',$group_names,$group_types);
	$cate_group_list_json = json_decode($cate_group_list, true);
	//print_r($accopany_filter_List_json);
	$cate_group_list_json_count = isset($cate_group_list_json['categories_group_count'])?$cate_group_list_json['categories_group_count']:"";

	if($cate_group_list_json_count == 0){
		$categories_insert = array(
			"categories_group_name" => $group_names,
			"categories_type" => $group_types,
			
			/*"area_name" => $_POST["area_name"],
			"country" => $_POST["country"],
			"state" => $_POST["state"],
			"city" => $_POST["city"],
			"year_est" => $_POST["year_est"]*/
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_categories_group",$categories_insert)){
			echo "Record Inserted successfully";
		}
	}else{
		echo "Record Already Inserted";
	}



				$selectCategoriesGroupMulRecord= selectCategoriesGroupMulsRecord('tbl_categories_group');
				$selectCategoriesGroupMulRecord_json = json_decode($selectCategoriesGroupMulRecord, true);
			
				//print_r($socialmedia_list_json);
			$selectCategoriesGroupMulRecord_json_count = isset($selectCategoriesGroupMulRecord_json['categories_groupMul_count'])?$selectCategoriesGroupMulRecord_json['categories_groupMul_count']:"";

			

			?>
			<table>
				<tr>
					<th>categories_group_name</th>
					<th>categories_type</th>
				</tr>
				<?php
					if($selectCategoriesGroupMulRecord_json_count != ""){
						foreach ($selectCategoriesGroupMulRecord_json['categories_groupMul_details'] as $CategoriesGroupDetails) {			
							$categories_group_name = $CategoriesGroupDetails["categories_group_name"];
							$categories_type = $CategoriesGroupDetails["categories_type"];			
						
				?>
				<tr>
					<td><?php echo $categories_group_name; ?></td>
					<td><?php echo $categories_type; ?></td>
				</tr>
				<?php
						}
					}
				?>
			</table>


