<?php
session_start();


/*session_destroy();
$_SESSION = array();*/

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/warenkorb.css">


    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

    <!-- Ajax Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">

        function toggle(id) {
            var e = document.getElementById(id);
            e.classList.toggle("nav1");

        }

        function foggle(id) {
            var e = document.getElementById(id);
            e.classList.toggle("popover-small1");

        }

    </script>

</head>

<body>

    <!-- Header -->

    <header>
        <div id="header-left">
            <a href="javascript:toggle('nav')" id="burger"><i class="fa-solid fa-bars"></i></a>
            <a href="home.php"><img src="logo3.png" id="logo"></a>
        </div>


        <nav id="nav">
            <a href="#" class="nav-item">KATEGORIEN</a>
            <a href="#" class="nav-item">KATEGORIE 1</a>
            <a href="#" class="nav-item">KATEGORIE 2</a>
            <a href="#" class="nav-item">KATEGORIE 3</a>
        </nav>


        <div id="header-right">
            <a href="#header-right" class="gear_enable"><i class="fa-regular fa-user"></i></a>
            <a href="#" class="gear_disable"><i class="fa-solid fa-user"></i></a>
            <a href="javascript:foggle('popover-small')" class="popover-small-toggle"><i
                    class="fa-solid fa-user"></i></a>
            <!-- <i class="fa-solid fa-gear"></i> -->
            <div class="popover-large">
                <a class="popover-item" href="#"><i class="fa-solid fa-user"></i>PROFILE</a>
                <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
                <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
                <a class="popover-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
                <a class="popover-item" href="#"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
                <a class="popover-item" href="settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
            </div>
        </div>

        <div id="popover-small" class="popover-small">
            <a class="popover-item" href="#"><i class="fa-solid fa-user"></i>PROFILE</a>
            <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
            <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
            <a class="popover-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
            <a class="popover-item" href="#"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
            <a class="popover-item" href="settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
        </div>

    </header>

    <main>
        <div class="main-content">

                    <?php

                    echo "            
                    <div class='products'>
                    <div id='products-inner' class='products-inner'>";
                    /*print_r($_SESSION);
                    echo "<br>";*/

                    
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
                                    echo "<input type='hidden' name='price' value='" . $dsatz["prod_price"] . "'>";
                                    echo "<input type='hidden' name='discount_value' value='" . $dsatz["value"] . "'>";
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
                                    echo "<input type='hidden' name='price' value='" . $dsatz["prod_price"] . "'>";
                                    echo "<input type='hidden' name='discount_value' value='" . $dsatz["value"] . "'>";

                                    echo "<button class='button-trash-can'>";
                                    echo "<i class='fa-solid fa-minus'></i>";
                                    echo "</button>";
                                    echo "</form>";

                                    echo "</div>";

                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div id='prod-price-". $dsatz["prod_id"] ."' class='prod-price'>";

                                    $original_price_total += $dsatz["prod_price"] * $quantity;
                                    $after_discount = $dsatz["prod_price"] * ((100 - $dsatz["value"]) / 100) * $quantity;
                                    $after_discount_total += $after_discount;
                                    $discount_total = $original_price_total - $after_discount_total;

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


                                    /*Gesamtpreis des Produktes aktualiesieren*/
                                    echo "<script>";
                                    echo "$('#quantity-plus-" . $dsatz["prod_id"] . "').submit(function (add) {";
                                    echo "add.preventDefault();";
                                    echo "$.ajax({";
                                    echo "type: 'GET',";
                                    echo "url: 'gesamtpreis_produkt_ajax.php',";
                                    echo "data: $(this).serialize(),";
                                    echo "success: function (data) {";
                                    echo "$('#prod-price-" . $dsatz["prod_id"] . "').html(data);";
                                    echo "}";
                                    echo "});";
                                    echo "});";
                                    echo "</script>";

                                    echo "<script>";
                                    echo "$('#quantity-minus-" . $dsatz["prod_id"] . "').submit(function (minus) {";
                                    echo "minus.preventDefault();";
                                    echo "$.ajax({";
                                    echo "type: 'GET',";
                                    echo "url: 'gesamtpreis_produkt_ajax.php',";
                                    echo "data: $(this).serialize(),";
                                    echo "success: function (data) {";
                                    echo "$('#prod-price-" . $dsatz["prod_id"] . "').html(data);";
                                    echo "}";
                                    echo "});";
                                    echo "});";
                                    echo "</script>";


                                    /*Gesamtpreis & Rabatt aktualiesieren*/
                                    echo "<script>";
                                    echo "$('#quantity-plus-" . $dsatz["prod_id"] . "').submit(function (add) {";
                                    echo "add.preventDefault();";
                                    echo "$.ajax({";
                                    echo "type: 'GET',";
                                    echo "url: 'total_ajax.php',";
                                    echo "data: $(this).serialize(),";
                                    echo "success: function (data) {";
                                    echo "$('#total').html(data);";
                                    echo "}";
                                    echo "});";
                                    echo "});";
                                    echo "</script>";
                
                                    echo "<script>";
                                    echo "$('#quantity-minus-" . $dsatz["prod_id"] . "').submit(function (minus) {";
                                    echo "minus.preventDefault();";
                                    echo "$.ajax({";
                                    echo "type: 'GET',";
                                    echo "url: 'total_ajax.php',";
                                    echo "data: $(this).serialize(),";
                                    echo "success: function (data) {";
                                    echo "$('#total').html(data);";
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


                    
                    echo "</div>";
                    echo "</div>";
/*hier*/
                    echo "
                    <div class='total'>
                        <div id='total' class='total-inner'>
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
                        </div>
                    </div>
                    ";

                } else {
                    echo "<div class='empty-cart'>Your Cart is empty :(</div>";
                }


                    /*$original_price_total
                    $discount_total
                    $after_discount_total*/
                    ?>

            <!--
            <div class="total">
                <div class="total-inner">
                    <div class="original-price">
                        <div>Original Price</div>
                        <div>15 €</div>
                    </div>
                    <div class="discount">
                        <div>Discount</div>
                        <div>- 2 €</div>
                    </div>
                    <div class="total-price">
                        <div>Total</div>
                        <div class="total-price-price">13 €</div>
                    </div>
                    <button class="button-buy">
                        <div class="button-text">BUY</div>
                    </button>
                    <hr class="horizontal-line-2">
                    <a class="continue-shopping" href="home.php"><i class="fa-solid fa-backward"></i>Continue
                        Shopping</a>
                </div>
            </div>
                -->
        </div>
    </main>

    <!--
    <script> /*remove Pordukt von Warenkorb (in PHP)*/

        $('#trash-can').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'GET',
                url: 'warenkorb_remove.php',
                data: $(this).serialize(),
                success: function (data) {
                    $("#result").html(data);
                }
            });
        });


    </script>
    -->




    <footer>
        Footer
    </footer>

</body>

</html>