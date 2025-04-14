<?php
	include "dbconn.php";
	session_start();
	// $er =  '61b4a64be663682e8cb037d9719ad8cd';
	// $ers = '786';
	// if(md5($ers) == $er){
	// 	echo 'ok';
	// }
	$emp_id = isset($_REQUEST['empid'])?$_REQUEST['empid']:"";
	$identity = isset($_REQUEST['identity'])?$_REQUEST['identity']:"";
	$identity_crp = md5($identity);
	$submit_login = isset($_REQUEST['signIn'])?$_REQUEST['signIn']:"";

	if($submit_login == 'Sign In'){		
		$login_sql = "SELECT * from login where employee_id = '$emp_id' and password = '$identity_crp'";
		$login_query = $conn->query($login_sql);
		$num_rows = $login_query->num_rows;
		if($num_rows == 1){
			$login_result = $login_query->fetch_assoc();
			$_SESSION['user_id'] = $login_result['user_id'];
			$_SESSION['role_ids'] = $login_result['role_level'];
			header("Location:dashboard.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Techshuttle | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="container">
	<div class="login_con">
		<div class="login_center">
			<div class="login">
				<div class="login_box_left">
					<div class="images">
						<img src="images/slider/image.jpg"/>
					</div>
				</div>
				<div class="login_box_right">
					<div class="login_column_center">
						<div class="login_col">
							<div class="image">
								<div class="img_center">
									<img src="images/logo/techshuttle.webp">
								</div>								
							</div>
							<div class="img_txt">
								<div class="txt">
									Admin Portal
								</div>
							</div>
							<div class="sign_view"><!-- sign_view starts -->
								<div class="form_feild"><!-- form_feild starts -->
									<div class="form_center">
										<form class="login_feild" method="post">
											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-user" aria-hidden="true"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="empid" name="empid" class="input" type="text" placeholder=" " value="TS100002" />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Employee Id</div>
											     </div>
											</div>											

											<div class="feild">
												<!-- <input id="mobile_number" name="mobile_number" type="text" required="required" />
	      										<div class="feild_set">Username</div> -->
	      										<div class="feild_image">
	      											<i class="fa fa-phone"></i>
	      										</div>
	      										<div class="feild_box">
											        <input id="identity" name="identity" class="input" type="password" placeholder=" " value="YaAllah_786" />
											        <span class="focus-input"></span>
											         <!-- <div class="cut"></div> -->
											        <div class="placeholder">Password</div>
											     </div>
											</div>

											<div class="feild_check">
	      										<div class="feild_image_c">
	      											<div class="squaredThree">
												      <input type="checkbox" value="None" id="sign_agree" name="sign_agree" />
												      <label for="sign_agree"></label>
												    </div>
	      										</div>
	      										<div class="feild_box">
											       <p> By signing up, I agree to the Privacy Policy, Terms and Conditions of Techshuttle
											       </p>
											     </div>
											</div>
											

											<div class="feild_button">
	      										
	      										<div class="feild_box">

											       <div class="feild_b_center"> 
											       		<input  class="custom-btn btn-5" type="submit" value="Sign In" name="signIn" />
											       		<div class="btn">
											       			<div class="btn_inner"></div>
											       		</div>
											       	</div>
											        <!-- <span class="focus-input"></span> -->
											         <!-- <div class="cut"></div> -->
											        <!-- <div class="placeholder">Mobile Number</div> -->
											     </div>
											</div>
											<div class="sign_info">
											</div>
										</form>
									</div>
								</div><!-- form_feild Ends -->
							</div><!-- sign_view Ends -->
							<div class="social_icon"><!--social_icon Starts -->
								<ul>
									<li>
										<a href="">
											<img src="images/icons/facebook.png">
										</a>
									</li>
									<li>
										<a href="">
											<img src="images/icons/insta.png">
										</a>
									</li>
									<li>
										<a href="">
											<img src="images/icons/twitter.png">
										</a>
									</li>
									<li>
										<a href="">
											<img src="images/icons/whatsapp.png">
										</a>
									</li>
									<li>
										<a href="">
											<img src="images/icons/youtube.png">
										</a>
									</li>
								</ul>
							</div><!--social_icon Ends -->
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>