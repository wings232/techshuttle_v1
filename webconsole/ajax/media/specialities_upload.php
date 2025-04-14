<?php
	$file_name_empty = isset($_FILES['file']['name'])?$_FILES['file']['name']:"";
    if($file_name_empty == ""){
?>
	<div class="error_out">
		<div class="success">
			 Please Choose the file
		</div>
	</div>

<?php
    }else{
	$file_name =isset($_FILES['file']['name'])? $_FILES['file']['name']:"";
	$file_size =$_FILES['file']['size'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];

	$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
	$target_dir = "../../../images/specialities/banner/";
	$target_file = $target_dir . basename($file_name);
	$expensions= array("jpeg","jpg","png");
	/* $image = getimagesize($file_tmp);
	echo $image[0] ." ".$image[1]; 
	$width = $image[0];
	$height = $image[1];
	if($width > "180" || $height > "70") {
    	echo "Error : image size must be 180 x 70 pixels.";
	} */

	if (file_exists($target_file)) {
		$errors[]= "Sorry file is already exist";
		//$uploadOk = 0; 
	}
  
  if(in_array($imageFileType,$expensions)=== false){
     $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size >= 5004786){
     $errors[]='File size must be excately 300 kb';
  }

  if(empty($errors)==true){
  	move_uploaded_file($file_tmp,"../../../images/specialities/banner/".$file_name);
?>
	<div class="error_out">
		<input type='hidden' id='sfile_image' value="<?php echo $file_name; ?>" />
		<div class="success">
			<img width="30%" src="../images/specialities/banner/<?php echo $file_name; ?>"/> Media photo moved successfully
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
}


?>
