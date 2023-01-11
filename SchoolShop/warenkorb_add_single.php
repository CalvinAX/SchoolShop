<?php
session_start();

$add = $_GET["add"];

if ($_GET["stock"] > 0 && isset($_GET["add"]) && $_SESSION["warenkorb"][$add] < $_GET["stock"]) {


    if (!isset($_SESSION["warenkorb"])) {
        $_SESSION = array("warenkorb" => array($add => 0));
    }
    if (!isset($_SESSION["warenkorb"][$add])) {
        $_SESSION["warenkorb"][$add] = 0;
    }

    $quantity = $_SESSION["warenkorb"][$add];
    $quantity += 1;
    $_SESSION["warenkorb"][$add] = $quantity;
}

    echo $_SESSION["warenkorb"][$add];


?>