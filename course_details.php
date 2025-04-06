<?php
	include "check_ses_list.php";
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "constantconfig.php";
	$host  = $_SERVER['HTTP_HOST'];
	$key_one = isset($_REQUEST['key_one'])?$_REQUEST['key_one']:"";
	$key_two = isset($_REQUEST['key_two'])?$_REQUEST['key_two']:"";
	$forCourseSingleDetails= forCourseSingleDetails("tbl_navigation_details",$key_two,4,'Active');
	$forCourseSingleDetails_json = json_decode($forCourseSingleDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseSingleDetails_json_count = isset($forCourseSingleDetails_json['forCourseSingleDetails_count'])?$forCourseSingleDetails_json['forCourseSingleDetails_count']:"";
	if($forCourseSingleDetails_json_count == 0){  
		header("Location: http://$host/studies/techshuttle/tech-notfound.php", false);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href='<?php echo $baseUrl; ?>' > 
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/course_details/course.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class='container'> <!--container Starts -->
        <div class='header_con'><!--header_con Starts -->
            <?php include "header.php"; ?>
        </div><!--header_con Ends -->
<?php

	if($forCourseSingleDetails_json_count > 0){  
		foreach ($forCourseSingleDetails_json['forCourseSingleDetails_details'] as $courseSingleRecord) {
			$menu_ids_f  = $courseSingleRecord["parent_id"];
			$menu_names_f = $courseSingleRecord["menu_name"];
			$main_image = $courseSingleRecord["course_main_image"];
			$sub_ids = $courseSingleRecord["sub_id"];
			$categories_groups = $courseSingleRecord["categories_group"];
		}
	}


?>
<?php
	$selectUserNav= selectUserNav("tbl_navigation_setup",$sub_ids,$categories_groups,'Active');
	$selectUserNav_json = json_decode($selectUserNav, true);
	//print_r($accopany_filter_List_json);
	$selectUserNav_json_count = isset($selectUserNav_json['selectUserNav_count'])?$selectUserNav_json['selectUserNav_count']:"";
	if($selectUserNav_json_count > 0){  
	  foreach ($selectUserNav_json['selectUserNav_details'] as $userNav) {
	      $menu_slug_three  = $userNav["menu_slug"];
	      $userNavSubId_three = $userNav["sub_id"];

	      $selectUserNav_three= selectUserNav("tbl_navigation_setup",$userNavSubId_three,$categories_groups,'Active');
			$selectUserNav_three_json = json_decode($selectUserNav_three, true);
			//print_r($accopany_filter_List_json);
			$selectUserNav_three_json_count = isset($selectUserNav_three_json['selectUserNav_count'])?$selectUserNav_three_json['selectUserNav_count']:"";
			if($selectUserNav_json_count > 0){  
			  foreach ($selectUserNav_three_json['selectUserNav_details'] as $userNav_three) {
			      $menu_slugs_two  = $userNav_three["menu_slug"];
			      $userNavSubIds_two = $userNav_three["sub_id"];

			      	$selectUserNav_two= selectUserNav("tbl_navigation_setup",$userNavSubIds_two,$categories_groups,'Active');
					$selectUserNav_two_json = json_decode($selectUserNav_two, true);
					//print_r($accopany_filter_List_json);
					$selectUserNav_two_json_count = isset($selectUserNav_two_json['selectUserNav_count'])?$selectUserNav_two_json['selectUserNav_count']:"";
					if($selectUserNav_two_json_count > 0){  
					  foreach ($selectUserNav_two_json['selectUserNav_details'] as $userNav_two) {
					      $menu_slugs_one  = $userNav_two["menu_slug"];
					      $userNavSubIds_one = $userNav_two["sub_id"];
					  	}

					  }

			  }
			}
	}
}


?>
        <div class="course_sec_con"><!--course_sec_con Starts -->
            <div class="course_sec_center"><!--course_sec_center Starts -->
                <div class="course_sec"><!--course_sec Starts -->
                    <div class="user_nav"><!--user_nav Starts -->
						<ul>
							<li><a href="">Home</a></li>
							<li><a href=""><?php echo $menu_slugs_one; ?></a></li>
							<li><a href=""><?php echo $menu_slugs_two; ?></a></li>
							<li><a href=""><?php echo $menu_slug_three; ?></a></li>
							<li><a href=""><?php echo $menu_names_f; ?></a></li>
						</ul>
					</div><!--user_nav Ends -->

                    <div class="product_details_con"><!--product_details_con Starts -->
                        <div class="product_details"><!--product_details Starts -->

                            <div class="product_leftbar"><!--product_leftbar Starts -->
                                <div class="product_det"><!--product_det Starts -->
                                    <div class="course_name"><!--course_name Starts -->
										<div class="name"><!--name Starts -->
											<?php echo $menu_names_f; ?>								
                                        </div><!--name Ends -->
									</div><!--course_name Ends -->

                                    <div class="type_list_one"><!--type_list Starts -->
										<ul>
											<li><!--Loop Starts-->
												<div class="list_type">
													<div class="image">
														<i class="fa fa-user-circle-o"></i>
													</div>
													<div class="image_txt">
														2 students enrolled
													</div>
												</div>
											</li><!--Loop Ends-->
											<li><!--Loop Starts-->
												<div class="list_type">
													<div class="image">
														<i class="fas fa-pen-alt"></i>
													</div>
													<div class="image_txt">
														Techshuttle
													</div>
												</div>
											</li><!--Loop Ends-->
											<li><!--Loop Starts-->
												<div class="list_type">
													<div class="image">
														<i class="fas fa-sliders-h"></i>
													</div>
													<div class="image_txt">
														All Levels
													</div>
												</div>
											</li><!--Loop Ends-->
											<li><!--Loop Starts-->
												<div class="list_type">
													<div class="image">
														<i class="fa fa-ticket"></i>
													</div>
													<div class="image_txt">
														Course booked so far <span>11618+</span>
													</div>
												</div>
											</li><!--Loop Ends-->
										</ul>
									</div><!--type_list Ends -->

                                    <div class="product_images"><!--product_images Starts -->
										<img src="images/course/main/sap_abap.webp">
									</div>
<?php /* ?>
									<div class="course_batch_list"><!--course_batch_list Starts -->
										<div class="batch_list"><!--batch_list Starts -->
											<div class="batch_header"><!--batch_header Starts -->
												<div class="column">
													Batch No
												</div>

												<div class="column">
													Batch Description
												</div>
												<div class="column">
													Start Date
												</div>
												<div class="column">
													Action
												</div>
											</div><!--batch_header Ends -->
											<div class="batch_row"><!--batch_row Starts -->
												<div class="row_n"><!--row_n Starts -->
													<ul>
														<li>
															<input type="radio" class="batch_c" value="1" name="user" id="user">
															<label><span></span></label>
															<div class="bullet">
																<div class="line zero"></div>
																<div class="line one"></div>
																<div class="line two"></div>
																<div class="line three"></div>
																<div class="line four"></div>
																<div class="line five"></div>
																<div class="line six"></div>
																<div class="line seven"></div>
															</div>
														</li>
														<li>
															<div class="name">new batch</div>
														</li>
														<li>
															<div class="name">2023-06-07</div>
														</li>
														<li>
															<div class="new_button">
																<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
																	<div class="sec-btn" ><span>View Details</span></div>
																</div>
															</div>
														</li>
														<div class="batch_det">
															<div class="det_head">
																<ul>
																	<li>batch Highlights</li>
																</ul>
															</div>

															<div class="det_list">
																<ul>
																	<li>
																		<div class="head">Code</div>
																		<div class="head_l">
																			TSNEW1685172421																		</div>
																	</li>
																	<li>
																		<div class="head">Type</div>
																		<div class="head_l">
																			Weekend																		</div>
																	</li>
																	<li>
																		<div class="head">Seat Count</div>
																		<div class="head_l">
																			12																		</div>
																	</li>
																	<li>
																		<div class="head">Session Code</div>
																		<div class="head_l">
																			Evening																		</div>
																	</li>
																	<li>
																		<div class="head">Course Level</div>
																		<div class="head_l">
																			Beginner																		</div>
																	</li>
																	<li>
																		<div class="head">Mode of Training</div>
																		<div class="head_l">
																			Offline																		</div>
																	</li>
																	
																</ul>
															</div>
														</div>

													</ul>
												</div><!--row_n Ends -->
												<div class="row_n"><!--row_n Starts -->
													<ul>
														<li>
															<input type="radio" class="batch_c" value="8" name="user" id="user">
															<label><span></span></label>
															<div class="bullet">
																<div class="line zero"></div>
																<div class="line one"></div>
																<div class="line two"></div>
																<div class="line three"></div>
																<div class="line four"></div>
																<div class="line five"></div>
																<div class="line six"></div>
																<div class="line seven"></div>
															</div>
														</li>
														<li>
															<div class="name">New batch 2</div>
														</li>
														<li>
															<div class="name">2023-06-01</div>
														</li>
														<li>
															<div class="new_button">
																<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
																	<div class="sec-btn" ><span>View Details</span></div>
																</div>
															</div>
														</li>
														<div class="batch_det">
															<div class="det_head">
																<ul>
																	<li>batch Highlights</li>
																</ul>
															</div>

															<div class="det_list">
																<ul>
																	<li>
																		<div class="head">Code</div>
																		<div class="head_l">
																			TSNEW1685172421																		</div>
																	</li>
																	<li>
																		<div class="head">Type</div>
																		<div class="head_l">
																			Weekend																		</div>
																	</li>
																	<li>
																		<div class="head">Seat Count</div>
																		<div class="head_l">
																			20																		</div>
																	</li>
																	<li>
																		<div class="head">Session Code</div>
																		<div class="head_l">
																			Evening																		</div>
																	</li>
																	<li>
																		<div class="head">Course Level</div>
																		<div class="head_l">
																			Beginner																		</div>
																	</li>
																	<li>
																		<div class="head">Mode of Training</div>
																		<div class="head_l">
																			Offline																		</div>
																	</li>
																	
																</ul>
															</div>
														</div>

													</ul>
												</div><!--row_n Ends -->
										
												
											</div><!--batch_row Ends -->
										</div><!--batch_list Ends -->
									</div>
<?php  */ ?>

									<div class="course_overview"><!--course_overview Starts -->
										<div class="overview"><!--overview Starts -->
											<div class="head"><!--head Starts -->
												Course Overview
											</div><!--head Ends -->
										</div><!--overview Ends -->

										<div class="overview_para"><!--overview_para Starts -->
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$menu_ids_f,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
											<p>
												<?php echo $product_description; ?>
											</p>
<?php
	}
}
?>
										</div><!--overview_para Ends -->
									</div><!--course_overview Ends -->


									<div class="mat_inc_enq"><!--mat_inc_enq Starts -->
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$menu_ids_f,'Material Includes','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
?>
										<div class="material_inc"><!--material_inc Starts -->
											<div class="material_head"><!--material_head Starts -->
												<div class="head"><!--head Starts -->
													Material Includes
												</div><!--head Ends -->
											</div><!--material_head Ends -->
											<div class="material_list"><!--material_list Starts -->
												<ul>
