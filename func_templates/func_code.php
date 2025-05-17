<?php
	//select column_name,data_type from information_schema.columns where table_schema = 'drkmh_drkmh' and table_name = 'tbl_navigation_details'
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

	// New addition Added 

	function selectCourseName($table_name,$course_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseName_sql = "SELECT menu_name from $table_name where menu_id ='$course_id' " ;
		$selectCourseName_query = $conn->query($selectCourseName_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseName_row = $selectCourseName_query->num_rows;
		$data = array();		
		if($selectCourseName_row != 0){
			while($selectCourseName_result = $selectCourseName_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseNameArr[] = $selectCourseName_result; //add row to array
	    	}	   
			$data['selectCourseName_details'] = $selectCourseNameArr;
		}
		$data['selectCourseName_count'] = $selectCourseName_row;
		return json_encode($data);
	}

	function selectMultipleMenuRecord($table_name,$menu_levels,$menu_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$menuMultipleRecord_sql = "SELECT * FROM $table_name where level ='$menu_levels' and cate_status = '$menu_status' ORDER BY priority ASC" ;
		$menuMultipleRecord_query = $conn->query($menuMultipleRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$menuMultipleRecord_row = $menuMultipleRecord_query->num_rows;
		if($menuMultipleRecord_row != 0){
			while($menuMultipleRecord_result = $menuMultipleRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$menuMultipleRecordArr[] = $menuMultipleRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['menuMultipleRecord_count'] = $menuMultipleRecord_row;
			$data['menuMultipleRecord_details'] = $menuMultipleRecordArr;
			return json_encode($data);
		}
	}

	function selectMultipleMenuLevelRecord($table_name,$menu_levels,$menu_id,$menu_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$menuMultipleLevelRecord_sql = "SELECT * FROM $table_name where level ='$menu_levels' and sub_id ='$menu_id' and cate_status = '$menu_status' ORDER BY priority ASC" ;
		$menuMultipleLevelRecord_query = $conn->query($menuMultipleLevelRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$menuMultipleLevelRecord_row = $menuMultipleLevelRecord_query->num_rows;
		if($menuMultipleLevelRecord_row != 0){
			while($menuMultipleLevelRecord_result = $menuMultipleLevelRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$menuMultipleLevelRecordArr[] = $menuMultipleLevelRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['menuMultipleLevelRecord_count'] = $menuMultipleLevelRecord_row;
			$data['menuMultipleLevelRecord_details'] = $menuMultipleLevelRecordArr;
			return json_encode($data);
		}
	}


	function forCourseSingleDetails($table_name,$menu_slug,$menu_level,$menu_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$forCourseSingleDetails_sql = "SELECT * FROM $table_name where menu_slug ='$menu_slug' and level ='$menu_level' and status = '$menu_status'" ;
		
		$forCourseSingleDetails_query = $conn->query($forCourseSingleDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$forCourseSingleDetails_row = $forCourseSingleDetails_query->num_rows;
		$data = array();
		if($forCourseSingleDetails_row != 0){
			while($forCourseSingleDetails_result = $forCourseSingleDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$forCourseSingleDetailsArr[] = $forCourseSingleDetails_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	
			
			$data['forCourseSingleDetails_details'] = $forCourseSingleDetailsArr;
			
		}
		$data['forCourseSingleDetails_count'] = $forCourseSingleDetails_row;
		return json_encode($data);
	}

	function countryCodeLoad($table_name){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$countryCodeLoad_sql = "SELECT * FROM $table_name" ;		
		$countryCodeLoad_query = $conn->query($countryCodeLoad_sql);
		//return $login_result = $login_query->fetch_assoc();
		$countryCodeLoad_row = $countryCodeLoad_query->num_rows;
		$data = array();
		if($countryCodeLoad_row != 0){
			while($countryCodeLoad_result = $countryCodeLoad_query->fetch_assoc()) { //loop the rows returned from db
	        	$countryCodeLoadArr[] = $countryCodeLoad_result; //add row to array
	    	}
	    	
			$data['countryCodeLoad_details'] = $countryCodeLoadArr;
			
		}
		$data['countryCodeLoad_count'] = $countryCodeLoad_row;
		return json_encode($data);
	}

	

	function forCourseProductDescriptionDetails($table_name,$product_primary_id,$product_type,$menu_group,$menu_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$forCourseProductDescriptionDetails_sql = "SELECT * FROM $table_name where product_primary_id ='$product_primary_id' and product_type ='$product_type' and categories_group = '$menu_group' and status = '$menu_status'" ;
		
		$forCourseProductDescriptionDetails_query = $conn->query($forCourseProductDescriptionDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$forCourseProductDescriptionDetails_row = $forCourseProductDescriptionDetails_query->num_rows;
		if($forCourseProductDescriptionDetails_row != 0){
			while($forCourseProductDescriptionDetails_result = $forCourseProductDescriptionDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$forCourseProductDescriptionDetailsArr[] = $forCourseProductDescriptionDetails_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['forCourseProductDescriptionDetails_count'] = $forCourseProductDescriptionDetails_row;
			$data['forCourseProductDescriptionDetails_details'] = $forCourseProductDescriptionDetailsArr;
			return json_encode($data);
		}
	}

	function selectMultipleListRecord($table_name,$primary_id,$menu_levels,$menu_status,$product_type){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectMultipleListRecord_sql = "SELECT * FROM $table_name where product_primary_id ='$primary_id' and level ='$menu_levels' and Status = '$menu_status' and product_type  = '$product_type' " ;
		$selectMultipleListRecord_query = $conn->query($selectMultipleListRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectMultipleListRecord_row = $selectMultipleListRecord_query->num_rows;
		if($selectMultipleListRecord_row != 0){
			while($selectMultipleListRecord_result = $selectMultipleListRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectMultipleListRecordArr[] = $selectMultipleListRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectMultipleListRecord_count'] = $selectMultipleListRecord_row;
			$data['selectMultipleListRecord_details'] = $selectMultipleListRecordArr;
			return json_encode($data);
		}
	}

	function selectMultipleListLevelRecord($table_name,$primary_id,$menu_levels,$menu_status,$product_type,$parent_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectMultipleListLevelRecord_sql = "SELECT * FROM $table_name where product_primary_id ='$primary_id' and level ='$menu_levels' and Status = '$menu_status' and product_type  = '$product_type' and sub_id = '$parent_id'";
		$selectMultipleListLevelRecord_query = $conn->query($selectMultipleListLevelRecord_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectMultipleListLevelRecord_row = $selectMultipleListLevelRecord_query->num_rows;
		if($selectMultipleListLevelRecord_row != 0){
			while($selectMultipleListLevelRecord_result = $selectMultipleListLevelRecord_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectMultipleListLevelRecordArr[] = $selectMultipleListLevelRecord_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectMultipleListLevelRecord_count'] = $selectMultipleListLevelRecord_row;
			$data['selectMultipleListLevelRecord_details'] = $selectMultipleListLevelRecordArr;
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

	function selectUserNav($table_name,$menu_id,$categories_group,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectUserNav_sql = "select * from $table_name where menu_id = '$menu_id' and  categories_group = '$categories_group' and cate_status = '$status'" ;
		$selectUserNav_query = $conn->query($selectUserNav_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectUserNav_row = $selectUserNav_query->num_rows;
		if($selectUserNav_row != 0){
			while($selectUserNav_result = $selectUserNav_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectUserNavArr[] = $selectUserNav_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectUserNav_count'] = $selectUserNav_row;
			$data['selectUserNav_details'] = $selectUserNavArr;
			return json_encode($data);
		}
	}

	function selectEmailMobileCheck($table_name,$email,$mobileNo){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectEmailMobileCheck_sql = "select regId,firstName,email,mobileNo from $table_name where email = '$email' or mobileNo = '$mobileNo'" ;
		$selectEmailMobileCheck_query = $conn->query($selectEmailMobileCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectEmailMobileCheck_row = $selectEmailMobileCheck_query->num_rows;
		if($selectEmailMobileCheck_row != 0){
			while($selectEmailMobileCheck_result = $selectEmailMobileCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectEmailMobileCheckArr[] = $selectEmailMobileCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectEmailMobileCheck_count'] = $selectEmailMobileCheck_row;
			$data['selectEmailMobileCheck_details'] = $selectEmailMobileCheckArr;
			return json_encode($data);
		}
	}

	function selectLoginCheck($table_name,$username,$password){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectLoginCheck_sql = "select regId,firstName,email,mobileNo,userStatus,status from $table_name where (email = '$username' or mobileNo = '$username') and password ='$password' " ;
		$selectLoginCheck_query = $conn->query($selectLoginCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectLoginCheck_row = $selectLoginCheck_query->num_rows;
		$data = array();
		if($selectLoginCheck_row != 0){
			while($selectLoginCheck_result = $selectLoginCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectLoginCheckArr[] = $selectLoginCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	
			
			$data['selectLoginCheck_details'] = $selectLoginCheckArr;
			
		}
		$data['selectLoginCheck_count'] = $selectLoginCheck_row;
		return json_encode($data);
	}

	

	function selectCourseBatchMapping($table_name,$primary_id,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseBatchMapping_sql = "select * from $table_name where product_primary_id ='$primary_id' and status='$status' " ;
		$selectCourseBatchMapping_query = $conn->query($selectCourseBatchMapping_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseBatchMapping_row = $selectCourseBatchMapping_query->num_rows;
		if($selectCourseBatchMapping_row != 0){
			while($selectCourseBatchMapping_result = $selectCourseBatchMapping_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseBatchMappingArr[] = $selectCourseBatchMapping_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseBatchMapping_count'] = $selectCourseBatchMapping_row;
			$data['selectCourseBatchMapping_details'] = $selectCourseBatchMappingArr;
			return json_encode($data);
		}
	}

	function selectCourseBatchSetup($table_name,$primary_id,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseBatchSetup_sql = "select * from $table_name where batch_id ='$primary_id' and status='$status' " ;
		$selectCourseBatchSetup_query = $conn->query($selectCourseBatchSetup_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseBatchSetup_row = $selectCourseBatchSetup_query->num_rows;
		if($selectCourseBatchSetup_row != 0){
			while($selectCourseBatchSetup_result = $selectCourseBatchSetup_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseBatchSetupArr[] = $selectCourseBatchSetup_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseBatchSetup_count'] = $selectCourseBatchSetup_row;
			$data['selectCourseBatchSetup_details'] = $selectCourseBatchSetupArr;
			return json_encode($data);
		}
	}

	function selectAdmissionBatchMapping($table_name,$batch_mapping_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectAdmissionBatchMapping_sql = "select * from $table_name where batch_mapping_id ='$batch_mapping_id' " ;
		$selectAdmissionBatchMapping_query = $conn->query($selectAdmissionBatchMapping_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectAdmissionBatchMapping_row = $selectAdmissionBatchMapping_query->num_rows;
		if($selectAdmissionBatchMapping_row != 0){
			while($selectAdmissionBatchMapping_result = $selectAdmissionBatchMapping_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectAdmissionBatchMappingArr[] = $selectAdmissionBatchMapping_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectAdmissionBatchMapping_count'] = $selectAdmissionBatchMapping_row;
			$data['selectAdmissionBatchMapping_details'] = $selectAdmissionBatchMappingArr;
			return json_encode($data);
		}
	}

	function selectPriceDetails($table_name,$priceId){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectPriceDetails_sql = "select * from $table_name where price_id = '$priceId'" ;
		$selectPriceDetails_query = $conn->query($selectPriceDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectPriceDetails_row = $selectPriceDetails_query->num_rows;
		if($selectPriceDetails_row != 0){
			while($selectPriceDetails_result = $selectPriceDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectPriceDetailsArr[] = $selectPriceDetails_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectPriceDetails_count'] = $selectPriceDetails_row;
			$data['selectPriceDetails_details'] = $selectPriceDetailsArr;
			return json_encode($data);
		}
	}

	function selectCourseDetails($table_name,$courseId){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectCourseDetails_sql = "select * from $table_name where menu_id = '$courseId'" ;
		$selectCourseDetails_query = $conn->query($selectCourseDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectCourseDetails_row = $selectCourseDetails_query->num_rows;
		if($selectCourseDetails_row != 0){
			while($selectCourseDetails_result = $selectCourseDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectCourseDetailsArr[] = $selectCourseDetails_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectCourseDetails_count'] = $selectCourseDetails_row;
			$data['selectCourseDetails_details'] = $selectCourseDetailsArr;
			return json_encode($data);
		}
	}

	function forCourseSingleDetailsId($table_name,$menu_slug,$menu_level){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$forCourseSingleDetailsId_sql = "SELECT * FROM $table_name where parent_id ='$menu_slug' and level ='$menu_level'" ;
		
		$forCourseSingleDetailsId_query = $conn->query($forCourseSingleDetailsId_sql);
		//return $login_result = $login_query->fetch_assoc();
		$forCourseSingleDetailsId_row = $forCourseSingleDetailsId_query->num_rows;
		$data = array();
		if($forCourseSingleDetailsId_row != 0){
			while($forCourseSingleDetailsId_result = $forCourseSingleDetailsId_query->fetch_assoc()) { //loop the rows returned from db
	        	$forCourseSingleDetailsIdArr[] = $forCourseSingleDetailsId_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	
			
			$data['forCourseSingleDetailsId_details'] = $forCourseSingleDetailsIdArr;
			
		}
		$data['forCourseSingleDetailsId_count'] = $forCourseSingleDetailsId_row;
		return json_encode($data);
	}

	

	//SELECT * FROM `tbl_adminission_form` where register_id = 12 and course_id = 4 and admin_gen_id = "TSSA4600380"

	function selectAdmissionGetDetails($table_name,$mobile,$adminssion_id,){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectAdmissionGetDetails_sql = "SELECT * from $table_name where mobile='$mobile' and admin_gen_id = '$adminssion_id' " ;
		$selectAdmissionGetDetails_query = $conn->query($selectAdmissionGetDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectAdmissionGetDetails_row = $selectAdmissionGetDetails_query->num_rows;
		$data = array();
		
		if($selectAdmissionGetDetails_row != 0){
			while($selectAdmissionGetDetails_result = $selectAdmissionGetDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectAdmissionGetDetailsArr[] = $selectAdmissionGetDetails_result; //add row to array
	    	}	   
			$data['selectAdmissionGetDetails_details'] = $selectAdmissionGetDetailsArr;
		}
		$data['selectAdmissionGetDetails_count'] = $selectAdmissionGetDetails_row;
		return json_encode($data);
	}

	function selectAdmissionDetails($table_name,$regId,$course_id,$adminssion_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectAdmissionDetails_sql = "SELECT * from $table_name where register_id = '$regId' and course_id='$course_id' and admin_gen_id = '$adminssion_id' " ;
		$selectAdmissionDetails_query = $conn->query($selectAdmissionDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectAdmissionDetails_row = $selectAdmissionDetails_query->num_rows;
		if($selectAdmissionDetails_row != 0){
			while($selectAdmissionDetails_result = $selectAdmissionDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectAdmissionDetailsArr[] = $selectAdmissionDetails_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectAdmissionDetails_count'] = $selectAdmissionDetails_row;
			$data['selectAdmissionDetails_details'] = $selectAdmissionDetailsArr;
			return json_encode($data);
		}
	}

	function selectAdmissionCheck($table_name,$admis_id,$admis_no,$admis_status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectAdmissionCheck_sql = "SELECT * from $table_name where admission_id = '$admis_id' and admin_gen_id='$admis_no' and status = '$admis_status' " ;
		$selectAdmissionCheck_query = $conn->query($selectAdmissionCheck_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectAdmissionCheck_row = $selectAdmissionCheck_query->num_rows;
		if($selectAdmissionCheck_row != 0){
			while($selectAdmissionCheck_result = $selectAdmissionCheck_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectAdmissionCheckArr[] = $selectAdmissionCheck_result; //add row to array
	    	}
	    	//return $mediaArr; 
	    	$data = array();
			$data['selectAdmissionCheck_count'] = $selectAdmissionCheck_row;
			$data['selectAdmissionCheck_details'] = $selectAdmissionCheckArr;
			return json_encode($data);
		}
	}

	function selectLoginDetails($table_name,$login_id,$user_status,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		echo $selectLoginDetails_sql = "SELECT * from $table_name where regId  = '$login_id' and userStatus='$user_status' and status = '$status' " ;
		$selectLoginDetails_query = $conn->query($selectLoginDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectLoginDetails_row = $selectLoginDetails_query->num_rows;
		$data = array();
		if($selectLoginDetails_row != 0){
			while($selectLoginDetails_result = $selectLoginDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectLoginDetailsArr[] = $selectLoginDetails_result; //add row to array
	    	}	    	
			$data['selectLoginDetails_details'] = $selectLoginDetailsArr;
		}
		$data['selectLoginDetails_count'] = $selectLoginDetails_row;
		return json_encode($data);
	}

	function selectDashAdminDetails($table_name,$login_id,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectDashAdminDetails_sql = "SELECT * from $table_name where register_id  = '$login_id' and status = '$status' " ;
		$selectDashAdminDetails_query = $conn->query($selectDashAdminDetails_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectDashAdminDetails_row = $selectDashAdminDetails_query->num_rows;
		$data = array();
		if($selectDashAdminDetails_row != 0){
			while($selectDashAdminDetails_result = $selectDashAdminDetails_query->fetch_assoc()) { //loop the rows returned from db
	        	$selectDashAdminDetailsArr[] = $selectDashAdminDetails_result; //add row to array
	    	}	    	
			$data['selectDashAdminDetails_details'] = $selectDashAdminDetailsArr;
		}
		$data['selectDashAdminDetails_count'] = $selectDashAdminDetails_row;
		return json_encode($data);
	}

	function selectUserNavs($table_name,$menu_id,$categories_group,$status,$parent_id){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectUserNav_sql = "select * from $table_name where sub_id = '$menu_id' and  categories_group = '$categories_group' and status = '$status' and parent_id != '$parent_id'" ;
		$selectUserNav_query = $conn->query($selectUserNav_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectUserNav_row = $selectUserNav_query->num_rows;
		$data = array();
		if($selectUserNav_row != 0){
			while($selectUserNav_result = $selectUserNav_query->fetch_assoc()) { //loop the rows returned from db
				$selectUserNavArr[] = $selectUserNav_result; //add row to array
			}
			$data['selectUserNav_details'] = $selectUserNavArr;
		}
		$data['selectUserNav_count'] = $selectUserNav_row;
		return json_encode($data);
	}

	function selectDepartC($table_name,$level,$categories_group,$status){
		global $conn;
		//echo $user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
		$selectDepartC_sql = "select * from $table_name where level = '$level' and  categories_group = '$categories_group' and status = '$status'" ;
		$selectDepartC_query = $conn->query($selectDepartC_sql);
		//return $login_result = $login_query->fetch_assoc();
		$selectDepartC_row = $selectDepartC_query->num_rows;
		$data = array();
		if($selectDepartC_row != 0){
			while($selectDepartC_result = $selectDepartC_query->fetch_assoc()) { //loop the rows returned from db
				$selectDepartCArr[] = $selectDepartC_result; //add row to array
			}
			$data['selectDepartC_details'] = $selectDepartCArr;
		}
		$data['selectDepartC_count'] = $selectDepartC_row;
		return json_encode($data);
	}

?>
