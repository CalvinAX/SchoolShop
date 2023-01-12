<?php

header("Content-Type:application/json");

include '../../connections/root_connection.php';

$sql = "SELECT * FROM products";

$results = $conn->query($sql);

$data = array();

while($fetchedRecords = mysqli_fetch_assoc($results) ) {
    $data[] = $fetchedRecords;
}

echo json_encode($data);

?>