<?php
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																<?php echo $product_description; ?>														
															</div>
														</div>
													</li><!-- Loop Ends -->
<?php
	}
}
/*
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																Access to the LMS															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																All Videos Downloadable															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																Access to the LMS															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																All Videos Downloadable															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																Access to the LMS															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																All Videos Downloadable															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																All Videos Downloadable															
															</div>
														</div>
													</li><!-- Loop Ends -->
													<li><!-- Loop Starts -->
														<div class="image">
															<img src="images/icons/tick.webp">
														</div>
														<div class="img_txt">
															<div class="txt">
																All Videos Downloadable															
															</div>
														</div>
													</li><!-- Loop Ends -->
	*/	
?>
												</ul>
											</div><!--material_list Ends -->
										</div><!--material_inc Ends -->
										<div class="enq_learn"><!--enq_learn Starts -->
											<div class="enq_button"><!--enq_button Starts -->
												<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
													<a href="" class="sec-btn" title="Get Started"><span>For Enquire</span></a>
												</div>
											</div><!--enq_button Ends -->
											<div class="learn_obj"><!--learn_obj Starts -->
												<div class="learn_head"><!--learn_head Starts -->
													<div class="head"><!--head Starts -->
														Learning Objectives
													</div><!--head Ends -->
												</div><!--learn_head Ends -->
												<div class="learn_list"><!--learn_list Starts -->
													<ul>
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$menu_ids_f,'Learning Objectives','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	<?php echo $product_description; ?>																
																</div>
															</div>
														</li><!-- Loop Ends -->
														<?php

}
}
/*
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Expanded responsibilities as part of an existing role.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
														<li><!-- Loop Starts -->
															<div class="image">
																<img src="images/icons/tick.webp">
															</div>
															<div class="img_txt">
																<div class="txt">
																	Find a new position involving data modeling.																</div>
															</div>
														</li><!-- Loop Ends -->
*/
?>
													</ul>
												</div><!--learn_list Ends -->
											</div><!--learn_obj Ends -->
										</div><!--enq_learn Ends -->
									</div><!--mat_inc_enq Ends -->

									<div class="course_bgs">
										<div class="image">
											<img src="images/right_01.png" alt="img">
										</div>
										<div class="cta__content-three">
											<div class="content__left">
												<h2 class="title">Finding Your Right Courses</h2>
												<p>intuitive shared inbox makes it easy for team member</p>
											</div>
											<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
												<a href="contact-us.html" class="sec-btn" title="Get Started"><span>Get Started</span></a>
											</div>
										</div>
										<div class="cta__shape-two">
											<img src="images/svg/shape_k.svg" alt="shape">
										</div>
									</div>

									<div class="course_overview"><!--course_overview Starts -->
										<div class="overview"><!--overview Starts -->
											<div class="head"><!--head Starts -->
											Description
											</div><!--head Ends -->
										</div><!--overview Ends -->

										<div class="overview_para"><!--overview_para Starts -->
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$menu_ids_f,'Description','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
													<p>
														<?php echo $product_description; ?>
													</p>
