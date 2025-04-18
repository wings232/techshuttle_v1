<?php	
	include "dbconn.php";
	include "check_ses_list.php";
	include_once "func_templates/main_func_code.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>KMH Dashboard</title>
	<script src='js/tech_valid.js'></script>
</head>
<body>
	<div class="right_container">
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		
		<!-- <input type="button" value='views' onclick="url_pass('menu_setup.php')" /> -->
		<div class="department_head">
			<div class="social_overlay">
			</div>
			<div class="social_create_out">
				<div class="social_close">
					X
				</div>
				<div class="spinner">
					<center><img src="images/icons/new_spinner.gif"></center>
				</div>
			</div>
			<div class="dept_select">
				<div class="heads">
					Services
				</div>
			</div>	
			<div class="select_d">
				<div class="select_design">
					<div class="select_design_head">
						<div class="filter_h">
	                        <input type="hidden" class="parent_val" id="parent_val" />
	                        <input type="hidden" class="sub_val" id="sub_val" />
	                        <input type="hidden" class="cate_group_val" id="cate_group_val" />
	                        <input type="hidden" class="menu_slug" id="menu_slug" />
	                        <input type="hidden" class="level" id="level" />
	                        <div class="head" id="head_services">Select The Courses</div>
	                    </div>
	                    <div class="select_image"><center><img src='images/icons/arrow_c.png'/></center></div>
					</div>
					<div class="filter_drop">
						<div class="filter_search">
	                        <input type="text" placeholder="Search" />
	                    </div>
	                    <div class="filter_select">
	                        <ul>
	                        	<?php
	                        		$NavigationSetup= selectNavigationSetuplevel("tbl_navigation_setup",1,"courses","Active");
									$NavigationSetup_json = json_decode($NavigationSetup, true);
									//print_r($accopany_filter_List_json);
									$NavigationSetup_json_count = isset($NavigationSetup_json['NavigationSetuplevel_count'])?$NavigationSetup_json['NavigationSetuplevel_count']:"";
									if($NavigationSetup_json_count > 0){

									

									foreach ($NavigationSetup_json['NavigationSetuplevel_details'] as $NavigationSetup_lists) {
											$menu_id  = $NavigationSetup_lists["menu_id"];
											$menu_name = $NavigationSetup_lists["menu_name"];
											$menu_sub_id = $NavigationSetup_lists["sub_id"];
											$menu_categories_group = $NavigationSetup_lists["categories_group"];
											$menu_level = $NavigationSetup_lists["level"];
											$menu_slug = $NavigationSetup_lists["menu_slug"];
	                        	?>
	                            <li>
	                            	<div class="first_l" parent_id="<?php echo $menu_id; ?>" sub_id="<?php echo $menu_sub_id; ?>" cate_gro="<?php echo $menu_categories_group; ?>" level="<?php echo $menu_level; ?>" menu_slug="<?php echo $menu_slug; ?>"><?php //echo $menu_name; ?></div>
	                            	<ul>
	                            		<?php
			                        		$NavigationSetups= selectNavigationSetuplevelId("tbl_navigation_setup",2,"courses","Active",$menu_id);
											$NavigationSetups_json = json_decode($NavigationSetups, true);
											//print_r($accopany_filter_List_json);
											$NavigationSetups_json_count = isset($NavigationSetups_json['NavigationSetuplevel_count'])?$NavigationSetups_json['NavigationSetuplevel_count']:"";
											if($NavigationSetups_json_count > 0){											

												foreach ($NavigationSetups_json['NavigationSetuplevel_details'] as $NavigationSetups_lists) {
														$menu_ids  = $NavigationSetups_lists["menu_id"];
														$menu_names = $NavigationSetups_lists["menu_name"];
														$menu_sub_ids = $NavigationSetups_lists["sub_id"];
														$menu_categories_groups = $NavigationSetups_lists["categories_group"];
														$menu_levels = $NavigationSetups_lists["level"];
														$menu_slugs = $NavigationSetups_lists["menu_slug"];
										?>
				                            	<li>
				                            		<div  class="first_l" parent_id="<?php echo $menu_ids; ?>" sub_id="<?php echo $menu_sub_ids; ?>" cate_gro="<?php echo $menu_categories_groups; ?>" level="<?php echo $menu_levels; ?>" menu_slug="<?php echo $menu_slugs; ?>"><?php echo $menu_names; ?></div>
				                            		<ul>
				                            			<?php
							                        		$NavigationSetupsThree= selectNavigationSetuplevelId("tbl_navigation_setup",3,"courses","Active",$menu_ids);
															$NavigationSetupsthree_json = json_decode($NavigationSetupsThree, true);
															//print_r($accopany_filter_List_json);
															$NavigationSetups_json_count_t = isset($NavigationSetupsthree_json['NavigationSetuplevel_count'])?$NavigationSetupsthree_json['NavigationSetuplevel_count']:"";
															if($NavigationSetups_json_count_t > 0){											

																foreach ($NavigationSetupsthree_json['NavigationSetuplevel_details'] as $NavigationSetupsT_lists) {
																		$menu_ids_three  = $NavigationSetupsT_lists["menu_id"];
																		$menu_names_three = $NavigationSetupsT_lists["menu_name"];
																		$menu_sub_ids_three = $NavigationSetupsT_lists["sub_id"];
																		$menu_categories_groups_t = $NavigationSetupsT_lists["categories_group"];
																		$menu_level_t = $NavigationSetupsT_lists["level"];
																		$menu_slug_t = $NavigationSetupsT_lists["menu_slug"];
														?>
						                            			<li class='third_child'>
						                            				 <div  class="first_l" parent_id="<?php echo $menu_ids_three; ?>" sub_id="<?php echo $menu_sub_ids_three; ?>" cate_gro="<?php echo $menu_categories_groups_t; ?>" level="<?php echo $menu_level_t; ?>" menu_slug="<?php echo $menu_slug_t; ?>"><?php //echo $menu_names_three; ?></div>

						                            				 <ul>
<?php
	$NavigationSetupsThree= selectNavigationSetuplevelId("tbl_navigation_setup",4,"courses","Active",$menu_ids_three);
	$NavigationSetupsthree_json = json_decode($NavigationSetupsThree, true);
	//print_r($accopany_filter_List_json);
	$NavigationSetups_json_count_t = isset($NavigationSetupsthree_json['NavigationSetuplevel_count'])?$NavigationSetupsthree_json['NavigationSetuplevel_count']:"";
	if($NavigationSetups_json_count_t > 0){											

		foreach ($NavigationSetupsthree_json['NavigationSetuplevel_details'] as $NavigationSetupsT_lists) {
				$menu_ids_four  = $NavigationSetupsT_lists["menu_id"];
				$menu_names_four = $NavigationSetupsT_lists["menu_name"];
				$menu_sub_ids_four = $NavigationSetupsT_lists["sub_id"];
				$menu_categories_groups_f = $NavigationSetupsT_lists["categories_group"];
				$menu_level_f = $NavigationSetupsT_lists["level"];
				$menu_slug_f = $NavigationSetupsT_lists["menu_slug"];

?>																		
																		<li class='fourth_child'>
								                            				<div  class="first_l" parent_id="<?php echo $menu_ids_four; ?>" sub_id="<?php echo $menu_sub_ids_four; ?>" cate_gro="<?php echo $menu_categories_groups_f; ?>" level="<?php echo $menu_level_f; ?>" menu_slug="<?php echo $menu_slug_f; ?>"><?php echo $menu_names_four; ?></div>
								                            			</li>
<?php
		}
	}
?>
						                            				 </ul>
						                            					
						                            				</li>
						                            	<?php
							                            		}
							                            	}
							                            ?>
						                            </ul>
				                            	</li>
		                            	<?php
			                            		}
			                            	}
			                            ?>
		                            </ul>
	                            </li>
	                            <?php
	                            	}
	                            }
	                            ?>	
	                           	
	                                                       
	                        </ul>
	                    </div>
					</div>
				</div>	
			</div>	

			<div class="details_fil">
				<form method="post" enctype="multipart/form-data" class="admission_check">
					<div class="feild_box">
                            <div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Name</div>
								</div>
								<div class="feild_action">
									<input type="text" name="name" id="name">
								</div>
							</div><!-- input_box loop Ends-->
							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Email Id</div>
								</div>
								<div class="feild_action">
									<input type="text" name="email_id" id="email_id">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Phone Number</div>
								</div>
								<div class="feild_action">
									<input type="text" name="mobile" id="mobile">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select Product Type</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='pro_type' name="pro_type">
											<option value=''>Select Product Type</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,4);
									$selectCategoriesRecordMultilevel_json = json_decode($selectCategoriesRecordMultilevel, true);
									$selectCategoriesRecordMultilevel_json_count = isset($selectCategoriesRecordMultilevel_json['categories_levelmul_count'])?$selectCategoriesRecordMultilevel_json['categories_levelmul_count']:"";

										if($selectCategoriesRecordMultilevel_json_count != ""){
											foreach ($selectCategoriesRecordMultilevel_json['categories_levelmul_details'] as $cate_group_details) {
													
													$menu_name = $cate_group_details['menu_name'];
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
									<div class="head">Discount</div>
								</div>
								<div class="feild_action">
									<input type="text" name="course_discount" id="course_discount">
								</div>
							</div><!-- input_box loop Ends-->


							<div class='shows'></div>

							
						<div class="input_box"><!-- input_box loop Start-->
							<div class="feild_action">
								<input type="button" name='create_button' value="Create" onclick="create_admission()" />
								<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
								<div class="spinner_one"><img src="images/gif/loading_01.gif"></div>
							</div>
						</div><!-- input_box loop Ends-->
						
					</div>
				</form>
			</div>

			<div class="table_details_con">
				<div class="table_details_cen">
					<div class="table_details">
						<div class="media_search_group">
				            <input type="text" name="table_search" id="table_search" class="table_control" placeholder="Type your search query here" />
				        </div>
				        <div class="table_design table_spec_data">
				        	<!-- <table class="info_media_heads" >
								<tr>									
									<th>Speciality Name</th>
									<th>Banner</th>
									<th>Post Status</th>
									<th>Action</th>
								</tr>
							</table>
							<table class="info_media_contents">						
								<tbody id='post_data'>									
								</tbody>
							</table> -->
				        </div>
				        <div class="update_con">
							<div class="update_center">
								<div class="update">
									
								</div>
							</div>
						</div>
					</div>
					<div id="pagination_link" class="pagination_links"></div>


				</div>
			</div>
			
		</div>
	</div>
	
</body>
</html>
<script type="text/javascript">
  load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"courses_c/process_page.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('.table_spec_data').html(data);
        }
      });
    }

$(document).ready(function(){

  

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#table_search').keyup(function(){
      var query = $('#table_search').val();
      load_data(1, query);
    });

  });

  $(document).ready(function(){     
  
  /* filter products */
   $(".right_container .department_head .select_design .filter_drop .filter_search input").on("keyup", function () {
     
       if (this.value.length >= 0) {
           $(".right_container .department_head .select_design .filter_drop .filter_select > ul > li > ul > li > ul > li > ul > li").removeClass("match").hide().filter(function () {
               return $(this).text().toLowerCase().indexOf($(".right_container .department_head .select_design .filter_drop .filter_search input").val().toLowerCase()) != -1;
           }).addClass("match").show();
           
       }
       else {
           //$(".filters_c .filter_sec .speciality_get .filter_b ul li").removeClass("match").hide();
           //highlight("");
           //$(".filters_c .filter_sec .speciality_get .filter_b ul li").css({"display":"block"})
       }
   });
});
</script>