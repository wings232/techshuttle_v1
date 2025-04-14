<?php
	$menu_main_id = isset($_REQUEST['key_one'])?$_REQUEST['key_one']:"";
	$menu_headsub_sql = "SELECT * FROM menu_setup where cate_id ='$menu_main_id'";
	$menu_headsub_query = $conn->query($menu_headsub_sql);
	$menu_headsub_result = $menu_headsub_query->fetch_assoc();
	$menusub_master = $menu_headsub_result['menu_name'];

	$menu_sub_id = isset($_REQUEST['key_two'])?$_REQUEST['key_two']:"";
	$menu_head_sql = "SELECT * FROM menu_setup where cate_id ='$menu_sub_id'";
	$menu_head_query = $conn->query($menu_head_sql);
	$menu_head_result = $menu_head_query->fetch_assoc();
	$menu_master = $menu_head_result['menu_name'];
	$user_roles = isset($_SESSION['role_ids'])?$_SESSION['role_ids']:"";

	$menu_subthree_id = isset($_REQUEST['key_three'])?$_REQUEST['key_three']:"";
	if($menu_subthree_id != ""){
		$menu_headthree_sql = "SELECT * FROM menu_setup where cate_id ='$menu_subthree_id'";
		$menu_headthree_query = $conn->query($menu_headthree_sql);
		$menu_headthree_result = $menu_headthree_query->fetch_assoc();
		$menu_subthree = $menu_headthree_result['menu_name'];
	}
	

	$third_level_menusqls="select * from roles_assign where page_level='3' and sub_id='$menu_main_id' and view_premission = 'Yes' and role_id='$user_roles'";
	$third_level_menuquery=$conn->query($third_level_menusqls);
	$third_levels_menurow=$third_level_menuquery->num_rows;
	
?>
<div class="third_level_menu">
	<ul>
		<?php
			while($third_level_menuresult = $third_level_menuquery->fetch_assoc()){
					$cate_ids = $third_level_menuresult['page_id'];
					$sub_ids = $third_level_menuresult['sub_id'];
					$menuNames = $third_level_menuresult['menu_name'];
					$url_infos = $third_level_menuresult['menu_url'];
		?>
		<li onclick='url_pass("<?php echo $url_infos; ?>?key_one=<?php echo $sub_ids; ?>&key_two=<?php echo $menu_sub_id; ?>&key_three=<?php echo $cate_ids; ?>")'><?php echo $menuNames; ?></li>
	<?php } ?>
	</ul>
</div>

<div style="border-bottom: 1px solid rgba(145,145,145,0.2); padding: 10px 0px; width:100%; float: left;">
	<a href='#'><?php echo $menu_master; ?></a> | 
	<a href='#'><?php echo $menusub_master; ?></a> 
	<?php if($menu_subthree_id != ""){ ?>
		| <a href='#'><?php echo $menu_subthree; ?></a> 
	<?php  } ?>
</div>

