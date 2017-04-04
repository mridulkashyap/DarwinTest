<?php
//Set your variables
$host = "localhost";
$username = "root";
$password = "";
$database = "darwintest";

$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);

$query = file_get_contents("darwintest.sql");

$stmt = $db->prepare($query);

if ($stmt->execute())
     echo "Success";
else 
     echo "Fail";
?>