<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="shoes_shop";
$conn = new mysqli($hostname,$username, $password,$dbname);  
if($conn->connect_error) {
    die("Database connection failed"). $conn->connect_error;
}
?>