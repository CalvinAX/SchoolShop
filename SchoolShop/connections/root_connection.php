<?php

$servername = "localhost:3306";
$username = "root";
$password = "Yv44#1l6VeFe";
$dbname = "SchoolShop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed! Reason: " . $conn->connect_error);
}

?>