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
				
			

			<div class="details_fil">
				<form method="post" enctype="multipart/form-data" class="course_batch_check">
					<div class="feild_box">
							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Batch Name</div>
								</div>
								<div class="feild_action">
									<input type="text" name="batch_name" id="batch_name">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">batch description</div>
								</div>
								<div class="feild_action">
									<textarea name='batch_content' id='batch_content' placeholder=""></textarea>
								</div>
							</div><!-- input_box loop Ends-->

							

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select batch Mode</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='sbatch_mode' name="sbatch_mode">
											<option value=''>Select Batch mode</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,13);
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
									<div class="head">Start Time</div>
								</div>
								<div class="feild_action">
									<div class="for_date">
										<input type="text" name="sStartTime" id='sStartTime' placeholder="Start Time" />
										<script type="text/javascript">
			    							$(document).ready(function(){
			    							 $("#sStartTime").timepicker({
			    								 	timeFormat: "HH:mm", 
												    interval: 30, 
												    minTime: "01", 
												    maxTime: "23:55pm", 
												    defaultTime: "06", 
												    startTime: "01:00", 
												    dynamic: true, 
												    dropdown: true, 
												    scrollbar: false, 
			    								 	beforeShow:function(textbox, instance){
														$('.time_picks_placer').append($('.ui-timepicker-container'));
													        /*onShow: function() {
													          $('.date_picks_placer').append(this)
													        }*/
													    }
												    //minTime:'11:00',
			    								 	//maxTime:'15:00',
			    								 	//initTime:false,
			    								 	
			    								 	//hours12:false,
			    								 	//step: 15 
											  });
			    							});
								    	</script>
								    	<div class="time_picks_placer"></div>
							    	</div>
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Expiry Date</div>
								</div>
								<div class="feild_action">
									<div class="for_date">
										<input type="text" name="sEndTime" id='sEndTime' placeholder="Start Time" />
										<script type="text/javascript">
			    							$(document).ready(function(){
			    							 $("#sEndTime").timepicker({
			    								 	timeFormat: "HH:mm", 
												    interval: 30, 
												    minTime: "01", 
												    maxTime: "23:55pm", 
												    defaultTime: "06", 
												    startTime: "01:00", 
												    dynamic: true, 
												    dropdown: true, 
												    scrollbar: false, 
			    								 	beforeShow:function(textbox, instance){
														$('.time_picks_end').append($('.ui-timepicker-container'));
													        /*onShow: function() {
													          $('.date_picks_placer').append(this)
													        }*/
													    }
												    //minTime:'11:00',
			    								 	//maxTime:'15:00',
			    								 	//initTime:false,
			    								 	
			    								 	//hours12:false,
			    								 	//step: 15 
											  });
			    							});
								    	</script>
								    	<div class="time_picks_end"></div>
							    	</div>
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Seat Count</div>
								</div>
								<div class="feild_action">
									<input type="text" name="seat_count" id="seat_count">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Course Session</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='ssession_c' name="ssession_c">
											<option value=''>Select Course Session</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,19);
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
									<div class="head">Select Investigation</div>
								</div>
								<div class="feild_action">
									<input type="text" name="patient_take" id="patient_take" placeholder="Select The Investigation" autocomplete="off" aria-required="true" aria-invalid="true" class="error" readonly="readonly">
									<input type="text" name="patient_take_id" id="patient_take_id" placeholder="Id" autocomplete="off" aria-required="true" aria-invalid="true" class="error">
								</div>
								<div class="list_filt">
	                                	<div class="speciality_fitlers">
	                                    		<input type="text" placeholder="Search speciality"/>
	                                    	</div>
	                                    <ul>
	                                <?php /*
													
										$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,5);
										$selectCategoriesRecordMultilevel_json = json_decode($selectCategoriesRecordMultilevel, true);
										$selectCategoriesRecordMultilevel_json_count = isset($selectCategoriesRecordMultilevel_json['categories_levelmul_count'])?$selectCategoriesRecordMultilevel_json['categories_levelmul_count']:"";

											if($selectCategoriesRecordMultilevel_json_count != ""){
												foreach ($selectCategoriesRecordMultilevel_json['categories_levelmul_details'] as $cate_group_details) {
														$level_range_id = $cate_group_details['level_range_id'];
														$menu_name = $cate_group_details['menu_name'];
											*/		
													
									?>	
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='0' value="SUN" />
	                                            <div class="list_value">
	                                                <div class="list_type">SUN</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='1' value="Mon" />
	                                            <div class="list_value">
	                                                <div class="list_type">Mon</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='2' value="Tue" />
	                                            <div class="list_value">
	                                                <div class="list_type">Tue</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='3' value="Wed" />
	                                            <div class="list_value">
	                                                <div class="list_type">Wed</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='4' value="Thu" />
	                                            <div class="list_value">
	                                                <div class="list_type">Thu</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='5' value="Fri" />
	                                            <div class="list_value">
	                                                <div class="list_type">Fri</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->
	                                        <li><!--Loops Start -->
	                                            <input type="checkbox" class="investigation_s" name="investigation[]" slug='6' value="Sat" />
	                                            <div class="list_value">
	                                                <div class="list_type">Sat</div>
	                                            </div>
	                                        </li><!-- Loop Ends  -->

	                                        <?php
	                                           /* }
	                                        }*/
	                                        ?>
	                                    </ul>
	                                </div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Course Duration In Hours</div>
								</div>
								<div class="feild_action">
									<input type="text" name="dura_hrs" id="dura_hrs" placeholder="example: 10">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Course Duration In Days</div>
								</div>
								<div class="feild_action">
									<input type="text" name="dura_days" id="dura_days" placeholder="example: 15">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Course Duration In Month</div>
								</div>
								<div class="feild_action">
									<input type="text" name="dura_mnt" id="dura_mnt" placeholder="example: 15">
								</div>
							</div><!-- input_box loop Ends-->

							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Course Level</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='scourse_level' name="scourse_level">
											<option value=''>Select Course level</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,20);
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
									<div class="head">Mode of Training</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='smodeofTraining' name="smodeofTraining">
											<option value=''>Select Mode of Training</option>	
											<?php
												
									$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',4,9);
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



