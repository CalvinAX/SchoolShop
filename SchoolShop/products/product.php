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
                <a class="popover-item" href="../settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
            </div>
        </div>

        <div id="popover-small" class="popover-small">
            <a class="popover-item" href="#"><i class="fa-solid fa-user"></i>PROFILE</a>
            <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
            <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
            <a class="popover-item" href="#"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
            <a class="popover-item" href="../warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
            <a class="popover-item" href="../settings.php"><i class="fa-solid fa-gear"></i>SETTINGS</a>
        </div>

    </header>

    <main>
        <div class="content">
        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $sql = "SELECT products.*, discount.value, category.category_name FROM products 
                    LEFT JOIN discount ON products.d_id = discount.d_id 
                    LEFT JOIN category ON products.c_id = category.c_id";
        $res = mysqli_query($con, $sql);
        while ($dsatz = mysqli_fetch_array($res)) {
            if ($dsatz["prod_id"] == $_GET["prod_id"]) {

                $prod_id = $dsatz["prod_id"];
                $prod_stock = $dsatz["prod_stock"];

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

                $total = $dsatz["prod_price"] * ((100 - $dsatz["value"]) / 100);

                echo 
                "</div>
                <div class='price-buy'>
                
                <div class='price'>";
                if ($dsatz["prod_stock"] > 0) {

                    if ($dsatz["value"] > 0) {

                    echo "<div class='original-price'>"
                    . number_format($dsatz["prod_price"], 2, ".", ",") . " &#36;
                    </div>

                    <div class='discount'>
                    -" . $dsatz["value"] . "%
                    </div>";
                    }

                    echo
                    "<div class='prod-price'>"
                    . number_format($total, 2, ".", ",") . " &#36;
                </div>";
                }

                echo
                "</div>
                <div class='buy'>
                <div class='shopping_cart'>
                <form id='shopping_cart'>
                <input type='hidden' name='add' value='" . $_GET["prod_id"] . "'>
                <input type='hidden' name='stock' value='" . $dsatz["prod_stock"] . "'>
                <button class='shopping_cart-button'>
                <i class='fa-solid fa-cart-shopping'></i>
                </button>
                </form>

                <div id='prod_quantity-outer'>";

                if (isset($_SESSION["warenkorb"][$dsatz["prod_id"]])){

                echo "<div class='prod_quantity'>";

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

                echo "</div>";
            }

                echo 
                "</div>
                </div>
                <form id='button-buy' class='button-buy-form'>
                <input type='hidden' name='add' value='" . $_GET["prod_id"] . "'>
                <input type='hidden' name='stock' value='" . $dsatz["prod_stock"] . "'>
                <input type='hidden' name='buy' value='1'>
                <button class='";

                if ($dsatz["prod_stock"] > 0)
                    echo "button-buy";
                else
                    echo "button-buy-soldout";
                
                echo "'>
                <div class='button-text'>BUY</div>
                </button>
                </form'>
                </div>
                </div>
                </div>

                </div>

                <div class='middle-content'>

                <div class='middle-content-left'>

                <div class='heading'>
                About the Product
                </div>

                <div class='description'>"
                . $dsatz["prod_description"] .
                "</div>

                </div>

                <div class='middle-content-right'>
                bewertung und andere wichtige infos
                </div>

                </div>

                <div class='category'>
                Categorys
                <div class='category-item'>"
                . $dsatz["category_name"]
                . "</div>
                </div>
                
                <div class='media'>
                <div class='heading'>Media</div>
                <img class='slider' src='../" . $dsatz["prod_picture"] . "'>
                </div>

                <div class='detailed-description section'>
                <div class='heading'>Description</div>
                <div class='description'>"
                . $dsatz["prod_description"]
                . "</div>
                </div>

                <div class='rating section'>
                <div class='heading'>Rating</div>
                <div class='rating-box'>
                10/10
                </div>
                </div>


                <div class='reviews section'>
                <div class='heading'>Recent Reviews</div>
                <div class='reviews-box'>

                <div class='reviews-box-items'>
                <div class='customer'>
                Peter
                </div>
                <div class='review'>
                Lorem ipsum dolor sit amet
                </div>
                </div>

                <div class='reviews-box-items'>
                <div class='customer'>
                Anton
                </div>
                <div class='review'>
                Lorem ipsum dolor sit amet
                </div>
                </div>

                </div>
                </div>";
                
                /*echo "<form action='product.php?prod_id=" . $dsatz["prod_id"] . "' method='post'>";
                <!--<a class="shopping_cart">
                <i class="fa-solid fa-cart-shopping"></i>
                </a>-->
                echo "<input type='submit' value='In den Warenkorb'>";*/

            }

        }

        mysqli_close($con);
        ?>


        <div id="prod_quantity">
        Warenkorb-Menge des Produkts:
            <?php
                /* Menge eines einzelnen Produktes im Warenkorb */
                /*Array müssen zurückgesetzt werden, da sonst die Werte von oben übernommen werden würden
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
                }*/
            ?>

            </div>
        

        <script>

            $('#shopping_cart').submit(function (add) {
                add.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: 'warenkorb_add.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $("#result").html(data);
                    }
                });

            });


            $('#button-buy').submit(function (add) {
                add.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: 'warenkorb_add.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $("#result").html(data);
                    }
                });

            });


            $('#shopping_cart').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: '../prod_quantity.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $("#prod_quantity-outer").html(data);
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