<?php
	include "dbconn.php";
	
	$roles_ids = isset($_REQUEST['role_Id'])?$_REQUEST['role_Id']:"";

	$pageId = isset($_REQUEST['pageId'])?$_REQUEST['pageId']:"";
	$pageName = isset($_REQUEST['pageName'])?$_REQUEST['pageName']:"";
	$pageUrl = isset($_REQUEST['pageUrl'])?$_REQUEST['pageUrl']:"";
	$change_View = isset($_REQUEST['changeView'])?$_REQUEST['changeView']:"";
	$change_Insert = isset($_REQUEST['changeInsert'])?$_REQUEST['changeInsert']:"";
	$change_Update = isset($_REQUEST['changeUpdate'])?$_REQUEST['changeUpdate']:"";
	$change_Delete = isset($_REQUEST['changeDelete'])?$_REQUEST['changeDelete']:"";
	echo $change_Approval = isset($_REQUEST['changeApproval'])?$_REQUEST['changeApproval']:"";

	
		$roles_insert = "UPDATE roles_assign SET view_premission = '$change_View',insert_permission='$change_Insert',update_permission='$change_Update',delete_permission='$change_Delete', approval_perimission='$change_Approval' where role_id ='$roles_ids' and page_id='$pageId'";
		$query_check = mysqli_query($conn,$roles_insert);
		//$roles_query = mysqli_query($conn,$roles_insert);
	if($query_check){
		$result = "updated Successfully";
	}else{
		echo "not correct";
	}
	

	$roles_ajax_select = "SELECT * FROM roles_assign JOIN menu_setup ON `roles_assign`.`page_id`=`menu_setup`.`cate_id` JOIN roles_setup ON `roles_assign`.`role_id` = `roles_setup`.`roles_id` where role_id='$roles_ids'";
	$roles_ajax_query = $conn->query($roles_ajax_select);
		
?>

<table class="info_roles_head">
		<tr>
			<th>Role Name</th>
			<th>menu_name</th>
			<th>Views</th>
			<th>Insert</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Approval</th>
			<th>Changes</th>
		</tr>
	</table>
	<table class="info_roles_content">
		<?php 
			while($roles_ajax_result = $roles_ajax_query->fetch_assoc()){
				$roles_id = $roles_ajax_result['role_id'];
				$roles_name = $roles_ajax_result['role_name'];
				$page_id = $roles_ajax_result['page_id'];
				$sub_id = $roles_ajax_result['sub_id'];
				$menu_names = $roles_ajax_result['menu_name'];
				$view_permissions = $roles_ajax_result['view_premission'];
				$insert_permissions = $roles_ajax_result['insert_permission'];
				$update_permissions = $roles_ajax_result['update_permission'];
				$delete_permission = $roles_ajax_result['delete_permission'];
				$approval_perimission = $roles_ajax_result['approval_perimission'];
		?>
		<tr>
			<td><?php echo $roles_name; ?></td>
			<input type="hidden" value="<?php echo $page_id; ?>">
			<input type="hidden" value="<?php echo $sub_id; ?>">
			<td><?php echo $menu_names; ?></td>
			<td>
				<div style="float:left">
					<?php echo $view_permissions; ?>
				</div>
				<div  style="float:right">
					<!-- <select name='view_permission' class="view_permission">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
					</select> -->
					<?php if($view_permissions == "Yes"){ ?>
						<input type="checkbox" checked="checked" name="view_permission" class="view_permission"/>
					<?php }else{ ?>
						<input type="checkbox" name="view_permission" class="view_permission">
					<?php } ?>
				</div>
			</td>
			<td>
				<div style="float:left">
					<?php echo $insert_permissions; ?>
				</div>
				<div style="float:right">
					<!-- <select name='insert_permissions' class="insert_permissions">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
					</select> -->
					<?php if($insert_permissions == "Yes"){ ?>
						<input type="checkbox" checked="checked" name='insert_permissions' class="insert_permissions"/>
					<?php }else{ ?>
						<input type="checkbox" name='insert_permissions' class="insert_permissions">
					<?php } ?>
				</div>
			</td>
			<td>
				<div style="float:left">
					<?php echo $update_permissions; ?>
				</div>
				<div style="float:right">
					<!-- <select name='update_permissions' class="update_permissions">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
					</select> -->
					<?php if($update_permissions == "Yes"){ ?>
					<input type="checkbox" checked="checked" name='update_permissions' class="update_permissions"/>
					<?php }else{ ?>
						<input type="checkbox" name='update_permissions' class="update_permissions">
					<?php } ?>
				</div>
				
			</td>
			<td>
				<div style="float:left">
					<?php echo $delete_permission; ?>
				</div>
				<div style="float:right">
					<!-- <select name='delete_permission' class="delete_permission">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
					</select> -->
					<?php if($delete_permission == "Yes"){ ?>
						<input type="checkbox" checked="checked" name='delete_permission' class="delete_permission"/>
					<?php }else{ ?>
						<input type="checkbox" name='delete_permission' class="delete_permission">
					<?php } ?>
				</div>
			</td>
			<td>
				<div style="float:left">
					<?php echo $approval_perimission; ?>
				</div>
				<div style="float:right">
					<!-- <select name='delete_permission' class="delete_permission">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
					</select> -->
					<?php if($approval_perimission == "Yes"){ ?>
						<input type="checkbox" checked="checked" name='approval_perimission' class="approval_perimission"/>
					<?php }else{ ?>
						<input type="checkbox" name='approval_perimission' class="approval_perimission">
					<?php } ?>
				</div>
			</td>
			<td><input type="button" value="Update" class="premission_assign" /></td>
			
		</tr>
	<?php } ?>
	</table>
	<input type="hidden" name="role_id_name" id='role_id_name' value='<?php echo $roles_id; ?>'/>