<?php
 
$host = "sql12.freemysqlhosting.net";
 
$user = "sql12301018";
 
$password = "E9DrEiTwRC";
 
$db = "sql12301018";

$conn = new mysqli($host, $user, $password, $db);
 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
 
?>