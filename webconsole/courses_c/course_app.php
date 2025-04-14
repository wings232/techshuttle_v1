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
			
			/*$articlescontent = htmlentities($NavigationDetails["Content"]);
			$media_content_hentities_real = $conn -> real_escape_string($articlescontent);
			$mediahtml_entity_decode = html_entity_decode($media_content_hentities_real);*/
			$menu_name = $NavigationDetails["menu_name"];
			$overall_priority = $NavigationDetails["overall_priority"];
			$dept_priority = $NavigationDetails["dept_priority"];
			$course_thumb_image = $NavigationDetails["course_thumb_image"];
			$course_main_image = $NavigationDetails["course_main_image"];
			$email = $NavigationDetails["email"];
			$Phone = $NavigationDetails["Phone"];
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
		<div class="head">Dr.<?php echo $menu_name; ?></div>
	</div>
	<div class="media_cont media_doc">
		<div class="media_box">
			<div class="head_input">
				<img src="../images/courses/thumb/<?php echo $course_thumb_image; ?>">
			</div>
		</div>
		<div class="media_box">
			<div class="head_input">
				<img src="../images/courses/main/<?php echo $course_main_image; ?>">
			</div>
		</div>
		
<?php
/*
		<div class="media_box">
			<div class="head_name">OP Booking</div>
			<div class="head_input">
				<div class="contentss">
					<?php 
							if($consultant_v == 1){
								$ans = 'Yes';
							};
							if($consultant_v == 0){$ans = 'No';} ; 
						?>
					<?php echo $ans; ?></div>
			</div>
		</div>
*/
?>

		
		<div class="media_box">
			<div class="head_name">Overall Priority</div>
			<div class="head_input">
				<div class="contentss"><?php echo $overall_priority; ?></div>
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Department Priority</div>
			<div class="head_input">
				<div class="contentss"><?php echo $dept_priority; ?></div>
			</div>
		</div>
		
		<div class="media_box">
			<div class="head_name">Email</div>
			<div class="head_input">
				<div class="contentss"><?php echo $email; ?></div>
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Mobile Number</div>
			<div class="head_input">
				
				<div class="contentss"><?php echo $Phone; ?></div>
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Meta Title</div>
			<div class="head_input">
				
				<div class="contentss"><?php echo $meta_title; ?></div>
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Meta Description</div>
			<div class="head_input">			
				<div class="contentss"><?php echo $meta_description; ?></div>
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Meta Keywords</div>
			<div class="head_input">			
				<div class="contentss"><?php echo $meta_keywords; ?></div>
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Remarks</div>
			<div class="head_input">			
				<textarea placeholder="Please give the remarks" id='remarks_blog_m'></textarea>
			</div>
		</div>
		<div class="media_button">
			<div class="button">
				<ul>
					<li>
						<div class="approval" onclick="coursestatusupdate('<?php echo $articlesId; ?>','Approve')">Approval</div>
					</li>										
					<li>
						<div class="reject" onclick="coursestatusupdate('<?php echo $articlesId; ?>','Reject')">Reject</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>