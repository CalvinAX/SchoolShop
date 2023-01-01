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
                            <h2 class="text-white ml-3 mt-4">Ticket</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>
                    <!--Filter-->
                    <div class="row ml-3">
                        <div class="col-md">
                            <p class="text-white ml-3"><strong>Filter</strong></p>
                            <div class="filters d-flex justify-content-start">
                                <form class="form" method="get">
                                    <div class="form-row">
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
                                        </div>
                                        <div class="form-group">
                                            <label for="filter_priority" class="text-white ml-3">Priority:</label>
                                            <select class="form-select" name="filter_priority">
                                                <option selected>Any Priority</option>
                                                <option disabled>----------------</option>
                                                <option value="low">Low</option>
                                                <option value="high">High</option>
                                                <option value="immediate">Immediate</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="filter_created_by" class="text-white ml-3">Created By:</label>
                                            <select class="form-select" name="filter_created_by">
                                                <option selected>Anyone</option>
                                                <option disabled>----------------</option>
                                                <option value="peter">Peter</option>
                                                <option value="lois">Lois</option>
                                                <option value="joe">Joe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-sm ml-3 button-submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tickets-->
                <div class="container-fluid">

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-3 mb-2">
                                <a href="create-ticket.php"><button class="btn button-submit text-white"><i
                                            class="fa-solid fa-plus mr-1"></i>Create</button></a>
                                <table>
                                    <thead>
                                        <tr>
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

                                        <?php

                                        $ses_fullname = $_SESSION['name'] . " " . $_SESSION['lastname'];

                                        $sql = "SELECT * FROM tickets WHERE assigned_to='$ses_fullname'";
                                        $results = $conn->query($sql);

                                        if ($results->num_rows > 0) {
                                            while ($row = $results->fetch_assoc()) {




                                                echo "<tr class='border-bottom border-dark'>
                                                        <td>" . $row['id'] . "</td>
                                                        <td>" . $row['type'] . "</td>
                                                        <td>" . $row['title'] . "</td>";

                                                if ($row['priority'] == 'HIGH') {
                                                    echo "<td class='text-color-warning p-2'>" . $row['priority'] . "</td>";
                                                } elseif ($row['priority'] == 'IMMEDIATE') {
                                                    echo "<td class='text-color-danger p-2'>" . $row['priority'] . "</td>";
                                                } else {
                                                    echo "<td class='text-color-success p-2'>" . $row['priority'] . "</td>";
                                                }

                                                if (strlen($row['description']) > 50) {
                                                    echo "<td>" . substr($row['description'], 0, 50) . "...</td>";
                                                } else {
                                                    echo "<td>" . $row['description'] . "</td>";
                                                }



                                                echo "<td>" . $row['assigned_to'] . "</td>
                                                        <td><strong>" . $row['due_date'] . "</strong></td>
                                                        <td>" . $row['last_edited'] . "</td>
                                                    </tr>";
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>

                                <?php

                                if ($results->num_rows <= 0) {
                                    echo "<div class='alert alert-success mt-2' role='alert'>
                                            No tickets - Great!
                                            </div>";
                                }

                                ?>
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