<?php
session_start();


$add = $_GET["add"];

$quantity = $_SESSION["warenkorb"][$add];

if ($_SESSION["warenkorb"][$add] > 1) {

    $quantity -= 1;

    $_SESSION["warenkorb"][$add] = $quantity;
}

echo $quantity

?>