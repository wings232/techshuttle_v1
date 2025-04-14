<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tests";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

 	$sql = "SELECT max(emp_number) as c from test where emp_level = 1";
 	$role_assign_query = mysqli_query($conn,$sql);
	while($assign_result = mysqli_fetch_array($role_assign_query)){
		echo $number = $assign_result['c'];		
	}
	echo "<br>";
	//echo $num_rows = $role_assign_query->num_rows;
	if($number == ""){
		$numbers = 1;
		$emp_level = 2;
		echo "TS".$emp_level.str_pad($numbers,5,"0",STR_PAD_LEFT);
	}

	if($number != ""){
			//echo "ss";
		
		//echo str_pad($val,4,"0",STR_PAD_LEFT);
		echo "<br>";
		//echo strlen($number);
		echo "<br>";
		$er = substr($number, -5);
		echo "<br>";
		$emp_level = 1;
		echo "TS".$emp_level.str_pad(intval($er) + 1, strlen($number)-3, '0', STR_PAD_LEFT);
	}
	//$number = intval('0001') + 1;
    //echo sprintf('%04d', $number);
?>