<?php
	}
}
?>
										</div><!--overview_para Ends -->
									</div><!--course_overview Ends -->

									<div class="course_content"><!--course_content Starts -->
										<div class="course_con">
											<div class="content"><!--content Starts -->
												<div class="head"><!--head Starts -->
													Course Content
												</div><!--head Ends -->
											</div><!--content Ends -->

											<div class="content_acco"><!--content_acco Starts -->
												<nav class="acnav" role="navigation">
												<!-- start level 1 -->
												<ul class="acnav__list acnav__list--level1">
<?php
      $selectMultipleListRecord= selectMultipleListRecord("tbl_product_list",$menu_ids_f,1,"Active","list");
      $selectMultipleListRecord_json = json_decode($selectMultipleListRecord, true);
      //print_r($accopany_filter_List_json);
      $selectMultipleListRecord_json_count = isset($selectMultipleListRecord_json['selectMultipleListRecord_count'])?$selectMultipleListRecord_json['selectMultipleListRecord_count']:"";
     


if($selectMultipleListRecord_json_count > 0){
foreach ($selectMultipleListRecord_json['selectMultipleListRecord_details'] as $menuMultipleRecord_lists) {
  $product_list_id  = $menuMultipleRecord_lists["product_list_id"];
  $product_primary_id = $menuMultipleRecord_lists["product_primary_id"];
  $product_list = $menuMultipleRecord_lists["product_list"];
  $product_type = $menuMultipleRecord_lists["product_type"];
  $sub_id = $menuMultipleRecord_lists["sub_id"];
  $categories_group = $menuMultipleRecord_lists["categories_group"];
?>
												
                                                
													<!-- start group 1 -->
													<li class="has-children" new="">
														<div class="acnav__label level_one">
															<?php echo $product_list; ?>  
														</div>
														
<?php
	$selectMultipleListLevelRecord= selectMultipleListLevelRecord("tbl_product_list",$menu_ids_f,2,"Active","list",$product_list_id);
	$selectMultipleListLevelRecord_json = json_decode($selectMultipleListLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleListLevelRecord_json_count = isset($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count'])?$selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count']:""; 


	if($selectMultipleListLevelRecord_json_count > 0){
?>
														<!-- start level 2 -->
														<ul class="acnav__list acnav__list--level2">
<?php
	
	foreach ($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_details'] as $menuMultipleRecord_lists) {
	  $product_list_id_o  = $menuMultipleRecord_lists["product_list_id"];
	  $product_primary_id_o = $menuMultipleRecord_lists["product_primary_id"];
	  $product_list_o = $menuMultipleRecord_lists["product_list"];
	  $product_type_o = $menuMultipleRecord_lists["product_type"];
	  $sub_id_o = $menuMultipleRecord_lists["sub_id"];
	  $categories_group_o = $menuMultipleRecord_lists["categories_group"];
?>
															<li class="has-children">
																<div class="list_con acnav__label level_two">
																	<div class="image">
																		<i class="fa fa-file-text"></i>
																	</div>
																	<div class="img_txt">
																		<div class="txt">
																		<?php echo $product_list_o; ?>																	</div>
																	</div>
																</div>
<?php
	$selectMultipleListLevelRecord= selectMultipleListLevelRecord("tbl_product_list",$menu_ids_f,3,"Active","list",$product_list_id_o);
	$selectMultipleListLevelRecord_json = json_decode($selectMultipleListLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleListLevelRecord_json_count = isset($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count'])?$selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count']:""; 


	if($selectMultipleListLevelRecord_json_count > 0){
?>
																<ul class="acnav__list acnav__list--level3">
<?php
	
	foreach ($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_details'] as $menuMultipleRecord_lists) {
	  $product_list_id_t  = $menuMultipleRecord_lists["product_list_id"];
	  $product_primary_id_t = $menuMultipleRecord_lists["product_primary_id"];
	  $product_list_t = $menuMultipleRecord_lists["product_list"];
	  $product_type_t = $menuMultipleRecord_lists["product_type"];
	  $sub_id_t = $menuMultipleRecord_lists["sub_id"];
	  $categories_group_t = $menuMultipleRecord_lists["categories_group"];
?>
																	<li>
																	<?php echo $product_list_t; ?>
																	</li>
<?php
	}

?>																	
																	
																</ul>
<?php
	}

?>
															</li>
<?php
	}

?>	                                                 									
															

													
														</ul>
<?php
	}
?>														<!-- end level 2 -->
													</li>
													<!-- end group 1 -->
                                               												
<?php
	

	}
}
?>															
																						

												</ul>
												<!-- end level 1 -->
												</nav>
											</div><!--content_acco Ends -->



										</div>
										<div class="course_right">
											<div class="border_bar">
												<div class="image">
													<img src="images/course/sidebar/sidebar.webp"/>
												</div>
												<div class="button">
													<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
<?php
//$flag = 0;
    if($user_session == ""){
?>
														<div class="sec-btn but enroll_login"><span>Enroll Now</span></div>
														<div class="float_type">
															Click here to <a href="student_portal.php">login</a>
														</div>
<?php
    }  
    if($user_session != ""){

?>
														<div class="sec-btn but enroll_admission"><span>Enroll Now</span></div>
														<div class="float_batch">
												
														</div>
														<?php
    }  


?>
													</div>
												</div>
												<div class="other_details">
													<div class="details_head">
														Course includes
													</div>
													<div class="details_oth">
														<ul>
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-ticket"></i>
																		</div>
																		<div class="text">
																			Seats
																		</div>															 
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		15
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-clock-o"></i>
																		</div>
																		<div class="text">
																			Schedule
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		2.00 pm to 4.00 pm
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-book" aria-hidden="true"></i>
																		</div>
																		<div class="text">
																			Lessons
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		87 Lessons
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-clock-o"></i>
																		</div>
																		<div class="text">
																			Duration
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		40 h
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-list-alt" aria-hidden="true"></i>
																		</div>
																		<div class="text">
																			Categories
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		It &amp; Software
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->
															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fa fa-language" aria-hidden="true"></i>
																		</div>
																		<div class="text">
																			Launguage
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		English, Tamil
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->

															<li><!--Loop Starts -->
																<div class="detail_list"><!--detail_list Starts -->
																	<div class="column_one"><!--column_one Starts -->
																		<div class="images">
																			<i class="fas fa-sliders-h"></i>
																		</div>
																		<div class="text">
																			Skills
																		</div>
																	</div><!--column_one Ends -->
																	<div class="column_two"><!--column_two Starts -->
																		All Levels
																	</div><!--column_two Ends -->
																</div><!--detail_list Ends -->
															</li><!--Loop Ends -->

														</ul>
													</div>

													<div class="details_head">
														Share On
													</div>

													<div class="social_icon">
														<div class="tp-footer-bottom-social">
															<a class="social-fb" href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
															<a class="social-twit" href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
															<a class="social-twit" href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
															<a class="social-lnkd" href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
															<a class="social-yout" href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i></a>
														</div>
													</div>

												</div>
												
											</div>

											<div class="border_bar">
												<div class="other_details">
													<div class="details_head">
														Popular Tags
													</div>
													<div class="tags">
														<ul>
															<li>
																<a href="">blog</a>
															</li>
															<li>
																<a href="">business</a>
															</li>
															<li>
																<a href="">theme</a>
															</li>
															<li>
																<a href="">SAP</a>
															</li>
															<li>
																<a href="">data science</a>
															</li>
															<li>
																<a href="">web development</a>
															</li>
															<li>
																<a href="">tips</a>
															</li>
															<li>
																<a href="">machinelearning</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div><!--course_content Ends -->

									<div class="course_overview"><!--course_overview Starts -->
										<div class="overview"><!--overview Starts -->
											<div class="head"><!--head Starts -->
												Road Map
											</div><!--head Ends -->
										</div><!--overview Ends -->

										<div class="overview_para"><!--overview_para Starts -->
											<p>
												Road Map Details Will Update soon									
											</p>				
										</div><!--overview_para Ends -->
									</div><!--course_overview Ends -->

									<div class="course_overview"><!--course_overview Starts -->
										<div class="overview"><!--overview Starts -->
											<div class="head"><!--head Starts -->
												Certification
											</div><!--head Ends -->
										</div><!--overview Ends -->

										<div class="overview_para"><!--overview_para Starts -->
											<p>
												Certification Details Will Update soon							
											</p>				
										</div><!--overview_para Ends -->
									</div><!--course_overview Ends -->

									<div class="course_content"><!--course_content Starts -->
										<div class="content"><!--content Starts -->
											<div class="head"><!--head Starts -->
												FAQ
											</div><!--head Ends -->
										</div><!--content Ends -->

										<div class="content_acco"><!--content_acco Starts -->
												<nav class="acnav" role="navigation">
												<!-- start level 1 -->
												<ul class="acnav__list acnav__list--level1">
<?php
      $selectMultipleListRecord= selectMultipleListRecord("tbl_product_faq",$menu_ids_f,1,"Active","faq");
      $selectMultipleListRecord_json = json_decode($selectMultipleListRecord, true);
      //print_r($accopany_filter_List_json);
      $selectMultipleListRecord_json_count = isset($selectMultipleListRecord_json['selectMultipleListRecord_count'])?$selectMultipleListRecord_json['selectMultipleListRecord_count']:"";
     


if($selectMultipleListRecord_json_count > 0){
foreach ($selectMultipleListRecord_json['selectMultipleListRecord_details'] as $menuMultipleRecord_lists) {
  $product_list_id  = $menuMultipleRecord_lists["product_list_id"];
  $product_primary_id = $menuMultipleRecord_lists["product_primary_id"];
  $product_list = $menuMultipleRecord_lists["product_faq"];
  $product_type = $menuMultipleRecord_lists["product_type"];
  $sub_id = $menuMultipleRecord_lists["sub_id"];
  $categories_group = $menuMultipleRecord_lists["categories_group"];
?>
												
                                                
													<!-- start group 1 -->
													<li class="has-children" new="">
														<div class="acnav__label level_one">
															<?php echo $product_list; ?>  
														</div>
														
<?php
      $selectMultipleListLevelRecord= selectMultipleListLevelRecord("tbl_product_faq",$menu_ids_f,2,"Active","faq",$product_list_id);
      $selectMultipleListLevelRecord_json = json_decode($selectMultipleListLevelRecord, true);
      //print_r($accopany_filter_List_json);
      $selectMultipleListLevelRecord_json_count = isset($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count'])?$selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count']:""; 


if($selectMultipleListLevelRecord_json_count > 0){
?>
														<!-- start level 2 -->
														<ul class="acnav__list acnav__list--level2">
<?php
	
	foreach ($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_details'] as $menuMultipleRecord_lists) {
	  $product_list_id_o  = $menuMultipleRecord_lists["product_list_id"];
	  $product_primary_id_o = $menuMultipleRecord_lists["product_primary_id"];
	  $product_list_o = $menuMultipleRecord_lists["product_faq"];
	  $product_type_o = $menuMultipleRecord_lists["product_type"];
	  $sub_id_o = $menuMultipleRecord_lists["sub_id"];
	  $categories_group_o = $menuMultipleRecord_lists["categories_group"];
	?>
															<li class="has-children">
																<div class="list_con acnav__label level_two">
																	<div class="image">
																		<i class="fa fa-question-circle" aria-hidden="true"></i>
																	</div>
																	<div class="img_txt">
																		<div class="txt">
																		<?php echo $product_list_o; ?>																	</div>
																	</div>
																</div>
<?php
/*
	$selectMultipleListLevelRecord= selectMultipleListLevelRecord("tbl_product_list",$menu_ids_fi,3,"Active","list",$product_list_id_o);
	$selectMultipleListLevelRecord_json = json_decode($selectMultipleListLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleListLevelRecord_json_count = isset($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count'])?$selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_count']:""; 


	if($selectMultipleListLevelRecord_json_count > 0){
?>
																<ul class="acnav__list acnav__list--level3">
<?php
	
	foreach ($selectMultipleListLevelRecord_json['selectMultipleListLevelRecord_details'] as $menuMultipleRecord_lists) {
	  $product_list_id_t  = $menuMultipleRecord_lists["product_list_id"];
	  $product_primary_id_t = $menuMultipleRecord_lists["product_primary_id"];
	  $product_list_t = $menuMultipleRecord_lists["product_list"];
	  $product_type_t = $menuMultipleRecord_lists["product_type"];
	  $sub_id_t = $menuMultipleRecord_lists["sub_id"];
	  $categories_group_t = $menuMultipleRecord_lists["categories_group"];
?>
																	<li>
																	<?php echo $product_list_t; ?>
																	</li>
<?php
	}

?>																	
																	
																</ul>
<?php
		
	}
*/
?>
															</li>
<?php
	}

?>	                                                 									
															

													
														</ul>
<?php
	}
?>														<!-- end level 2 -->
													</li>
													<!-- end group 1 -->
                                               												
<?php
	

	}
}
?>															
																						

												</ul>
												<!-- end level 1 -->
												</nav>
											</div><!--content_acco Ends -->
									</div><!--course_content Ends -->

									<div class="course_overview"><!--course_overview Starts -->
										<div class="overview"><!--overview Starts -->
											<div class="head"><!--head Starts -->
												Trainer
											</div><!--head Ends -->
										</div><!--overview Ends -->

										<div class="overview_para"><!--overview_para Starts -->
											<p>
												Trainer Details Will Update soon						
											</p>				
										</div><!--overview_para Ends -->
									</div><!--course_overview Ends -->

                                </div><!--product_det Ends -->
                            </div><!--product_leftbar Ends -->

							<div class="course_t_con"><!--course_t_con Starts -->
								<?php include "course_index.php"; ?>
							</div><!--course_t_con Ends -->
<?php /* ?>
                            <div class="product_rightbar"><!--product_rightbar Starts -->
                                <div class="border_bar">
									<div class="image">
										<img src="images/course/sidebar/sidebar.webp"/>
									</div>
									<div class="button">
										<div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
											<div class="sec-btn"><span>Enroll Now</span></div>
										</div>
									</div>
									<div class="other_details">
										<div class="details_head">
											Course includes
										</div>
										<div class="details_oth">
											<ul>
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-ticket"></i>
															</div>
															<div class="text">
																Seats
															</div>															 
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															15
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-clock-o"></i>
															</div>
															<div class="text">
																Schedule
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															2.00 pm to 4.00 pm
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-book" aria-hidden="true"></i>
															</div>
															<div class="text">
																Lessons
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															87 Lessons
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-clock-o"></i>
															</div>
															<div class="text">
																Duration
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															40 h
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-list-alt" aria-hidden="true"></i>
															</div>
															<div class="text">
																Categories
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															It &amp; Software
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->
												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fa fa-language" aria-hidden="true"></i>
															</div>
															<div class="text">
																Launguage
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															English, Tamil
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->

												<li><!--Loop Starts -->
													<div class="detail_list"><!--detail_list Starts -->
														<div class="column_one"><!--column_one Starts -->
															<div class="images">
																<i class="fas fa-sliders-h"></i>
															</div>
															<div class="text">
																Skills
															</div>
														</div><!--column_one Ends -->
														<div class="column_two"><!--column_two Starts -->
															All Levels
														</div><!--column_two Ends -->
													</div><!--detail_list Ends -->
												</li><!--Loop Ends -->

											</ul>
										</div>

										<div class="details_head">
											Share On
										</div>

										<div class="social_icon">
											<div class="tp-footer-bottom-social">
												<a class="social-fb" href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
												<a class="social-twit" href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
												<a class="social-twit" href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
												<a class="social-lnkd" href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
												<a class="social-yout" href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i></a>
											</div>
										</div>

									</div>
									
								</div>

								<div class="border_bar">
									<div class="other_details">
										<div class="details_head">
											Popular Tags
										</div>
										<div class="tags">
											<ul>
												<li>
													<a href="">blog</a>
												</li>
												<li>
													<a href="">business</a>
												</li>
												<li>
													<a href="">theme</a>
												</li>
												<li>
													<a href="">SAP</a>
												</li>
												<li>
													<a href="">data science</a>
												</li>
												<li>
													<a href="">web development</a>
												</li>
												<li>
													<a href="">tips</a>
												</li>
												<li>
													<a href="">machinelearning</a>
												</li>
											</ul>
										</div>
									</div>
								</div>

                            </div><!--product_rightbar Ends -->
<?php */  ?>

                        </div><!--product_details Ends -->
                    </div><!--product_details_con Ends -->

                </div><!--course_sec Starts -->
            </div><!--course_sec_center Ends -->
        </div><!--course_sec_con Ends -->

        <div class="footer_con"><!--footer_con Starts -->
            <?php include "footer.php"; ?>  
        </div><!--footer_con Ends -->

    </div><!--container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
