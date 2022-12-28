<?php

session_start();

if(isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
} else {
    echo "<strong>No session to log out off</strong>";
    //header("location: index.php");
}

?>