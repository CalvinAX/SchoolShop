<?php
session_start();

$_SESSION["login"] = array();
header("Location: home.php");
?>