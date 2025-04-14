<?php
	session_start();
	$user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";

	if($user_session == ""){
		header("Location:index.php");
	}	

	if (isset($_SESSION['LAST_REQUEST_TIME'])) {
	    if (time() - $_SESSION['LAST_REQUEST_TIME'] > 10000) {
	        // session timed out, last request is longer than 3 minutes ago
	        //$_SESSION = array();
	        $page = $_SERVER['HTTP_REFERER'];
			//$sec = "0";
			echo '<script type="text/javascript">';
	        echo 'window.location.href = \''.$page.'\';';
	        echo '</script>';
	        echo '<noscript>';
	        echo '<meta http-equiv="refresh" content="0;url=\''.$page.'\'" />';
        	echo '</noscript>';
	        session_destroy();
	        //exit();
	        
	    }else{
	    	$_SESSION['LAST_REQUEST_TIME'] = time();
	    }
	}
	$_SESSION['LAST_REQUEST_TIME'] = time();
	//echo $page =  $_SERVER['HTTP_REFERER'];
?>