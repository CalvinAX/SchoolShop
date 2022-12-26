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
        /*
                function toggle(id) {
                    var e = document.getElementById(id);
                    if (e.style.display == "none") {
        
                        e.style.display = "";
                        /*e.classList.toggle("nav2");
                    }
                    else {
        
                        e.style.display = "none";
                        /*e.classList.toggle("nav2");
                    }
                }
        */

        /* kann zu einer funktion angepasst werden */

        function toggle(id) {
            var e = document.getElementById(id);
            e.classList.toggle("nav1");

        }

        function foggle(id) {
            var e = document.getElementById(id);
            e.classList.toggle("popover-small1");

        }



        /*
                var e = document.getElementById(nav);
        
                e.addEventListener("click", function () {
                    var e2 = document.getElementById("nav");
                    el2.classList.add('nav1');
                })
        */
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
                <a class="popover-item" hraf="#"><i class="fa-solid fa-user"></i>PROFILE</a>
                <a class="popover-item" hraf="#"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
                <a class="popover-item" hraf="#"><i class="fa-solid fa-3"></i>333333</a>
                <a class="popover-item" hraf="#"><i class="fa-solid fa-4"></i>444444</a>
                <a class="popover-item" hraf="#"><i class="fa-solid fa-gear"></i>SETTINGS</a>
            </div>
        </div>

        <div id="popover-small" class="popover-small">
            <a class="popover-item" hraf="#"><i class="fa-solid fa-user"></i>PROFILE</a>
            <a class="popover-item" hraf="#"><i class="fa-solid fa-cart-shopping"></i>My Cart</a>
            <a class="popover-item" hraf="#"><i class="fa-solid fa-3"></i>333333</a>
            <a class="popover-item" hraf="#"><i class="fa-solid fa-4"></i>444444</a>
            <a class="popover-item" hraf="#"><i class="fa-solid fa-gear"></i>SETTINGS</a>
        </div>

    </header>
    <!--
    <div id="nav1" class="nav2">
        <a href="#" class="nav-link">KATEGORIEN</a>
        <a href="#" class="nav-link">KATEGORIE 1</a>
        <a href="#" class="nav-link">KATEGORIE 2</a>
        <a href="#" class="nav-link">KATEGORIE 3</a>
    </div>
    -->

    <script>
        /*
                if (window.innerWidth > 900) {
                    document.getElementById("nav").style.display = "";
                } else {
        
                    document.getElementById("nav").style.display = "none"
                }
        */
    </script>

    <!-- Main Content -->

    <main>

        <?php
        $con = mysqli_connect("", "root", "", "schoolshop");
        $res = mysqli_query($con, "SELECT * FROM products");
        while ($dsatz = mysqli_fetch_array($res)) {

            if ($dsatz["prod_id"] > 18 && $dsatz["prod_id"] <= 27) {
                echo "<div class='article2'>";
                echo "<a href='/products/product.php'>";
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
                echo "</a>";
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
    <div class="pagination">
        <a href="home2.php"><i class="fa-solid fa-angles-left"></i></a>
        <div class="pagination-number"><i class="fa-solid fa-i"></i><i class="fa-solid fa-i"></i><i class="fa-solid fa-i"></i></div>
        <a href="" class="pagination-end"><i class="fa-solid fa-angles-right"></i></a>
    </div>


    <!--
    <form name="pagination" class="pagination" action="home.php" method="post">

        <a href="javascript:document.pagination.submit()"><i class="fa-solid fa-angles-left"></i></a>
        <i class="fa-solid fa-i"></i>
        <i class="fa-solid fa-angles-right"></i>
    </form>
    -->

    <footer>
        Footer
    </footer>

</body>

</html>