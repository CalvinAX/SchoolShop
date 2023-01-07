<?php
session_start();

if (isset($_GET["remove"])) {
    $remove = $_GET["remove"];

    unset($_SESSION["warenkorb"][$remove]);
} 



if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {

    $con = mysqli_connect("", "root", "", "schoolshop");
    $sql = "SELECT products.*, discount.value 
                FROM products LEFT JOIN discount ON products.d_id = discount.d_id";
    $j = 0;
    $original_price_total = 0;
    $after_discount_total = 0;

    foreach ($_SESSION["warenkorb"] as $prod_id => $quantity) {

        $res = mysqli_query($con, $sql);
        while ($dsatz = mysqli_fetch_array($res)) {

            if ($dsatz["prod_id"] == $prod_id) {

                echo "<div class='product'>";

                echo "<a class='prod-pic-anchor' href='products/product.php?prod_id=" . $dsatz["prod_id"] . "'>";
                echo "<img class='prod-pic' src='" . $dsatz["prod_picture"] . "'>";
                echo "</a>";

                echo "<div class='title_price'>";
                echo "<div class='prod-title'>";
                echo $dsatz["prod_name"];

                echo "<div class='quantity'>";

                echo "<form id='trash-can-". $dsatz["prod_id"] ."' class='trash-can'>";
                echo "<input type='hidden' name='remove' value='" . $dsatz["prod_id"] . "'>";
                echo "<button class='button-trash-can'>";
                echo "<i class='fa-regular fa-trash-can'></i>";
                echo "</button>";
                echo "</form>";

                echo "<div class='quantity-right'>";
                echo "<div class='quantity-right-inner'>";

                echo "<form id='quantity-plus-". $dsatz["prod_id"] ."'>";
                echo "<input type='hidden' name='add' value='" . $dsatz["prod_id"] . "'>";
                echo "<input type='hidden' name='stock' value='" . $dsatz["prod_stock"] . "'>";
                echo "<button class='button-trash-can'>";
                echo "<i class='fa-solid fa-plus'></i>";
                echo "</button>";
                echo "</form>";

                echo "<div id='quantity-value-" . $dsatz["prod_id"] . "' class='quantity-value'>";


                if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {
                    $products = array();
            
            
                    foreach ($_SESSION["warenkorb"] as $key => $value) {
            
                        $products[] = $key;
                    }
            
                    for ($i = 0; $i < count($products); $i++) {
            
                        if ($products[$i] == $dsatz["prod_id"]) {
            
                        echo "<div class='prod_quantity'>"
                            . $_SESSION["warenkorb"][$dsatz["prod_id"]]
                            . "</div>";
                        }
                    }
                }
                
                
                echo "</div>";

                echo "<form id='quantity-minus-". $dsatz["prod_id"] ."'>";
                echo "<input type='hidden' name='add' value='" . $dsatz["prod_id"] . "'>";
                echo "<input type='hidden' name='stock' value='" . $dsatz["prod_stock"] . "'>";

                echo "<button class='button-trash-can'>";
                echo "<i class='fa-solid fa-minus'></i>";
                echo "</button>";
                echo "</form>";

                echo "</div>";

                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "<div class='prod-price'>";

                $after_discount = $dsatz["prod_price"] * ((100 - $dsatz["value"]) / 100) * $quantity;
                $original_price_total += $dsatz["prod_price"] * $quantity;
                $after_discount_total += $after_discount * $quantity;

                echo number_format($after_discount, 2, ".", ",") . " &#36;";
                echo "</div>";
                echo "</div>";

                echo "</div>";

                $j++;
                if ($j < count($_SESSION["warenkorb"])){

                    echo "<hr class='horizontal-line-1'>";
                }


                /*JavaScript in PHP*/

                /*trashcan*/
                echo "<script>";
                echo "$('#trash-can-" . $dsatz["prod_id"] . "').submit(function (remove) {";
                echo "remove.preventDefault();";
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

                /*plus*/
                echo "<script>";
                echo "$('#quantity-plus-" . $dsatz["prod_id"] . "').submit(function (add) {";
                echo "add.preventDefault();";
                echo "$.ajax({";
                echo "type: 'GET',";
                echo "url: 'warenkorb_add_single.php',";
                echo "data: $(this).serialize(),";
                echo "success: function (data) {";
                echo "$('#quantity-value-" . $dsatz["prod_id"] . "').html(data);";
                echo "}";
                echo "});";
                echo "});";
                echo "</script>";

                /*minus*/
                echo "<script>";
                echo "$('#quantity-minus-" . $dsatz["prod_id"] . "').submit(function (minus) {";
                echo "minus.preventDefault();";
                echo "$.ajax({";
                echo "type: 'GET',";
                echo "url: 'warenkorb_minus.php',";
                echo "data: $(this).serialize(),";
                echo "success: function (data) {";
                echo "$('#quantity-value-" . $dsatz["prod_id"] . "').html(data);";
                echo "}";
                echo "});";
                echo "});";
                echo "</script>";

/*

                $('#shopping_cart').submit(function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'GET',
                        url: 'warenkorb_add.php',
                        data: $(this).serialize(),
                        success: function (data) {
                            $("#result").html(data);
                        }
                    });
    
                });
                */

            }
        }
    }
} else {
    echo "<div class='empty-cart'>Your Cart is empty :(</div>";
}

?>