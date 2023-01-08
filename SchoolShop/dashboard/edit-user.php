<?php

session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
}

include '../connections/root_connection.php';

$user_id = $_GET['id'];

$sql = "SELECT * FROM accounts WHERE id='$user_id'";

$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $firstname = $row['name'];
        $lastname = $row['lastname'];
        $gender = $row['gender'];
        $country = $row['country'];
        $city = $row['city'];
        $zip = $row['zip_code'];
        $address = $row['address'];
        $username = $row['username'];
        $email = $row['email'];
        $orders = $row['orders'];
        $role = $row['role'];
        $logged_in = $row['logged_in'];
    }
}

?>

<html>

<head>

    <title>Users - Dashboard</title>

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
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <aside class="sidebar-container sticky-top">
            <div class="sidebar m-0">
                <a href="home.php" class="ml-4">
                    <i class="fa-solid fa-layer-group"></i>
                    Dashboard
                </a>
                <a href="products.php" class="ml-4">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Products
                </a>
                <a href="users.php" class="ml-4 active">
                    <i class="fa-solid fa-users"></i>
                    Users
                </a>
                <a href="sales.php" class="ml-4">
                    <i class="fa-solid fa-chart-simple"></i>
                    Sales
                </a>
                <a href="api.php" class="ml-4">
                    <i class="fa-solid fa-code"></i>
                    API
                </a>
                <a href="tickets.php" class="ml-4">
                    <i class="fa-solid fa-ticket"></i>
                    Tickets
                </a>
                <a href="settings.php" class="ml-4">
                    <i class="fa-solid fa-gear"></i>
                    Settings
                </a>
                <a href="logout.php" class="ml-4">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </div>
        </aside>

        <!-- Sidebar -->

        <!-- Main part -->
        <div class="main-content">
            <main>
                <div class="container-fluid">
                    <h3 class="text-white ml-5 mt-3">Users</h3>
                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <h3 class="text-white">Personal</h3>
                                <hr class="bg-secondary" />

                                <form method="post" action="validate-edit-user.php">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputUserFirstname" class="text-white">Name</label>
                                            <input type="text" class="form-control" id="inputUserFirstname"
                                                name="inputUserFirstname" value="<?php echo $firstname; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserLastname" class="text-white">Lastname</label>
                                            <input type="text" class="form-control" id="inputUserLastname"
                                                name="inputUserLastname" value="<?php echo $lastname; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserGender" class="text-white">Gender</label>
                                            <select id="inputUserGender" class="form-control"
                                                name="inputUserGender">
                                                <option selected><?php echo $gender; ?></option>
                                                <option disabled>------------</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputUserEmail" class="text-white">Email</label>
                                            <input type="email" class="form-control" id="inputUserEmail"
                                                name="inputUserEmail" required value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserUsername" class="text-white">Username</label>
                                            <input type="text" class="form-control" id="inputUserUsername"
                                                name="inputUserUsername" required value="<?php echo $username; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputUserOrders" class="text-white">Orders</label>
                                            <input type="text" class="form-control" id="inputUserOrders"
                                                name="inputUserOrders" required disabled value="<?php echo $orders; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserRole" class="text-white">Role</label>
                                            <select id="inputUserRole" class="form-control"
                                                name="inputUserRole" required>
                                                <option selected value="<?php echo $role; ?>"><?php
                                                if($role == 0) {
                                                    echo "Admin";
                                                } elseif($role == 1) {
                                                    echo "Support";
                                                } else {
                                                    echo "Customer";
                                                } ?></option>
                                                <option disabled>------------</option>
                                                <option value="0">Admin</option>
                                                <option value="1">Support</option>
                                                <option value="2">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputUserAddress" class="text-white">Address</label>
                                            <input type="text" class="form-control" id="inputUserAddress"
                                                name="inputUserAddress" required value="<?php echo $address; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputUserCountry" class="text-white">Country</label>
                                            <input type="text" class="form-control" id="inputUserCountry"
                                                name="inputUserCountry" required value="<?php echo $country; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserCity" class="text-white">City</label>
                                            <input type="text" class="form-control" id="inputUserCity"
                                                name="inputUserCity" required value="<?php echo $city; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputUserZip" class="text-white">Zip code</label>
                                            <input type="text" class="form-control" id="inputUserZip"
                                                name="inputUserZip" required value="<?php echo $zip; ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="<?php echo $user_id; ?>">
                                    <button type="submit" class="btn button-submit" name="submit">Edit</button>
                                    <button onclick="location.href='users.php'" type="button"
                                        class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>