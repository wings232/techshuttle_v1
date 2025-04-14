<?php	
	include "dbconn.php";
	session_start();
	$user_session = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";

	if($user_session == ""){
		header("Location:index.php");
	}	
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
					Select The Role
				</div>
			</div>
			<div class="assign_input">
				<div class="assign_in">
					<div class="new_select">
						<select id='role_id'>
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
		</div>
		<div class="assign_reply">
			
		</div>
		<div class="assign_table">
			<table class="roles_table">
				<tr>
					<th>Page ID</th>
					<th>Page Name</th>
					<th>Action</th>
				</tr>
			
				<?php
					$assign_levels_sql="select * from menu_setup where level = '1'";
					$assign_levels_query=$conn->query($assign_levels_sql);
					while($assign_levels_result = $assign_levels_query->fetch_assoc()){
						$cate_id = $assign_levels_result['cate_id'];
						$menuName = $assign_levels_result['menu_name'];
						$url_info = $assign_levels_result['menu_url'];
						$sub_info = $assign_levels_result['sub_id'];
					
				?>
					<tr class="first_row">
						<input type='hidden' value='1'/>
						<td><?php echo $cate_id; ?></td>
						<td><?php echo $menuName; ?></td>
						<input type='hidden' value='<?php echo $url_info; ?>'/>
						<input type='hidden' value='<?php echo $sub_info; ?>'/>
						<td><input type="button" value="Assign role" class="current" /></td>
					</tr>
				<?php 
					$assign_level_twosql="select * from menu_setup where level='2' and sub_id='$cate_id'";
					$assign_levels_twoquery=$conn->query($assign_level_twosql);
					while($assign_levels_result_two = $assign_levels_twoquery->fetch_assoc()){
						$cate_ids = $assign_levels_result_two['cate_id'];
						$menuNames = $assign_levels_result_two['menu_name'];
						$url_infos = $assign_levels_result_two['menu_url'];
						$sub_infos = $assign_levels_result_two['sub_id'];
				 ?>	
					<tr class="second_row">
						<input type='hidden' value='2'/>
						<td><?php echo $cate_ids; ?></td></td>
						<td><?php echo $menuNames; ?></td>
						<input type='hidden' value='<?php echo $url_infos; ?>'/>
						<input type='hidden' value='<?php echo $sub_infos; ?>'/>
						
						<td><input type="button" value="Assign role" class="current" /></td>
					</tr>

				<?php 
					$assign_level_threesql="select * from menu_setup where level='3' and sub_id='$cate_ids'";
					$assign_levels_threequery=$conn->query($assign_level_threesql);
					while($assign_levels_result_three = $assign_levels_threequery->fetch_assoc()){
						$cate_idss = $assign_levels_result_three['cate_id'];
						$menuNamess = $assign_levels_result_three['menu_name'];
						$url_infoss = $assign_levels_result_three['menu_url'];
						$sub_infoss = $assign_levels_result_three['sub_id'];
				 ?>	

					<tr class="third_row">
						<input type='hidden' value='3'/>
						<td><?php echo $cate_idss; ?></td></td>
						<td><?php echo $menuNamess; ?></td>
						<input type='hidden' value='<?php echo $url_infoss; ?>'/>
						<input type='hidden' value='<?php echo $sub_infoss; ?>'/>
						
						<td><input type="button" value="Assign role" class="current" /></td>
					</tr>
				<?php 
							}
						}
					} 
				?>
			</table>
		</div>

	</div>
	
</body>
</html>