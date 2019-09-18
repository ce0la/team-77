<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Sign In</title>
</head>
<body>
    

<?php
session_start();

$email="user";
$password="password";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: success.php");
}
if(isset($_POST["$email"]) && isset($_POST["$password"])) {
    if ($_POST["email"] == $email && $_POST["$password"] == $password){
        $_SESSION["loggedin"] == true;
        header("Location: success.php");
    }
}
?>



  
    <div class="login input-icons">
        <form action="#" method="POST">
          <!--<h1>Sign In</h1>-->
             <i class="fa fa-envelope icon"></i>
            <label for="email">Email/Username</label>
            
            <p><input id="email" name="email" type="email" placeholder="example@xyz.com" required/></p>

            <i class="fa fa-key icon"> 
            </i> 

            <label for="password">Password</label>
            <p><input id="password" name="password" type="password" placeholder="minimum of 8 characters" pattern=".{8,}" required/></p>
            <p><input id="signedin"type="checkbox"> Keep me Signed in </p>
            <p><a href="#">Forgot Password?</a></p>
            <button>Login</button>
           <!--<p class="message">Don't have an account? <a href="#" target="_blank">Sign Up</a></p>--> 
           <p> </p>
        </form>
    </div>
    
</body>
</html>