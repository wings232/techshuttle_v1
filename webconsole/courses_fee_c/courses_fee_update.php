<?php
	include '../dbconn.php';
	include_once "../func_templates/main_func_code.php";
	include "../check_ses_list.php";
	$articlesId = isset($_REQUEST['articlesId'])?$_REQUEST['articlesId']:"";
	$articlesSlug = isset($_REQUEST['articlesSlug'])?$_REQUEST['articlesSlug']:"";

	$selectCourseFeeRecordDet= selectCourseFeeRecordDet('tbl_price_setup',$articlesId);
	$selectCourseFeeRecordDet_json = json_decode($selectCourseFeeRecordDet, true);
		
			//print_r($socialmedia_list_json);
		$selectCourseFeeRecordDet_json_count = isset($selectCourseFeeRecordDet_json['selectCourseFeeRecordDet_count'])?$selectCourseFeeRecordDet_json['selectCourseFeeRecordDet_count']:"";
;
		if($selectCourseFeeRecordDet_json_count != ""){
		foreach ($selectCourseFeeRecordDet_json['selectCourseFeeRecordDet_details'] as $CourseFeesDetails) {
			//$articlescontent = htmlentities($NavigationDetails["profile"]);
			$product_name = $CourseFeesDetails["product_name"];
			$Price = $CourseFeesDetails["base_price"];
			$price_type = $CourseFeesDetails["price_type"];
			//$start_date = $CourseFeesDetails["start_date"];
			$sposted_Datess = new DateTime(isset($CourseFeesDetails["start_date"])?$CourseFeesDetails["start_date"]:"");
	 		$ssposted_Dates= $sposted_Datess->format('d-M-Y');
			//$end_date = $CourseFeesDetails["end_date"];
			$end_dates = new DateTime(isset($CourseFeesDetails["end_date"])?$CourseFeesDetails["end_date"]:"");
	 		$ends_dates= $end_dates->format('d-M-Y');
			$price_descrip = $CourseFeesDetails["price_descrip"];
			
			$status = $CourseFeesDetails["status"];
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
			<div class="head_name">Course Fees</div>
			<div class="head_input">
				<input type="text" value="<?php echo $Price; ?>" name='Prices' id='Prices' />
			</div>
		</div>
		<div class="media_box">
			<div class="head_name">Start Date</div>
			<div class="head_input">
				
					<div class="for_date">
						<input type="text" name="sposted_dates" id='sposted_dates' placeholder="Start date" value="<?php echo $ssposted_Dates; ?>" />
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#sposted_dates").datepicker({
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
						<input type="text" name="sexpiry_dates" id='sexpiry_dates' placeholder="Start date" value="<?php echo $ends_dates; ?>" />
						<script type="text/javascript">
							$(document).ready(function(){
							 $("#sexpiry_dates").datepicker({
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
					<select id="price_type_sel" name="price_type_sel">
						<option style="color:orange" value="<?php echo $price_type; ?>"><?php  echo $price_type; ?></option>
						<option style="color:#e597f3; font-weight: bold;" value="">Select Price Type</option>
												
						<?php
												
							$selectCategoriesRecordMultilevel = selectCategoriesRecordMultilevel('tbl_categories_groups',3,4);
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
			<div class="head_name">Price Description</div>
			<div class="head_input">
				<textarea id='price_descrips' name='price_descrips'><?php echo $price_descrip; ?></textarea>
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
						<div class="approval" onclick="updateCourseFeeRecord('<?php echo $articlesId; ?>')">Update</div>
						<input type="hidden" id='social_upost_id' value="<?php echo $user_session; ?>"/>
					</li>										
				</ul>
			</div>
		</div>
	</div>

</div>
