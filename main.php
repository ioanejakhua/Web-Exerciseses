<?php

session_start();

$user = $_SESSION["username"];
$pass = $_SESSION["password"];

	if(isset($_POST["gamosvla"])){
		header("Location:signup.php");
		session_destroy();
		

	} 

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h4 style="color:purple;"> Upload Your Photo: </h4>
  <input type="submit" name="choose" value="Select File">
  <input type="submit" name="upload" value="Upload">
  <p><?php echo $user;?></p>
  <p><?php echo $pass;?></p>
 
  <form action="main.php" method="POST">

  <input type="submit" value="Gamosvla" name="gamosvla">

  </form>

</body>
</html>