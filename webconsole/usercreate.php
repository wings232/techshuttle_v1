<?php	
	include "dbconn.php";
	include "check_ses_list.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>KMH Dashboard</title>
    <script src='js/tech_valid.js'></script>
    <script type="text/javascript">
    	/*User creation Starts*/

function usercreate(){
      
      var roleSelect = document.getElementById('role_select').value;
      //var campLoc = camp_register.camp_reg.value;
      //camp_register
      var emp_level_select = document.getElementById('emp_level_select').value;
      var empId = document.getElementById('emp_id').value;
        var userName = document.getElementById('user_name').value;
        var userPass = document.getElementById('user_pass').value;
        var userStatus = document.getElementById('user_status').value;
        var userfullname = document.getElementById('user_fullname').value;
        var userMail = document.getElementById('user_mail').value;
        var userMobile = document.getElementById('user_mobile').value;
        var userDepartment = document.getElementById('user_department').value;
        var fileImage = document.getElementById('file_image').value;
        var userBranch = document.getElementById('user_branch').value;
        var userdesignation = document.getElementById('user_designation').value;
        var userGender = document.getElementById('user_gender').value;
        var workerType = document.getElementById('worker_type').value;
        var userpostby = <?php echo $user_session; ?>;
        //alert(emp_level_select)
      if($('.user_check').valid() == true){
        //alert('ok')
        $(".right_container .user_create .feilds_box .input_box .feild_action .spinner_one").show();
         $.ajax({
                  url:"ajax/user/createuser.php",
                  type:'post',
                  data:{
                      role_Select:roleSelect,
                      	emp_level_select:emp_level_select,
                          emp_Id:empId,
                          user_Name:userName,
                          user_Pass:userPass,
                          user_Fullname:userfullname,
                          user_Status:userStatus,
                          user_Mail:userMail,
                          user_Mobile:userMobile,
                          file_Image:fileImage,
                          user_Department:userDepartment,
                          user_Designation:userdesignation,
                          user_Branch:userBranch,
                          user_Gender:userGender,
                          worker_Type:workerType,
                          userpost_By:userpostby
                      },
                  success:function(result){
                      //alert();
                     $(".right_container .user_create .feilds_box .input_box .feild_action .spinner_one").hide();
                      $('.user_create_details').html(result);
                      //$('.events_side_bar .events_left .camp_registration .camp_form .camp_feilds .feilds .column_f select,.events_side_bar .events_left .camp_registration .camp_form .camp_feilds .feilds input[type="text"],.events_side_bar .events_left .camp_registration .camp_form .camp_feilds .feilds input[type="email"], .events_side_bar .events_left .camp_registration .camp_form .camp_feilds .feilds textarea').val("");

                      

                    // setTimeout(function() {
                    //        $(".events_side_bar .events_left .camp_registration .camp_out_reg").hide();
                    // }, 10000);

                  }
                });
      }
    }

    $('#user_image').change(function(e){
          // var fileName = e.target.files[0].type;
          // alert('The file "' + fileName +  '" has been selected.');
          var file_data = $('input[type="file"]').prop('files')[0];   
          var form_data = new FormData();                  
          form_data.append('file', file_data);
          //alert(form_data); 
          $.ajax({
              url: 'ajax/user/upload.php', // <-- point to server-side PHP script 
              dataType: 'text',  // <-- what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,                         
              type: 'post',
              success: function(php_script_response){
                  //alert(php_script_response); // <-- display response from the PHP script, if any
                  //document.getElementById('up').innerHTML = php_script_response;
                  $('.file_out').html( php_script_response);
              }
           });
      });
/*User creation Ends*/
    </script>
</head>
<body>
	<div class="right_container">
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class="user_create">
			<form method='post' enctype="multipart/form-data" class="user_check">
				<div class="user_create_details">

				</div>
				<div class="feilds_box">
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Roles</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='role_select' name="role_select">
									<option value=''>Select The Roles</option>
									<?php 
											$select_role_sql ="Select * From roles_setup";
											$select_role_query = $conn->query($select_role_sql);
											while($select_role_result = $select_role_query->fetch_assoc()){
												$roles_id = $select_role_result['roles_id'];
												$role_name = $select_role_result['role_name'];
									?>
										<option value='<?php echo $roles_id; ?>'><?php echo $role_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->

					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Select the Level</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='emp_level_select' name="emp_level_select" onchange="select_levels()">
									<option value=''>Select Level</option>									
									<option value='1'>Level 1</option>
									<option value='2'>Level 2</option>
									<option value='8'>Level 3</option>									
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Employee Id</div>
						</div>
						<div class="feild_action">
							<input type="text" name="emp_id" id='emp_id' readonly="readonly">
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Username</div>
						</div>
						<div class="feild_action">
							<input type="text" name="user_name" id='user_name'>
						</div>
					</div><!-- input_box loop Ends-->

					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Password</div>
						</div>
						<div class="feild_action">
							<input type="password" name="user_pass" id='user_pass'>
						</div>
					</div><!-- input_box loop Ends-->

					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">User Full Name</div>
						</div>
						<div class="feild_action">
							<input type="text" name="user_fullname" id='user_fullname'>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Status</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='user_status' name="user_status">
									<option value=''>Select The Status</option>
									<option value='Active'>Active</option>
									<option value='Inactive'>InActive</option>									
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Email Id</div>
						</div>
						<div class="feild_action">
							<input type="email" name="user_mail" id='user_mail'>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Phone Number</div>
						</div>
						<div class="feild_action">
							<input type="text" name="user_mobile" id="user_mobile">
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Department</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='user_department' name="user_department">
									<option value=''>Select The Department</option>
									<option value='IT'>IT</option>							
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->

					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Designation</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='user_designation' name="user_designation">
									<option value=''>Select The Designation</option>
									<option value='Software Developer'>Software Developer</option>
									<option value='Graphic Designer'>Graphic Designer</option>
									<option value='IT Consultant'>IT Consultant</option>
									<option value='System Analyst'>System Analyst</option>							
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Branch</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='user_branch' name="user_branch">
									<option value=''>Select The Branch</option>
									<option value='Pallikaranai'>Pallikaranai</option>
									<option value='Pallikaranai'>Medavakkam</option>								
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Gender</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='user_gender' name="user_gender">
									<option value=''>Select The Gender</option>
									<option value='Male'>Male</option>
									<option value='Female'>Female</option>								
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Worker Type</div>
						</div>
						<div class="feild_action">
							<div class="new_select">
								<select id='worker_type' name="worker_type">
									<option value=''>Select The Type</option>
									<option value='Staff'>Staff</option>
									<option value='Doctor'>Vendor</option>
									<option value='Doctor'>Doctor</option>								
								</select>
							</div>
						</div>
					</div><!-- input_box loop Ends-->
					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_head">
							<div class="head">Choose Profile Image</div>
						</div>
						<div class="feild_action">
							<input type="file" name="user_image" id='user_image' />
							<div class="file_out">
								<input type='hidden' id='file_image' value="<?php echo $file_name; ?>" />
							</div>
						</div>
					</div><!-- input_box loop Ends-->

					<div class="input_box"><!-- input_box loop Start-->
						<div class="feild_action">
							<input type="button" name='create_button' value="Create" onclick="usercreate()" />
							<div class="spinner_one"><img src="images/loading_01.gif"></div>
						</div>
					</div><!-- input_box loop Ends-->

				</div>
			</form>
		</div>
	</div>
	
</body>
</html>