<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$parent_val = isset($_REQUEST['parent_val'])?$_REQUEST['parent_val']:"";
	$sub_val = isset($_REQUEST['sub_val'])?$_REQUEST['sub_val']:"";
	$cate_group_val = isset($_REQUEST['cate_group_val'])?$_REQUEST['cate_group_val']:"";
	$menu_slug = isset($_REQUEST['menu_slug'])?$_REQUEST['menu_slug']:"";
	$cate_levelVal = isset($_REQUEST['cate_levelVal'])?$_REQUEST['cate_levelVal']:"";
	$head_services = isset($_REQUEST['head_services'])?$_REQUEST['head_services']:"";
	$pro_type = isset($_REQUEST['pro_type'])?$_REQUEST['pro_type']:"";
	$list_levels = isset($_REQUEST['list_levels'])?$_REQUEST['list_levels']:"";
?>

<div class="details_fil">
				<form method="post" enctype="multipart/form-data" class="course_level_check">
					<div class="feild_box">
<?php
	$cate_id ="";
	if($list_levels != 1){

		$prev_level = $list_levels - 1;
?>
							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select Description Type</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='descrip_type' name="descrip_type">
											<option value=''>Select Description Type</option>	
											<?php
												
									$selectListRecordlevel= selectListRecordlevel('tbl_product_list',$prev_level,$parent_val,$pro_type);
									$selectListRecordlevel_json = json_decode($selectListRecordlevel, true);
										
											//print_r($socialmedia_list_json);
									$selectListRecordlevel_jsonn_count = isset($selectListRecordlevel_json['selectListRecordlevel_count'])?$selectListRecordlevel_json['selectListRecordlevel_count']:"";
									if($selectListRecordlevel_jsonn_count != 0){
									foreach ($selectListRecordlevel_json['selectListRecordlevel_details'] as $list_details) {
												//$articlesTitleSn = $location_details["sn"];
												
												$cate_id = $list_details['product_list_id'];
												$product_list = $list_details['product_list'];
												
												
											?>							
											<option value='<?php echo $cate_id; ?>'><?php echo $product_list; ?></option>
											<?php
											}
										}else{
										?>

										<option value=''>No Records Found</option>
										<?php

										}		
										
											?>
																	
										</select>
									</div>
								</div>
							</div><!-- input_box loop Ends-->
<?php
	}
	$menu_sub_ids =$cate_id;
	
?>

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select Product Type</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='list_type' name="list_type">
											<option value=''>Select List Type</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,34);
									$selectCategoriesRecordMultilevel_json = json_decode($selectCategoriesRecordMultilevel, true);
									$selectCategoriesRecordMultilevel_json_count = isset($selectCategoriesRecordMultilevel_json['categories_levelmul_count'])?$selectCategoriesRecordMultilevel_json['categories_levelmul_count']:"";

										if($selectCategoriesRecordMultilevel_json_count != ""){
											foreach ($selectCategoriesRecordMultilevel_json['categories_levelmul_details'] as $cate_group_details) {
													
													$menu_name = $cate_group_details['menu_name'];
												
												
											?>							
											<option value='<?php echo $menu_name; ?>'><?php echo $menu_name; ?></option>
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
									<div class="head">Select Product Type</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='post_type' name="post_type">
											<option value=''>Select Product Type</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',2,1);
									$selectCategoriesRecordMultilevel_json = json_decode($selectCategoriesRecordMultilevel, true);
									$selectCategoriesRecordMultilevel_json_count = isset($selectCategoriesRecordMultilevel_json['categories_levelmul_count'])?$selectCategoriesRecordMultilevel_json['categories_levelmul_count']:"";

										if($selectCategoriesRecordMultilevel_json_count != ""){
											foreach ($selectCategoriesRecordMultilevel_json['categories_levelmul_details'] as $cate_group_details) {
													
													$menu_name = $cate_group_details['menu_name'];
												
												
											?>							
											<option value='<?php echo $menu_name; ?>'><?php echo $menu_name; ?></option>
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
									<div class="head">Course List</div>
								</div>
								<div class="feild_action">
									<textarea name='product_list' id='product_list' placeholder=""></textarea>
								</div>
							</div><!-- input_box loop Ends-->


							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select Status</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='list_status' name="list_status">
											<option value=''>Select Status</option>	
																	
											<option value='Active'>Active</option>
											<option value='Inactive'>Inactive</option>
											
																	
										</select>
									</div>
								</div>
							</div><!-- input_box loop Ends-->


						<div class="input_box"><!-- input_box loop Start-->
							<div class="feild_action">
								<input type="button" name='create_button' value="Create" onclick="courselist_create()" />
								<!-- <input type="hidden" name="menu_sub_ids" id='menu_sub_ids' placeholder="Sub id" value="<?php //echo $menu_sub_ids; ?>" /> -->
								<input type="hidden" name="menu_level" id='menu_level' placeholder="Level" value="<?php echo $list_levels; ?>" />
								<input type="hidden" name="menu_query_Keys" id='menu_query_Keys' placeholder="menu_queryKeys" value="insert_query" />
								<input type="hidden" name="menu_slug" id='menu_slug' placeholder="menu_slug" value="<?php echo $menu_slug; ?>" />
								<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
								<div class="spinner_one"><img src="images/gif/loading_01.gif"></div>
							</div>
						</div><!-- input_box loop Ends-->
						
					</div>
				</form>
			</div>