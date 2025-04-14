<?php
	include "dbconn.php";
	include_once "func_templates/main_func_code.php";
	include "check_ses_list.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript">
		
	</script>
</head>
<body>
	<div class="right_container">
		<div class='levels_create'>
		</div>
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class="categories_gro_con">
			<form method='post' enctype="multipart/form-data" class="cate_groups">
				<div class="feilds_box">
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Group Name</div>
						</div>
						<div class="feild_action">
							<input type="text" name="group_name" id='group_name'>
						</div>
					</div><!-- input_box loop Ends-->
					
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Group Type</div>
						</div>
						<div class="feild_action">
							<input type="text" name="group_type" id='group_type'>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_action">
							<input type="button" name='create_button' value="Create" onclick="groupcreate()" />
							<div class="spinner_one"><img src="images/loading_01.gif"></div>
						</div>
					</div><!-- input_box loop Ends-->
				</div>
			</form>
		</div>

		
		<div class="categories_show">
			<?php
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

		</div>
		
	</div>
	
</body>
</html>
<script type="text/javascript">
	$(function(){
	$('.cate_groups').validate({

		onfocusin: function (element) {
		    $(element).valid();
		  },

		  onfocusout: function (element) {
		    $(element).valid();
		  },
		rules:{
			group_name:{
				required: true,
			},

			group_type:{
				required: true,
			},

			
		},
		messages:{
			group_name:{
				required: 'categories Group'	
			},

			group_type:{
				required: 'categories Type '	
			},

			
		}
	});
});
</script>