<?php

header("Content-Type:application/json");

include '../../connections/root_connection.php';

$sql = "SELECT * FROM category";

$results = $conn->query($sql);

$data = mysqli_fetch_array($results);

echo json_encode($data);


// [
// {"FRUIT" : "5"},
// {"VEGETABLE" : "3"}
// ]

?>