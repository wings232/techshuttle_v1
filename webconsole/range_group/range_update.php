<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$range_id = isset($_REQUEST['range_id'])?$_REQUEST['range_id']:'';
	$range_name = isset($_REQUEST['range_name'])?$_REQUEST['range_name']:'';
	$range_type = strtolower(isset($_REQUEST['range_type'])?$_REQUEST['range_type']:'');
	$range_type_list = strtolower(isset($_REQUEST['range_type_list'])?$_REQUEST['range_type_list']:'');
	$range_status = isset($_REQUEST['range_status'])?$_REQUEST['range_status']:'';

	$range_group_list= selectRangeGroupRecord('tbl_range_level',$range_name,$range_type);
	$range_group_list_json = json_decode($range_group_list, true);
	//print_r($accopany_filter_List_json);
	$range_group_list_json_count = isset($range_group_list_json['range_group_count'])?$range_group_list_json['range_group_count']:"";

	if($range_group_list_json_count == 0){
		$range_insert = array(
			"level_range_id" => $range_id,
			"range_name" => $range_name,
			"range_type" => $range_type_list,
			"status" => $range_status,
			
			/*"area_name" => $_POST["area_name"],
			"country" => $_POST["country"],
			"state" => $_POST["state"],
			"city" => $_POST["city"],
			"year_est" => $_POST["year_est"]*/
		);
		//$obj->insert_records("sign_up",$myArray)

		if(recordsToInsert("tbl_range_level",$range_insert)){
			echo "Record Inserted successfully";
		}
	}else{
		echo "Record Already Inserted";
	}
			?>
			<table>
				<tr>
					<th>Range Id</th>
					<th>Range Name</th>
					<th>Range Type</th>
					<th>Range Status</th>
				</tr>
				<?php
					$selectRangeGroupMulsRecord = selectRangeGroupMulsRecord('tbl_range_level');
					$selectRangeGroupMulsRecord_json = json_decode($selectRangeGroupMulsRecord, true);
					$selectRangeGroupMulsRecord_json_count = isset($selectRangeGroupMulsRecord_json['range_groupMul_count'])?$selectRangeGroupMulsRecord_json['range_groupMul_count']:"";
					if($selectRangeGroupMulsRecord_json_count != ""){
						foreach ($selectRangeGroupMulsRecord_json['range_groupMul_details'] as $range_group_details) {
									$range_group_id = $range_group_details['level_range_id'];
									$range_group_name = $range_group_details['range_name'];
									$range_type = $range_group_details['range_type'];
									$range_status = $range_group_details['status'];		
							
						
				?>
				<tr>
					<td><?php echo $range_group_id; ?></td>
					<td><?php echo $range_group_name; ?></td>
					<td><?php echo $range_type; ?></td>
					<td><?php echo $range_status; ?></td>
				</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="4" align="center">No Records to show</td>
					</tr>
				<?php
					}			
				?>
			</table>


