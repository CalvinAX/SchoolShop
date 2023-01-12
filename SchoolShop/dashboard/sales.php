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

    <title>Sales - Dashboard</title>

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
                <a href="sales.php" class="ml-4 active">
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

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <h2 class="text-white ml-3 mt-4">Sales</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-3">
                                    <div class="panel-1">
                                        <h3 class="m-3">Total Sales</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">Currently sold: <span>
                                                <?php $sql_sold_total = "SELECT * FROM orders";

                                                $result_sold_total = $conn->query($sql_sold_total);

                                                echo mysqli_num_rows($result_sold_total);

                                                ?>
                                            </span> products!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-3">
                                    <div class="panel-2">
                                        <h3 class="m-3">Yearly Sales</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">In <span>2023</span> sold Products: <span>
                                                <?php $sql_sold_yearly = "SELECT * FROM orders WHERE date >= DATE(NOW() - INTERVAL 1 MONTH)";

                                                $result_sold_yearly = $conn->query($sql_sold_yearly);

                                                echo mysqli_num_rows($result_sold_yearly);

                                                ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-3">
                                    <div class="panel-3">
                                        <h3 class="m-3">Monthly Sales</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">In <span>December</span> sold Products: <span>
                                                <?php $sql_sold_monthly = "SELECT * FROM orders WHERE date >= DATE(NOW() - INTERVAL 1 YEAR)";

                                                $result_sold_monthly = $conn->query($sql_sold_monthly);

                                                echo mysqli_num_rows($result_sold_monthly);
                                                ?>
                                            </span>!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-3">
                                    <div class="panel-3">
                                        <h3 class="m-3">Category Sales</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">In the categroy <span>Fruits</span> were <span>
                                                <?php $sql_sold_category = "SELECT * FROM category WHERE c_id='1'";

                                                $results_sold_category = $conn->query($sql_sold_category);

                                                if ($results_sold_category->num_rows > 0) {
                                                    while ($row_sold_category = $results_sold_category->fetch_assoc()) {
                                                        echo $row_sold_category['amount_sold'];
                                                    }
                                                }

                                                ?>
                                            </span> products sold!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-3">
                                    <div class="panel-1">
                                        <h3 class="m-3">Category Sales</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">In the categroy <span>Vegetables</span> were <span>
                                                <?php $sql_sold_category_2 = "SELECT * FROM category WHERE c_id='2'";

                                                $results_sold_category_2 = $conn->query($sql_sold_category_2);

                                                if ($results_sold_category_2->num_rows > 0) {
                                                    while ($row_sold_category_2 = $results_sold_category_2->fetch_assoc()) {
                                                        echo $row_sold_category_2['amount_sold'];
                                                    }
                                                }

                                                ?>
                                            </span> products sold!
                                        </p>
                                    </div>
                                </div>
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