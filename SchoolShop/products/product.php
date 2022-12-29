<?php
session_start();

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

/*session_destroy();
$_SESSION = array();*/

print_r($_SESSION);
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
        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $res = mysqli_query($con, "SELECT * FROM products");
        while ($dsatz = mysqli_fetch_array($res)) {
            if ($dsatz["prod_id"] == $_GET["prod_id"]) {

                $prod_id = $dsatz["prod_id"];

                echo "<div class='slider content'>";
                echo "<img class='prod-pic' src='../" . $dsatz["prod_picture"] . "'>";
                echo "</div>";

                echo "<div class='title content'>";
                echo $dsatz["prod_name"];
                echo "</div>";

                echo "<div class='description content'>";
                echo $dsatz["prod_description"];
                echo "</div>";

                echo "<div class='price content'>";
                echo $dsatz["prod_price"];
                echo "</div>";

                echo "<div class='stock content'>";
                echo $dsatz["prod_stock"];
                echo "</div>";

                echo "<div class='category content'>";
                echo $dsatz["prod_category"];
                echo "</div>";

                /*echo "<form action='product.php?prod_id=" . $dsatz["prod_id"] . "' method='post'>";
                <!--<a class="shopping_cart">
                <i class="fa-solid fa-cart-shopping"></i>
                </a>-->
                echo "<input type='submit' value='In den Warenkorb'>";*/

            }

        }


        ?>

        <a class="shopping_cart" href="product.php?prod_id=<?php echo $prod_id; ?>&add=<?php echo $prod_id; ?>">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>

        </form>
        <a class="">


            <!--
        <div class="slider content">
            slider
        </div>

        <div class="title content">
            title
        </div>

        <div class="description content">
            description
        </div>

        <div class="price content">
            price
        </div>

        <div class="stock content">
            stock
        </div>

        <div class="category content">
            category
        </div>
    -->
    </main>

    <footer>
        Footer
    </footer>

</body>

</html>