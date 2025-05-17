<div class="course_t_center">
                <div class="course_t">
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore Top
                                <span>Courses 
                                    <img  src="images/label/course_head_line.svg" alt="" />
                                </span>
                            </div>
                        </div>
                        <div class="pop_cate">
                            <div class="cate_list">
                                <ul>
                                    <li class="tactive">All Courses<span><img  src="images/label/line_tab.png" alt="" /></span></li>
                                    <!-- <li>Trending<span><img  src="images/label/course_tab.png" alt="" /></span></li>
                                    <li>Popularity<span><img  src="images/label/course_tab.png" alt="" /></span></li>
                                    <li>Featured<span><img  src="images/label/course_tab.png" alt="" /></span></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>  <!--course_heads Ends -->
                    
                    <div class="course_list">
<?php  
	         
    $selectDepartC= selectDepartC("tbl_navigation_details",4,'courses',"Active");
    $selectDepartC_json = json_decode($selectDepartC, true);
    //print_r($accopany_filter_List_json);
    $selectDepartC_json_count = isset($selectDepartC_json['selectDepartC_count'])?$selectDepartC_json['selectDepartC_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectDepartC_json['selectDepartC_details'] as $selectDepartCList) {
        $course_thumb_image  = $selectDepartCList["course_thumb_image"];
        $menu_name = $selectDepartCList["menu_name"];
        $menu_slug = $selectDepartCList["menu_slug"];
        $parent_id = $selectDepartCList["parent_id"];
?>
                            <li><!-- Course_list loop starts-->
                                <div class="list_con">
                                    <div class="image">
                                        <img src="images/course/thumb/<?php  echo $course_thumb_image ?>"/>
                                    </div>
                                    <div class="img_cont">
                                        <div class="depart">
                                            <span>
                                               <div class='cor'><a href=""><?php  echo $menu_name ?></a></div>
                                            </span>
                                        </div>
                                        <div class="head">
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <!--<div class="para">
                                            <p>
                                                Education is a vital process that fosters personal growth, societal development, and intellectual advancement. It equips individuals with the knowledge, skills, and critical thinking.
                                            </p>
                                        </div>-->
                                        <div class="list_type_con">
                                            <ul>
                                                <li>
                                                    <div class="list_type">
                                                        <div class="images">
                                                            <i class="fa-solid fa-book-open"></i>
                                                        </div>
                                                        <div class="image_txt">
                                                            Lessons
                                                        </div>
                                                    </div> 
                                                </li>
                                                <li>
                                                    <div class="list_type">
                                                        <div class="images">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                        <div class="image_txt">
                                                            80 students
                                                        </div>
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="list_hover">
                                    <div class="img_cont">
                                        <div class="depart">
                                            <span>
                                               <div class='cor'><a href="">SAP</a></div>
                                            </span>
                                        </div>
                                        <div class="head">
                                            Learn With Advance Web Design (UX/UI) Course
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
                                                <div class="num">30000</div>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
                                            <p>
                                                Education is a vital process that fosters personal growth, societal development, and intellectual advancement. It equips individuals with the knowledge, skills, and critical thinking.
                                            </p>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <li>
                                                    <div class="list_type">
                                                        <div class="images">
                                                            <i class="fa-solid fa-book-open"></i>
                                                        </div>
                                                        <div class="image_txt">
                                                            Lessons
                                                        </div>
                                                    </div> 
                                                </li>
                                                <li>
                                                    <div class="list_type">
                                                        <div class="images">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                        <div class="image_txt">
                                                            80 students
                                                        </div>
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="contact-us.html" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div>
            </div>