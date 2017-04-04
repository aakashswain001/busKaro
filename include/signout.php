<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: ../index.php");
 exit();
 }
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit;
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
Wait while signing out
<body>
</body>
</html>