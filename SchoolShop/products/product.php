<?php
session_start();

/*
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
session_destroy();
$_SESSION = array();
print_r($_SESSION);
*/

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/product.css">


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
            <a href="../home.php"><img src="../logo3.png" id="logo"></a>
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
            <a class="warenkorb-icon" href="../warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>
                <div id="result">


                <?php
                    /*Gesamtmenge an Produkten im Warenkorb*/
                    if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {

                        $gesamtmenge = 0;

                        foreach ($_SESSION["warenkorb"] as $key => $value) {

                            $products[] = $key;
                            $menge[] = $value;
                        }

                        for ($i = 0; $i < count($products); $i++) {

                            $gesamtmenge = $gesamtmenge + $menge[$i];
                        }

                        echo $gesamtmenge;
                    }
                    else {
                        echo 0;
                    }
                    ?>


                </div>
            </a>

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
                <a class="popover-item" href="../warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
                <a class="popover-item" href="settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
            </div>
        </div>

        <div id="popover-small" class="popover-small">
            <a class="popover-item" href="#"><i class="fa-solid fa-user"></i>PROFILE</a>
            <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
            <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
            <a class="popover-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
            <a class="popover-item" href="../warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
            <a class="popover-item" href="settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
        </div>

    </header>

    <main>
        <div class="content">
        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $res = mysqli_query($con, "SELECT * FROM products");
        while ($dsatz = mysqli_fetch_array($res)) {
            if ($dsatz["prod_id"] == $_GET["prod_id"]) {

                $prod_id = $dsatz["prod_id"];

                echo "<div class='upper-content'>";

                echo "<img class='prod-pic' src='../" . $dsatz["prod_picture"] . "'>";

                echo "<div class='upper-right-content'>";
                echo "<div class='title'>";
                echo $dsatz["prod_name"];
                echo "</div>";

                echo "<div class='stock'>";
                if ($dsatz["prod_stock"] > 0) {
                    echo "<div class='in-stock'>In Stock</div>" . "<div class='quantity'>" . $dsatz["prod_stock"] . "</div>";
                }
                else{
                    echo "<div class='in-stock in_stock_false'>Sold Out</div>";
                }
                echo "</div>";
                echo "<div class='price-buy'>";
                
                echo "<div class='price'>";

                echo "<div class='original-price'>";
                echo "50 €";
                echo "</div>";

                echo "<div class='discount'>";
                echo "-50%";
                echo "</div>";

                echo "<div class='prod-price'>";
                echo number_format($dsatz["prod_price"], 2, ".", ",") . " &euro;";
                echo "</div>";
                echo "</div>";

                echo "<div class='buy'>";
                echo "<form id='shopping_cart' class='shopping_cart'>";
                echo "<input type='hidden' name='add' value='" . $_GET["prod_id"] . "'>";
                echo "<button class='shopping_cart-button'>";
                echo "<i class='fa-solid fa-cart-shopping'></i>";
                echo "</button>";
                echo "</form>";

                echo "<form id='button-buy' class='button-buy-form'>";
                echo "<input type='hidden' name='add' value='" . $_GET["prod_id"] . "'>";
                echo "<input type='hidden' name='buy' value='1'>";
                echo "<button class='button-buy'>";
                echo "<div class='button-text'>BUY</div>";
                echo "</button>";
                echo "</form'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "</div>";

                echo "<div class='middle-content'>";

                echo "<div class='middle-content-left'>";

                echo "<div class='heading'>";
                echo "About the Product";
                echo "</div>";

                echo "<div class='description'>";
                echo $dsatz["prod_description"];
                echo "</div>";

                echo "</div>";

                echo "<div class='middle-content-right'>";
                echo "bewertung und andere wichtige infos";
                echo "</div>";

                echo "</div>";

                echo "<div class='category'>";
                echo "Categorys";
                echo "<div class='category-item'>";
                echo $dsatz["prod_category"];
                echo "</div>";
                echo "</div>";
                
                echo "<div class='media'>";
                echo "<div class='heading'>Media</div>";
                echo "<img class='slider' src='../" . $dsatz["prod_picture"] . "'>";
                echo "</div>";

                echo "<div class='detailed-description section'>";
                echo "<div class='heading'>Description</div>";
                echo "<div class='description'>";
                echo $dsatz["prod_description"];
                echo "</div>";
                echo "</div>";

                echo "<div class='rating section'>";
                echo "<div class='heading'>Rating</div>";
                echo "<div class='rating-box'>";
                echo "10/10";
                echo "</div>";
                echo "</div>";


                echo "<div class='reviews section'>";
                echo "<div class='heading'>Recent Reviews</div>";
                echo "<div class='reviews-box'>";

                echo "<div class='reviews-box-items'>";
                echo "<div class='customer'>";
                echo "Peter";
                echo "</div>";
                echo "<div class='review'>";
                echo "Lorem ipsum dolor sit amet";
                echo "</div>";
                echo "</div>";

                echo "<div class='reviews-box-items'>";
                echo "<div class='customer'>";
                echo "juicer";
                echo "</div>";
                echo "<div class='review'>";
                echo "Lorem ipsum dolor sit amet";
                echo "</div>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                
                /*echo "<form action='product.php?prod_id=" . $dsatz["prod_id"] . "' method='post'>";
                <!--<a class="shopping_cart">
                <i class="fa-solid fa-cart-shopping"></i>
                </a>-->
                echo "<input type='submit' value='In den Warenkorb'>";*/

            }

        }
        ?>

        <div>
            <p>Warenkorb-Menge des Produkts:
                <?php
                /* Menge eines einzelnen Produktes im Warenkorb */

                /*Array müssen zurückgesetzt werden, da sonst die Werte von oben übernommen werden würden*/
                if (isset($_SESSION["warenkorb"]) && count($_SESSION["warenkorb"]) <> 0) {
                $products = array();


                foreach ($_SESSION["warenkorb"] as $key => $value) {

                    $products[] = $key;
                }

                for ($i = 0; $i < count($products); $i++) {

                    if ($products[$i] == $_GET["prod_id"]) {

                        echo $_SESSION["warenkorb"][$_GET["prod_id"]];
                    }
                }
            }
                ?>
            </p>
        </div>

        <script>

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


            $('#button-buy').submit(function (event) {
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
        </script>

        </div>

    </main>

    <footer>
        Footer
    </footer>

</body>

</html>