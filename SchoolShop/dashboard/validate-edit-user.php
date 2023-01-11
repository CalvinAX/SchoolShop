<?php

include '../connections/root_connection.php';

$userFirstname = $_REQUEST['inputUserFirstname'];
$userLastname = $_REQUEST['inputUserLastname'];
$userGender = $_REQUEST['inputUserGender'];
$userEmail = $_REQUEST['inputUserEmail'];
$userUsername = $_REQUEST['inputUserUsername'];
$userRole = $_REQUEST['inputUserRole'];
$userAddress = $_REQUEST['inputUserAddress'];
$userCountry = $_REQUEST['inputUserCountry'];
$userCity = $_REQUEST['inputUserCity'];
$userZip = $_REQUEST['inputUserZip'];
$userId = $_REQUEST['id'];

if (isset($_POST['submit']) && !empty($_REQUEST['inputUserZip']) && !empty($_REQUEST['inputUserCity']) && !empty($_REQUEST['inputUserCountry']) && !empty($_REQUEST['inputUserAddress']) && isset($_REQUEST['inputUserRole']) && !empty($_REQUEST['inputUserFirstname']) && !empty($_REQUEST['inputUserLastname']) && !empty($_REQUEST['inputUserGender']) && !empty($_REQUEST['inputUserUsername'])) {

$sql = "UPDATE accounts SET name='$userFirstname', lastname='$userLastname', gender='$userGender', country='$userCountry', city='$userCity', zip_code='$userZip', address='$userAddress', username='$userUsername', email='$userEmail', role='$userRole' WHERE id='$userId'";

if ($conn->query($sql) === TRUE) {

    header("location: users.php");

} else {

    echo "<script>console.log(" . $conn->error . ")</script>";
    header("location: users.php");

}

} else {

    header("location: users.php");

}
?>