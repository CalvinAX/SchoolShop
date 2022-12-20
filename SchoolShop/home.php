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
            } else {
                e.style.display = "none";
            }
        }

        /*
                        getStyleSheet("style");
                        style.insertRule(`
                            .`Element.id`) { 
                                display: none; }
                            `);
        
                    }
        */
       /*
        sheets[0].insertRule(`
@supports ( display: flex ) {
	@media only screen and (max-width:1260px) { 
		h2 { 
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			background-color: #EBF5FF;
			height: ${foo}em;
		 } 
	}
}*/
    </script>

</head>

<body>

    <header>
        <div id="header-left">
            <a href="javascript:toggle('nav')" id="burger"><i class="fa-solid fa-bars"></i></a>
            <a href="#"><img src="logo3.png" id="logo"></a>
        </div>
        <div id="nav" style="display: none">
            <nav>
                <a href="#" class="nav-link">KATEGORIEN</a>
                <a href="#" class="nav-link">KATEGORIE 1</a>
                <a href="#" class="nav-link">KATEGORIE 2</a>
                <a href="#" class="nav-link">KATEGORIE 3</a>
            </nav>
        </div>

        <div id="header-right">
            <a href="#">LOGIN</a>
            <a href="javascript:toggle('settings')" id="gear"><i class="fa-solid fa-gear"></i></a>
            <div id="settings" style="display: none">
                <p>test</p>
            </div>
        </div>
    </header>

    <main>
        <?php
        /*
        $con = mysqli_connect("", "root", "", "SchoolShop");
        $res = mysqli_query($con, "SELECT * FROM products");
        $i = 0;
        while ($dsatz = mysqli_fetch_assoc($res)) {
        if ($dsatz["prod_id"] <= 9) {
        echo "<article>";
        echo "<h1>" . $dsatz["prod_name"] . "</h1>";
        echo "<section>";
        if (strlen($dsatz["prod_description"]) > 200)
        echo "<p>" . substr($dsatz["prod_description"], 0, 200) . " ...</p>";
        else
        echo "<p>" . $dsatz["prod_description"] . "</p>";
        echo "</section>";
        echo "</article>";
        } 
        else {
        break;
        }
        }
        */
        ?>
        <!--
        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>

        <div class="article">
            <article>
                <img class="prod-pic" src="placeholder.png" alt="">
                <div class="prod-body">
                    <h1>Test</h1>
                    <div class="prod-bottom">
                        <div class="availability">In Stock • <span clas="quantity">3<span></div>
                        <div class="price">14,99 €</div>
                    </div>
                </div>
            </article>
        </div>
        -->


        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>sus</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>amogus</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="article2">
            <div class="article">
                <article>
                    <img class="prod-pic" src="placeholder.png" alt="">
                    <div class="prod-body">
                        <h1>Test</h1>
                        <div class="prod-bottom">
                            <div class="availability">In Stock • <span clas="quantity">3<span></div>
                            <div class="price">14,99 €</div>
                        </div>
                    </div>
                </article>
            </div>
        </div>


    </main>
    <footer>Footer</footer>
</body>

</html>