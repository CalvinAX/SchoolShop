<?php

//DEBUG MODE

//ini_set('display_errors', 'on');
//error_reporting(E_ALL);

include '../connections/root_connection.php';

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$gender = htmlspecialchars($_POST['gender']);

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO Accounts (name, lastname, gender, email, password,  role, logged_in) VALUES ('$firstname', '$lastname', '$gender', '$email', '$password_hash', '0', '0')";

if ($conn->query($sql) === TRUE) {

} else {
    echo "<br />Please write the Support regarding this issue<br />Error: " . $conn->error . "<br />";
}

$conn->close();
header( "location: ../home.php" );
?>

<html>

<head>

    <title>Signup</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/loginform.css">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md">

                <div class="d-flex justify-content-center">

                    <div class="jumbotron">
                        <h1 class="display-4">Success.</h1>
                        <p class="lead">You will be automatically redirected.</p>
                        <hr class="my-4">
                        <div class="alert alert-success" role="alert">
                            Account successfully registered! Redirecting...
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>