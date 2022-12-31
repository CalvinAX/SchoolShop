<?php

session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
}

?>

<html>

<head>

    <title>Dashboard - Profile</title>

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
                <a href="home.php" class="ml-4 active">
                    <i class="fa-solid fa-layer-group"></i>
                    Dashboard
                </a>
                <a href="products.php" class="ml-4">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Products
                </a>
                <a href="users.php" class="ml-4">
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
                <h2 class="text-white m-5">Hello, <?php echo $_SESSION['name']; ?></h2>


                <div class="container-fluid">

                    <!-- 1st Row Infos -->
                    <div class="row ml-3 mr-3">

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2">
                                    <div class="panel-1">
                                        <h3 class="m-3"><i class="fa-solid fa-list mr-2"></i> To-Do</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">You currently have <span>7</span> to-do's!
                                        </p>
                                        <p class="ml-3"><a href="#">Click here</a> to see all</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2">
                                    <div class="panel-2">
                                        <h3 class="m-3"><i class="fa-solid fa-bug mr-2"></i> Reports</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There are currently <span>3</span> unattended reports!
                                        </p>
                                        <p class="ml-3"><a href="#">Click here</a> to see all</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2">
                                    <div class="panel-3">
                                        <h3 class="m-3"><i class="fa-solid fa-ticket mr-2"></i> Tickets</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There is a total of <span>13</span> tickets open!
                                        </p>
                                        <p class="ml-3"><a href="#">Click here</a> to see all</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- 1st Row Infos -->

                    <!-- 2nd Row Infos -->
                    <h3 class="text-white ml-5 mt-5">Recent Orders</h3>
                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="p-2">#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-pending p-3">Pending</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-delivered p-3">Delivered</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-declined p-3">Declined</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-pending p-3">Pending</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-pending p-3">Pending</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-delivered p-3">Delivered</td>
                                        </tr>
                                        <tr>
                                            <td>124</td>
                                            <td>Mango - Limited Gaming Edition</td>
                                            <td>15,00 €</td>
                                            <td class="payment-status-pending p-3">Pending</td>
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