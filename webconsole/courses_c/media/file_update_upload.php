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

	function tc_file_upload($file_info)
{

    // Get file/image name (with extension)
    $file_name_complete =  $file_info['name'];

    // Extract file extension
    $extension = pathinfo($file_name_complete, PATHINFO_EXTENSION);

    // Extract file name without extension
    $file_name = pathinfo($file_name_complete, PATHINFO_FILENAME);

    // Temp file location
    $file_temp_location =  $file_info['tmp_name'];

    // Save an original file name variable to track while renaming if file already exists
    $file_name_original = $file_name;

    // Increment file name by 1
    $num = 1;

    /**
     * Check if the same file name already exists in the upload folder, 
     * append increment number to the original filename
     **/
    while (file_exists("../../../images/courses/thumb/" . $file_name . "." . $extension)) {
        $file_name = (string) $file_name_original . $num;
        $file_name_complete = $file_name . "." . $extension;
        $num++;
    }

    // Upload file in upload folder
    $file_target_location = "../../../images/courses/thumb/" . $file_name_complete;
    $file_upload_status = move_uploaded_file($file_temp_location, $file_target_location);

    if ($file_upload_status == true) {
        //echo "Congratulations. File has been uploaded to: $file_target_location";
        return $file_name_complete;
    } else {
        // echo "Error. File uploading failed! Check if 'upload' folder exists with proper permission and Try again.";
        // print_r(error_get_last());
        return false;
    }
}

	$file_name =isset($_FILES['file']['name'])? $_FILES['file']['name']:"";
	$file_size =$_FILES['file']['size'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];

	$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
	$target_dir = "../../../images/courses/thumb/";
	$target_file = $target_dir . basename($file_name);
	$expensions= array("jpeg","jpg","png","webp");
	/* $image = getimagesize($file_tmp);
	echo $image[0] ." ".$image[1]; 
	$width = $image[0];
	$height = $image[1];
	if($width > "180" || $height > "70") {
    	echo "Error : image size must be 180 x 70 pixels.";
	} */

	if (file_exists($target_file)) {
		$errors_n= "name changed";
		$file_name = tc_file_upload($_FILES['file']);
		//$uploadOk = 0; 
	}		
  
  if(in_array($imageFileType,$expensions)=== false){
     $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 3104786){
     $errors[]='File size must be excately 3 MB';
  }

  if(empty($errors)==true ){
  	//echo $errors;
  	move_uploaded_file($file_tmp,"../../../images/courses/thumb/".$file_name);
?>
	<div class="error_out">
		<input type='hidden' id='sfile_images' value="<?php echo $file_name; ?>" />
		<div class="success">
			<img width="100%" src="../images/courses/thumb/<?php echo $file_name; ?>"/>  File Uploaded
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
	<li><?php echo  $key; ?></li>
<?php
}
?>
 		</ul>	
 	</div>
 <?php
  }
}


?>

