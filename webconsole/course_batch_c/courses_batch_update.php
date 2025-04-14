<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectCoursebatchRecordDet= selectCoursebatchRecordDet('tbl_batch_setup',$articlesId);
	$selectCoursebatchRecordDet_json = json_decode($selectCoursebatchRecordDet, true);
		
			//print_r($socialmedia_list_json);
		$selectCoursebatchRecordDet_json_count = isset($selectCoursebatchRecordDet_json['selectCoursebatchRecordDet_count'])?$selectCoursebatchRecordDet_json['selectCoursebatchRecordDet_count']:"";
;
		if($selectCoursebatchRecordDet_json_count != ""){
		foreach ($selectCoursebatchRecordDet_json['selectCoursebatchRecordDet_details'] as $CourseBatchDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			$batch_name = $CourseBatchDetails["batch_name"];
			$batch_descrip = htmlentities($CourseBatchDetails["batch_descrip"]);
			$batch_type = $CourseBatchDetails["batch_type"];
			//$start_date = $CourseFeesDetails["start_date"];
			$sposted_Datess = new DateTime(isset($CourseBatchDetails["batch_timing_in"])?$CourseBatchDetails["batch_timing_in"]:"");
	 		$ssposted_Dates= $sposted_Datess->format('H:s:i');
			//$end_date = $CourseFeesDetails["end_date"];
			$end_dates = new DateTime(isset($CourseBatchDetails["batch_timing_out"])?$CourseBatchDetails["batch_timing_out"]:"");
	 		$ends_dates= $end_dates->format('H:s:i');
			$seat_count = $CourseBatchDetails["seat_count"];
			$batch_session = $CourseBatchDetails["batch_session"];
			$batch_code = $CourseBatchDetails["batch_code"];
			$batch_running_days = $CourseBatchDetails["batch_running_days"];
			$bat_run = explode(",",$batch_running_days);
			//print_r($bat_run);
			$running_bat = "";
			$array =  ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
			for($i=0;$i<count($bat_run) - 1;$i++){
				//echo $i;
				$running_bat .= $array[$i].",";
			};
			//$running_bat;
			$duration = $CourseBatchDetails["duration"];
			$trans_encrpt = explode("~",$duration);
			$durations_hrs = $trans_encrpt[0];
			$durations_days = $trans_encrpt[1];
			$durations_mnt = $trans_encrpt[2];
			$course_level = $CourseBatchDetails["course_level"];
			$mode_of_training = $CourseBatchDetails["mode_of_training"];
			
			$status = $CourseBatchDetails["status"];
		}
	}

?>

<div class="social_close">
	X
</div>

