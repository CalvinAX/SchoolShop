<?php

session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
}

include '../connections/root_connection.php';

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

                    <!-- 1st Row Infos -->
                    <div class="row ml-3 mr-3">

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2 mt-3">
                                    <div class="panel-1">
                                        <h3 class="m-3"><i class="fa-solid fa-user-plus mr-2"></i>Online</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There are currently <span>
                                                <?php $sql_currently_on = "SELECT * FROM accounts WHERE logged_in='1'";

                                                $result_currently_on = $conn->query($sql_currently_on);

                                                echo mysqli_num_rows($result_currently_on);

                                                ?>
                                            </span> Users logged in!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2 mt-3">
                                    <div class="panel-2">
                                        <h3 class="m-3"><i class="fa-solid fa-user-minus mr-2"></i>Offline</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">Currently <span>
                                                <?php $sql_currently_on = "SELECT * FROM accounts WHERE logged_in='0'";

                                                $result_currently_on = $conn->query($sql_currently_on);

                                                echo mysqli_num_rows($result_currently_on);

                                                ?>
                                            </span> Users are logged out!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- 1st Row Infos -->

                    <!-- 2nd Row Infos -->
                    <h3 class="text-white ml-5 mt-3">Users</h3>
                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- profile_picture, name, lastname, gender, country, city, zip_code, address, username, email, password, orders, role, loggedIn -->
                                            <th class="p-2">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Orders</th>
                                            <th>Country</th>
                                            <th>Zip Code</th>
                                            <th>Address</th>
                                            <th>Logged In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM accounts";
                                        $results = $conn->query($sql);

                                        if ($results->num_rows > 0) {
                                            while ($row = $results->fetch_assoc()) {
                                                echo "<tr class='border-bottom border-dark'>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . $row['name'] . " " . $row['lastname'] . "</td>
                                                <td>" . $row['email'] . "</td>
                                                <td>" . $row['gender'] . "</td>";

                                                if ($row['role'] == 0) {
                                                    echo "<td class='text-color-danger p-3'>Admin</td>";
                                                } elseif ($row['role'] == 1) {
                                                    echo "<td class='text-color-warning p-3'>Support</td>";
                                                } else {
                                                    echo "<td class='p-3'>Customer</td>";
                                                }

                                                echo "<td>" . $row['orders'] . "</td>
                                                <td>" . $row['country'] . "</td>
                                                <td>" . $row['zip_code'] . "</td>
                                                <td>" . $row['address'] . "</td>";

                                                if ($row['logged_in'] == 1) {
                                                    echo "<td class='text-color-success'>Yes</td></tr>";
                                                } else {
                                                    echo "<td class='text-color-danger'>No</td></tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd Row Infos -->
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