<?php

session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
}

?>

<html>

<head>

    <title>API - Dashboard</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/dashboard/dashboard-sidebar.css">
    <link rel="stylesheet" href="../css/dashboard/dashboard-main.css">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/e7a056b5ad.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
                <a href="users.php" class="ml-4">
                    <i class="fa-solid fa-users"></i>
                    Users
                </a>
                <a href="sales.php" class="ml-4">
                    <i class="fa-solid fa-chart-simple"></i>
                    Sales
                </a>
                <a href="api.php" class="ml-4 active">
                    <i class="fa-solid fa-code"></i>
                    API
                </a>
                <a href="tickets.php" class="ml-4">
                    <i class="fa-solid fa-ticket"></i>
                    Tickets
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
                            <h2 class="text-white ml-3 mt-4">API Endpoints</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>
                    <!-- 1st Row Infos -->
                </div>

                <div class="container-fluid">
                    <div class="row ml-3 mr-3 mb-2">
                        <div class="col-md">
                            <div class="panel-card p-2">
                                <a href="api/products-sold.php" target="_blank" class="ml-2 api-link">
                                    <i class="fa-solid fa-arrow-up-right-from-square mr-2"></i>
                                    Endpoint - Products Sold
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-3 mr-3 mb-2">
                        <div class="col-md">
                            <div class="panel-card p-2">
                                <a href="api/category-sold.php" target="_blank" class="ml-2 api-link">
                                    <i class="fa-solid fa-arrow-up-right-from-square mr-2"></i>
                                    Endpoint - Category Sold
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-3 mr-3 mb-2">
                        <div class="col-md">
                            <div class="panel-card p-2">
                                <a href="api/recent-orders.php" target="_blank" class="ml-2 api-link">
                                    <i class="fa-solid fa-arrow-up-right-from-square mr-2"></i>
                                    Endpoint - Recent Orders
                                </a>
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