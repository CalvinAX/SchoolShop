<?php
session_start();

$original_price_total = 0;
$discount_total = 0;
$after_discount_total = 0;

if (!empty($_SESSION["warenkorb"])) {

    $con = mysqli_connect("", "root", "Yv44#1l6VeFe", "schoolshop");
    $sql = "SELECT products.*, discount.value 
            FROM products LEFT JOIN discount ON products.d_id = discount.d_id";

    foreach ($_SESSION["warenkorb"] as $prod_id => $quantity) {

        $res = mysqli_query($con, $sql);
        while ($dsatz = mysqli_fetch_array($res)) {

            if ($dsatz["prod_id"] == $prod_id) {

                $original_price_total += $dsatz["prod_price"] * $quantity;
                $after_discount = $dsatz["prod_price"] * ((100 - $dsatz["value"]) / 100) * $quantity;
                $after_discount_total += $after_discount;
                $discount_total = $original_price_total - $after_discount_total;


            }
        }
    }
    mysqli_close($con);
}


echo "
<div class='original-price'>
    <div>Original Price</div>
    <div>&#36; " . number_format($original_price_total, 2, ".", ",") . "</div>
    
    </div>
<div class='discount'>
    <div>Discount</div>
    <div>&#36; &#45;" . number_format($discount_total, 2, ".", ",") . "</div>
</div>
<div class='total-price'>
    <div>Total</div>
    <div class='total-price-price'>&#36; " . number_format($after_discount_total, 2, ".", ",") . "</div>
</div>
<form id='checkout' action='checkout.php' method='post' class='button-buy-anchor'>
<input type='hidden' name='original_price_total' value='$original_price_total'>
<input type='hidden' name='discount_total' value='$discount_total'>
<input type='hidden' name='after_discount_total' value='$after_discount_total'>
<button class='button-buy'>
    <div class='button-text'>BUY</div>
</button>
</form>
<hr class='horizontal-line-2'>
<a class='continue-shopping' href='home.php'><i class='fa-solid fa-backward'></i>Continue
    Shopping</a>
";

if (empty($_SESSION["warenkorb"])) {
    echo "
    <script>
    $('#checkout').submit(function (checkout) {
    checkout.preventDefault();
    });
    </script>";
}


?>