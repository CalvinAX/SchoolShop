<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "SchoolShop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed! Reason: " . $conn->connect_error);
}

?>