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
                <a href="tickets.php" class="ml-4 active">
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
                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <h2 class="text-white ml-3 mt-4">Tickets</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>
                    <div class="row ml-3">
                        <div class="col-md">
                            <p class="text-white ml-3"><strong>Filters</strong></p>
                            <div class="filters d-flex justify-content-start">
                                <form class="form" method="get">
                                    <div class="form-group">
                                        <label for="filter_date" class="text-white ml-3">Sort:</label>
                                        <select class="form-select" name="filter_date">
                                            <option selected disabled>Sort tickets by:</option>
                                            <option value="duedate">Due Date</option>
                                            <option value="id">ID</option>
                                            <option value="lastupdate">Last Update</option>
                                            <option value="assignedtoself">Assigned to me</option>
                                            <option disabled>----------------</option>
                                            <option value="3">Show all tickets</option>
                                        </select>
                                        <label for="filter_priority" class="text-white ml-3">Priority:</label>
                                        <select class="form-select" name="filter_priority">
                                            <option selected>Any Priority</option>
                                            <option disabled>----------------</option>
                                            <option value="low">Low</option>
                                            <option value="high">High</option>
                                            <option value="immediate">Immediate</option>
                                        </select>
                                        <label for="filter_created_by" class="text-white ml-3">Created By:</label>
                                        <select class="form-select" name="filter_created_by">
                                            <option selected>Anyone</option>
                                            <option disabled>----------------</option>
                                            <option value="petergrigga">Peter Grigga</option>
                                            <option value="loisgrigga">Lois Grigga</option>
                                            <option value="joewheelchair">Joe Wheelchair</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-sm ml-3 search-submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <button class="btn search-submit text-white"><i
                                        class="fa-solid fa-plus mr-1"></i>Create</button>
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- profile_picture, name, lastname, gender, country, city, zip_code, address, username, email, password, orders, role, loggedIn -->
                                            <th class="p-2">#</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Priority</th>
                                            <th>Short Description</th>
                                            <th>Assigned To</th>
                                            <th>Due Date</th>
                                            <th>Last Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom border-dark">
                                            <td>1</td>
                                            <td>Bugfix</td>
                                            <td><strong>Storefront not working</strong></td>
                                            <td class="text-color-warning p-2">HIGH</td>
                                            <td>Storefront is not working correctly, please bugfix!</td>
                                            <td>Peter Grigga</td>
                                            <td><strong>15.02.2023</strong></td>
                                            <td>16.12.2022 - 19:40</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>453</td>
                                            <td>Update</td>
                                            <td><strong>Banner Update</strong></td>
                                            <td class="text-color-success p-2">LOW</td>
                                            <td>Need to update the sales banner for the holidays.</td>
                                            <td>Lois Grigga</td>
                                            <td><strong>15.02.2023</strong></td>
                                            <td>08.12.2022 - 08:45</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>1285</td>
                                            <td>Bugfix</td>
                                            <td><strong>Payment not working!</strong></td>
                                            <td class="text-color-danger p-2">IMMEDIATE</td>
                                            <td>The payment in the shop is not working! FIX IMMEDIATLY</td>
                                            <td>Peter Grigga</td>
                                            <td><strong>15.02.2023</strong></td>
                                            <td>01.01.2023 - 15:45</td>
                                        </tr>
                                        <tr class="border-bottom border-dark">
                                            <td>75</td>
                                            <td>Addition</td>
                                            <td><strong>Add more payment options</strong></td>
                                            <td class="text-color-success p-2">LOW</td>
                                            <td>We need to add more payment options to the shop for more customers.</td>
                                            <td>Joe Wheelchair</td>
                                            <td><strong>15.02.2023</strong></td>
                                            <td>16.12.2022 - 14:16</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
            </main>
        </div>

    </div>
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>