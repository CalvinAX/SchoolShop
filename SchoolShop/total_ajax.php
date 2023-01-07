<?php

session_start();

$con = mysqli_connect("", "root", "", "schoolshop");
$sql = "SELECT products.*, discount.value 
            FROM products LEFT JOIN discount ON products.d_id = discount.d_id";

$original_price_total = 0;
$after_discount_total = 0;

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

echo "
<div class='original-price'>
    <div>Original Price</div>
    <div>" . number_format($original_price_total, 2, ".", ",") . " &#36;</div>
    
    </div>
<div class='discount'>
    <div>Discount</div>
    <div>&#45; " . number_format($discount_total, 2, ".", ",") . " &#36;</div>
</div>
<div class='total-price'>
    <div>Total</div>
    <div class='total-price-price'>" . number_format($after_discount_total, 2, ".", ",") . " &#36;</div>
</div>
<form action='checkout.php' method='post' class='button-buy-anchor'>
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



?>