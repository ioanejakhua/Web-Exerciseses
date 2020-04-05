<?php 
 
$shecdoma = ["username"=>"","password"=>""];


if (isset($_POST["login"])) {
  if (empty($_POST["username"])) {
    $shecdoma["username"] = "Username is required"; 
  } else {
    
    $lowcase = strtolower($_POST["username"]);
    if ( $_POST["username"] != $lowcase){
      $shecdoma["username"] = "Small letters only.";
      
    }
    if (strlen($_POST["username"])<5 || strlen($_POST["username"])>10) {
      $shecdoma["username"]=" Min 5 and Max 10 Characters";
      
    } 
    
  }
  

  if (empty($_POST["password"])) {
    $shecdoma["password"] = "Password is required";
  } else {
    $password = $_POST["password"];
    if (strlen($password)<8 || strlen($password)>16){
      $shecdoma["password"] = " Min 8 and Max 16 Characters.";
      
    }
    if (!preg_match("#[a-z]+#", $password)) { 
      $shecdoma["password"] = " You need At Least one uppercase and number symbol";
      
    }
      elseif( !preg_match("#[0-9]+#", $password)){
        $shecdoma["password"] = " You need alphabet and number symbols";
        
      }
    
  }


  if(!empty(array_filter($shecdoma))){

  }

  else {
    header("Location:main.php");
    session_start();

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"]; 
  }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:#FFFFE0;">


<h2 style="color:black;">
	
</h2>

<form method="post" action="login.php">  

  <h4 style="color:purple;"> Username: </h4> <input type="text" name="username">
  <span class="error"><?php echo $shecdoma["username"];?></span>



  <br><br>
  <h4 style="color:purple;"> Password: </h4>  <input type="password" name="password">
  <span class="error"><?php echo $shecdoma["password"];?></span>



  <br><br>
  <input type="submit" name="login" value="Login">
</form>
<a href="signup.php">Sign UP</a>
</body>

</html>






