<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techshuttle | Home</title>    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" type="text/css" href="css/login/login_portal.css?v1"/>
    <link rel="stylesheet" type="text/css" href="css/login/login_portal_mobile.css?v1"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src='js/jquery.validate.js'></script>
	<script src='js/additional-methods.min.js'></script>
	<script type="text/javascript" src="js/jquery-ui-13/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-13/jquery-ui.css">
</head>
<body>
<div class="container">
    <div class="login_portal">
        <div class="login_image">
            <div class="image">
                <img src="images/portal/portal.jpg"/>
            </div>
            <div class="overlay">

            </div>
        </div>
        <div class="login_form"><!--Login Form Starts-->
            <div class="form_spinner">
                <div class="transaction_spinner">
                    <div class="transaction_center">
                        <img src="images/icons/new_spinner.gif"/>
                    </div>
                </div>
                <div class="transaction_overlay"></div>
            </div>
            <div class="login_container">
                <div class="logo">
                    <div class="images">
                        <div class="logo_cen">
                            <img src="images/logo_01.png">
                        </div>							
                    </div>
                </div>
                <div class="form_head">
                    <div class="form_ajax">
                        <?php  include "ajax/portal/login_page.php"; ?>
                        <?php  //include "ajax/patient_portal/otp_first.php"; ?>
                        <?php  //include "ajax/portal/sign_up.php"; ?>
                        <?php  //include "ajax/patient_portal/card_verify.php"; ?>
                        <?php  //include "ajax/patient_portal/card_otp.php"; ?>
                        
                    </div>
                </div>
            </div>
        </div><!--Login Form Ends-->
        <div class="footer_con">
            <div class="footer_center">
                <div class="footer">
                    <p>Copyrights © 2023 All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="js/login_p.js"></script>