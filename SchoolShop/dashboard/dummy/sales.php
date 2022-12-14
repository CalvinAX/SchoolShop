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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js"
        integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/charts.js"></script>

</head>

<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <aside class="sidebar-container">
            <div class="sidebar m-0">
                <a href="dummy.php" class="ml-4">
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
                <a href="sales.php" class="ml-4 active">
                    <i class="fa-solid fa-chart-simple"></i>
                    Sales
                </a>
                <a href="traffic.php" class="ml-4">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    Traffic
                </a>
                <a href="todo.php" class="ml-4">
                    <i class="fa-solid fa-list"></i>
                    To-Do
                </a>
                <a href="tickets.php" class="ml-4">
                    <i class="fa-solid fa-ticket"></i>
                    Tickets
                </a>
                <a href="reports.php" class="ml-4">
                    <i class="fa-solid fa-bug"></i>
                    Reports
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

                    <!-- WIP -->
                        <div class="col-md">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>


                    </div>
                    <!-- 1st Row Infos -->

                    <!-- 2nd Row Infos -->
                    <!-- 2nd Row Infos -->
                </div>
            </main>
        </div>

    </div>

</body>

</html>