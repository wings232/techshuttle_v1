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
    <title>Techshuttle | Corporate Connect</title>  
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="images/icons/favicon/favicon.svg" />
    <link rel="shortcut icon" href="images/icons/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="images/icons/favicon/site.webmanifest" />
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/root.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fonts.css"/>    
    <link rel="stylesheet" href="css/animation.css"/> 
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/corporate/corporate.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class='container'> <!--container Starts -->
        <div class='header_con'><!--header_con Starts -->
            <?php include "header.php"; ?>
        </div><!--header_con Ends -->

        <section class="corporate_banner"><!--about_banner Starts -->
            <div class='corporate_center'>
                <div class='corpo_con'>
                    <div class='column'>
                        <div class='banner_left'>
                            <div class='heads'>
                                <div class='head_one'>
                                    Welcome To Techshuttle
                                </div>
                                <div class='head_two'>
                                    Unlocking Corporate Opportunities with
                                </div>
                                <div class='head_three'>
                                    Techshuttle's Corporate Connect
                                </div>
                                <div class='head_four'>
                                    <p>
                                        Techshuttle's Corporate Connect is an innovative, NON-PAID service designed to bridge the gap between Techshuttle students and the corporate world.
                                    </p>
                                </div>
                                <div class="button">
                                    <div class="feild_b">														
                                        <div class="box_feild">
                                            <input type="button" value="Training Options">
                                        </div>
                                        <!-- <div class="box_feild">
                                            <input type="button" value="Request a demo" onclick="enq_form(&quot;course&quot;,&quot;sap-abap&quot;,&quot;demo&quot;)">
                                        </div> -->
                                        <div class="box_feild">
                                            <input type="button" value="Corporate Training" onclick="enq_form(&quot;course&quot;,&quot;sap-abap&quot;,&quot;Corporate Training&quot;)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='banner_right'>
                            <div class="ts_img">
                                <img class='img' decoding="async" src="images/corporate/girl_corpo.png"  alt="ts_thumb" />                                
                                <div class="ts_counter_wrap">
                                    <div class="ts_counter_icon">
                                        <img  src="https://themeholy.com/wordpress/edura/wp-content/uploads/2023/07/hero2-counter-icon1.svg" />                                    
                                    </div>
                                    <div class="details">
                                        <h3 class="ts_counter_number">16500</h3>
                                        <p class="ts_counter_text">Active Students</p>
                                    </div>
                                </div>
                                <div class="ts_counter_wrap hero-counter2">
                                    <div class="ts_counter_icon">
                                        <img decoding="async" src="https://themeholy.com/wordpress/edura/wp-content/uploads/2023/07/hero2-counter-icon2.svg" alt="hero2 counter icon2">                                  
                                    </div>
                                    <div class="details">
                                        <h3 class="ts_counter_number">7500</h3>
                                        <p class="ts_counter_text">Online Video Courses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--about_banner Ends -->
        <div class='counter_con'><!--counter_con Starts -->
            <div class='counter_center'><!--counter_center Starts -->
                <div class='counter'><!--counter Starts -->
                    <ul>
                        <li><!--Loop Starts -->
                            <div class='list_con'>
                                <div class='card_number'>12K+</div>
                                <div class='card_txt'>Happy Clients</div>
                            </div>
                        </li><!--Loop Ends -->
                        <li><!--Loop Starts -->
                            <div class='list_con'>
                                <div class='card_number'>500+</div>
                                <div class='card_txt'>Dedicated Staff</div>
                            </div>
                        </li><!--Loop Ends -->
                        <li><!--Loop Starts -->
                            <div class='list_con'>
                                <div class='card_number'>200+</div>
                                <div class='card_txt'>Trusted Companies</div>
                            </div>
                        </li><!--Loop Ends -->
                        <li><!--Loop Starts -->
                            <div class='list_con'>
                                <div class='card_number'>10k+</div>
                                <div class='card_txt'>Project Completed</div>
                            </div>
                        </li><!--Loop Ends -->
                    </ul>
                </div><!--counter Ends -->
            </div><!--counter_center Ends -->
        </div><!--counter_con Ends -->
        
        <div class='corp_about_con'>
            <div class='corp_ab_center'>
                <div class='corp_ab'>
                    <div class='corp_ab_left'>
                        <div class="about_image_items">
                            <div class="circle_shape">
                                <img src="images/corporate/circle.png" alt="shape-img">
                            </div>
                            <div class="counter_shape">
                                <div class="icon">
                                    <img src="images/corporate/icon_two.svg" alt="icon-img">
                                </div>
                                <div class="content">
                                    <div class='cont_num'><span class="count">3</span>k+</div>
                                    <div class='para'>Full Time Employees</div>
                                </div>
                            </div>
                            <div class="about_image_one" data-wow-delay=".3s">
                                <div class="about_image_two" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                    <img src="images/corporate/04.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='corp_ab_right'> 
                        <div class="about_content"> 
                            <div class="about_c">
                                <div class="about_head">
                                    <div class="head_one">
                                        Know about Techshuttle
                                    </div>
                                    <div class="head_two">
                                        Introduction to Techshuttle's Corporate Connect
                                    </div>
                                    <div class="lines">
                                        <div class="line_one"></div>
                                        <div class="line_two"></div>
                                    </div>
                                </div>
                                <div class="about_para">
                                    <p>
                                        Techshuttle stands at the forefront of educational innovation, offering a range of courses that equip students with the skills needed for success in today's fast-paced corporate world. Beyond imparting knowledge, Techshuttle takes a step further to ensure its students.
                                    </p>                               
                                </div>  
                                
                                <div class="about_one_box"><!--Loop Starts -->
                                    <div class="about_one_box_wrapper">
                                        <div class="about_one_box_icon">
                                            <span aria-hidden="true" class="icon-Presentation">
                                                <i class="fa fa-close"></i>
                                            </span>									
                                        </div>
                                        <h4 class="about_one_box_title">No Hidden Cost</h4>
                                        <p class="about_one_box_text">It is a long established fact that a reader</p>
                                    </div>
                                </div><!--Loop Ends -->

                                <div class="about_one_box"><!--Loop Starts -->
                                    <div class="about_one_box_wrapper">
                                        <div class="about_one_box_icon">
                                            <span aria-hidden="true" class="icon-Presentation">
                                                <i class="fa fa-user-circle-o"></i>
                                            </span>									
                                        </div>
                                        <h4 class="about_one_box_title">Dedicated Team</h4>
                                        <p class="about_one_box_text">It is a long established fact that a reader</p>
                                    </div>
                                </div><!--Loop Ends -->

                                <div class="about_one_box"><!--Loop Starts -->
                                    <div class="about_one_box_wrapper">
                                        <div class="about_one_box_icon">
                                            <span aria-hidden="true" class="icon-Presentation">
                                                <i class="fa fa-phone"></i>
                                            </span>									
                                        </div>
                                        <h4 class="about_one_box_title">24/7 Available</h4>
                                        <p class="about_one_box_text">It is a long established fact that a reader</p>
                                    </div>
                                </div><!--Loop Ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='path_succ_con'>
            <div class='shape'><img src='images/corporate/shape_two.svg'/></div>
            <div class='path_succ_center'>
                <div class='path_succ'>
                    <div class='column_one'>
                        <div class='image'>
                            <img src='images/corporate/image_turn.png'/>
                        </div>
                    </div>
                    <div class='column_two'>
                        <div class='head_one'>
                            The Essence of Corporate Connect
                        </div>
                        <div class='head_two'>
                            "A Unique Pathway To Professional Success"
                        </div>
                        <div class='para'>
                            <p>At its core, Corporate Connect is about opening doors to new opportunities. It s a testament to Techshuttle's commitment to not just educate but also to facilitate the professional journeys of its students.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='j_corp_connect_con'> <!--j_corp_connect_con Starts -->
            <div class='j_corp_con_center'><!--j_corp_con_center Starts -->
                <div class='j_corp_con'><!--j_corp_con Starts -->
                    <div class='j_corp_left'>
                        <div class='head_one'>
                            The Advantages of Joining Corporate Connect
                        </div>
                        <div class='head_para'>
                            <p>Growth and success go hand-in hand. We'll help you with it. Focus to get your dream job.</p>
                        </div>
                        <section class="accordion accordion--radio">
                            <div class="tab">
                                <input type="radio" name="accordion-2" id="rd1">
                                <label for="rd1" class="tab__label">Direct Exposure to Corporate Partners</label>
                                <div class="tab__content">
                                <p>Joining Corporate Connect opens up a world of opportunities, giving students direct exposure to leading corporates</p>
                                </div>
                            </div>
                            <div class="tab">
                                <input type="radio" name="accordion-2" id="rd2">
                                <label for="rd2" class="tab__label">Enhanced Employment Opportunities</label>
                                <div class="tab__content">
                                <p>This service significantly increases the chances of employment, providing a competitive edge in the job market.</p>
                                </div>
                            </div>
                            
                            <!-- <div class="tab">
                                <input type="radio" name="accordion-2" id="rd3">
                                <label for="rd3" class="tab__close">Close open tab &times;</label>
                            </div> -->
                        </section>
                    </div>
                    <div class='j_corp_right'>
                        <div class='images'>
                             <img src='images/corporate/become.png'/>
                        </div>
                    </div>
                </div><!--j_corp_con Ends -->
            </div><!--j_corp_con_center Ends -->
        </div><!--j_corp_connect_con Ends -->

        <div class='tech_prom_con'>
            <div class='tech_prom_center'>
                <div class='tech_prom'>
                    <div class='tech_pro_left'>
                        <div class='image_one'>
                            <img src='images/corporate/07.png'/>
                        </div>
                        <div class='image_two'>
                            <img src='images/corporate/08.jpg'/>
                        </div>
                        <div class='facts'>
                            <div class='fact_one'>
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class='fact_two'>
                                <div class='f_num'>
                                    320+
                                </div>
                                <div class='f_title'>
                                    Awesome Awards
                                </div>
                            </div>
                        </div>

                        <div class='anim_one'>
                            <img src='images/corporate/shape_one.png'/>  
                        </div>

                        <div class='anim_two'>
                            <img src='images/corporate/shape_two.png'/>  
                        </div>

                        <div class='anim_three'>
                            <img src='images/corporate/shape_three.png'/>  
                        </div>

                        <div class='anim_four'>
                            <img src='images/corporate/arrow.png'/>  
                        </div>
                    </div>
                    <div class='tech_pro_right'>
                        <div class='head_one'>
                            The Techshuttle Promise
                        </div>
                        <div class='head_para'>
                            <p>Growth and success go hand-in hand. We'll help you with it. Focus to get your dream job.</p>
                        </div>
                        
                        <section class="accordion accordion--radio">
                            <div class="tab">
                                <input type="radio" name="accordion-2" id="rd3">
                                <label for="rd3" class="tab__label">No Placement Guarantees</label>
                                <div class="tab__content">
                                <p>While Corporate Connect aims to provide students with the best possible platform, Techshuttle maintains transparency by not promising guaranteed placements.</p>
                                </div>
                            </div>
                            <div class="tab">
                                <input type="radio" name="accordion-2" id="rd4">
                                <label for="rd4" class="tab__label">A Commitment to Student Success</label>
                                <div class="tab__content">
                                <p>This initiative reflects Techshuttle's unwavering commitment to the success and welfare of its students, underscoring its role as more than just an educational institution.</p>
                                </div>
                            </div>

                             <div class="tab">
                                <input type="radio" name="accordion-2" id="rd5">
                                <label for="rd5" class="tab__label">Eligibility Criteria for Corporate Connect Exclusive to Techshuttle Students</label>
                                <div class="tab__content">
                                <p>The service is exclusively available to students who have completed a course with Techshuttle, ensuring a tailored experience.</p>
                                </div>
                            </div>
                            
                            <!-- <div class="tab">
                                <input type="radio" name="accordion-2" id="rd3">
                                <label for="rd3" class="tab__close">Close open tab &times;</label>
                            </div> -->
                        </section>
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