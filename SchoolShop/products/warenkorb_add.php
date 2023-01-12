<?php
session_start();

$add = $_GET["add"];


if ($_GET["stock"] > 0 && isset($_GET["add"])) {


    if (!isset($_SESSION["warenkorb"])) {
        $_SESSION = array("warenkorb" => array($add => 0));
    }
    if (!isset($_SESSION["warenkorb"][$add])) {
        $_SESSION["warenkorb"][$add] = 0;
    }

    if ($_SESSION["warenkorb"][$add] < $_GET["stock"]) {

        $quantity = $_SESSION["warenkorb"][$add];
        $quantity += 1;
        $_SESSION["warenkorb"][$add] = $quantity;
    }
}


/*Gesamtmenge an Produkten im Warenkorb*/

if (count($_SESSION["warenkorb"]) > 0) {

    $gesamtmenge = 0;

    foreach ($_SESSION["warenkorb"] as $key => $value) {

        $products[] = $key;
        $menge[] = $value;
    }

    for ($i = 0; $i < count($products); $i++) {

        $gesamtmenge = $gesamtmenge + $menge[$i];
    }

    if (isset($_GET["buy"]) && $_GET["buy"] == 1 && $_GET["stock"] > 0) {

        echo $gesamtmenge - 1;
        echo "<script>location.replace('../warenkorb.php');</script>";
    } else {
        echo $gesamtmenge;
    }
}
?>