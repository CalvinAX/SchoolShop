<?php

include '../connections/root_connection.php';

$userFirstname = htmlspecialchars($_REQUEST['inputUserFirstname']);
$userLastname = htmlspecialchars($_REQUEST['inputUserLastname']);
$userGender = htmlspecialchars($_REQUEST['inputUserGender']);
$userEmail = htmlspecialchars($_REQUEST['inputUserEmail']);
$userUsername = htmlspecialchars($_REQUEST['inputUserUsername']);
$userRole = htmlspecialchars($_REQUEST['inputUserRole']);
$userAddress = htmlspecialchars($_REQUEST['inputUserAddress']);
$userCountry = htmlspecialchars($_REQUEST['inputUserCountry']);
$userCity = htmlspecialchars($_REQUEST['inputUserCity']);
$userZip = htmlspecialchars($_REQUEST['inputUserZip']);
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