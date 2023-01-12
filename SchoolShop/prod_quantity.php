<?php
session_start();         
    /* Menge eines einzelnen Produktes im Warenkorb */

    if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {
        $products = array();


        foreach ($_SESSION["warenkorb"] as $key => $value) {

            $products[] = $key;
        }

        for ($i = 0; $i < count($products); $i++) {

            if ($products[$i] == $_GET["add"]) {

            echo "<div class='prod_quantity'>"
                . $_SESSION["warenkorb"][$_GET["add"]]
                . "</div>";
            }
        }
    }
?>