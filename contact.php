<?php
	include "dbconn.php";
	include_once "func_templates/func_code.php";
	include "check_ses_list.php";
	//include "constantconfig.php";
?>
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
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/contact/contact.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class='container'> <!--container Starts -->
        <div class='header_con'><!--header_con Starts -->
            <?php include "header.php"; ?>
        </div><!--header_con Ends -->

        <div class='contact_banner'><!--contact_banner Starts -->            
            <div class='cont_bg'><!--cont_bg Starts -->         
                <div class='cont_bg_center'><!--cont_bg_center Starts -->
                    <div class='cont_bg_c'><!--cont_bg_c Starts -->
                        <div class='cont_title'><!--cont_title Starts -->
                            Contact Us
                        </div><!--cont_title Ends -->
                        <div class='breadcumb_menu'><!--breadcumb_menu Starts -->
                            <ul>
                                <li>
                                    <a href='index.php'>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href='#'>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div><!--breadcumb_menu Ends -->
                    </div><!--cont_bg_c Ends -->
                </div><!--cont_bg_center Ends -->
            </div><!--cont_bg Ends -->
        </div><!--contact_banner Ends -->

        <div class='cont_addr_con'><!--contact_banner Starts -->
            <div class='cont_addr_center'>
                <div class='cont_addr'>
                    <div class='addr_bar'><!--addr_bar Starts -->
                        <ul>
                            <li><!--Loop Starts -->
                                <div class='li_con'>
                                    <div class='img'>
                                        <i class="fas fa-map-marked"></i>
                                    </div>
                                    <div class='img_txt'>
                                        <div class='head'>Address</div>
                                        <span>Electronic City </span> 
                                        <span>Bangalore ,Karnataka, INDIA</span> 
                                    </div>
                                </div>
                            </li><!--Loop Ends -->
                            <li><!--Loop Starts -->
                                <div class='li_con'>
                                    <div class='img'>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class='img_txt'>
                                        <div class='head'>Email</div>
                                        <span>info@techshuttle.com</span> 
                                        <span>info@techshuttle.com</span> 
                                    </div>
                                </div>
                            </li><!--Loop Ends -->
                            <li><!--Loop Starts -->
                                <div class='li_con'>
                                    <div class='img'>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class='img_txt'>
                                        <div class='head'>Contact Number</div>
                                        <span>+4733378901 </span> 
                                        <span>+1433378912</span> 
                                    </div>
                                </div>
                            </li><!--Loop Ends -->
                        </ul>
                    </div><!--addr_bar Ends -->

                    <div class='contact_form'>
                        <div class='form_bg'>
                            <div class='img'>
                                <img src='images/banner/cont_form.jpg'/>
                            </div>
                        </div>
                        <div class='enquiry_form_one'><!--enquiry_form Starts -->
                            <div class='common_form_one'><!--inq_con Starts -->
                                    <div class='close_button'><i class="fa fa-close"></i></div>
                                    <div class='feild_head'>
                                        <div class='head'>Get In Touch</div>
                                    </div>
                                    <div class='input_box'><!--input_box Starts -->
                                        <form class='enquiries_form'>
                                            <div class='spinner'>
                                                <img src='images/icons/new_spinner.gif'/>
                                            </div>
                                            <div class='result'>
                                                done
                                            </div>
                                            <div class='feild_b'>
                                                <div class='box_name'>
                                                    Name
                                                </div>
                                                <div class='box_feild'>
                                                    <input type='text' id="name" name='name' placeholder='Name'/>
                                                </div>
                                            </div>
                                            <div class='feild_b'>
                                                <div class='box_name'>
                                                    Email Id
                                                </div>
                                                <div class='box_feild'>
                                                    <input type='email' id="email" name='email' placeholder='Email Id'/>
                                                </div>
                                            </div>
                                            <div class='feild_b'>
                                                <div class='box_name'>
                                                    Mobile
                                                </div>
                                                <div class='box_feild'>
                                                    <div class="cty_code">
                                                        <div class='code'>
            <?php
                $countryCodeLoad= countryCodeLoad("countries");
                $countryCodeLoad_json = json_decode($countryCodeLoad, true);
                //print_r($accopany_filter_List_json);
                $countryCodeLoad_json_count = isset($countryCodeLoad_json['countryCodeLoad_count'])?$countryCodeLoad_json['countryCodeLoad_count']:"";
            ?>
                                                            <select  id='c_cf' name='c_cf' onchange='getPhoneCodeForm()'>
                                                            <option value=''>Code</option>
            <?php
                if($countryCodeLoad_json_count > 0){
                    foreach ($countryCodeLoad_json['countryCodeLoad_details'] as $countryCodeLoad_lists) {
                    $country_code  = $countryCodeLoad_lists["code"];
                    $phone_code  = $countryCodeLoad_lists["phone"];
            ?>
                                                                <option value='<?php echo $phone_code; ?>'><?php echo $country_code; ?></option>
            <?php
            
                    }
                }
            ?>
                                                            </select>
                                                        </div>
                                                        <div class='c_val' id='c_val'></div>
                                                    </div>
                                                    <div class="box">
                                                        <input type='text' id="mobile" name='mobile' placeholder='Mobile No'/>
                                                    </div>														
                                                </div>
                                                
                                            </div>
                                            <div class='feild_b'>
                                                <div class='box_name'>
                                                    Message
                                                </div>
                                                <div class='box_feild'>
                                                    <textarea id="message" name='message' placeholder='Message'></textarea>
                                                </div>
                                            </div>
                                            <div class='feild_b'>														
                                                <div class='box_feild'>
                                                    <input type='button' value="Send Message" onclick='contact_form_open("general","","")' class='ignoreThisClass' />
                                                    <input type='hidden' id='type' name='type'  />
                                                    <input type='hidden' id='course_name' name='course_name'  />
                                                    <input type='hidden' id='course_type' name='course_type'  />
                                                </div>
                                            </div>
                                        </form>
                                    </div><!--input_box Ends -->
                                </div>  <!--inq_con Ends -->
                        </div><!--enquiry_form Ends -->
                    </div>
                </div>
            </div>
        </div>
        
        
       

        

        <div class="footer_con"><!--footer_con Starts -->
            <?php include "footer.php"; ?>  
        </div><!--footer_con Ends -->

    </div><!--container Ends -->
</body>
</html>
<script type="text/javascript" src="js/code.js"></script>
