<?php	
	include "dbconn.php";
	session_start();
	$user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";;
	if($user_session == ""){
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="right_container">
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class="role_design">
			<div class="role_head">
				<div class="head">Enter the New Role</div>
			</div>
			<div class="role_input_button">
				<div class="role_in">
					<input type="text" name="roles_create" id="roles_create" value="" placeholder="Please Enter the new role" required="required" />
				</div>
				<div class="role_but">
					<input type='button' value='Create Role' name="save" onclick="role_create()"/>
				</div>
			</div>
		</div>
		<div class="roles">
			
		</div>
		<div class="table_role">
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
		</div>
		
	</div>
	
</body>
</html>