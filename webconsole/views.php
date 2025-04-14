<?php	
	include "dbconn.php";
	include "check_ses_list.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>KMH Dashboard</title>
</head>
<body>
	<div class="right_container">
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>

		<!-- <input type="button" value='views' onclick="url_pass('menu_setup.php')" /> -->
		<div class="assign_roles_head">
			<div class="assign_head">
				<div class="head">
					Select The Roles
				</div>
			</div>
			<div class="assign_input">
				<div class="assign_in">
					<div class="new_select">
						<select id='role_ids' onchange="select_roles()">
							<option value=''>Select The Roles</option>
							<?php 
									$select_role_sql ="Select * From roles_setup";
									$select_role_query = $conn->query($select_role_sql);
									while($select_role_result = $select_role_query->fetch_assoc()){
										$roles_id = $select_role_result['roles_id'];
										$role_name = $select_role_result['role_name'];
							?>
								<option value='<?php echo $roles_id; ?>'><?php echo $role_name; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="roles_views">

			</div>
		</div>
	</div>
	
</body>
</html>