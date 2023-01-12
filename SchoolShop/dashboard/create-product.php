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

    <title>Ticket View - Dashboard</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/dashboard/dashboard-sidebar.css">
    <link rel="stylesheet" href="../css/dashboard/dashboard-main.css">

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
                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <h2 class="text-white ml-3 mt-4">Products</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-4 mb-2">
                                <form method="post" action="validate-create-product.php">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputProductName" class="text-white">Name</label>
                                            <input type="text" class="form-control" id="inputProductName"
                                                name="inputProductName" placeholder="Banana...">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputProductPrice" class="text-white">Price</label>
                                            <input type="text" class="form-control" id="inputProductPrice"
                                                name="inputProductPrice" placeholder="999.99">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputProductStock" class="text-white">Stock</label>
                                            <input type="text" class="form-control" id="inputProductStock"
                                                name="inputProductStock" placeholder="5000">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputProductCategory" class="text-white">Category</label>
                                            <select id="inputProductCategory" class="form-control"
                                                name="inputProductCategory">
                                                <option selected disabled value="1">Please Choose...</option>
                                                <option value="1">Fruit</option>
                                                <option value="2">Vegetable</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputProductVendor" class="text-white">Vendor</label>
                                            <input type="text" class="form-control" id="inputProductVendor"
                                                name="inputProductVendor" placeholder="Example Fruits GmbH">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputProductSold" class="text-white">Sold</label>
                                            <input type="text" class="form-control" id="inputProductSold"
                                                name="inputProductSold" value="0" disabled>
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputProductPicture" class="text-white">Picture</label>
                                            <input type="file" class="form-control" id="inputProductPicture"
                                                name="inputProductPicture" value="<?php echo $prod_picture; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputProductDiscount" class="text-white">Discount</label>
                                            <select id="inputProductDiscount" class="form-control"
                                                name="inputProductDiscount">
                                                <option value="5">0 %</option>
                                                <option value="1">10 %</option>
                                                <option value="2">20 %</option>
                                                <option value="3">25 %</option>
                                                <option value="4">50 %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductDescription" class="text-white">Description <small>max.
                                                length: 5000</small></label>
                                        <textarea class="form-control" id="inputProductDescription"
                                            name="inputProductDescription" style="white-space: pre-wrap;" rows="5"
                                            maxlength="5000"></textarea>
                                    </div>
                                    <button type="submit" class="btn button-submit" name="submit">Create</button>
                                    <button onclick="location.href='products.php'" type="button"
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