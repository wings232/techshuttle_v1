<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectnavigationSingleRecord= selectSingleRecordFromNavDet('tbl_navigation_details',$articlesId);
	$selectnavigationSingleRecord_json = json_decode($selectnavigationSingleRecord, true);
		
			//print_r($socialmedia_list_json);
		$selectnavigationSingleRecord_json_count = isset($selectnavigationSingleRecord_json['navSingleRecordDet_count'])?$selectnavigationSingleRecord_json['navSingleRecordDet_count']:"";
;
		if($selectnavigationSingleRecord_json_count != ""){
		foreach ($selectnavigationSingleRecord_json['navSingleRecordDet_details'] as $NavigationDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			$menu_name = $NavigationDetails["menu_name"];
			
			
			$email = $NavigationDetails["email"];
			$Phone = $NavigationDetails["Phone"];
			$overall_priority = $NavigationDetails["overall_priority"];
			$dept_priority = $NavigationDetails["dept_priority"];
			$course_thumb_image = $NavigationDetails["course_thumb_image"];
			$course_main_image = $NavigationDetails["course_main_image"];
			/*$sposted_Datess = new DateTime(isset($NavigationDetails["posted_on"])?$NavigationDetails["posted_on"]:"");
	 		$ssposted_Dates= $sposted_Datess->format('d-M-Y');*/
			$meta_title = $NavigationDetails["meta_title"];
			$meta_description = $NavigationDetails["meta_description"];
			$meta_keywords = $NavigationDetails["meta_keywords"];
			$status = $NavigationDetails["status"];
		}
	}

?>

<div class="social_close">
	X
</div>

<div class="media_type_update">
	<div class="media_type_head">
		<div class="head"><?php echo $menu_name; ?></div>
	</div>
	<div class="media_cont media_doc">
		<div class="media_box">
			<div class="head_input">
				<div class="image_center">
					<img src="../images/course/thumb/<?php echo $course_thumb_image; ?>">
				</div>
				
			</div>
			<div class="feild_action">
				<input type="file" name="media_image_thumbup" id="media_image_thumbup" class="media_image_thumbup">
				<div class="button_up">
					<div class="up_img">
						<img src="images/icons/upload_white.png">
					</div>
					<div class="up_d">
						upload
					</div>
				</div>
				<div class="file_outs">
					<input type="hidden" id="sfile_images" value="<?php echo $course_thumb_image; ?>">
				</div>
			</div>
		</div>
		<div class="media_box">
			<div class="head_input">
				<div class="image_center">
					<img src="../images/course/main/<?php echo $course_main_image; ?>">
				</div>
				
			</div>
			<div class="feild_action">
				<input type="file" name="media_image_banner_up" id="media_image_banner_up" class="media_image_banner_up">
				<div class="button_up">
					<div class="up_img">
						<img src="images/icons/upload_white.png">
					</div>
					<div class="up_d">
						upload
					</div>
				</div>
				<div class="file_outs_banner">
					<input type="hidden" id="sfile_images_banner" value="<?php echo $course_main_image; ?>">
				</div>
			</div>
		</div>
		
		<div class="media_box">
			<div class="head_name">Overall Priority</div>
			<div class="head_input">
				<input type="text" value="<?php echo $overall_priority; ?>" name='overall_prioritys' id='overall_prioritys' />
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Department Priority</div>
			<div class="head_input">
				<input type="text" value="<?php echo $dept_priority; ?>" name='dept_prioritys' id='dept_prioritys' />
			</div>
		</div>
		
				
		<div class="media_box">
			<div class="head_name">Department Email Id</div>
			<div class="head_input">
				<input type="text" value="<?php echo $email; ?>" name='email' id='email' />
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Department Phone</div>
			<div class="head_input">
				<input type="text" value="<?php echo $Phone; ?>" name='Phone' id='Phone' />
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Meta Title</div>
			<div class="head_input">				
				<textarea id='meta_titles' name='meta_titles'><?php echo $meta_title; ?></textarea>
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Meta Description</div>
			<div class="head_input">
				<textarea id='meta_descriptions' name='meta_descriptions'><?php echo $meta_description; ?></textarea>
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Meta Keywords</div>
			<div class="head_input">
				<textarea id='meta_keywords' name='meta_keywords'><?php echo $meta_keywords; ?></textarea>
			</div>
		</div>
		<div class="media_button">
			<div class="button">
				<ul>
					<li>
						<div class="approval" onclick="updateCourseRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
