<div class="header_center"><!--header_center Starts -->
    <div class="header"><!--header Starts -->
        <div class='logo_search'><!--logo_search Starts -->
            <div class='logo'><!--logo Starts -->
                <img src='images/logo_01.png'/>
            </div><!--logo Ends -->
            <div class='cate_m'><!--cate_m Starts -->
                <?php include "menu.php"; ?>
            </div><!--cate_m Ends -->
            <div class='search'>
                <div class='s_bar'>
                    <div class='search_box'>
                        <input type='text' placeholder="What do you want to learn?"/>
                    </div>
                    <div class='button'>
                        <button class="search_submit" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class='login'>
<?php
//$flag = 0;
    if($user_session == ""){
?>
                <div class="login_b">
                    <div class='login_tabs'>
                        <div class="image">
                            <i class='fas fa-user-alt'></i>
                        </div>
                        <div class="name">
                            Login
                        </div>
                    </div>
                </div>
<?php
    }  
    if($user_session != ""){

?>

                <div class="login_b">
                    <ul>
                        <li class="login_list"><span class='head_ellipsis'><i class='fas fa-user-alt'></i><?php echo $user_name; ?></span>
                            <div class='kmh_headbar_sublist'><!--fz_headbar_sublist Starts-->
                                <ul>                                
                                    <li><a href='students_portal.php'>Dashboard</a></li>
                                    <li><a class='last' href='ajax/portal/sign_off.php'>Log Out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
    }  
?>
            </div>

            <div class='enquiry_form'><!--enquiry_form Starts -->
                <div class='common_form'><!--inq_con Starts -->
                        <div class='close_button'><i class="fa fa-close"></i></div>
                        <div class='feild_head'>
                            <div class='head'>Book online class</div>
                        </div>
                        <div class='input_box'><!--input_box Starts -->
                            <form class='enquiries'>
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
                                                <select  id='c_c' name='c_c' onchange='getPhoneCode()'>
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
                                        <input type='button' value="Request a demo" onclick='contact_form("general","","")' class='ignoreThisClass' />
                                        <input type='hidden' id='type' name='type'  />
                                        <input type='hidden' id='course_name' name='course_name'  />
                                        <input type='hidden' id='course_type' name='course_type'  />
                                    </div>
                                </div>
                            </form>
                        </div><!--input_box Ends -->
                    </div>  <!--inq_con Ends -->
            </div><!--enquiry_form Ends -->
        </div><!--logo_search Ends -->
    </div><!--header Ends -->
</div><!--header_center Ends -->
<link rel="stylesheet" href="css/form/common_form.css"/>
<script src='js/jquery.validate.js'></script>
<script src='js/additional-methods.min.js'></script>
<script src='js/tech_valid.js'></script>