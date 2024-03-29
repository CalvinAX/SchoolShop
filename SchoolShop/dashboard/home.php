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

    <title>Home - Dashboard</title>

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
                                        <h3 class="m-3"><i class="fa-solid fa-user mr-2"></i>Users</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There are currently <span>
                                                <?php $sql_currently_on = "SELECT * FROM accounts";

                                                $result_currently_on = $conn->query($sql_currently_on);

                                                echo mysqli_num_rows($result_currently_on);

                                                ?>
                                            </span> Users registered!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2">
                                    <div class="panel-2">
                                        <h3 class="m-3"><i class="fa-solid fa-box-open mr-2"></i>Products</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There are currently <span>
                                                <?php $sql_currently_on = "SELECT * FROM products";

                                                $result_currently_on = $conn->query($sql_currently_on);

                                                echo mysqli_num_rows($result_currently_on);

                                                ?>
                                            </span> Products in the shop!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="animation-panel-wrapper">
                                <div class="panel-card p-3 mb-2">
                                    <div class="panel-3">
                                        <h3 class="m-3"><i class="fa-solid fa-ticket mr-2"></i>Tickets</h3>
                                        <hr />
                                        <p class="ml-3 mb-4">There are currently <span>
                                                <?php $sql_currently_on = "SELECT * FROM tickets WHERE done='0'";

                                                $result_currently_on = $conn->query($sql_currently_on);

                                                echo mysqli_num_rows($result_currently_on);

                                                ?>
                                            </span> Tickets not done!</p>
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
                                            <th>Buyer</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM orders ORDER BY date DESC LIMIT 10";
                                        $results = $conn->query($sql);

                                        if ($results->num_rows > 0) {
                                            while ($row = $results->fetch_assoc()) {

                                                $date = $row['date'];
                                                $order_id = $row['order_id'];
                                                $buyer_order_id = $row['account_id'];
                                                $prod_order_id = $row['prod_id'];

                                                $sql_prod = "SELECT * FROM products";
                                                $sql_buyer = "SELECT * FROM accounts";
                                                $results_prod = $conn->query($sql_prod);
                                                $results_buyer = $conn->query($sql_buyer);

                                                if ($results_prod->num_rows > 0) {
                                                    while ($row_prod = $results_prod->fetch_assoc()) {
                                                        $prod_name = $row_prod['prod_name'];
                                                        $prod_price = $row_prod['prod_price'];
                                                    }
                                                }

                                                if ($results_buyer->num_rows > 0) {
                                                    while ($row_buyer = $results_buyer->fetch_assoc()) {
                                                        $buyer_name = $row_buyer['name'] . " " . $row_buyer['lastname'];
                                                    }
                                                }

                                                echo "<tr class='border-bottom border-dark'>
                                                <td class='p-3'>$order_id</td>
                                                <td>$prod_name</td>
                                                <td>$buyer_name</td>
                                                <td>$ $prod_price</td></tr>";

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