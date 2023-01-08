<?php

session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("location: login.php");
}

include '../connections/root_connection.php';

$ticket_id = $_GET['id'];

$sql = "SELECT * FROM tickets WHERE id='$ticket_id'";

$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $title = $row['title'];
        $type = $row['type'];
        $priority = $row['priority'];
        $assigned = $row['assigned_to'];
        $due = $row['due_date'];
        $description = $row['description'];
    }
}

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
                            <h2 class="text-white ml-3 mt-4">Tickets</h2>
                            <hr class="bg-secondary" />
                        </div>
                    </div>

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-4 mb-2">
                                <form method="post" action="validate-edit-ticket.php">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputTicketTitle" class="text-white">Title</label>
                                            <input type="text" class="form-control" id="inputTicketTitle"
                                                name="inputTicketTitle" value="<?php echo $title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputTicketType" class="text-white">Type</label>
                                            <input type="text" class="form-control" id="inputTicketType"
                                                name="inputTicketType" value="<?php echo $type; ?>">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputTicketPriority" class="text-white">Priority</label>
                                            <select id="inputTicketPriority" class="form-control"
                                                name="inputTicketPriority">
                                                <option selected><?php echo $priority; ?></option>
                                                <option disabled>------------</option>
                                                <option>LOW</option>
                                                <option>HIGH</option>
                                                <option>IMMEDIATE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="inputTicketAssigned" class="text-white">Assigned to</label>
                                            <select id="inputTicketAssigned" class="form-control"
                                                name="inputTicketAssigned">
                                                <?php
                                                echo "<option selected>". $assigned ."</option>
                                                        <option disabled>------------</option>";

                                                $sql_assigned = "SELECT name, lastname FROM accounts WHERE role='0' OR role='1'";
                                                $results_assigned = $conn->query($sql_assigned);

                                                if ($results_assigned->num_rows > 0) {
                                                    while ($row_assigned = $results_assigned->fetch_assoc()) {
                                                        echo "<option>" . $row_assigned['name'] . " " . $row_assigned['lastname'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputTicketDueDate" class="text-white">Due Date</label>
                                            <input type="date" class="form-control" id="inputTicketDueDate"
                                                name="inputTicketDueDate" value="<?php echo $due; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTicketDescription" class="text-white">Description <small>max.
                                                length: 4800</small></label>
                                        <textarea class="form-control" id="inputTicketDescription"
                                            name="inputTicketDescription" style="white-space: pre-wrap;" rows="5"
                                            maxlength="4800"><?php echo $description; ?></textarea>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="<?php echo $ticket_id; ?>">
                                    <button type="submit" class="btn button-submit" name="submit">Edit</button>
                                    <button onclick="location.href='tickets.php'" type="button"
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