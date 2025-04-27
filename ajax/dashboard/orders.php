<?php
    include '../../check_ses_list.php';
	include '../../dbconn.php';	
	include_once "../../func_templates/func_code.php";

    $selectDashAdminDetails= selectDashAdminDetails("tbl_adminission_form",$user_session,"Success",);
    $sselectDashAdminDetails_json = json_decode($selectDashAdminDetails, true);
    //print_r($accopany_filter_List_json);
    $sselectDashAdminDetails_json_count = isset($sselectDashAdminDetails_json['selectDashAdminDetails_count'])?$sselectDashAdminDetails_json['selectDashAdminDetails_count']:"";
    

   
?>
<div class="user_nav">
	<ul>
		<li><i class="fa fa-home"></i></li>
		<li>My Orders</li>
		<li>Orders</li>
	</ul>
</div>
<div class="profile_list">
	<div class="profile_set">
        <div class='orders_con'>
            <div class='order_head'>
                <ul>
                    <li>Admission ID</li>
                    <li>Course Name</li>
                    <li>Price</li>
                    <li>Status</li>
                    <li>Details</li>
                </ul>
            </div>
            <div class='order_list'>
                <ul>
<?php
    if($sselectDashAdminDetails_json_count > 0){  
        foreach ($sselectDashAdminDetails_json['selectDashAdminDetails_details'] as $adminDetails) {
          $admin_gen_id  = isset($adminDetails["admin_gen_id"])?$adminDetails["admin_gen_id"]:"-";
          $course_id  = isset($adminDetails["course_id"])?$adminDetails["course_id"]:"-";
          $aName  = isset($adminDetails["aName"])?$adminDetails["aName"]:"-";
          $mobile  = isset($adminDetails["mobile"])?$adminDetails["mobile"]:"-";
          $email  = isset($adminDetails["email"])?$adminDetails["email"]:"-";
          $course_fees  = isset($adminDetails["course_fees"])?$adminDetails["course_fees"]:"-";
          $gst_amount  = isset($adminDetails["gst_amount"])?$adminDetails["gst_amount"]:"-";
          $actual_fees  = isset($adminDetails["state"])?$adminDetails["actual_fees"]:"-";
          $city  = isset($adminDetails["city"])?$adminDetails["city"]:"-";
          $state  = isset($adminDetails["state"])?$adminDetails["state"]:"-";
          $country  = isset($adminDetails["country"])?$adminDetails["country"]:"-";
          $status  = isset($adminDetails["status"])?$adminDetails["status"]:"-";
          $course_status  =isset($adminDetails["course_status"])?$adminDetails["course_status"]:"-";
          
          $formatted_decimal = sprintf('%08.2f', $course_fees);

            $selectCourseName= selectCourseName("tbl_navigation_setup",$course_id);
            $selectCourseName_json = json_decode($selectCourseName, true);
            //print_r($accopany_filter_List_json);
            $selectCourseName_json_count = isset($selectCourseName_json['selectCourseName_count'])?$selectCourseName_json['selectCourseName_count']:"";
            if($selectCourseName_json_count > 0){  
                foreach ($selectCourseName_json['selectCourseName_details'] as $courseName) {
                        $menu_name  = $courseName["menu_name"];
                }
            }
        
?>
                    <li>
                        <div class='col_one cols'><?php echo $admin_gen_id; ?></div>
                        <div class='col_two cols'><?php echo $menu_name; ?></div>
                        <div class='col_three cols'><?php echo $formatted_decimal; ?></div>
                        <div class='col_four cols'><?php echo $status; ?></div>
                        <div class='col_five cols'>View Details</div>
                            <div class="sum_list">
												
                                <ul>
                                    <li>
                                        <div class="head">Name</div>
                                        <div class="head_l">
                                            <?php echo $aName; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Mobile</div>
                                        <div class="head_l">
                                            <?php echo $mobile; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Email</div>
                                        <div class="head_l">
                                            <?php echo $email; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">City</div>
                                        <div class="head_l">
                                            <?php echo $city; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">State</div>
                                        <div class="head_l">
                                            <?php echo $state; ?>                                            
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Country</div>
                                        <div class="head_l">
                                            <?php echo $country; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Code</div>
                                        <div class="head_l">
                                            <?php //echo $batch_code; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Type</div>
                                        <div class="head_l">
                                            <?php //echo $batch_type; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Seat Count</div>
                                        <div class="head_l">
                                            <?php //echo $seat_count; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Session Code</div>
                                        <div class="head_l">
                                            <?php //echo $batch_session; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Course Level</div>
                                        <div class="head_l">
                                            <?php //echo $course_level; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">Course Status</div>
                                        <div class="head_l">
                                            <?php echo $course_status; ?>
                                        </div>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                    </li> 
<?php 
    }
}else{
?>
    <li>No Records Found</li>
<?php
}
?>
                                        
                </ul>
            </div>
        </div>
    </div>
</div>