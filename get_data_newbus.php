<?php
session_start();
require_once 'dbconnect.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$busname = $_POST['busname'];
$from = $_POST['from'];
$to = $_POST['to'];
$price = $_POST['price'];
$dep = $_POST['dep'];
$arr = $_POST['arr'];
echo $busname;
$own_id=$_SESSION['user'];
   $query = "INSERT INTO bus_details(owner_id,busname,frommm,tooo,price,locn,status,dep,arr) VALUES($own_id,'$busname','$from','$to','$price','$target_file','n','$dep','$arr')";
   $res = mysql_query($query);
    
   if ($res) {
      header("Location: ownerdash.php");
	   exit;
   } else {
	   echo '<script type="text/javascript">alert("something error");</script>';
   } 
//mysql_connect(' localhost ' , root ,' ' );
//mysql_select_db(' image_database ');
//$insertquery = " insert into resize_images values('1,$out_image') ";
//$result = mysql_query( $insertquery );

?>