<?php
	include "../dbconn.php";
	$rolescreate = strtolower(isset($_REQUEST['roles_Create'])?$_REQUEST['roles_Create']:'');	
	$roles_namecheck_sql = "Select * From roles_setup where role_name='$rolescreate'";
	$roles_namecheck_query = $conn->query($roles_namecheck_sql);
	$roles_namecheck_count = $roles_namecheck_query->num_rows;
	if($rolescreate != ""){
		if($roles_namecheck_count >= 1){
?>
			<div class="roles_ins">
				Roles Already Exist
			</div>
<?php
		}else{
			$roles_update_sql="Insert into roles_setup(role_name) values('$rolescreate')";
			$roles_update_query = $conn->query($roles_update_sql);
				if($roles_update_query){
?>			
					<div class="roles_ins">
						Roles Inserted
					</div>

<?php

				}
			}
	} /*Empty Check close*/
?>

<table>
	<?php
		$roles_select_sql ="Select * From roles_setup";
		$role_select_query = $conn->query($roles_select_sql);
	?>
	<tr>
		<th>Role Id</th>
		<th>Role Name</th>
		<!-- <th>Action</th> -->
	</tr>
	<?php 
		while($roles_result = $role_select_query->fetch_assoc()){
			$roles_id = $roles_result['roles_id'];
			$role_name = $roles_result['role_name'];
	 ?>
	<tr>
		<td><?php echo $roles_id; ?></td>
		<td><?php echo $role_name; ?></td>
		<!-- <td><input type="button" value="Edit"/></td> -->
	</tr>
	<?php } ?>
</table>

