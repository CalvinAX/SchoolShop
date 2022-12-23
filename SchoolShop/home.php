<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

    <script type="text/javascript">

        function toggle(id) {
            var e = document.getElementById(id);
            if (e.style.display == "none") {

                e.style.display = "";
                /*e.classList.toggle("nav2");*/
            }
            else {

                e.style.display = "none";
                /*e.classList.toggle("nav2");*/
            }
        }

    </script>
    <script>
        /*
        setTimeout(function () {

            var e = document.getElementById(id);
            if (e.style.display == "none") {
                e.classList.toggle("nav2");
            }
            else {

                e.classList.toggle("nav2");

                alert('Hello World!');
            }

        }, 2000);
*/
    </script>

</head>

<body>

    <!-- Header -->

    <header>
        <div id="header-left">
            <a href="javascript:toggle('nav')" id="burger"><i class="fa-solid fa-bars"></i></a>
            <a href="#"><img src="logo3.png" id="logo"></a>
        </div>

        <nav id="nav" class="nav1">
            <a href="#" class="nav-link">KATEGORIEN</a>
            <a href="#" class="nav-link">KATEGORIE 1</a>
            <a href="#" class="nav-link">KATEGORIE 2</a>
            <a href="#" class="nav-link">KATEGORIE 3</a>
        </nav>


        <div id="header-right">
            <a href="login.php">LOGIN</a>
            <a href="javascript:toggle('settings')" id="gear"><img src="default_profile_picture.png"
                    width="24px"></i></a> <!-- <i class="fa-solid fa-gear"> -->
            <div id="settings" style="display: none">
                <p>test</p>
            </div>
        </div>
    </header>

    <script>

        if (window.innerWidth > 900) {
            document.getElementById("nav").style.display = "";
        } else {

            document.getElementById("nav").style.display = "none"
        }

    </script>

    <!-- Main Content -->

    <main>

        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $res = mysqli_query($con, "SELECT * FROM products");
        while ($dsatz = mysqli_fetch_array($res)) {

            if ($dsatz["prod_id"] <= 9) {
                echo "<div class='article2'>";
                echo "<div class='article'>";
                echo "<article>";
                echo "<img class='prod-pic' src='" . $dsatz["prod_picture"] . "' alt=''>";
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
                echo "<div class='price'>" . number_format($dsatz["prod_price"], 2, ",", ".") . " €</div>";
                echo "</div>";
                echo "</div>";
                echo "</article>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>

        <!--
        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="default.png" alt="">
                    <div class="prod-body">
                        <h1>sus</h1>
                        <div class="prod-bottom">
                            <div class="availability">
                                <div class="in_stock_false">In Stock</div>
                                <div class="dot">•</div>
                                <div class="quantity_false">0</div>
                            </div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        -->
    </main>
    <footer>Footer</footer>
</body>

</html>