<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:#FFFFE0;">

<?php 
 
$shecdoma = ["username"=>"","email"=>"","firstname"=>"","lastname"=>"","password"=>"","passwordrepeat"=>""];

// $username = $email = $firstname = $lastname = $password = $passwordrepeat = "";
// $usernameErr = $emailErr = $firstnameErr = $lastnameErr = $passwordErr = $passwordrepeatErr ="";



if (isset($_POST["submit"])) {
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
  
  if (empty($_POST["email"])) {
    $shecdoma["email"]= "Email is required";
  } else {
    $email = $_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      
    }
    else $shecdoma["email"]="$email is not valid Email";
  }
    
  if (empty($_POST["firstname"])) {
    $shecdoma["firstname"] = "First name is required";
  } else {
    $firstname = $_POST["firstname"];
    
  }

  if (empty($_POST["lastname"])) {
    $shecdoma["lastname"] = "Last name is required";
  } else {
    
    
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

  if (empty($_POST["passwordrepeat"])) {
    $shecdoma["passwordrepeat"] = "Password repeat is required";
  } else {
    $passwordrepeat = $_POST["passwordrepeat"];
    if ($passwordrepeat != $_POST["password"]) {
      $shecdoma["passwordrepeat"] = "Password repeat is wrong";
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

<h2 style="color:black;">
	Sign Up
</h2>

<form method="post" action="signup.php">  

  <h4 style="color:purple;"> Username: </h4> <input type="text" name="username">
  <span class="error"><?php echo $shecdoma["username"];?></span>

  <br><br>
  <h4 style="color:purple;"> First Name: </h4> <input type="text" name="firstname">
  <span class="error"><?php echo $shecdoma["firstname"];?></span>

  <br><br>
  <h4 style="color:purple;"> Last Name: </h4> <input type="text" name="lastname">
  <span class="error"><?php echo $shecdoma["lastname"];?></span>

  <br><br>
  <h4 style="color:purple;"> Email: </h4><input type="text" name="email">
  <span class="error"><?php echo $shecdoma["email"];?></span>

  <br><br>
  <h4 style="color:purple;"> Password: </h4>  <input type="password" name="password">
  <span class="error"><?php echo $shecdoma["password"];?></span>

  <br><br>
  <h4 style="color:purple;"> Repeat Password: </h4>  <input type="password" name="passwordrepeat">
  <span class="error"><?php echo $shecdoma["passwordrepeat"];?></span>



  <br><br>
  <input type="submit" name="submit" value="Sign up">

</form>
<a href="login.php">Login</a>


</body>
</html>