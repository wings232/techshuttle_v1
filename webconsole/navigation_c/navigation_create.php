<?php
	include "../dbconn.php";
	include_once "../func_templates/main_func_code.php";
	$menu_level = isset($_REQUEST['level'])?$_REQUEST['level']:"";
	$menu_sub_ids = isset($_REQUEST['sub_ids'])?$_REQUEST['sub_ids']:""; // For insert
	$menu_setup_updateId = isset($_REQUEST['menuSetupUpdateId'])?$_REQUEST['menuSetupUpdateId']:""; // for update
	$menuName = isset($_REQUEST['menuName'])?$_REQUEST['menuName']:"";
	$menuUrl = isset($_REQUEST['menuUrl'])?$_REQUEST['menuUrl']:"";
	$menu_queryKeys = isset($_REQUEST['queryKeys'])?$_REQUEST['queryKeys']:"";
?>

<div class="level_form">
	<div class="close_but" onclick="close_but()">X</div>
	<div class="level_form_head">
		<div class="head">
			<?php 
			if($menu_queryKeys == "insert_query"){
				if($menu_level == 1){
					echo "Create Level One menu";
				}else if($menu_level == 2){
					echo "Create Level Two menu";
				}else if($menu_level == 3){
					echo "Create Level Three menu";
				}else if($menu_level == 4){
					echo "Create Level Four menu";
				}else if($menu_level == 5){
					echo "Create Level Five menu";
				}
			}

			if($menu_queryKeys == "Update_query"){
				if($menu_level == 1){
					echo "Update Level One menu";
				}else if($menu_level == 2){
					echo "Update Level Two menu";
				}else if($menu_level == 3){
					echo "Update Level Three menu";
				}else if($menu_level == 4){
					echo "Update Level Four menu";
				}else if($menu_level == 5){
					echo "Update Level Five menu";
				}
			}
				
			?>
		</div>

	</div>
