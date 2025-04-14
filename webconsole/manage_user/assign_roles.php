<?php
include "../dbconn.php";
$roles_ids = isset($_REQUEST['role_Id'])?$_REQUEST['role_Id']:"";
$page_Id = isset($_REQUEST['pageId'])?$_REQUEST['pageId']:"";
$page_Name = isset($_REQUEST['pageName'])?$_REQUEST['pageName']:"";
$page_Url = isset($_REQUEST['pageUrl'])?$_REQUEST['pageUrl']:"";
$page_Sub = isset($_REQUEST['pageSub'])?$_REQUEST['pageSub']:"";
$page_View = isset($_REQUEST['pageView'])?$_REQUEST['pageView']:"";
$page_Insert = isset($_REQUEST['pageInsert'])?$_REQUEST['pageInsert']:"";
$page_Update = isset($_REQUEST['pageUpdate'])?$_REQUEST['pageUpdate']:"";
$page_Delete = isset($_REQUEST['pageDelete'])?$_REQUEST['pageDelete']:"";
$level_s = isset($_REQUEST['levels'])?$_REQUEST['levels']:"";
$approval_s = isset($_REQUEST['approvals'])?$_REQUEST['approvals']:"";
// echo $roles_ids;
// echo "<br>";
// print_r($menu_Names);
// echo "<br>";
// print_r($menu_CateId);
$assign_role_sql = "SELECT * FROM roles_assign where role_id = '$roles_ids' and page_id ='$page_Id'";
$assign_role_query = $conn->query($assign_role_sql);

// while($result_two = mysqli_fetch_assoc($query)){
// 					echo $role_ids = $result_two['role_id'];
					
// }

$assign_role_rows = $assign_role_query->num_rows;
if($assign_role_rows < 1){	
		$roles_insert_sql = "insert into roles_assign(role_id,page_id,menu_name,menu_url,sub_id,page_level,view_premission,insert_permission,update_permission,delete_permission,approval_perimission) values('$roles_ids','$page_Id','$page_Name','$page_Url','$page_Sub','$level_s','$page_View','$page_Insert','$page_Update','$page_Delete','$approval_s')";
		$roles_insert_query = $conn->query($roles_insert_sql);
			if($roles_insert_query){
?>
				<div class="reply_assign">
					<?php echo $page_Name; ?> is successfully assaigned for this role.
				</div>
<?php
			}
	
}else{
?>
	<div class="reply_assign">
		<?php echo $page_Name; ?> is already exist for this role.
	</div>
	
<?php
	}
?>
