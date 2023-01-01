<?php
session_start();

if (isset($_GET["add"])) {
    $add = $_GET["add"];
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
/*session_destroy();
$_SESSION = array();*/



/*Gesamtmenge an Produkten im Warenkorb*/

$gesamtmenge = 0;

foreach ($_SESSION["warenkorb"] as $key => $value) {

    $products[] = $key;
    $menge[] = $value;
}

for ($i = 0; $i < count($products); $i++) {

    $gesamtmenge = $gesamtmenge + $menge[$i];
}

if (isset($_GET["buy"])) {

    if ($_GET["buy"] == 1) {
        echo $gesamtmenge - 1;
        echo "<script>location.replace('../warenkorb.php');</script>";
    }
} 
else {
    echo $gesamtmenge;
}

/* Idee für dynamische Warenkorb-Menge:
1. Menge in SESSION speichern und auf seite ausgeben (neben Warenkorb-Icon)
Problem: da Seite nicht neugeladen wird, wird die Warenkorbmenge nicht dynamisch angepass und behält daher den alten
Wert
2. Nach dem Aufruf der warenkorb_add.php (this), wird das div, in dem sich der Code für das Ausgeben der Warenkorb-Menge
befindet,
durch den Rückgabewert (aktuallisiertes SESSION-Array) überschrieben
Problem: Beim Erstaufruf der Seite gibt die warenkorb_add.php Datei keinen Rückgabewert, daher muss 1. existieren
*/
?>