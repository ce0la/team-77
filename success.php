<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
    header("Location: index.php");

}
?>
<h2>YOU HAVE LOGGED IN!</h2>