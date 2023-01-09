<?php
session_start();


/*session_destroy();
$_SESSION = array();*/

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Shop</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/checkout.css">


    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

</head>

<body>
    <form action="checkout-finish.php" method="post">

        <main>

            <div class="main-content">


                <div class='form-outer'>

                    <div class="heading">Personal Information</div>

                    <div class="form">
                        <div class="form-section">
                            <div class="form-content form-content-width-50">
                                <lable for="first-name">First name</lable>
                                <input id="first-name" class="input" name="first-name" placeholder="Peter">
                            </div>
                            <div class="form-content form-content-width-50">
                                <lable for="last-name">Last name</lable>
                                <input id="last-name" class="input" name="last-name" placeholder="Griffin">
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="form-content form-content-width-50">
                                <lable for="street">Street</lable>
                                <input id="street" class="input" name="street" placeholder="examplestreet">
                            </div>
                            <div class="form-content form-content-width-50">
                                <lable for="number">House number</lable>
                                <input id="number" class="input" name="number" placeholder="3">
                            </div>
                        </div>
                        <div class="form-section ">
                            <div class="form-content form-content-width-50">
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
                            <div class="form-content form-content-width-50">
                                <lable for="postal-code">Postal Code</lable>
                                <input id="popstal-code" class="input" name="postal-code" placeholder="01234">
                            </div>
                        </div>
                        <div class="form-content form-content-width-100">
                            <lable for="email">E-Mail</lable>
                            <input id="email" class="input" name="email" placeholder="example@example.com">
                        </div>
                        <div class="form-content form-content-width-100">
                            <lable for="phone-number">Phone Number</lable>
                            <input id="phone-number" class="input" name="phone-number" placeholder="+00 123 44556677">
                        </div>
                    </div>

                    <div class="seperator"></div>

                    <div class="heading">Payment Details</div>

                    <div class="form">
                        <div class="form-content form-content-width-100">
                            <lable for="card-number">Credit Card Number</lable>
                            <input id="card-number" class="input" name="card-number" placeholder="0000 - 0000 - 0000 - 0000">
                        </div>
                        <div class="form-section">
                            <div class="form-content form-content-width-50">
                                <lable for="security-code">Security Code</lable>
                                <input type="password" id="security-code" class="input" name="security-code" placeholder="***">
                            </div>
                            <div class="form-content form-content-width-50">
                                <lable for="expiration">Expiration Date</lable>
                                <input id="expiration" class="input" name="expiration" placeholder="MM / YY">
                            </div>
                        </div>
                    </div>

                </div>
                <div class='total'>
                    <div id='total' class='total-inner'>
                        <div class='original-price'>
                            <div>Original Price</div>
                            <div><?php if (isset($_POST["original_price_total"]))
                                echo number_format($_POST["original_price_total"], 2, ".", ",") . " &#36;";
                            else
                                echo number_format(0, 2, ".", ",") . " &#36;"; ?></div>

                        </div>
                        <div class='discount'>
                            <div>Discount</div>
                            <div>&#45; <?php if (isset($_POST["discount_total"]))
                                echo number_format($_POST["discount_total"], 2, ".", ",") . " &#36;";
                            else
                                echo number_format(0, 2, ".", ",") . " &#36;"; ?></div>
                        </div>
                        <div class='total-price'>
                            <div>Total</div>
                            <div class='total-price-price'>
                                <?php if (isset($_POST["after_discount_total"]))
                                echo number_format($_POST["after_discount_total"], 2, ".", ",") . " &#36;";
                            else
                                echo number_format(0, 2, ".", ",") . " &#36;"; ?></div>
                        </div>

                        <input type='hidden' name='prod_id' value='<?php echo $_POST["prod_id"] ?>'>
                        <a href='' class='button-buy-anchor'>
                            <button class='button-buy'>
                                <div class='button-text'>PAY</div>
                            </button>
                        </a>

                    </div>
                </div>

            </div>

        </main>
    </form>
    <!--
    <div class="main-content">


<div class='form-outer'>

    <div class="heading">Personal Information</div>


    <form>
        <div class="form-section">
            <input class="input-1" name="first-name" placeholder="First name">
            <input class="input-1" name="last-name" placeholder="Last name">
        </div>
        <div class="form-section">
            <input class="input-1" name="street" placeholder="Street">
            <input class="input-1" name="number" placeholder="House number">
        </div>
        <div class="form-section">
            <input class="input-1" name="country" placeholder="Country">
            <input class="input-1" name="postal-code" placeholder="Postal Code">
        </div>
        <input class="input-2" name="email" placeholder="E-Mail">

    </form>





</div>
<div class='total'>
    <div id='total' class='total-inner'>
        <div class='original-price'>
            <div>Original Price</div>
            <div>&#36;</div>

        </div>
        <div class='discount'>
            <div>Discount</div>
            <div>&#45; &#36;</div>
        </div>
        <div class='total-price'>
            <div>Total</div>
            <div class='total-price-price'>&#36;</div>
        </div>
        <a href='checkout.php' class='button-buy-anchor'>
            <button class='button-buy'>
                <div class='button-text'>PAY</div>
            </button>
        </a>
        <hr class='horizontal-line-2'>
        <a class='continue-shopping' href='home.php'><i class='fa-solid fa-backward'></i>Continue
            Shopping</a>
    </div>
</div>
</div>

-->

</body>

</html>