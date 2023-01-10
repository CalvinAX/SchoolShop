<?php
session_start();

if (!empty($_SESSION["warenkorb"])) {

    foreach ($_SESSION["warenkorb"] as $key => $value) {

        $products[] = $key;
        $menge[] = $value;
    }

    for ($i = 0; $i < count($products); $i++) {

        echo $products[$i] . "<br>";
        echo $menge[$i] . "<br>";
    }
}

session_destroy();

?>