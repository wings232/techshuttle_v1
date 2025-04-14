<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectMappingUpdate= selectMappingUpdate('tbl_batch_mapping',$articlesId);
	$selectMappingUpdate_json = json_decode($selectMappingUpdate, true);
		
			//print_r($socialmedia_list_json);
		$selectMappingUpdate_json_count = isset($selectMappingUpdate_json['selectMappingUpdate_count'])?$selectMappingUpdate_json['selectMappingUpdate_count']:"";
;
		if($selectMappingUpdate_json_count != ""){
		foreach ($selectMappingUpdate_json['selectMappingUpdate_details'] as $BlogDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			$product_pri_slug = $BlogDetails["product_primary_slug"];
			$course_name = str_replace('-',' ',strtolower($product_pri_slug));
			$start_date = $BlogDetails["start_date"];
			$end_date = $BlogDetails["end_date"];
			$seat_count = $BlogDetails["seat_count"];
			//$post_date = $BlogDetails["post_date"];
			//$blog_image = $BlogDetails["blog_image"];
			
			
			$status = $BlogDetails["status"];
		}
	}

?>

<div class="social_close">
	X
</div>

<div class="media_type_update">
	<div class="media_type_head">
		<div class="head"><?php echo $course_name; ?></div>
	</div>
	<div class="media_cont media_doc">
		

		<!-- need to check product type -->
		
		<div class="media_box">
			<div class="head_name">Seat Count</div>
			<div class="head_input">
				<input type="text" value="<?php echo $seat_count; ?>" name='useat_count' id='useat_count' />
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Start Date</div>
			<div class="head_input">
				
					<div class="for_date">
						<input type="text" name="uposted_dates" id='uposted_dates' placeholder="Start date" value="<?php echo $start_date; ?>" />
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#uposted_dates").datepicker({
								 	dateFormat:'d-M-yy',
								 	timepicker:false,
								 	scrollInput: false,
								 	changeYear:true,
								 	changeMonth:true,
                                	changeYear: true,
                                	yearRange: "-100:+100",
                                	closeOnDateSelect:true,
								 	beforeShow:function(textbox, instance){
										$('.dates_picks_Starts').append($('#ui-datepicker-div'));
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
				    	<div class="dates_picks_Starts"></div>
			    	</div>
				
			</div>
		</div>

		<div class="media_box">
			<div class="head_name">Expiry Date</div>
			<div class="head_input">
				
					<div class="for_date">
						<input type="text" name="uexpiry_dates" id='uexpiry_dates' placeholder="Start date" value="<?php echo $end_date; ?>" />
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#uexpiry_dates").datepicker({
								 	dateFormat:'d-M-yy',
								 	timepicker:false,
								 	scrollInput: false,
								 	changeYear:true,
								 	changeMonth:true,
                                	changeYear: true,
                                	closeOnDateSelect:true,
								 	beforeShow:function(textbox, instance){
										$('.dates_picks_Ends').append($('#ui-datepicker-div'));
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
				    	<div class="dates_picks_Ends"></div>
			    	</div>
				
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
						<div class="approval" onclick="updateBatchMappingRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
