<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectCourseListRecordDet= selectCourseListRecordDet('tbl_product_list',$articlesId);
	$selectCourseListRecordDet_json = json_decode($selectCourseListRecordDet, true);
		
			//print_r($socialmedia_list_json);
		$selectCourseListRecordDet_json_count = isset($selectCourseListRecordDet_json['selectCourseListRecordDet_count'])?$selectCourseListRecordDet_json['selectCourseListRecordDet_count']:"";
;
		if($selectCourseListRecordDet_json_count != ""){
		foreach ($selectCourseListRecordDet_json['selectCourseListRecordDet_details'] as $CourseListDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			//$product_names = $CourseDescripDetails["product_pri_slug"];
			$product_name = str_replace('-',' ',strtolower($CourseListDetails["product_pri_slug"]));
			$product_list = $CourseListDetails["product_list"];			
			$status = $CourseListDetails["Status"];
			
			
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
		

		<div class="media_box">
			<div class="head_name">Product Description</div>
			<div class="head_input">
				<textarea id='uproduct_lists' name='uproduct_lists'><?php echo $product_list; ?></textarea>
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
						<div class="approval" onclick="updateCourseListRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
