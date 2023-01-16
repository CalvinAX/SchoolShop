<?php

session_start();
include 'connections/root_connection.php';


?>

<html>

<head>

    <title>LOGIN</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/dashboard/dashboard-sidebar.css">
    <link rel="stylesheet" href="css/dashboard/dashboard-main.css">
    <link rel="stylesheet" href="css/loginform.css">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">
        <div class="wrapper d-flex justify-content-center">
            <div class="login-panel p-3 mt-5">
                <h2 class="text-white">LOGIN</h2>
                <hr class="bg-secondary" />
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="email" class="text-white">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <input type="submit" class="btn button-submit" name="login" value="Login">
                </form>
                <hr class="bg-secondary" />
                <a class='continue-shopping' href='home.php'><i class='fa-solid fa-backward'></i>HOMEPAGE</a>

                <?php

                if (isset($_POST['login'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    echo $password;
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    echo $password_hash;
                    $sql = mysqli_query($conn, "SELECT * FROM accounts WHERE email = '$email'");
                    $row = mysqli_fetch_array($sql);


                        if (is_array($row)) {

                            if (password_verify($password, $row['password'])) {
                                //If credentials right -> create session variables
                
                                $_SESSION = array('login');

                                $_SESSION['login']['name'] = $row['name'];
                                $_SESSION['login']['lastname'] = $row['lastname'];
                                $_SESSION['login']['id'] = $row['id'];
                                $_SESSION['login']['email'] = $row['email'];
                                $_SESSION['login']['role'] = $row['role'];
                                $_SESSION['login']['gender'] = $row['gender'];
                                $_SESSION['login']['address'] = $row['address'];
                                $_SESSION['login']['house_nr'] = $row['house_nr'];
                                $_SESSION['login']['city'] = $row['city'];
                                $_SESSION['login']['zip_code'] = $row['zip_code'];
                                $_SESSION['login']['country'] = $row['country'];
                                $_SESSION['login']['phone_nr'] = $row['phone_nr'];
                                $_SESSION["login"]['username'] = $row['username'];
                                $_SESSION["login"]['profile_picture'] = $row['profile_picture'];

                                $id_login = $row['id'];
                                $sql_logged_in = mysqli_query($conn, "UPDATE accounts SET logged_in='1' WHERE id=$id_login");



                            } else {

                                //Wrong User, Password or no Account -> Error
                                echo "<p class='text-danger'>Wrong Username or Password!</p>";
                                $_SESSION['login'] = array();
                            }

                        } else {

                            //Wrong User, Password or no Account -> Error
                            echo "<p class='text-danger'>Wrong Username or Password!</p>";
                            $_SESSION['login'] = array();
                        }
                    }
                
                //If logged in -> send to index.php
                if (isset($_SESSION['login']['name'])) {
                    #header("Location: home.php");
                }

                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>