<?php
		$selectCategoriesGroup = selectCategoriesGroupMulRecord('tbl_categories_groups',1,'Active');
		$selectCategoriesGroup_json = json_decode($selectCategoriesGroup, true);
	if($menu_queryKeys == "insert_query"){
		
			
				//print_r($socialmedia_list_json);
		$selectCategoriesGroup_json_count = isset($selectCategoriesGroup_json['categories_groupMul_count'])?$selectCategoriesGroup_json['categories_groupMul_count']:"";
		
?>
	<div class="form_setup">
		<form method="post" class="navigation_validate">
			<div class='textarea'>
				<textarea  id='cate' name='cate' placeholder="Menu_name"></textarea>
			</div>
			<div class="menu_url">
				<input type="text" name="media_slug" id='media_slug' class="media_slug" readonly="readonly" />
			</div>
			<div class="menu_url">
				<input type="text" name="menu_url" id='menu_url' placeholder="menu_url" />
			</div>
			<div class="menu_url">
				<select name="categories_list" id="categories_list">
					<option value=''>Please Select the Categories Group</option>
					<?php
						foreach ($selectCategoriesGroup_json['categories_groupMul_details'] as $cate_group_details) {
							$cate_group_id = $cate_group_details['menu_id'];
							$categories_group_name = $cate_group_details['menu_name'];
							$categories_type = $cate_group_details['categories_type'];
					?>
						<option value='<?php echo $cate_group_id; ?>'><?php echo $categories_group_name; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<?php
				if($menu_queryKeys == "insert_query"){
					if($menu_level == 2){
				
			?>
			<div class="menu_url">
				<input type="file" name="media_image_banner" id="media_image_banner" class="media_image_banner">
				<div class="file_out">
					<input type="hidden" id="sfile_image" value="">
				</div>
			</div>
			<?php
					}
				}
			?>
			<div class="menu_url">
				<input type="text" name="menu_priority" id='menu_priority' placeholder="menu_priority" />
			</div>

			<div class="menu_url">
				<select name="categories_status" id="categories_status">
					<option value=''>Please Select the Categories Status</option>					
					<option value='Active'>Active</option>
					<option value='Inactive'>Inactive</option>				
				</select>
			</div>
			<div class="hidden_feild">
				<input type="hidden" name="update_ids" id='update_ids' placeholder="Sub id" value="<?php echo $menu_setup_updateId; ?>" />
				<input type="hidden" name="menu_sub_id" id='menu_sub_id' placeholder="Sub id" value="<?php echo $menu_sub_ids; ?>" />
				<input type="hidden" name="menu_level" id='menu_level' placeholder="Level" value="<?php echo $menu_level; ?>" />
				<input type="hidden" name="menu_query_Keys" id='menu_query_Keys' placeholder="menu_queryKeys" value="<?php echo $menu_queryKeys; ?>" />
			</div>
			<div class="menu_button">
				<input type='button' value="save" name='save' onclick="navigation_post()"/>
			</div>
		</form>
	</div>
<?php } ?>

<?php
	if($menu_queryKeys == "Update_query"){
		$selectnaviItems = selectNaviSingleRecord('tbl_navigation_setup',$menu_setup_updateId);
		$selectnaviItems_json = json_decode($selectnaviItems, true);
			
				//print_r($socialmedia_list_json);
		$selectnaviItems_json_count = isset($selectnaviItems_json['naviSingle_count'])?$selectnaviItems_json['naviSingle_count']:"";
		foreach ($selectnaviItems_json['naviSingle_details'] as $navi_items_details) {
			$menu_names = $navi_items_details['menu_name'];	
			$menu_urls = $navi_items_details['menu_url'];
			$menu_sub = $navi_items_details['sub_id'];
			$menu_priority = $navi_items_details['priority'];
			$banner = $navi_items_details['banner'];				
		}
?>
	<div class="form_setup">
		<form method="post" class="navigation_validate">
			<div class='textarea'>
				<textarea  id='cate' name='cate' placeholder="Menu_name" ><?php echo $menu_names; ?></textarea>
			</div>
			<div class="menu_url">
				<input type="text" name="media_slug" id='media_slug' class="media_slug" readonly="readonly" value="<?php echo $menuUrl; ?>" />
			</div>
			<div class="menu_url">
				<input type="text" name="menu_url" id='menu_url'  placeholder="menu_url"  value="<?php echo $menu_urls; ?>" />
			</div>
			<div class="menu_url">
				<input type="text" name="menu_priority" id='menu_priority' placeholder="menu_priority" value="<?php echo $menu_priority; ?>"/>
			</div>
			<?php
				if($menu_queryKeys == "Update_query"){
					if($menu_level == 2){
				
			?>
				<div class="menu_url">
					<div class="head_input">
						<div class="in_center">
							<img src="../images/menu_image/<?php echo $banner; ?>">
						</div>
					</div>
					<input type="file" name="media_image_bannerdocup" id="media_image_bannerup" class="media_image_bannerdocup">
					<div class="button_up">
						<div class="up_img">
							<img src="images/icons/upload_white.png">
						</div>
						<div class="up_d">
							upload
						</div>
					</div>
					<div class="file_outs">
						<input type="hidden" id="sfile_image" value="<?php echo $banner; ?>">
					</div>
				</div>
			<?php
					}
				}
			?>
			<div class="menu_url">
				<select name="categories_list" id="categories_list">
					
					<?php
						foreach ($selectnaviItems_json['naviSingle_details'] as $navi_items_details) {
							$cate_group_id = $navi_items_details['cate_group_id'];
							$categories_group_name = $navi_items_details['categories_group'];
					?>
						<option value='<?php echo $cate_group_id; ?>'><?php echo $categories_group_name; ?></option>
					<?php
						}

						foreach ($selectCategoriesGroup_json['categories_groupMul_details'] as $cate_group_details) {
							$cate_group_id = $cate_group_details['menu_id'];
							$categories_group_name = $cate_group_details['menu_name'];
							$categories_type = $cate_group_details['categories_type'];
					?>
						<option value='<?php echo $cate_group_id; ?>'><?php echo $categories_group_name; ?></option>
					<?php
						}
					?>
				</select>
			</div>

			<div class="menu_url">
				<select name="categories_status" id="categories_status">
					<?php
						foreach ($selectnaviItems_json['naviSingle_details'] as $navi_items_details) {
							//$cate_group_id = $naviSingle_details['cate_group_id'];
							$cate_status = $navi_items_details['cate_status'];
					?>
						<option value='<?php echo $cate_status; ?>'><?php echo $cate_status; ?> </option>		
					<?php
						}
					?>
								
						<option value='Active'>Active</option>
						<option value='Inactive'>Inactive</option>				
				</select>
			</div>
			<div class="hidden_feild">
				<input type="hidden" name="update_ids" id='update_ids' placeholder="Sub id" value="<?php echo $menu_setup_updateId; ?>" />
				<input type="hidden" name="menu_sub_id" id='menu_sub_id' placeholder="Sub id" value="<?php echo $menu_sub; ?>" />
				<input type="hidden" name="menu_level" id='menu_level' placeholder="Level" value="<?php echo $menu_level; ?>" />
				<input type="hidden" name="menu_query_Keys" id='menu_query_Keys' placeholder="menu_queryKeys" value="<?php echo $menu_queryKeys; ?>" />
			</div>
			<div class="menu_button">
				<input type='button' value="save" name='save' onclick="navigation_post()"/>
			</div>
		</form>
	</div>
<?php } ?>

</div>

<script type="text/javascript">
	$(function(){
	$('.navigation_validate').validate({

		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			cate:{
				required: true,
			},

			
			menu_url:{
				required: true,
			},

			categories_list:{
				required: true,
			},

			menu_priority:{
				required: true,
				number: true,
			},

			categories_status:{
				required: true,
			},

			
		},
		messages:{
			cate:{
				required: 'Category Name'	
			},			

			menu_url:{
				required: 'categories Url '	
			},

			categories_list:{
				required: 'categories List '	
			},

			menu_priority:{
				required: 'Menu priority ' ,
				number: 'Number only allowed'
			},

			categories_status:{
				required: 'categories Status ' ,
			},

			
		}
	});
});
</script>
