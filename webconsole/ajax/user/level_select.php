<?php
	include '../../dbconn.php';
	$emp_level_selects = isset($_REQUEST['emp_level_select'])?$_REQUEST['emp_level_select']:"";
	$sql = "SELECT max(employee_id) as c from login where emp_level = '$emp_level_selects'";
 	$role_assign_query = mysqli_query($conn,$sql);
 	//$third_levels_menurow=$role_assign_query->num_rows;
	while($assign_result = mysqli_fetch_array($role_assign_query)){
		$number = $assign_result['c'];	
		//$records_count = $assign_result['record'];		
	}
	//echo "<br>";
	//echo $num_rows = $role_assign_query->num_rows;

	if($emp_level_selects != ""){

	
		if($number == ""){
			$numbers = 1;
			$emp_level = $emp_level_selects;
			echo $new_ids =  "TS".$emp_level.str_pad($numbers,5,"0",STR_PAD_LEFT);
		}

		if($number != ""){
				//echo "ss";
			
			//echo str_pad($val,4,"0",STR_PAD_LEFT);
			//echo "<br>";
			//echo strlen($number);
			//echo "<br>";
			$number_reduce = substr($number, -5);
			//echo "<br>";
			$emp_level = $emp_level_selects;
			echo $next_id_gen = "TS".$emp_level.str_pad(intval($number_reduce) + 1, strlen($number)-3, '0', STR_PAD_LEFT);
		}
	}

	if($emp_level_selects == ""){
		echo " ";
	}
?>