<?php
/*
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
*/

$con = mysqli_connect("", "root", "", "test");
$sql = "SELECT * From products, category 
        WHERE products.c_id = category.c_id";
$res = mysqli_query($con, $sql);

while ($dsatz = mysqli_fetch_array($res)){

    echo $dsatz["name"] . "<br>";
    echo $dsatz["picture"] . "<br>";
}

$sql2 = "SELECT * FROM products";
$res2 = mysqli_query($con, $sql2);
while ($dsatz2 = mysqli_fetch_array($res2)){

    echo $dsatz["name"] . "<br>";
    echo $dsatz["picture"] . "<br>";
}

?>