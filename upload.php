<?php

 require 'Oracle_connect.php';
  
if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  echo"錯誤!尚未登入";
}
  
else{
$upload_status;//上傳情形
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$new_target_file = $target_dir . $_SESSION['uid']."_".strtotime("now").".".$imageFileType ;//要上傳的圖片的檔名使用uid+時間戳來命名以避免撞名字
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $upload_status = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $upload_status = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/* 
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} 
*/



// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $upload_status = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}     
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //$upload_status = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file)) {
        $upload_status = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
    } else {
        $upload_status = "Sorry, there was an error uploading your file.";
    }
}

}

//回傳訊息給前端
$json = array(
            "img_title" => $new_target_file,
            "upload_status" =>$upload_status,
			"uploadOk" =>$uploadOk
);
echo json_encode($json);





?>