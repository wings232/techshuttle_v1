<?php
	session_start();
	$_SESSION['tsWebUserId'] = '';
	$_SESSION['tsWebUserName'] = '';
	session_destroy();
	session_unset();
	header("Location: " . $_SERVER['HTTP_REFERER']);
	//header("Refresh:5");
	//echo $er = $_SERVER['HTTP_REFERER'];
	//header("Refresh:0; url=http://192.168.0.34/studies/techshuttle/courses/sap-abap");
	//header("location:http://192.168.0.34/kmh_new_v1/index.php");
?>