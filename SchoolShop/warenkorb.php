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
            <!--
            <a href="#" class="nav-item">KATEGORIEN</a>
            <a href="#" class="nav-item">KATEGORIE 1</a>
            <a href="#" class="nav-item">KATEGORIE 2</a>
            <a href="#" class="nav-item">KATEGORIE 3</a>
            -->
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
            <div class="products">
                <div id="products-inner" class="products-inner">
                    <?php
                    /*print_r($_SESSION);
                    echo "<br>";*/

                    
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
                </div>
            </div>
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