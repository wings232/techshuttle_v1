<?php
	include "dbconn.php";
	include "check_ses_list.php";

	$login_sql = "select * from login where user_id='$user_session'";
	$login_query = $conn->query($login_sql);
	$login_result = $login_query->fetch_assoc();
	$role_id = $login_result['role_level'];
	$role_user_img = $login_result['user_img'];
	$role_user_full_name = $login_result['userfullname'];
	$role_designation = $login_result['designation'];
	//$role_id = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Techshuttle Dashboard</title>	
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/root.css"/>
	<link rel="stylesheet" href="css/fonts.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="js/jquery-ui-13/jquery-ui.js"></script>
	<link rel="stylesheet" href="js/jquery-ui-13/jquery-ui.css"/>
	<script type="text/javascript" src="js/code.js"></script>
	<script type="text/javascript" src="js/foundation.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script src='js/jquery.validate.js'></script>
    <script src='js/additional-methods.min.js'></script>
	<script src='js/tech_valid.js'></script>
	<script type="text/javascript" src="js/validate_page.js"></script>
	<script type="text/javascript">
		levels_create_center();
	</script>
</head>





<body>
	<div class="container"><!--container Starts -->
		<div class="go_to_top"><!--go_to_top Starts -->
			<div class="scrollup"><!--scrollup Starts -->
				<a href="#top">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
				</a>
			</div><!-- scrollup Ends -->
		</div><!--go_to_top Ends -->
		<div class="dash_leftsidebar"><!--dash_leftsidebar Starts -->
			<div class="techshuttle_logo_l"><!--techshuttle_logo_l Starts -->
				<div class="image"><!--image Starts -->
					<div class="img_center">
						<img src="images/logo_01.png">
					</div>
				</div><!-- image Ends -->
			</div><!-- techshuttle_logo_l Ends -->
			<div class="menu_left"><!--menu_left Starts -->
				<div class="accordion-container">
<?php
	$role_assign_sql = "SELECT * FROM `roles_assign` WHERE `role_id` = '$role_id' and page_level = '1' and  view_premission = 'Yes' and role_id='$role_id' order by page_id";
	$role_assign_query = mysqli_query($conn,$role_assign_sql);
	while($assign_result = mysqli_fetch_array($role_assign_query)){
				$assign_result['role_id'];
				$re = $assign_result['page_id'];
				$menuname = $assign_result['menu_name'];
?>
					<div class="set">

					    <div class='set_one'>
					      <div class="head"><?php echo $menuname; ?></div>
					      <!-- <i class="fa fa-plus" class="plus_dashb"></i> -->
					      <i  class="plus_dashb"></i>
					    </div>
<?php 
	$sqls="select * from roles_assign where page_level='2' and sub_id='$re' and view_premission = 'Yes' and role_id='$role_id'";
	$query_sels=mysqli_query($conn,$sqls);
	while($result_two = mysqli_fetch_assoc($query_sels)){
		$cate_ids = $result_two['page_id'];
		$sub_ids = $result_two['sub_id'];
		$menuNames = $result_two['menu_name'];
		$url_infos = $result_two['menu_url'];
?>
					    <div class="content">
					      <ul>
					      	<li onclick='url_pass("<?php echo $url_infos; ?>?key_one=<?php echo $cate_ids; ?>&key_two=<?php echo $sub_ids; ?>")'><?php echo $menuNames; ?></li>
					      </ul>
					    </div>
<?php } ?>
						   
					</div>
<?php } ?>
				
				</div>
			</div><!-- menu_left Ends -->
		</div><!-- dash_leftsidebar Ends -->

		<div class="dash_rightsidebar"><!--dash_rightsidebar Starts -->
			<div class="menu_nav_right">
				<div class="chat_login">
					<div class="chat_app">
						<ul>
							<li><img src='images/icons/notification.webp'/></li>
							<li><img src='images/icons/other_apps.webp'/></li>
							<li><img src='images/icons/to-do.webp'/></li>
							<li><img src='images/icons/refresh.webp'/></li>
							<li><img src='images/icons/report.webp'/></li>
							<li><img src='images/icons/message.webp'/></li>
							<li><img src='images/icons/group.webp'/></li>
						</ul>
					</div>
					<div class="login_user">
						<div class="login_image">
							<div class="image">
								<img src='images/user_image/<?php echo $role_user_img; ?>'/>
							</div>
							<div class="login_drop">
								<div class="user_image">
									<div class="images">
										<div class="image_u"><center><img src="images/user_image/<?php echo $role_user_img; ?>"></center></div>
									</div>
									<div class="user_name">
										<div class="name">
											<h3><?php echo $role_user_full_name; ?></h3>
										</div>
										<div class="designation">
											<h3><?php echo $role_designation; ?></h3>
										</div>
									</div>
								</div>
								<div class="user_account">
									<ul>
										<li><a href=''>Profile</a></li>
										<li><a href=''>Edit Profile</a></li>
										<li><a href=''>Inbox</a></li>
										<li><a href=''>Message</a></li>
										<li><a href=''>Account Settings</a></li>
										<li><a href='logout.php'>Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard_content">
				
			</div>
		</div><!--dash_rightsidebar Ends -->
	</div><!-- container Ends -->
</body>
</html>

<script type="text/javascript">
	$("a").click(function(e) {
    	var list_id = $(this).attr('href');
    	//alert(list_id)
    	//$(list_id).css({"padding":"75px 0px"});
    	//alert(list_id)
	    	if(list_id != "#top"){
	    		if (window.matchMedia('(min-width: 768px)').matches) {
		        $('html, body').animate({
		            scrollTop: $(list_id).offset().top
		        }, 1000);
		    }else{
		    	$('html, body').animate({
		            scrollTop: $(list_id).offset().top 
		        }, 1200);
		        //$(".header_con .header_center .header .logo_nav .nav_menu ul").hide();
		    }
    	}else{
    		 $('html, body').animate({
		            scrollTop: 0
		     }, 1000);
    	}
    	
       
        //$(".header_con .header_center .header .logo_nav .nav_menu ul").css({"display":"none"});	
        e.preventDefault();
    });

    $(window).scroll(function() {
			if ($(this).scrollTop() > 300) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});
</script>