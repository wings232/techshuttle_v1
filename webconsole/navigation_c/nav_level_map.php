<?php
	include "../dbconn.php";
	include_once "../kmhcode/function_code.php";
	echo $parent_id = isset($_REQUEST['parent_id'])?$_REQUEST['parent_id']:'';
	echo '<br>';
	echo $sub_id = isset($_REQUEST['sub_id'])?$_REQUEST['sub_id']:'';
	echo '<br>';
	echo $cate_gro = isset($_REQUEST['cate_gro'])?$_REQUEST['cate_gro']:'';
?>