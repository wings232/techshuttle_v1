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
        $categories_group = $selectDepartCList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div>


                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore SAP
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'3,28','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->


                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore Workday
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'36,38','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->



                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore AI & Machine Learning
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'63,64','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->



                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore Cloud Computing
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'76','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->


                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore Blockchain
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'82,83','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->


                <div class="course_t"><!--course_t Starts -->
                    <div class="course_heads"><!--course_heads Starts -->
                        <div class="pop_course">
                            <div class="pop_title">
                                <div class="title">Popular Courses</div>
                            </div>
                            <div class="pop_head">
                                Explore Data Science
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
	         
    $selectByLevelThree= selectByLevelThree("tbl_navigation_details",'96','courses',"Active");
    $selectByLevelThree_json = json_decode($selectByLevelThree, true);
    //print_r($accopany_filter_List_json);
    $selectByLevelThree_json_count = isset($selectByLevelThreejson['selectByLevelThree_count'])?$selectByLevelThree_json['selectByLevelThree_count']:"";
?> 
                        <ul>
<?php 
    foreach ($selectByLevelThree_json['selectByLevelThree_details'] as $selectByLevelThreeList) {
        $course_thumb_image  = $selectByLevelThreeList["course_thumb_image"];
        $menu_name = $selectByLevelThreeList["menu_name"];
        $menu_slug = $selectByLevelThreeList["menu_slug"];
        $parent_id = $selectByLevelThreeList["parent_id"];
        $categories_group = $selectByLevelThreeList["categories_group"];
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
                                                <!-- <li>
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
                                                </li> -->
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
                                            <?php  echo $menu_name ?>
                                        </div>
                                        <div class="f_num"><!--f_num Starts -->
                                            <div class="fees_sym"><!--fees_sym Starts -->
                                                <div class="sym">₹</div>
                                            </div><!--fees_sym Ends -->
                                            <div class="fees_num"><!--fees_num Starts -->
<?php
	$price_id_ilt = 0;
	$selectPriceSetup= selectPriceSetup("tbl_price_setup",$parent_id,'ilt','courses','Active');
	$selectPriceSetup_json = json_decode($selectPriceSetup, true);
	//print_r($accopany_filter_List_json);
	$selectPriceSetup_json_count = isset($selectPriceSetup_json['selectPriceSetup_count'])?$selectPriceSetup_json['selectPriceSetup_count']:"";
	if($selectPriceSetup_json_count > 0){  
	  foreach ($selectPriceSetup_json['selectPriceSetup_details'] as $courseDescription) {
	      $base_price  = $courseDescription["base_price"];
	      $price_id_ilt  = $courseDescription["price_id"];
?>	
                                                <div class="num"><?php echo $base_price; ?></div>
<?php
	}
}
?>
                                            </div><!--fees_num Ends -->
                                        </div>
                                       <div class="para">
<?php
	$forCourseProductDescriptionDetails= forCourseProductDescriptionDetails("tbl_product_description",$parent_id,'Overview','courses','Active');
	$forCourseProductDescriptionDetails_json = json_decode($forCourseProductDescriptionDetails, true);
	//print_r($accopany_filter_List_json);
	$forCourseProductDescriptionDetails_json_count = isset($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count'])?$forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_count']:"";
	if($forCourseProductDescriptionDetails_json_count > 0){  
	  foreach ($forCourseProductDescriptionDetails_json['forCourseProductDescriptionDetails_details'] as $courseDescription) {
	      $product_description  = $courseDescription["product_description"];
?>
                                            <p>
                                                <?php echo $product_description; ?>
                                            </p>
<?php
	}
}
?>
                                        </div>
                                        <div class="list_type_con">
                                            <ul>
                                                <!-- <li>
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
                                                </li> -->
                                            </ul>
                                        </div>

                                        <div class="button">
                                            <div class="banner-btn wow fadeup-animation animated" data-wow-duration="0.8s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.5s;">
                                                <a href="<?php echo $categories_groups;?>/<?php echo $menu_slug;?>" class="sec-btn" title="Get Started"><span>Get Started</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li><!-- Course_list loop Ends-->
                            <?php } ?>
                        </ul>

                    </div>
                    

                </div><!--course_t Ends -->



            </div>