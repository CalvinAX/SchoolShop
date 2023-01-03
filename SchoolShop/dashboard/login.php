<?php

session_start();
include '../connections/root_connection.php';


?>

<html>

<head>

    <title>LOGIN</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/dashboard/dashboard-sidebar.css">
    <link rel="stylesheet" href="../css/dashboard/dashboard-main.css">

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
                <h2 class="text-white">Dashboard</h2>
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

                <?php

                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    $sql = mysqli_query($conn, "SELECT * FROM accounts WHERE email = '$email'");
                    $row = mysqli_fetch_array($sql);

                    if ($row['role'] == 2) {

                        echo "<p class='text-danger'>No Permission!</p>";
                        session_destroy();

                    } else {

                        if (is_array($row)) {

                            if (password_verify($password, $row['password'])) {
                                //If credentials right -> create session variables
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['lastname'] = $row['lastname'];
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['role'] = $row['role'];
                                $_SESSION['gender'] = $row['gender'];

                                $id_login = $row['id'];
                                $sql_logged_in = mysqli_query($conn, "UPDATE accounts SET logged_in='1' WHERE id=$id_login");



                            } else {

                                //Wrong User, Password or no Account -> Error
                                echo "<p class='text-danger'>Wrong Username or Password!</p>";
                                session_destroy();
                            }

                        } else {

                            //Wrong User, Password or no Account -> Error
                            echo "<p class='text-danger'>Wrong Username or Password!</p>";
                            session_destroy();
                        }
                    }
                }
                //If logged in -> send to index.php
                if (isset($_SESSION['name'])) {
                    header("Location: home.php");
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