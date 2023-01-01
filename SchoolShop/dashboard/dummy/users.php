<?php


?>

<html>

<head>

    <title>Dashboard - Profile</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/dashboard/dashboard-sidebar.css">
    <link rel="stylesheet" href="../../css/dashboard/dashboard-main.css">

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
                <a href="dummy.php" class="ml-4">
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
                <a href="traffic.php" class="ml-4">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    Traffic
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
                                        <p class="ml-3 mb-4">There are currently <span>7</span> Users logged in!</p>
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
                                        <p class="ml-3 mb-4">Currently <span>7</span> Users are logged out!</p>
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
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-danger p-3">No</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>457</td>
                                            <td>Loise Griffin</td>
                                            <td>loise@griffin.com</td>
                                            <td>Female</td>
                                            <td class="text-color-warning">Support</td>
                                            <td>45</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-success p-3">Yes</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>432</td>
                                            <td>Joe Swanson</td>
                                            <td>joe@wheelchair.com</td>
                                            <td>Male</td>
                                            <td>Customer</td>
                                            <td>753</td>
                                            <td>Canada</td>
                                            <td>02452</td>
                                            <td>Torronto</td>
                                            <td class="text-color-warning p-3">Suspended</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-danger p-3">No</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>457</td>
                                            <td>Loise Griffin</td>
                                            <td>loise@griffin.com</td>
                                            <td>Female</td>
                                            <td class="text-color-warning">Support</td>
                                            <td>45</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-success p-3">Yes</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-warning p-3">Suspended</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-danger p-3">No</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-success p-3">Yes</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Peter Griffin</td>
                                            <td>peter@griffin.com</td>
                                            <td>Other</td>
                                            <td class="text-color-danger">Admin</td>
                                            <td>5748</td>
                                            <td>USA</td>
                                            <td>020555</td>
                                            <td>Washington, DC</td>
                                            <td class="text-color-warning p-3">Suspended</td>
                                        </tr>
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