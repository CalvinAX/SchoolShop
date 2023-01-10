<?php
session_start();

if (!isset($_SESSION['login']['id'])) {
    $_SESSION['login'] = array();
    //session_destroy();
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile_edit.css">


    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>



</head>

<body>

<?php

if (isset($_POST["saved"])){

    $name = $_SESSION['login']['name'];
    $lastname = $_SESSION['login']['lastname'];
    $gender = $_SESSION['login']['gender'];
    $street = $_SESSION['login']['address'];
    $house_nr = $_SESSION['login']['house_nr'];
    $city = $_SESSION['login']['city'];
    $country = $_SESSION['login']['country'];
    $zip_code = $_SESSION['login']['zip_code'];
    $email = $_SESSION['login']['email'];
    $phone_nr = $_SESSION['login']['phone_nr'];
    $username = $_SESSION["login"]['username'];
    #$profile_picture = $_SESSION["login"]['profile_picture'];
    #$password =

    if (isset($_POST["first-name"])) $name = htmlspecialchars($_POST["first-name"]);
    if (isset($_POST["last-name"])) $lastname = htmlspecialchars($_POST["last-name"]);
    if (isset($_POST["gender"])) $gender = htmlspecialchars($_POST["gender"]);
    if (isset($_POST["street"])) $street = htmlspecialchars($_POST["street"]);
    if (isset($_POST["house_nr"])) $house_nr = htmlspecialchars($_POST["house_nr"]);
    if (isset($_POST["city"])) $city = htmlspecialchars($_POST["city"]);
    if (isset($_POST["country"])) $country = htmlspecialchars($_POST["country"]);
    if (isset($_POST["postal-code"])) $zip_code = htmlspecialchars($_POST["postal-code"]);
    if (isset($_POST["email"])) $email = htmlspecialchars($_POST["email"]);
    if (isset($_POST["phone-number"])) $phone_nr = htmlspecialchars($_POST["phone-number"]);
    if (isset($_POST["username"])) $username = htmlspecialchars($_POST["username"]);
    #if (isset($_POST["profile_picture"])) $profile_picture = htmlspecialchars($_POST["profile_picture"]);
    #if (isset($_POST["password"])) $password = htmlspecialchars($_POST["password"]);

    $con = mysqli_connect("", "root", "", "schoolshop");
    $sql = "UPDATE accounts 
    SET name = '$name', 
    lastname = '$lastname', 
    gender = '$gender', 
    address = '$street', 
    house_nr = '$house_nr',
    city = '$city', 
    country = '$country', 
    zip_code = '$zip_code', 
    email = '$email', 
    phone_nr = '$phone_nr', 
    username = '$username'
    WHERE id = " . $_SESSION["login"]["id"]; # password = $password

    $res = mysqli_query($con, $sql);

    mysqli_close($con);

$_SESSION['login']['name'] = $name;
$_SESSION['login']['lastname'] = $lastname;
$_SESSION['login']['email'] = $email;
$_SESSION['login']['gender'] = $gender;
$_SESSION['login']['address'] = $street;
$_SESSION['login']['house_nr'] = $house_nr;
$_SESSION['login']['city'] = $city;
$_SESSION['login']['zip_code'] = $zip_code;
$_SESSION['login']['country'] = $country;
$_SESSION['login']['phone_nr'] = $phone_nr;
$_SESSION["login"]['username'] = $username;
#$_SESSION["login"]['profile_picture'] = $profile_picture;

header("Location: profile.php");
}

?>

    <!-- Main Content -->

    <form action="profile_edit.php" method="post">

        <main>

            <div class="main-content">


                <div class='form-outer'>

                    <div class="heading">Personal Information</div>

                    <div class="form">
                        <div class="form-section">
                            <div class="form-content form-content-width-33">
                                <lable for="first-name">First name</lable>
                                <input id="first-name" class="input" name="first-name" placeholder="Peter"
                                    value="<?php if (isset($_SESSION["login"]["name"]))
                                        echo $_SESSION["login"]["name"]; ?>">
                            </div>
                            <div class="form-content form-content-width-33">
                                <lable for="last-name">Last name</lable>
                                <input id="last-name" class="input" name="last-name" placeholder="Griffin"
                                    value="<?php if (isset($_SESSION["login"]["lastname"]))
                                        echo $_SESSION["login"]["lastname"]; ?>">
                            </div>
                            <div class="form-content form-content-width-33">
                                <lable for="gender">Gender</lable>
                                <input id="gender" class="input" name="gender" placeholder=""
                                    value="<?php if (isset($_SESSION["login"]["gender"]))
                                        echo $_SESSION["login"]["gender"]; ?>">
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="form-content form-content-width-50">
                                <lable for="street">Street</lable>
                                <input id="street" class="input" name="street" placeholder="Spooner Street"
                                    value="<?php if (isset($_SESSION["login"]["address"]))
                                        echo $_SESSION["login"]["address"]; ?>">
                            </div>
                            <div class="form-content form-content-width-50">
                                <lable for="house_nr">House number</lable>
                                <input id="house_nr" class="input" name="house_nr" placeholder="31" value="<?php if (isset($_SESSION['login']['house_nr']))
                                    echo $_SESSION['login']['house_nr']; ?>">
                            </div>
                        </div>
                        <div class="form-section ">
                            <div class="form-content form-content-width-33">
                                <lable for="country">Country</lable>
                                <!--<input id="country" class="input-1" name="country" placeholder="">-->
                                <select id="country" class="input country" name="country">
                                    <option class="country-option">
                                        Australia
                                    </option>
                                    <option class="country-option">
                                        Chad
                                    </option>
                                    <option class="country-option">
                                        China
                                    </option>
                                    <option class="country-option">
                                        Denmark
                                    </option>
                                    <option class="country-option">
                                        Ecuador
                                    </option>
                                    <option class="country-option">
                                        Finland
                                    </option>
                                    <option class="country-option">
                                        France
                                    </option>
                                    <option class="country-option" selected="selected">
                                        Germany
                                    </option>
                                    <option class="country-option">
                                        Greece
                                    </option>
                                    <option class="country-option">
                                        Hungary
                                    </option>
                                    <option class="country-option">
                                        Italy
                                    </option>
                                    <option class="country-option">
                                        Jamaica
                                    </option>
                                    <option class="country-option">
                                        Japan
                                    </option>
                                    <option class="country-option">
                                        Madagascar
                                    </option>
                                    <option class="country-option">
                                        Mexico
                                    </option>
                                    <option class="country-option">
                                        Netherlands
                                    </option>
                                    <option class="country-option">
                                        New Zealand
                                    </option>
                                    <option class="country-option">
                                        Norway
                                    </option>
                                    <option class="country-option">
                                        Poland
                                    </option>
                                    <option class="country-option">
                                        Portugal
                                    </option>
                                    <option class="country-option">
                                        Slovenia
                                    </option>
                                    <option class="country-option">
                                        South Africa
                                    </option>
                                    <option class="country-option">
                                        South Korea
                                    </option>
                                    <option class="country-option">
                                        Spain
                                    </option>
                                    <option class="country-option">
                                        Suriname
                                    </option>
                                    <option class="country-option">
                                        Sweden
                                    </option>
                                    <option class="country-option">
                                        Switzerland
                                    </option>
                                    <option class="country-option">
                                        Turkey
                                    </option>
                                    <option class="country-option">
                                        Ukraine
                                    </option>
                                    <option class="country-option">
                                        United Kingdom (UK)
                                    </option>
                                    <option class="country-option">
                                        United States of America (USA)
                                    </option>
                                    <option class="country-option">
                                        Vatican City
                                    </option>
                                    <option class="country-option">
                                        Venezuela
                                    </option>
                                    <option class="country-option">
                                        Zimbabwe
                                    </option>
                                </select>
                            </div>
                            <div class="form-content form-content-width-33">
                                <lable for="city">City</lable>
                                <input id="city" class="input" name="city" placeholder="Quahog"
                                    value="<?php if (isset($_SESSION['login']['city']))
                                        echo $_SESSION['login']['city']; ?>">
                            </div>
                            <div class="form-content form-content-width-33">
                                <lable for="postal-code">Postal Code</lable>
                                <input id="popstal-code" class="input" name="postal-code" placeholder="02949"
                                    value="<?php if (isset($_SESSION['login']['zip_code']))
                                        echo $_SESSION['login']['zip_code']; ?>">
                            </div>
                        </div>
                        <div class="form-content form-content-width-100">
                            <lable for="email">E-Mail</lable>
                            <input id="email" class="input" name="email" placeholder="example@example.com"
                                value="<?php if (isset($_SESSION['login']['email']))
                                    echo $_SESSION['login']['email']; ?>">
                        </div>
                        <div class="form-content form-content-width-100">
                            <lable for="phone-number">Phone Number</lable>
                            <input id="phone-number" class="input" name="phone-number"
                                placeholder="+00 123 44556677" value="<?php if (isset($_SESSION['login']['phone_nr']))
                                    echo $_SESSION['login']['phone_nr']; ?>"> <!--901-922-5231-->
                        </div>
                        <div class="form-section">
                            <div class="form-content form-content-width-50">
                                <lable for="username">Username</lable>
                                <input id="username" class="input" name="username" placeholder=""
                                    value="<?php if (isset($_SESSION["login"]["username"]))
                                        echo $_SESSION["login"]["username"]; ?>">
                            </div>
                            <div class="form-content form-content-width-50">
                                <lable for="password">Password</lable>
                                <input type="password" id="password" class="input" name="password" placeholder="***">
                            </div>
                        </div>
                        <div class="form-content form-content-width-100">
                            <lable for="profile_picture">Profile Picture</lable>
                            <input type="file" id="profile_picture" class="input" name="profile_picture">
                        </div>
                    </div>
                    <div class="seperator"></div>
                </div>

            </div>
            <input type="hidden" name="saved">
            <div class="button_edit">
                <button>
                    <div>SAVE</div>
                </button>
            </div>


        </main>

    </form>

</body>

</html>