<?php
// Functions to filter user inputs
function filterEmail($email){
    // Sanitize e-mail address
    $field = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return $email;
    } else{
        return FALSE;
    }
}

// Define variables and initialize with empty values
$emailErr = "";
$email = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
        else {
            $email_split = explode("@", $email);
            $username = $email_split[0];
            echo("<h1>Welcome $username</h1>");
        };
    }
}
?>