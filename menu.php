<div class='overlay'>

</div>      
<div class="menu_bar">
    <i class="fa fa-bars" aria-hidden="true"></i>                     
</div>
<div class='i_con'>
    <div class="icon">
        <svg class="gb_F" focusable="false" viewBox="0 0 24 24"><path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path><image src="https://ssl.gstatic.com/gb/images/bar/al-icon.png" alt="" height="10" width="24" style="border:none;display:none \9"></image></svg>
    </div>
    <div class='c_name'>
        All Courses
    </div>
    <div class='arrow'>
        <i class="fa fa-angle-down"></i>
    </div>
</div>
<div class="tech_menu">                                
    <div class="cate_sub">
        <ul>
<?php
    $menu_id = 1;
	$selectMultipleMenuLevelRecord= selectMultipleMenuLevelRecord("tbl_navigation_setup",2,$menu_id,'Active');
	$selectMultipleMenuLevelRecord_json = json_decode($selectMultipleMenuLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleMenuLevelRecord_json_count = isset($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count'])?$selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count']:"";
	if($selectMultipleMenuLevelRecord_json_count > 0){                     

	  foreach ($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_details'] as $menuMultipleRecords_lists) {
	      $menu_ids  = $menuMultipleRecords_lists["menu_id"];
	      $menu_names = $menuMultipleRecords_lists["menu_name"];
	      $menu_sub_ids = $menuMultipleRecords_lists["sub_id"];
	      $menu_url = $menuMultipleRecords_lists["menu_url"];
	      $menu_slug = $menuMultipleRecords_lists["menu_slug"];
	      $menu_banner = $menuMultipleRecords_lists["banner"];
	      $categories_groups = $menuMultipleRecords_lists["categories_group"];
?>
            <li>
                <?php if($categories_groups != 'courses'){ ?> <a href="<?php echo $menu_url; ?>"><?php echo $menu_names; ?></a> <?php } else { echo $menu_names; }?>
                <!--Menu First Child Starts -->
                <div class="sub_cate">
                    <div class="sub_level">
<?php
	$selectMultipleMenuLevelRecord= selectMultipleMenuLevelRecord("tbl_navigation_setup",3,$menu_ids,'Active');
	$selectMultipleMenuLevelRecord_json = json_decode($selectMultipleMenuLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleMenuLevelRecord_json_count = isset($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count'])?$selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count']:"";
	if($selectMultipleMenuLevelRecord_json_count > 0){                     

	  foreach ($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_details'] as $menuMultipleRecords_lists) {
	      $menu_ids_t  = $menuMultipleRecords_lists["menu_id"];
	      $menu_names_t = $menuMultipleRecords_lists["menu_name"];
	      $menu_sub_ids_t = $menuMultipleRecords_lists["sub_id"];
	      $menu_url_t = $menuMultipleRecords_lists["menu_url"];
	      $menu_slug_t = $menuMultipleRecords_lists["menu_slug"];
	      $menu_banner_t = $menuMultipleRecords_lists["banner"];
	      $categories_groups_t = $menuMultipleRecords_lists["categories_group"];
?>
                        <div class="course_head"><!--course_head Starts-->

                            <div class="head">
                                <a href="<?php echo $menu_url_t;?>?key_one=<?php echo $categories_groups_t;?>&key_two=<?php echo $menu_slug_t;?>">
									<?php echo $menu_names_t;?>
                                </a>
                            </div>
                            <div class="head_list">
                                <ul>
<?php
	$selectMultipleMenuLevelRecord= selectMultipleMenuLevelRecord("tbl_navigation_setup",4,$menu_ids_t,'Active');
	$selectMultipleMenuLevelRecord_json = json_decode($selectMultipleMenuLevelRecord, true);
	//print_r($accopany_filter_List_json);
	$selectMultipleMenuLevelRecord_json_count = isset($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count'])?$selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_count']:"";
	if($selectMultipleMenuLevelRecord_json_count > 0){                     

	  foreach ($selectMultipleMenuLevelRecord_json['menuMultipleLevelRecord_details'] as $menuMultipleRecords_lists) {
	      $menu_ids_f  = $menuMultipleRecords_lists["menu_id"];
	      $menu_names_f = $menuMultipleRecords_lists["menu_name"];
	      $menu_sub_ids_f = $menuMultipleRecords_lists["sub_id"];
	      $menu_url_f = $menuMultipleRecords_lists["menu_url"];
	      $menu_slug_f = $menuMultipleRecords_lists["menu_slug"];
	      $menu_banner_f = $menuMultipleRecords_lists["banner"];
	      $categories_groups_f = $menuMultipleRecords_lists["categories_group"];
?>
                                    <li>
                                        <a href="<?php echo $categories_groups_f;?>/<?php echo $menu_slug_f;?>">
                                            <div class="image">
                                                <img src="images/menu_image/menu_icons/<?php echo $menu_banner_f; ?>" alt="SAP Certification Training">
                                            </div>
                                            <div class="txt">
                                                <?php echo $menu_names_f;?>
                                            </div>
                                        </a>
                                    </li>
<?php
	}
}
?>                                                                
                                </ul>
                            </div>
                        </div><!--course_head Ends-->
<?php
	}
}
?> 
                            
                        <div class="course_img">
                            <img src="images/menu_image/<?php echo $menu_banner; ?>">
                        </div>
                    
                    </div>
                </div>    
            </li><!--Menu First Child Ends -->
<?php
	}
}
?>   
            
        </ul>
    </div>
</div>