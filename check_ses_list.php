<?php
	session_start();

	$user_session = isset($_SESSION['tsWebUserId'])?$_SESSION['tsWebUserId']:"";
	$user_name = isset($_SESSION['tsWebUserName'])?$_SESSION['tsWebUserName']:"";
?>