<div class="media_type_update">
	<div class="media_type_head">
		<div class="head"><?php echo $batch_name; ?></div>
	</div>
	<div class="media_cont media_doc">
		
		
		
	

		<div class="media_box">
			<div class="head_name">Batch Description</div>
			<div class="head_input">
				<textarea id='ucontent' name='ucontent'><?php echo $batch_descrip; ?></textarea>
			</div>
		</div>
		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select batch Mode</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="ubatch_mode_type" name="ubatch_mode_type">
						<option style="color:orange" value="<?php echo $batch_type; ?>"><?php  echo $batch_type; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Price Type</option>
												
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
		</div>
		<div class="media_box">
			<div class="head_name">Start Time</div>
			<div class="head_input">
				
					<div class="for_date">
						<input type="text" name="uStartTimes" id='uStartTimes' placeholder="Start Time" value="<?php echo $ssposted_Dates; ?>" />
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#uStartTimes").timepicker({
								 	timeFormat: "HH:mm", 
								    interval: 30, 
								    minTime: "01", 
								    maxTime: "23:55pm", 
								    
								    startTime: "01:00", 
								    dynamic: true, 
								    dropdown: true, 
								    scrollbar: false, 
								 	beforeShow:function(textbox, instance){
										$('.time_picks_placers').append($('.ui-timepicker-container'));
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
				    	<div class="time_picks_placers"></div>
			    	</div>
				
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Expiry Date</div>
			<div class="head_input">
				
					<div class="for_date">
						<input type="text" name="uEndTimes" id='uEndTimes' placeholder="Start Time"  value="<?php echo $ends_dates; ?>"/>
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#uEndTimes").timepicker({
								 	timeFormat: "HH:mm", 
								    interval: 30, 
								    minTime: "01", 
								    maxTime: "23:55pm", 
								    
								    startTime: "01:00", 
								    dynamic: true, 
								    dropdown: true, 
								    scrollbar: false, 
								 	beforeShow:function(textbox, instance){
										$('.time_picks_ends').append($('.ui-timepicker-container'));
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
				    	<div class="time_picks_ends"></div>
			    	</div>
				
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Seat Count</div>
			<div class="head_input">
				<input type="text" value="<?php echo $seat_count; ?>" name='useat_count' id='useat_count' />
			</div>
		</div>
		<div class="media_box">
			<div class="feild_head">
			<div class="head">Select Investigation</div>
		</div>
		<div class="head_input">
			<input type="text" name="patient_take" id="patient_take" placeholder="Select The Investigation" autocomplete="off" aria-required="true" aria-invalid="true" class="error" readonly="readonly" value="<?php echo $running_bat; ?>">
			<input type="text" name="patient_take_ids" id="patient_take_ids" placeholder="Id" autocomplete="off" aria-required="true" aria-invalid="true" class="error" value="<?php echo $batch_running_days; ?>">
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
		</div>

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Session</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="ubatch_session" name="ubatch_session">
						<option style="color:orange" value="<?php echo $batch_session; ?>"><?php  echo $batch_session; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Price Type</option>
												
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
		</div>

		<div class="media_box">
			<div class="head_name">Course Duration In Hours</div>
			<div class="head_input">
				<input type="text" value="<?php echo $durations_hrs; ?>" name='udurations_hrs' id='udurations_hrs' />
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Course Duration In Days</div>
			<div class="head_input">
				<input type="text" value="<?php echo $durations_days; ?>" name='udurations_days' id='udurations_days' />
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Course Duration In Month</div>
			<div class="head_input">
				<input type="text" value="<?php echo $durations_mnt; ?>" name='udurations_mnt' id='udurations_mnt' />
			</div>
		</div>

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Course Level</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="ucourse_level" name="ucourse_level">
						<option style="color:orange" value="<?php echo $course_level; ?>"><?php  echo $course_level; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Course Level</option>
												
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
		</div>

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Mode of Training</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="umode_of_training" name="umode_of_training">
						<option style="color:orange" value="<?php echo $mode_of_training; ?>"><?php  echo $mode_of_training; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Mode of training</option>
												
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
		</div>

		<div class="media_box"><!-- input_box loop Start-->
			<div class="head_name">
				<div class="head">Select Status</div>
			</div>
			<div class="feild_action">
				<div class="new_select">
					<select id="status_sel" name="status_sel">
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
						<div class="approval" onclick="updateCoursebatchRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	/*Batch Multiple select starts*/
$(document).ready(function(){
  
$(".table_details_cen .update .media_type_update .media_box .list_filt .speciality_fitlers input").on("keyup", function () {
  
        if (this.value.length >= 0) {
            $(".table_details_cen .update .media_type_update .media_box .list_filt ul li").removeClass("match").hide().filter(function () {
                return $(this).text().toLowerCase().indexOf($(".table_details_cen .update .media_type_update .media_box .list_filt .speciality_fitlers input").val().toLowerCase()) != -1;
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


    $(".table_details_cen .update .media_type_update .media_box .list_filt ul li input").click(function(){
      
        var vaccine_arr = [];
        var vaccine_arr_id = [];
        var obj = {};
        var c = 0;
        $.each($(".table_details_cen .update .media_type_update .media_box .list_filt ul li input:checked"), function(){
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
       $(".table_details_cen .update .media_type_update .media_box .head_input input#patient_take").val(vaccine_arr.join(", "));
       $(".table_details_cen .update .media_type_update .media_box .head_input input#patient_take_ids").val(vaccine_arr_id);
    });

    $(".table_details_cen .update .media_type_update .media_box .head_input input#patient_take").on("click", function () {
      $(this).parent().next().slideToggle();
    });

/*Batch Multiple select Ends*/
</script>
