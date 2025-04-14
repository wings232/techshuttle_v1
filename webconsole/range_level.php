<?php
	include "dbconn.php";
	include_once "func_templates/main_func_code.php";
	include "check_ses_list.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_container">
		<div class='levels_create'>
		</div>
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class="categories_gro_con">
			<form method='post' enctype="multipart/form-data" class="range_groups">
				<div class="feilds_box">				
					
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Range id</div>
						</div>
						<div class="feild_action">
							<input type="text" name="range_id" id='range_id'>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Range Name</div>
						</div>
						<div class="feild_action">
							<input type="text" name="range_name" id='range_name'>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Select Category Type</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='categories_type' name="categories_type" onchange="getSubCate()">
									<option value=''>Select Range Type</option>	
									<?php
									$selectCategoriesMainGroupType = selectCategoriesMainGroupType('tbl_categories_group','categories_type');
									$selectCategoriesMainGroupType_json = json_decode($selectCategoriesMainGroupType, true);
									$selectCategoriesMainGroupType_json_count = isset($selectCategoriesMainGroupType_json['selectCategoriesMainGroupType_count'])?$selectCategoriesMainGroupType_json['selectCategoriesMainGroupType_count']:"";
										if($selectCategoriesMainGroupType_json_count != ""){
											foreach ($selectCategoriesMainGroupType_json['selectCategoriesMainGroupType_details'] as $MainGroupType) {
													$categories_type = $MainGroupType['categories_type'];
												
											?>							
											<option value='<?php echo $categories_type; ?>'><?php echo $categories_type; ?></option>
											<?php
											}
										}	
									?>
															
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Select Range Type</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='range_type' name="range_type" class="range_ajax">
									<option value=''>First Select Category Type</option>	
									
															
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Select Status</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='range_status' name="range_status">
									<option value=''>Select Status</option>	
															
									<option value='Active'>Active</option>
									<option value='Inactive'>Inactive</option>
									
															
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_action">
							<input type="button" name='create_button' value="Create" onclick="rangecreate()" />
							<div class="spinner_one"><img src="images/loading_01.gif"></div>
						</div>
					</div><!-- input_box loop Ends-->
				</div>
			</form>
		</div>

		
		<div class="categories_show">
			
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

		</div>
		
	</div>
	
</body>
</html>
<script type="text/javascript">
	$(function(){
	$('.range_groups').validate({

		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			range_id:{
				required: true,
			},

			range_name:{
				required: true,
			},

			range_type:{
				required: true,
			},

			range_status:{
				required: true,
			},

			
		},
		messages:{
			range_id:{
				required: 'Please Give Range Id',
			},

			range_name:{
				required: 'Please Give Range Name',
			},
			
			range_type:{
				required: 'Please Give Range Type',
			},

			range_status:{
				required: 'Please Give Range Status',
			},

			
		}
	});
});
</script>