<?php
	
	include "dbconn.php";
	include "check_ses_list.php";
	/*function asd($asds){
		include "dbconn.php";
		$query = "SELECT * FROM login where employee_id = $asds";
        $result = $conn->query($query);
        if($result){
        	echo 'yes';
        }
        //return $result;
        // $re = $result->fetch_assoc();
        // return $re;
         while($row =  $result->fetch_assoc()) { //loop the rows returned from db
	        $resArr[] = $row; //add row to array
	    }
	      return $resArr;   
	    //return $query;
	}

	//echo $sideBarPosts = asd();
	//echo $level_one_query_sels=$conn->query("SELECT * FROM login");

	$sideBarPosts = asd(30016); //get the result array

		foreach($sideBarPosts as $post) { //loop the array
			$sd =$post['employee_id'];
		    echo '<h1>'. $sd. '</h1>';
		     echo '<h1>'. $post['username']. '</h1>';
		} 
		
*/
		/*class Re{
			public $length;
			public $width;

			public function getPeri(){
				return  ($this->length * $this->width);
			}
		}

		$obj = new Re;

		$obj->length = 20;
		$obj->width = 30;

		echo $obj->getPeri();*/
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		
	</script>
</head>
<body>
	<div class="right_container">
		<div class='levels_create'>
		</div>
		<div class="bread_crumbs">
			<?php include 'breadcrumbs.php'; ?>
		</div>
		<div class='main_cate'>
			<div class="create_level_one">
				<input type="button" name="create_main" value="Create Main" id='create_main' onclick='create_level_one("1","insert_query")'/>
			</div>
		</div>
		<div class="content_table">
			<table class="level_menus_head">
				<tr>
					<th>S.no</th>
					<th>Menu Name</th>
					<th>Menu Url</th>
					<th>Action</th>				
				</tr>
			</table>
			<?php
				$level_one_sql="select * from menu_setup where level = '1'";
				$level_one_query_sel=$conn->query($level_one_sql);
				while($level_one_result = $level_one_query_sel->fetch_assoc()){
					$cate_id = $level_one_result['cate_id'];
					$menuName = $level_one_result['menu_name'];
					$url_info = $level_one_result['menu_url'];
				
			?>
			<table class="level_one_table">
				<tr>
				
					<td><?php echo $cate_id; ?></td>
					<td><?php echo $menuName; ?></td>
					<td><?php echo $url_info; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick='createTwo("<?php  echo $cate_id; ?>","2","insert_query")'/></td>
					
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='menuUpdate("<?php  echo $menuName; ?>","<?php  echo $url_info; ?>","<?php  echo $cate_id; ?>","1","Update_query")'/></td>
					<td><input type="button" name="delete_second" value="Delete" id='delete' onclick='menuDelete("<?php  echo $cate_id; ?>","1","delete_query")'/></td>
				</tr>
				
			</table>
			<?php
				$level_two_sql="select * from menu_setup where level='2' and sub_id='$cate_id'";
				$level_two_query_sel=$conn->query($level_two_sql);
				while($level_two_result = $level_two_query_sel->fetch_assoc()){
					$cate_ids = $level_two_result['cate_id'];
					$menuNames = $level_two_result['menu_name'];
					$url_infos = $level_two_result['menu_url'];
				
			?>
			<table class="level_two_table">
				<tr>
					<td><?php echo $cate_ids; ?></td>
					<td><?php echo $menuNames; ?></td>
					<td><?php echo $url_infos; ?></td>
					<td><input type="button" name="create_second" value="Create" id='create' onclick="createTwo('<?php  echo $cate_ids; ?>','3','insert_query')" /></td>
					
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='menuUpdate("<?php  echo $menuNames; ?>","<?php  echo $url_infos; ?>","<?php  echo $cate_ids; ?>","2","Update_query")'/></td>
					<td><input type="button" name="delete_second" value="Delete" id='delete' onclick='menuDelete("<?php  echo $cate_ids; ?>","2","delete_query")'/></td>
				</tr>

			</table>
			<?php
				$level_three_sql="select * from menu_setup where level='3' and sub_id='$cate_ids'";
				$level_three_query_sel=$conn->query($level_three_sql);
				while($level_three_result = $level_three_query_sel->fetch_assoc()){
					$cate_idss = $level_three_result['cate_id'];
					$menuNamess = $level_three_result['menu_name'];
					$url_infoss = $level_three_result['menu_url'];
				
			?>
			<table class="level_three_table" >
				<tr>
					<td><?php echo $cate_idss; ?></td>
					<td width='60%'><?php echo $menuNamess; ?></td>
					<td><?php echo $url_infoss; ?></td>
					<td><!-- <input type="button" name="create_second" value="Create" id='create'  /> --></td>
					<td><input type="button" name="edit_second" value="Edit" id='edit' onclick='menuUpdate("<?php  echo $menuNamess; ?>","<?php  echo $url_infoss; ?>","<?php  echo $cate_idss; ?>","3","Update_query")'/></td>
					<td><input type="button" name="delete_second" value="Delete" id='delete' onclick='menuDelete("<?php  echo $cate_idss; ?>","3","delete_query")'/></td>
				</tr>

			</table>
			<?php
						}
					}
				}
			?>
		</div>
	</div>
	
</body>
</html>