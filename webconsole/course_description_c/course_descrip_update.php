<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectCourseDescripRecordDet= selectCourseDescripRecordDet('tbl_product_description',$articlesId);
	$selectCourseDescripRecordDet_json = json_decode($selectCourseDescripRecordDet, true);
		
			//print_r($socialmedia_list_json);
		$selectCourseDescripRecordDet_json_count = isset($selectCourseDescripRecordDet_json['selectCourseDescripRecordDet_count'])?$selectCourseDescripRecordDet_json['selectCourseDescripRecordDet_count']:"";
;
		if($selectCourseDescripRecordDet_json_count != ""){
		foreach ($selectCourseDescripRecordDet_json['selectCourseDescripRecordDet_details'] as $CourseDescripDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			//$product_names = $CourseDescripDetails["product_pri_slug"];
			$product_name = str_replace('-',' ',strtolower($CourseDescripDetails["product_pri_slug"]));
			$product_type = $CourseDescripDetails["product_type"];
			$cate_group = $CourseDescripDetails["categories_group"];
			$product_description = $CourseDescripDetails["product_description"];			
			$status = $CourseDescripDetails["status"];
			
			
		}
	}

?>

<div class="social_close">
	X
</div>

<div class="media_type_update">
	<div class="media_type_head">
		<div class="head"><?php echo $product_name; ?></div>
	</div>
	<div class="media_cont media_doc">
		
		
		
		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Description Type</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="udescription_type" name="udescription_type">
						<option style="color:orange" value="<?php echo $product_type; ?>"><?php  echo $product_type; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Description Type</option>
												
						<?php
												
							$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,29);
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
		</div>
		

		

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Post Type</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="upost_type" name="upost_type">
						<option style="color:orange" value="<?php echo $cate_group; ?>"><?php  echo $cate_group; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Post Type</option>
												
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
		</div>

		<div class="media_box">
			<div class="head_name">Product Description</div>
			<div class="head_input">
				<textarea id='uproduct_descrips' name='uproduct_descrips'><?php echo $product_description; ?></textarea>
			</div>
		</div>

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Status</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="ustatus_sel" name="ustatus_sel">
						<option style="color:orange" value="<?php echo $status; ?>"><?php  echo $status; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Status</option>
												
						<option value='Active'>Active</option>
						<option value='Inactive'>Inactive</option>
								
					</select>
				</div>
			</div>
		</div>								
		
		<div class="media_button">
			<div class="button">
				<ul>
					<li>
						<div class="approval" onclick="updateCourseDescriptRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
