<?php
	function recordsToInsert($tablename,$feilds_to_insert){
		//Insert query started
		// "insert into table(,,) values('name','email')";
	    global $conn;
		$allTableInsertSql = "";
		$allTableInsertSql .="INSERT into ".$tablename;
		$allTableInsertSql .= " (".implode(",", array_keys($feilds_to_insert)).") VALUES";
		$allTableInsertSql .= "('".implode("','", array_values($feilds_to_insert))."')";
		//echo $allTableInsertSql;
		//echo $conn -> real_escape_string($allTableInsertSql);
		//$new_value = str_replace("'","\'", $allTableInsertSql); 
		$allTableInsertQuery = $conn->query($allTableInsertSql);
		if($allTableInsertQuery){
			return true;
		}
	}//Insert query ended

	function update($table_name, $fields, $where_condition){  
		   global $conn;
           $query = '';  
           $condition = '';  
           foreach($fields as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2);  
           
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           
           $querys = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  
           $allTableUpdateQuery = $conn->query($querys);

           if($allTableUpdateQuery)  
           {  
                return true;  
           }  
      }  


    function selectNavigationRecordlevel($table_name,$level_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$navigation_level_sql = "select * from $table_name where level = '$level_id'" ;
		$navigation_level_query = $conn->query($navigation_level_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navigation_level_row = $navigation_level_query->num_rows;
		if($navigation_level_row != 0){
			while($navigation_level_result = $navigation_level_query->fetch_assoc()) { //loop the rows returned from db
	        	$navigationlevelArr[] = $navigation_level_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['navigation_level_count'] = $navigation_level_row;
			$data['navigation_level_details'] = $navigationlevelArr;
			return json_encode($data);
		}
	}

	function selectNavigationRecordMultilevel($table_name,$level_id,$cate_ids){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$navigation_levelmul_sql = "select * from $table_name where level='$level_id' and sub_id='$cate_ids'" ;
		$navigation_levelmul_query = $conn->query($navigation_levelmul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navigation_levelmul_row = $navigation_levelmul_query->num_rows;
		if($navigation_levelmul_row != 0){
			while($navigation_levelmul_result = $navigation_levelmul_query->fetch_assoc()) { //loop the rows returned from db
	        	$navigationlevelMulArr[] = $navigation_levelmul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['navigation_levelmul_count'] = $navigation_levelmul_row;
			$data['navigation_levelmul_details'] = $navigationlevelMulArr;
			return json_encode($data);
		}
	}

	function selectNavDetailsCheck($table_name,$menu_name,$menu_slug,$menu_level,$sub_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectNavDetailsCheck_sql = "select * from $table_name where menu_name='$menu_name' and menu_slug='$menu_slug' and level='$menu_level' and sub_id ='$sub_id'" ;
		$selectNavDetailsCheck_query = $conn->query($selectNavDetailsCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectNavDetailsCheck_row = $selectNavDetailsCheck_query->num_rows;
		if($selectNavDetailsCheck_row != 0){
			while($selectNavDetailsCheck_result = $selectNavDetailsCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectNavDetailsCheckArr[] = $selectNavDetailsCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectNavDetailsCheck_count'] = $selectNavDetailsCheck_row;
			$data['selectNavDetailsCheck_details'] = $selectNavDetailsCheckArr;
			return json_encode($data);
		}
	}

	function selectNaviSingleRecord($table_name,$nav_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$navi_single_sql = "select * from $table_name where menu_id = '$nav_id'" ;
		$navi_single_query = $conn->query($navi_single_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navi_single_row = $navi_single_query->num_rows;
		if($navi_single_row != 0){
			while($navi_single_result = $navi_single_query->fetch_assoc()) { //loop the rows returned from db
	        	$navi_SingleArr[] = $navi_single_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['naviSingle_count'] = $navi_single_row;
			$data['naviSingle_details'] = $navi_SingleArr;
			return json_encode($data);
		}
	}

	function selectCategoriesGroupRecord($table_name,$categories_name,$categories_type){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$categories_group_sql = "select * from $table_name where categories_group_name='$categories_name' and categories_type='$categories_type'" ;
		$categories_group_query = $conn->query($categories_group_sql);
		//return $login_result = $login_query->fetch_assoc();
		$categories_group_row = $categories_group_query->num_rows;
		if($categories_group_row != 0){
			while($categories_group_result = $categories_group_query->fetch_assoc()) { //loop the rows returned from db
	        	$categories_groupMulArr[] = $categories_group_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['categories_group_count'] = $categories_group_row;
			$data['categories_group_details'] = $categories_groupMulArr;
			return json_encode($data);
		}
	}

	function selectCategoriesMainGroupType($table_name,$column_name){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $selectCategoriesMainGroupType_sql = "SELECT DISTINCT($column_name) FROM $table_name" ;
		$selectCategoriesMainGroupType_query = $conn->query($selectCategoriesMainGroupType_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCategoriesMainGroupType_row = $selectCategoriesMainGroupType_query->num_rows;
		if($selectCategoriesMainGroupType_row != 0){
			while($selectCategoriesMainGroupType_result = $selectCategoriesMainGroupType_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCategoriesMainGroupTypeArr[] = $selectCategoriesMainGroupType_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCategoriesMainGroupType_count'] = $selectCategoriesMainGroupType_row;
			$data['selectCategoriesMainGroupType_details'] = $selectCategoriesMainGroupTypeArr;
			return json_encode($data);
		}
	}


	function selectCategoriesGroupMulRecord($table_name,$cate_type){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$categories_groupMul_sql = "select * from $table_name where categories_type = '$cate_type'" ;
		$categories_groupMul_query = $conn->query($categories_groupMul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$categories_groupMul_row = $categories_groupMul_query->num_rows;
		if($categories_groupMul_row != 0){
			while($categories_groupMul_result = $categories_groupMul_query->fetch_assoc()) { //loop the rows returned from db
	        	$categories_groupMultiArr[] = $categories_groupMul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['categories_groupMul_count'] = $categories_groupMul_row;
			$data['categories_groupMul_details'] = $categories_groupMultiArr;
			return json_encode($data);
		}
	}

	function selectRangeGroupMulsRecord($table_name){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$range_groupMul_sql = "select * from $table_name" ;
		$range_groupMul_query = $conn->query($range_groupMul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$range_groupMul_row = $range_groupMul_query->num_rows;
		if($range_groupMul_row != 0){
			while($range_groupMul_result = $range_groupMul_query->fetch_assoc()) { //loop the rows returned from db
	        	$range_groupMulsArr[] = $range_groupMul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['range_groupMul_count'] = $range_groupMul_row;
			$data['range_groupMul_details'] = $range_groupMulsArr;
			return json_encode($data);
		}
	}

	function selectRangeGroupRecord($table_name,$range_name,$range_type){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $range_group_sql = "select * from $table_name where range_name='$range_name' and range_type='$range_type'" ;
		$range_group_query = $conn->query($range_group_sql);
		//return $login_result = $login_query->fetch_assoc();
		$range_group_row = $range_group_query->num_rows;
		if($range_group_row != 0){
			while($range_group_result = $range_group_query->fetch_assoc()) { //loop the rows returned from db
	        	$range_groupMulArr[] = $range_group_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['range_group_count'] = $range_group_row;
			$data['range_group_details'] = $range_groupMulArr;
			return json_encode($data);
		}
	}

	// need to check and delete
	function selectRangeGroupMulRecord($table_name,$cate_type){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectRangeGroupMulRecord_sql = "select * from $table_name where range_type = '$cate_type'" ;
		$selectRangeGroupMulRecord_query = $conn->query($selectRangeGroupMulRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectRangeGroupMulRecord_row = $selectRangeGroupMulRecord_query->num_rows;
		if($selectRangeGroupMulRecord_row != 0){
			while($selectRangeGroupMulRecord_result = $selectRangeGroupMulRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectRangeGroupMulRecordtiArr[] = $selectRangeGroupMulRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectRangeGroupMulRecord_count'] = $selectRangeGroupMulRecord_row;
			$data['selectRangeGroupMulRecord_details'] = $selectRangeGroupMulRecordtiArr;
			return json_encode($data);
		}
	}



	function selectCategoriesGroupMulsRecord($table_name){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$categories_groupMul_sql = "select * from $table_name" ;
		$categories_groupMul_query = $conn->query($categories_groupMul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$categories_groupMul_row = $categories_groupMul_query->num_rows;
		if($categories_groupMul_row != 0){
			while($categories_groupMul_result = $categories_groupMul_query->fetch_assoc()) { //loop the rows returned from db
	        	$categories_groupMulsArr[] = $categories_groupMul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['categories_groupMul_count'] = $categories_groupMul_row;
			$data['categories_groupMul_details'] = $categories_groupMulsArr;
			return json_encode($data);
		}
	}

	function selectCategoriesRecordMultilevel($table_name,$level_id,$cate_ids){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$categories_levelmul_sql = "select * from $table_name where level='$level_id' and sub_id='$cate_ids'" ;
		$categories_levelmul_query = $conn->query($categories_levelmul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$categories_levelmul_row = $categories_levelmul_query->num_rows;
		if($categories_levelmul_row != 0){
			while($categories_levelmul_result = $categories_levelmul_query->fetch_assoc()) { //loop the rows returned from db
	        	$categorieslevelMulArr[] = $categories_levelmul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['categories_levelmul_count'] = $categories_levelmul_row;
			$data['categories_levelmul_details'] = $categorieslevelMulArr;
			return json_encode($data);
		}
	}

	function selectNavigationSetuplevel($table_name,$nav_level,$nav_cate,$nav_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$NavigationSetuplevel_sql = "SELECT * FROM $table_name WHERE `level` = '$nav_level' and `categories_group`='$nav_cate' and cate_status ='$nav_status'" ;
		$NavigationSetuplevel_query = $conn->query($NavigationSetuplevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		$NavigationSetuplevel_row = $NavigationSetuplevel_query->num_rows;
		if($NavigationSetuplevel_row != 0){
			while($NavigationSetuplevel_result = $NavigationSetuplevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$NavigationSetuplevelArr[] = $NavigationSetuplevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['NavigationSetuplevel_count'] = $NavigationSetuplevel_row;
			$data['NavigationSetuplevel_details'] = $NavigationSetuplevelArr;
			return json_encode($data);
		}
	}

	function selectPriceSetup($table_name,$primary_id,$price_type,$categories_group,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectPriceSetup_sql = "select * from $table_name where product_primary_id = '$primary_id' and price_type='$price_type' and categories_group = '$categories_group' and status = '$status'" ;
		$selectPriceSetup_query = $conn->query($selectPriceSetup_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectPriceSetup_row = $selectPriceSetup_query->num_rows;
		if($selectPriceSetup_row != 0){
			while($selectPriceSetup_result = $selectPriceSetup_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectPriceSetupArr[] = $selectPriceSetup_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectPriceSetup_count'] = $selectPriceSetup_row;
			$data['selectPriceSetup_details'] = $selectPriceSetupArr;
			return json_encode($data);
		}
	}

	function selectNavigationSetuplevelId($table_name,$nav_level,$nav_cate,$nav_status,$menu_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$NavigationSetuplevel_sql = "SELECT * FROM $table_name WHERE `level` = '$nav_level' and `categories_group`='$nav_cate' and cate_status ='$nav_status' and sub_id ='$menu_id' ORDER BY priority ASC" ;
		$NavigationSetuplevel_query = $conn->query($NavigationSetuplevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		$NavigationSetuplevel_row = $NavigationSetuplevel_query->num_rows;
		if($NavigationSetuplevel_row != 0){
			while($NavigationSetuplevel_result = $NavigationSetuplevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$NavigationSetuplevelArr[] = $NavigationSetuplevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['NavigationSetuplevel_count'] = $NavigationSetuplevel_row;
			$data['NavigationSetuplevel_details'] = $NavigationSetuplevelArr;
			return json_encode($data);
		}
	}

	function selectSingleRecordFromNav($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $navSingleRecord_sql = "SELECT * FROM $table_name WHERE `parent_id` = '$parent_number' " ;
		$navSingleRecord_query = $conn->query($navSingleRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navSingleRecord_row = $navSingleRecord_query->num_rows;
		if($navSingleRecord_row != 0){
			while($navSingleRecord_result = $navSingleRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$navSingleRecordArr[] = $navSingleRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['navSingleRecord_count'] = $navSingleRecord_row;
			$data['navSingleRecord_details'] = $navSingleRecordArr;
			return json_encode($data);
		}
	}

	function selectSingleRecordFromNavDet($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$navSingleRecordDet_sql = "SELECT * FROM $table_name WHERE `nav_id` = '$parent_number' " ;
		$navSingleRecordDet_query = $conn->query($navSingleRecordDet_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navSingleRecordDet_row = $navSingleRecordDet_query->num_rows;
		if($navSingleRecordDet_row != 0){
			while($navSingleRecordDet_result = $navSingleRecordDet_query->fetch_assoc()) { //loop the rows returned from db
	        	$navSingleRecordDetArr[] = $navSingleRecordDet_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['navSingleRecordDet_count'] = $navSingleRecordDet_row;
			$data['navSingleRecordDet_details'] = $navSingleRecordDetArr;
			return json_encode($data);
		}
	}


	/*Approval Query Starts*/
	//status IN ('success','approve','reject')

	function selectMultipleRecordFromNavStatus($table_name,$navStatus,$cate_group){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $navMultipleRecordStatus_sql = "SELECT * FROM $table_name where status IN ($navStatus) and categories_group='$cate_group'" ;
		$navMultipleRecordStatus_query = $conn->query($navMultipleRecordStatus_sql);
		//return $login_result = $login_query->fetch_assoc();
		$navMultipleRecordStatus_row = $navMultipleRecordStatus_query->num_rows;
		if($navMultipleRecordStatus_row != 0){
			while($navMultipleRecordStatus_result = $navMultipleRecordStatus_query->fetch_assoc()) { //loop the rows returned from db
	        	$navMultipleRecordStatusArr[] = $navMultipleRecordStatus_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['navMultipleRecordStatus_count'] = $navMultipleRecordStatus_row;
			$data['navMultipleRecordStatus_details'] = $navMultipleRecordStatusArr;
			return json_encode($data);
		}
	}

	function selectCatebasedRecord($table_name,$cate_group){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $selectCatebasedRecord_sql = "SELECT * FROM $table_name WHERE categories_group ='$cate_group'" ;
		$selectCatebasedRecord_query = $conn->query($selectCatebasedRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCatebasedRecord_row = $selectCatebasedRecord_query->num_rows;
		if($selectCatebasedRecord_row != 0){
			while($selectCatebasedRecord_result = $selectCatebasedRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCatebasedRecordArr[] = $selectCatebasedRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCatebasedRecord_count'] = $selectCatebasedRecord_row;
			$data['selectCatebasedRecord_details'] = $selectCatebasedRecordArr;
			return json_encode($data);
		}
	}

	/*Approval Query Ends*/

	/*Course fee check starts*/
	function selectCourseFeeCheck($table_name,$parent_number,$price_type,$cate_group){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseFeeCheck_sql = "SELECT * FROM $table_name WHERE `product_primary_id` = '$parent_number' and price_type='$price_type' and categories_group='$cate_group'" ;
		$selectCourseFeeCheck_query = $conn->query($selectCourseFeeCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseFeeCheck_row = $selectCourseFeeCheck_query->num_rows;
		if($selectCourseFeeCheck_row != 0){
			while($selectCourseFeeCheck_result = $selectCourseFeeCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseFeeCheckArr[] = $selectCourseFeeCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseFeeCheck_count'] = $selectCourseFeeCheck_row;
			$data['selectCourseFeeCheck_details'] = $selectCourseFeeCheckArr;
			return json_encode($data);
		}
	}



	/*Course fee check ends*/


	/*Course fees Update Starts*/
	function selectCourseFeeRecordDet($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseFeeRecordDet_sql = "SELECT * FROM $table_name WHERE `price_id` = '$parent_number' " ;
		$selectCourseFeeRecordDet_query = $conn->query($selectCourseFeeRecordDet_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseFeeRecordDet_row = $selectCourseFeeRecordDet_query->num_rows;
		if($selectCourseFeeRecordDet_row != 0){
			while($selectCourseFeeRecordDet_result = $selectCourseFeeRecordDet_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseFeeRecordDetArr[] = $selectCourseFeeRecordDet_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseFeeRecordDet_count'] = $selectCourseFeeRecordDet_row;
			$data['selectCourseFeeRecordDet_details'] = $selectCourseFeeRecordDetArr;
			return json_encode($data);
		}
	}
	/*Course fees Update Ends*/


	/*Course batch check starts*/
	function selectCourseBatchCheck($table_name,$batch_name,$batch_type,$batch_session,$course_level,$mode_of_training){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCoursebatchCheck_sql = "SELECT * FROM $table_name WHERE `batch_name` = '$batch_name' and batch_type='$batch_type' and batch_session='$batch_session' and course_level='$course_level' and mode_of_training='$mode_of_training'" ;
		$selectCoursebatchCheck_query = $conn->query($selectCoursebatchCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCoursebatchCheck_row = $selectCoursebatchCheck_query->num_rows;
		if($selectCoursebatchCheck_row != 0){
			while($selectCoursebatchCheck_result = $selectCoursebatchCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCoursebatchCheckArr[] = $selectCoursebatchCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCoursebatchCheck_count'] = $selectCoursebatchCheck_row;
			$data['selectCoursebatchCheck_details'] = $selectCoursebatchCheckArr;
			return json_encode($data);
		}
	}

	/*Course fees Update Starts*/
	function selectCoursebatchRecordDet($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCoursebatchRecordDet_sql = "SELECT * FROM $table_name WHERE `batch_id` = '$parent_number'" ;
		$selectCoursebatchRecordDet_query = $conn->query($selectCoursebatchRecordDet_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCoursebatchRecordDet_row = $selectCoursebatchRecordDet_query->num_rows;
		if($selectCoursebatchRecordDet_row != 0){
			while($selectCoursebatchRecordDet_result = $selectCoursebatchRecordDet_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCoursebatchRecordDetArr[] = $selectCoursebatchRecordDet_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCoursebatchRecordDet_count'] = $selectCoursebatchRecordDet_row;
			$data['selectCoursebatchRecordDet_details'] = $selectCoursebatchRecordDetArr;
			return json_encode($data);
		}
	}
	/*Course fees Update Ends*/

	function selectCatebasedBatchRecord($table_name,$cate_group){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCatebasedBatchRecord_sql = "SELECT * FROM $table_name WHERE post_type ='$cate_group'" ;
		$selectCatebasedBatchRecord_query = $conn->query($selectCatebasedBatchRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCatebasedBatchRecord_row = $selectCatebasedBatchRecord_query->num_rows;
		if($selectCatebasedBatchRecord_row != 0){
			while($selectCatebasedBatchRecord_result = $selectCatebasedBatchRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCatebasedBatchRecordArr[] = $selectCatebasedBatchRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCatebasedBatchRecord_count'] = $selectCatebasedBatchRecord_row;
			$data['selectCatebasedBatchRecord_details'] = $selectCatebasedBatchRecordArr;
			return json_encode($data);
		}
	}

	/*Course fees Update Starts*/
	function selectCourseDescripRecordDet($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseDescripRecordDet_sql = "SELECT * FROM $table_name WHERE `product_id` = '$parent_number' " ;
		$selectCourseDescripRecordDet_query = $conn->query($selectCourseDescripRecordDet_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseDescripRecordDet_row = $selectCourseDescripRecordDet_query->num_rows;
		if($selectCourseDescripRecordDet_row != 0){
			while($selectCourseDescripRecordDet_result = $selectCourseDescripRecordDet_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseDescripRecordDetArr[] = $selectCourseDescripRecordDet_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseDescripRecordDet_count'] = $selectCourseDescripRecordDet_row;
			$data['selectCourseDescripRecordDet_details'] = $selectCourseDescripRecordDetArr;
			return json_encode($data);
		}
	}
	/*Course fees Update Ends*/

	/*Course batch check ends*/

	 function selectListRecordlevel($table_name,$level_id,$product_primary_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectListRecordlevel_sql = "select * from $table_name where level = '$level_id' and product_primary_id = '$product_primary_id'" ;
		$selectListRecordlevel_query = $conn->query($selectListRecordlevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		 $selectListRecordlevel_row = $selectListRecordlevel_query->num_rows;
		if($selectListRecordlevel_row != 0){
			while($selectListRecordlevel_result = $selectListRecordlevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectListRecordlevelArr[] = $selectListRecordlevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectListRecordlevel_count'] = $selectListRecordlevel_row;
			$data['selectListRecordlevel_details'] = $selectListRecordlevelArr;
			return json_encode($data);
		}
	}

	function selectlistRecordMultilevel($table_name,$level_id,$cate_ids){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectlistRecordmul_sql = "select * from $table_name where level='$level_id' and sub_id='$cate_ids'" ;
		$selectlistRecordmul_query = $conn->query($selectlistRecordmul_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectlistRecordmul_row = $selectlistRecordmul_query->num_rows;
		if($selectlistRecordmul_row != 0){
			while($selectlistRecordmul_result = $selectlistRecordmul_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectlistRecordMulArr[] = $selectlistRecordmul_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectlistRecordmul_count'] = $selectlistRecordmul_row;
			$data['selectlistRecordmul_details'] = $selectlistRecordMulArr;
			return json_encode($data);
		}
	}

	function selectCourseListRecordDet($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseListRecordDet_sql = "SELECT * FROM $table_name WHERE `product_list_id` = '$parent_number' " ;
		$selectCourseListRecordDet_query = $conn->query($selectCourseListRecordDet_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseListRecordDet_row = $selectCourseListRecordDet_query->num_rows;
		if($selectCourseListRecordDet_row != 0){
			while($selectCourseListRecordDet_result = $selectCourseListRecordDet_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseListRecordDetArr[] = $selectCourseListRecordDet_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseListRecordDet_count'] = $selectCourseListRecordDet_row;
			$data['selectCourseListRecordDet_details'] = $selectCourseListRecordDetArr;
			return json_encode($data);
		}
	}

	function selectNavigationMulSetuplevel($table_name,$nav_level,$nav_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$NavigationMulSetuplevel_sql = "SELECT * FROM $table_name WHERE `level` = '$nav_level' and cate_status ='$nav_status'" ;
		$NavigationMulSetuplevel_query = $conn->query($NavigationMulSetuplevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		$NavigationMulSetuplevel_row = $NavigationMulSetuplevel_query->num_rows;
		if($NavigationMulSetuplevel_row != 0){
			while($NavigationMulSetuplevel_result = $NavigationMulSetuplevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$NavigationMulSetuplevelArr[] = $NavigationMulSetuplevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['NavigationMulSetuplevel_count'] = $NavigationMulSetuplevel_row;
			$data['NavigationMulSetuplevel_details'] = $NavigationMulSetuplevelArr;
			return json_encode($data);
		}
	}

	function selectNavigationMulSetuplevelId($table_name,$nav_level,$nav_status,$menu_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		 $NavigationMulSetuplevel_sql = "SELECT * FROM $table_name WHERE `level` = '$nav_level' and cate_status ='$nav_status' and sub_id ='$menu_id'" ;
		$NavigationMulSetuplevel_query = $conn->query($NavigationMulSetuplevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		$NavigationMulSetuplevel_row = $NavigationMulSetuplevel_query->num_rows;
		if($NavigationMulSetuplevel_row != 0){
			while($NavigationMulSetuplevel_result = $NavigationMulSetuplevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$NavigationMulSetuplevelArr[] = $NavigationMulSetuplevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['NavigationMulSetuplevel_count'] = $NavigationMulSetuplevel_row;
			$data['NavigationMulSetuplevel_details'] = $NavigationMulSetuplevelArr;
			return json_encode($data);
		}
	}

	function selectBlogSetuplevel($table_name,$nav_cate,$nav_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectBlogSetuplevel_sql = "SELECT * FROM $table_name WHERE  `post_type`='$nav_cate' and status ='$nav_status'" ;
		$selectBlogSetuplevel_query = $conn->query($selectBlogSetuplevel_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectBlogSetuplevel_row = $selectBlogSetuplevel_query->num_rows;
		if($selectBlogSetuplevel_row != 0){
			while($selectBlogSetuplevel_result = $selectBlogSetuplevel_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectBlogSetuplevelArr[] = $selectBlogSetuplevel_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectBlogSetuplevel_count'] = $selectBlogSetuplevel_row;
			$data['selectBlogSetuplevel_details'] = $selectBlogSetuplevelArr;
			return json_encode($data);
		}
	}

	function selectBatchMapRecord($table_name,$batch_primary_id,$course_id,$dateCheck){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $selectBatchMapRecord_sql = "SELECT * FROM $table_name WHERE `batch_id` = '$batch_primary_id' and `product_primary_id` = '$course_id' and `start_date` = date('$dateCheck')" ;
		$selectBatchMapRecord_query = $conn->query($selectBatchMapRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		echo $selectBatchMapRecord_row = $selectBatchMapRecord_query->num_rows;
		if($selectBatchMapRecord_row != 0){
			while($selectBatchMapRecord_result = $selectBatchMapRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectBatchMapRecordArr[] = $selectBatchMapRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectBatchMapRecord_count'] = $selectBatchMapRecord_row;
			$data['selectBatchMapRecord_details'] = $selectBatchMapRecordArr;
			return json_encode($data);
		}
	}

	function selectMappingUpdate($table_name,$parent_number){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectMappingUpdate_sql = "SELECT * FROM $table_name WHERE `batch_mapping_id` = '$parent_number' " ;
		$selectMappingUpdate_query = $conn->query($selectMappingUpdate_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectMappingUpdate_row = $selectMappingUpdate_query->num_rows;
		if($selectMappingUpdate_row != 0){
			while($selectMappingUpdate_result = $selectMappingUpdate_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectMappingUpdateArr[] = $selectMappingUpdate_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectMappingUpdate_count'] = $selectMappingUpdate_row;
			$data['selectMappingUpdate_details'] = $selectMappingUpdateArr;
			return json_encode($data);
		}
	}
	
?>