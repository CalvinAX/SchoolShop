<?php
session_start();

if (isset($_GET["remove"])) {
    $remove = $_GET["remove"];

    unset($_SESSION["warenkorb"][$remove]);
}

$con = mysqli_connect("", "root", "", "schoolshop");

if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {

    $con = mysqli_connect("", "root", "", "schoolshop");
    $i = 0;

    foreach ($_SESSION["warenkorb"] as $prod_id => $quantity) {

        $res = mysqli_query($con, "SELECT * FROM products");
        while ($dsatz = mysqli_fetch_array($res)) {

            if ($dsatz["prod_id"] == $prod_id) {

                echo "<div class='product'>";

                echo "<a class='prod-pic-anchor' href='products/product.php?prod_id=" . $dsatz["prod_id"] . "'>";
                echo "<img class='prod-pic' src='" . $dsatz["prod_picture"] . "'>";
                echo "</a>";

                echo "<div class='title_price'>";
                echo "<div class='prod-title'>";
                echo $dsatz["prod_name"];

                echo "<form id='trash-can-". $dsatz["prod_id"] ."'>";
                echo "<input type='hidden' name='remove' value='" . $dsatz["prod_id"] . "'>";
                echo "<button class='button-trash-can'>";
                echo "<i class='fa-regular fa-trash-can'></i>";
                echo "</button>";
                echo "</form>";

                echo "</div>";

                echo "<div class='prod-price'>";
       /*hier*/ echo "<div class='form-quantity'><form><input class='form-quantity-input' placeholder='5'></form></div>";
                echo number_format($dsatz["prod_price"], 2, ",", ".") . " &euro;";
                echo "</div>";
                echo "</div>";

                echo "</div>";

                $i++;
                if ($i < count($_SESSION["warenkorb"])){

                    echo "<hr class='horizontal-line-1'>";
                }

                


                /*JavaScript in PHP*/

                echo "<script>";
                echo "$('#trash-can-" . $dsatz["prod_id"] . "').submit(function (event) {";
                echo "event.preventDefault();";
                echo "$.ajax({";
                echo "type: 'GET',";
                echo "url: 'warenkorb_remove.php',";
                echo "data: $(this).serialize(),";
                echo "success: function (data) {";
                echo "$('#products-inner').html(data);";
                echo "}";
                echo "});";
                echo "});";
                echo "</script>";

            }
        }
    }
} else {
    echo "<div class='empty-cart'>Your Cart is empty :(</div>";
}
?>