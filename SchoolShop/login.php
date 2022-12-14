<html>

    <head>

        <title>Login</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/loginform.css">

        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Font Awesome -->
        <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

    </head>

    <body>

    <div class="container-fluid">

        <div class="d-flex justify-content-center">

            <div class="signup-form mt-5 p-3 border rounded">

                <form action="components/index.php" method="post">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email_login" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password_login" placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>