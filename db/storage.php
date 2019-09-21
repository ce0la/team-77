<?php 
$host = "localhost";
$dbuser = "root";
$dbpword = "";
$dbname = "team77";
$table = "users";

$username = "";
$email = "";
$errors = array();

$connection = new mysqli($host, $dbuser, $dbpword, $dbname);

if(!$connection){
    die("Unable to connect to Database. Error: ".mysql_error());
}

$connection->close();

?>