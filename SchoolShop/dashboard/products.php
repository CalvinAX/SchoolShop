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
                            <h2 class="text-white ml-3 mt-4">Products</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>
                    <!-- 1st Row Infos -->
                    <div class="row ml-3">
                        <div class="col-md">
                            <p class="text-white ml-3"><strong>Filters</strong></p>
                            <div class="filters d-flex justify-content-start">
                                <form class="form" method="get">
                                    <div class="form-group">
                                        <label for="filter_stock" class="text-white ml-3">Stock:</label>
                                        <select class="form-select" name="filter_stock">
                                            <option selected disabled>Sort by Stock</option>
                                            <option value="stock_in">In Stock</option>
                                            <option value="stock_out">Out of Stock</option>
                                            <option value="stock_reserve">Reserve</option>
                                        </select>
                                        <label for="filter_vendor" class="text-white ml-3">Vendor:</label>
                                        <select class="form-select" name="filter_vendor">
                                            <option selected disabled>Sort by Vendor</option>
                                            <option value="vendor_amazon">Amazon</option>
                                            <option value="vendor_ebay">Ebay</option>
                                            <option value="vendor_alibaba">Ali Baba</option>
                                        </select>
                                        <label for="filter_category" class="text-white ml-3">Category:</label>
                                        <select class="form-select" name="filter_category">
                                            <option selected disabled>Sort by Category</option>
                                            <option value="category_fruit">Fruit</option>
                                            <option value="category_tech">Tech</option>
                                            <option value="category_jewelry">Jewelry</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-sm ml-3 button-submit" value="Search">
                                </form>
                            </div>
                            <h3 class="text-white">Vtl. noch eine Searchbar (?)</h3>
                        </div>
                    </div>

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="p-2">#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Categories</th>
                                            <th>Vendor</th>
                                            <th>Stock</th>
                                            <th>Total Sold</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>123</td>
                                            <td>Gaming Mango</td>
                                            <td>19,99 €</td>
                                            <td>LED RGB XQC HD Gaming Mango</td>
                                            <td>Fruit, Gaming, Electronics</td>
                                            <td>Fruit Shop</td>
                                            <td>15400</td>
                                            <td>1334566</td>
                                            <td class="p-2"><a href="#">Edit Product</a></td>
                                        </tr>
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