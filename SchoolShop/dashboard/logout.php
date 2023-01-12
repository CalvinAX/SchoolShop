<?php

session_start();
include '../connections/root_connection.php';

if (isset($_SESSION['id'])) {
    $id_login = $_SESSION['id'];
    $sql_logged_in = mysqli_query($conn, "UPDATE accounts SET logged_in='0' WHERE id=$id_login");

    session_destroy();
    header("location: login.php");
} else {
    echo "<strong>No session to log out off</strong>";
    header("location: login.php");
}

?>