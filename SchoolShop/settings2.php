<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/settings2.css">

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

    <!-- Main Content -->
    <!-- 
    <div class="hidden">

    </div>
    -->

    <div class="sidebar">
        <span><i class="fa-solid fa-brush"></i> Themes</span>
        <span><i class="fa-solid fa-brush"></i> Themes</span>
        <span><i class="fa-solid fa-brush"></i> Themes</span>
        <span><i class="fa-solid fa-brush"></i> Themes</span>
    </div>

    <div class="content">
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
        <p>Hallo</p>
    </div>

    <footer>
        Footer
    </footer>

</body>

</html>