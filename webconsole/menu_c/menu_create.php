<?php
	$menu_level = isset($_REQUEST['level'])?$_REQUEST['level']:"";
	$menu_sub_ids = isset($_REQUEST['sub_ids'])?$_REQUEST['sub_ids']:""; // For insert
	$menu_setup_updateId = isset($_REQUEST['menuSetupUpdateId'])?$_REQUEST['menuSetupUpdateId']:""; // for update
	$menuName = isset($_REQUEST['menuName'])?$_REQUEST['menuName']:"";
	$menuUrl = isset($_REQUEST['menuUrl'])?$_REQUEST['menuUrl']:"";
	$menu_queryKeys = isset($_REQUEST['queryKeys'])?$_REQUEST['queryKeys']:"";
?>

<div class="level_form">
	<div class="close_but" onclick="close_but()">X</div>
	<div class="level_form_head">
		<div class="head">
			<?php 
			if($menu_queryKeys == "insert_query"){
				if($menu_level == 1){
					echo "Create Level One menu";
				}else if($menu_level == 2){
					echo "Create Level Two menu";
				}else if($menu_level == 3){
					echo "Create Level Three menu";
				}
			}

			if($menu_queryKeys == "Update_query"){
				if($menu_level == 1){
					echo "Update Level One menu";
				}else if($menu_level == 2){
					echo "Update Level Two menu";
				}else if($menu_level == 3){
					echo "Update Level Three menu";
				}else if($menu_level == 4){
					echo "Update Level Four menu";
				}
			}
				
			?>
		</div>

	</div>
<?php
	if($menu_queryKeys == "insert_query"){
?>
	<div class="form_setup">
		<form method="post">
			<div class='textarea'>
				<textarea  id='cate' name='cate' placeholder="Menu_name"></textarea>
			</div>
			<div class="menu_url">
				<input type="text" name="menu_url" id='menu_url' placeholder="menu_url" />
			</div>
			<div class="hidden_feild">
				<input type="hidden" name="menu_sub_id" id='menu_sub_id' placeholder="Sub id" value="<?php echo $menu_sub_ids; ?>" />
				<input type="hidden" name="menu_level" id='menu_level' placeholder="Level" value="<?php echo $menu_level; ?>" />
				<input type="hidden" name="menu_query_Keys" id='menu_query_Keys' placeholder="menu_queryKeys" value="<?php echo $menu_queryKeys; ?>" />
			</div>
			<div class="menu_button">
				<input type='button' value="save" name='save' onclick="menu_post()"/>
			</div>
		</form>
	</div>
<?php } ?>

<?php
	if($menu_queryKeys == "Update_query"){
?>
	<div class="form_setup">
		<form method="post">
			<div class='textarea'>
				<textarea  id='cate' name='cate' placeholder="Menu_name" ><?php echo $menuName; ?></textarea>
			</div>
			<div class="menu_url">
				<input type="text" name="menu_url" id='menu_url'  placeholder="menu_url"  value="<?php echo $menuUrl; ?>" />
			</div>
			<div class="hidden_feild">
				<input type="hidden" name="menu_sub_id" id='menu_sub_id' placeholder="Sub id" value="<?php echo $menu_setup_updateId; ?>" />
				<input type="hidden" name="menu_level" id='menu_level' placeholder="Level" value="<?php echo $menu_level; ?>" />
				<input type="hidden" name="menu_query_Keys" id='menu_query_Keys' placeholder="menu_queryKeys" value="<?php echo $menu_queryKeys; ?>" />
			</div>
			<div class="menu_button">
				<input type='button' value="save" name='save' onclick="menu_post()"/>
			</div>
		</form>
	</div>
<?php } ?>

</div>
