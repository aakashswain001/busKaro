<?php
session_start();
if($_SESSION['user_type']==0){
	//user
	header("Location: home.php");
	exit();
}else if ($_SESSION['user_type']==1){
	//owner
	header("Location: ownerdash.html");
	exit();
	
}else{
	session_reset();
	session_abort();
	header("Location: index.php");
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