<?php 
/*
							<div class="input_box"><!-- input_box loop Start-->
								<div class="feild_head">
									<div class="head">Select Status</div>
								</div>
								<div class="feild_action">
									<div class="new_select">
										<select id='fee_status' name="fee_status">
											<option value=''>Select Status</option>	
																	
											<option value='Active'>Active</option>
											<option value='Inactive'>Inactive</option>
											
																	
										</select>
									</div>
								</div>
							</div><!-- input_box loop Ends-->
*/
?>

						<div class="input_box"><!-- input_box loop Start-->
							<div class="feild_action">
								<input type="button" name='create_button' value="Create" onclick="course_batch_create()" />
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
        url:"course_batch_c/process_page_c_batch.php",
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

/*Batch Multiple select starts*/
$(document).ready(function(){
  
$(".details_fil .feild_box .input_box .list_filt .speciality_fitlers input").on("keyup", function () {
  
        if (this.value.length >= 0) {
            $(".details_fil .feild_box .input_box .list_filt ul li").removeClass("match").hide().filter(function () {
                return $(this).text().toLowerCase().indexOf($(".details_fil .feild_box .input_box .list_filt .speciality_fitlers input").val().toLowerCase()) != -1;
            }).addClass("match").show();
            //highlight(this.value);
            //$(".course_search .course_search_list").show();
        }
        else {
            //$(".filters_c .filter_sec .speciality_get .filter_b ul li").removeClass("match").hide();
            //highlight("");
            //$(".filters_c .filter_sec .speciality_get .filter_b ul li").css({"display":"block"})
        }
    });

/*var list = $(".details_fil .feild_box .input_box .list_filt ul"),
    origOrder = list.children();
    console.log(origOrder)
    list.on("click", ":checkbox", function() {
        var i, checked = document.createDocumentFragment(),
            unchecked = document.createDocumentFragment();
        for (i = 0; i < origOrder.length; i++) {
            if (origOrder[i].getElementsByTagName("input")[0].checked) {
                checked.appendChild(origOrder[i]);
            } else {
                unchecked.appendChild(origOrder[i]);
            }
        }
        list.append(checked).append(unchecked);
    });*/
});


    $(".right_container .department_head .details_fil .feild_box .input_box .list_filt ul li input.investigation_s").click(function(){
      
        var vaccine_arr = [];
        var vaccine_arr_id = [];
        var obj = {};
        var c = 0;
        $.each($(".details_fil .feild_box .input_box .list_filt ul li input.investigation_s:checked"), function(){
            vaccine_arr.push($(this).val());
            //c++;
      //vaccine_arr_id.push({name:$(this).val(),id:$(this).attr("ca")})
      //vaccine_arr_id.push([$(this).attr("slug")]);
      vaccine_arr_id += $(this).attr("slug")+",";
            //vaccine_arr_id.push($(this).attr("ca"));
            //alert(vaccine_arr_id)
            //alert(JSON.stringify(vaccine_arr))
        });
       //alert("vaccine Type are: " + vaccine_arr.join(", "));
       $(".right_container .department_head .details_fil .feild_box .input_box .feild_action input#patient_take").val(vaccine_arr.join(", "));
       $(".right_container .department_head .details_fil .feild_box .input_box .feild_action input#patient_take_id").val(vaccine_arr_id);
    });

    $(".details_fil .feild_box .input_box .feild_action input#patient_take").on("click", function () {
      $(this).parent().next().slideToggle();
    });

/*Batch Multiple select Ends*/
</script>