<?php
session_start();

$price = $_GET["price"];
$add = $_GET["add"];
$discount_value = $_GET["discount_value"];
$quantity = $_SESSION["warenkorb"][$add];

$after_discount = $price * ((100 - $discount_value) / 100) * $quantity;

echo number_format($after_discount, 2, ".", ",") . " &#36;";
?>
