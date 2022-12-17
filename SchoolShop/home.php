<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header><a href="#"><img src="logo.png" id="logo"></a></header>
    <nav><a href="#">Link1</a><a href="#">Link3</a><a href="#">Link2</a></nav>
    <main>
        <?php
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
        ?>
    </main>
    <footer>Footer</footer>
</body>

</html>