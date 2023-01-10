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

    <title>Products - Dashboard</title>

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
                <a href="products.php" class="ml-4 active">
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

                <div class="container-fluid">

                    <!-- 1st Row Infos -->
                    <div class="row ml-3 mr-3 mt-3">
                        <div class="col-md">
                            <div class="panel-card p-4 mb-2 mt-2">
                                <h3 class="text-white">Products</h3>
                                <form class="form-inline mt-3" action="products.php" method="get">
                                    <input class="form-control" type="search" placeholder="Search" name="search"
                                        id="search">
                                    <button class="btn button-submit" type="submit">Search</button>
                                </form>
                                <hr class="bg-secondary" />
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- profile_picture, name, lastname, gender, country, city, zip_code, address, username, email, password, orders, role, loggedIn -->
                                            <th class="p-2">#</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Vendor</th>
                                            <th>Stock</th>
                                            <th>Discount</th>
                                            <th>Sold</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (!empty($_GET['search'])) {
                                            $searchstring = $_GET['search'];
                                            $sql = "SELECT * FROM products WHERE prod_name LIKE '%$searchstring%'";
                                        } else {
                                            $sql = "SELECT * FROM products";
                                        }

                                        $results = $conn->query($sql);

                                        if ($results->num_rows > 0) {
                                            while ($row = $results->fetch_assoc()) {

                                                $c_id = $row['c_id'];
                                                $c_sql = "SELECT * FROM category WHERE c_id='$c_id'";
                                                $c_result = $conn->query($c_sql);

                                                $d_id = $row['d_id'];
                                                $d_sql = "SELECT * FROM discount WHERE d_id='$d_id'";
                                                $d_result = $conn->query($d_sql);

                                                if($c_result->num_rows > 0) {
                                                    while ($c_row = $c_result->fetch_assoc()) {
                                                        $category = $c_row['category_name'];
                                                    }
                                                }

                                                if($d_result->num_rows > 0) {
                                                    while ($d_row = $d_result->fetch_assoc()) {
                                                        $discount = $d_row['value'];
                                                    }
                                                }

                                                echo "<tr class='border-bottom border-dark'>
                                                <td class='p-2'>" . $row['prod_id'] . "</td>
                                                <td>" . $row['prod_picture'] . "</td>
                                                <td>" . $row['prod_name'] . "</td>
                                                <td>" . $category . "</td>
                                                <td>" . substr($row['prod_description'], 0, 30) . "...</td>
                                                <td>$" . $row['prod_price'] . "</td>
                                                <td>" . $row['prod_vendor'] . "</td>
                                                <td>" . $row['prod_stock'] . "</td>
                                                <td>" . $discount . " %</td>
                                                <td>" . $row['prod_sold'] . "</td>
                                                <td><a href='edit-product.php?id=" . $row['prod_id'] . "'>Edit User</a></td>
                                                </tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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