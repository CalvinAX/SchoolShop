<?php

include '../connections/root_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE prod_id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: products.php");
} else {
    echo "<script>console.log(" . $conn->error . ")</script>";
    header("location: products.php");
}
?>