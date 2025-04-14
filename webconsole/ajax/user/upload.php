<?php
	$file_name = $_FILES['file']['name'];
	$file_size =$_FILES['file']['size'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
	$expensions= array("jpeg","jpg","png");
  
  if(in_array($imageFileType,$expensions)=== false){
     $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 204786){
     $errors[]='File size must be excately 200 kb';
  }

  if(empty($errors)==true){
  	move_uploaded_file($file_tmp,"../../images/user_image/".$file_name);
?>
	<div class="error_out">
		<input type='hidden' id='file_image' value="<?php echo $file_name; ?>" />
		<div class="success">
			Profile photo moved successfully
		</div>
	</div>
<?php
  }else{
?>
	<div class="error_out">
		<ul>
<?php
	foreach ($errors as $key) {
?>
	<li><?php echo $key; ?></li>
<?php
	}
?>
 		</ul>	
 	</div>
 <?php
  }
?>