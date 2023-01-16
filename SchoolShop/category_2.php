<?php
session_start();

if (!isset($_SESSION['login']['id'])) {
    $_SESSION['login'] = array();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">


    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

    <script type="text/javascript">

        /* kann zu einer funktion angepasst werden */

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
            <a href="home.php"><img src="logo8.png" id="logo"></a>
        </div>


        <nav id="nav">
            <a href="home.php" class="nav-item">ALL PRODUCTS</a>
            <a href="category_3.php" class="nav-item">SALE</a>
            <a href="category_1.php" class="nav-item">FRUITS</a>
            <a href="#" class="nav-item active">VEGETABLES</a>
        </nav>


        <div id="header-right">
            <a class="warenkorb-icon" href="warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>
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
                <a class="popover-item" href="profile.php"><i class="fa-solid fa-user"></i>PROFILE</a>
                <?php if (!isset($_SESSION['login']['id'])) { echo '
                <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
                <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
                '; } else { echo '
                <a class="popover-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
                '; } ?>
                <a class="popover-item" href="warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
            </div>
        </div>

        <div id="popover-small" class="popover-small">
            <a class="popover-item" href="profile.php"><i class="fa-solid fa-user"></i>PROFILE</a>
            <?php if (!isset($_SESSION['login']['id'])) { echo '
            <a class="popover-item" href="login.php"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
            <a class="popover-item" href="signup.php"><i class="fa-solid fa-lock-open"></i>SIGN UP</a>
            '; } else { echo '
            <a class="popover-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
            '; } ?>
            <a class="popover-item" href="warenkorb.php"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
        </div>

    </header>


    <!-- Main Content -->
    <div class="main-outer">
    <main>

        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $sql = "SELECT products.*, category.category_name, discount.value 
                FROM products 
                LEFT JOIN category ON products.c_id = category.c_id 
                LEFT JOIN discount ON products.d_id = discount.d_id
                WHERE category.category_name = 'vegetable' 
                ORDER BY prod_stock DESC";
        $res = mysqli_query($con, $sql);
        while ($dsatz = mysqli_fetch_array($res)) {

                echo "<div class='article2'>";
                echo "<a href='products/product.php?prod_id=" . $dsatz["prod_id"] . "'>";
                echo "<div class='article'>";
                echo "<article>";
                echo "<div class='prod-pic-outer'>";
                echo "<img class='prod-pic' src='products/pictures/" . $dsatz["prod_picture"] . "' alt=''>";
                echo "</div>";
                echo "<div class='prod-body'>";
                echo "<h1>" . $dsatz["prod_name"] . "</h1>";
                echo "<div class='prod-bottom'>";
                echo "<div class='availability'>";

                if ($dsatz["prod_stock"] > 0) {
                    echo "<div class='in_stock_true'>In Stock</div>";
                    echo "<div class = 'dot'>•</div>"
                        . "<div class='quantity_true'>" . $dsatz["prod_stock"] . "</div>";
                } else {

                    echo "<div class='in_stock_false'>Sold Out</div>";
                }

                echo "</div>";

                $total = $dsatz["prod_price"] * ((100 - $dsatz["value"]) / 100);

                echo "<div class='price'>";

                if ($dsatz["value"] > 0){

                echo "<div class='price_original'>
                    &#36; " . number_format($dsatz["prod_price"], 2, ".", ",") . "
                    </div>";
                }

                echo "<div class='price_actual'>
                    &#36; " . number_format($total, 2, ".", ",") . "
                    </div>
                </div>";
                echo "</div>";
                echo "</div>";
                echo "</article>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
        }
        
        mysqli_close($con);
        ?>

    </main>
    </div>

    <footer>
    <a href="sources.html" class="footer-anchor">Text und Bildquellen</a>
    </footer>

</body>

</html>
