<?php
session_start();
if($_SESSION['user_type']==0){
	//user
	header("Location: home.php");
	exit();
}else if ($_SESSION['user_type']==1){
	//owner
	header("Location: ownerdash.php");
	exit();
	
}else{
	header("Location: include/signout.php");
	exit();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
 WAIT WHILE WE REDIRECT TO YOUR HOME PAGE 
<body>
</body>
</html>