<?php
session_start();

if (!isset($_SESSION['login']['id'])) {
    $_SESSION['login'] = array();
    //session_destroy();
    //header("location: login.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">


    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>



</head>

<body>

    <!-- Main Content -->

    <main>
        <div class="div-image">
            <a href="image.png">
                <img class="image" src="image.png">
            </a>
        </div>
        <div class="username">
            GUSTAVO
        </div>
        <div class="personal_information">
            <div class="pi_column_1">
                <div class="pi_row">
                    <div class="pi_content">FIRST NAME</div>
                    <div class="pi_content">Peter</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">LAST NAME:</div>
                    <div class="pi_content">Griffin</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">GENDER</div>
                    <div class="pi_content">Other</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">STREET</div>
                    <div class="pi_content">Spooner Street</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">HOUSE NUMBER</div>
                    <div class="pi_content">31</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">ZIP CODE</div>
                    <div class="pi_content">02949</div>
                </div>
            </div>
            <div class="pi_column_2">
                <div class="pi_row">
                    <div class="pi_content">COUNTRY</div>
                    <div class="pi_content">United States of America (USA)</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">E-MAIL</div>
                    <div class="pi_content">peter.griffin@gmail.com</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">PHONE NUMBER</div>
                    <div class="pi_content">901-922-5231</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">PASSWORD</div>
                    <div class="pi_content">***</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">FIRST NAME:</div>
                    <div class="pi_content">Peter</div>
                </div>
                <div class="pi_row">
                    <div class="pi_content">FIRST NAME:</div>
                    <div class="pi_content">Peter</div>
                </div>
            </div>
        </div>

    </main>


</body>

</html>





<!-- <i class="fa-solid fa-backward"></i> -->