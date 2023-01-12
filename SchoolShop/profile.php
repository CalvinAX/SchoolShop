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

    <?php if (isset($_SESSION["login"]["id"])) {
        echo "
            <div class='div-image'>
                <a href='" . $_SESSION["login"]["profile_picture"] . "'>
                    <img class='image' src='profile_pictures/" . $_SESSION["login"]["profile_picture"] . "'>
                </a>
            </div>
            <div class='username'>
                " . $_SESSION["login"]["username"] . "
            </div>
            <div class='personal_information'>
                <div class='pi_column_1'>
                    <div class='pi_row'>
                        <div class='pi_content'>FIRST NAME</div>
                        <div class='pi_content'>" . $_SESSION["login"]["name"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>LAST NAME:</div>
                        <div class='pi_content'>" . $_SESSION["login"]["lastname"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>GENDER</div>
                        <div class='pi_content'>" . $_SESSION["login"]["gender"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>STREET</div>
                        <div class='pi_content'>" . $_SESSION["login"]["address"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>HOUSE NUMBER</div>
                        <div class='pi_content'>" . $_SESSION["login"]["house_nr"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>POSTAL CODE</div>
                        <div class='pi_content'>" . $_SESSION["login"]["zip_code"] . "</div>
                    </div>
                </div>
                <div class='pi_column_2'>
                    <div class='pi_row'>
                        <div class='pi_content'>CITY:</div>
                        <div class='pi_content'>" . $_SESSION["login"]["city"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>COUNTRY</div>
                        <div class='pi_content'>" . $_SESSION["login"]["country"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>E-MAIL</div>
                        <div class='pi_content'>" . $_SESSION["login"]["email"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>PHONE NUMBER</div>
                        <div class='pi_content'>" . $_SESSION["login"]["phone_nr"] . "</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>PASSWORD</div>
                        <div class='pi_content'>***</div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>FIRST NAME:</div>
                        <div class='pi_content'>Peter</div>
                    </div>
                </div>
            </div>";

    } else {   ?>

            <div class='div-image'>
                <a href='image.png'>
                    <img class='image' src='default_profile_picture.png'>
                </a>
            </div>
            <div class='username'>
            </div>
            <div class='personal_information'>
                <div class='pi_column_1'>
                    <div class='pi_row'>
                        <div class='pi_content'>FIRST NAME</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>LAST NAME:</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>GENDER</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>STREET</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>HOUSE NUMBER</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>POSTAL CODE</div>
                        <div class='pi_content'></div>
                    </div>
                </div>
                <div class='pi_column_2'>
                    <div class='pi_row'>
                        <div class='pi_content'>CITY:</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>COUNTRY</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>E-MAIL</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>PHONE NUMBER</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>PASSWORD</div>
                        <div class='pi_content'></div>
                    </div>
                    <div class='pi_row'>
                        <div class='pi_content'>???</div>
                        <div class='pi_content'></div>
                    </div>
                </div>
            </div>
    <?php } ?>

    <a class="button_edit" href="<?php if (!empty($_SESSION["login"]))
        echo "profile_edit.php"; else echo "login.php" ?>">
        <button><div>EDIT</div></button>
    </a>

    </main>
</body>

</html>





<!-- <i class="fa-solid fa-backward"></i> -->