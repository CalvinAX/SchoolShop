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

                    <div class="row ml-3 mr-3">
                        <div class="col-md">
                            <div class="panel-card p-4 mb-2">

                                <!-- Tickets: Type, Title, Priority, Description, Assigned to, Due Date, Last Updated, Created By-->
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputTicketType" class="text-white">Ticket Type</label>
                                            <input type="text" class="form-control" id="inputTicketType"
                                                name="inputTicketType" placeholder="e.g. Bugfix, Addon...">
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="inputTicketTitle" class="text-white">Ticket Title</label>
                                            <input type="text" class="form-control" id="inputTicketType"
                                                name="inputTicketType" placeholder="e.g. Storefront not working...">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputTicketPriority" class="text-white">Priority</label>
                                            <select id="inputTicketPriority" class="form-control"
                                                name="inputTicketPriority">
                                                <option selected>Choose...</option>
                                                <option>LOW</option>
                                                <option>HIGH</option>
                                                <option>IMMEDIATE</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputTicketAssigned" class="text-white">Assigned to</label>
                                            <select id="inputTicketAssigned" class="form-control"
                                                name="inputTicketAssigned">
                                                <option selected>Choose...</option>
                                                <option>Peter Griffin</option>
                                                <option>Lois Griffin</option>
                                                <option>Joe Swanson</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTicketDescription" class="text-white">Ticket Description</label>
                                        <textarea class="form-control" id="inputTicketDescription" name="inputTicketDescription" style="white-space: pre-wrap;"
                                            rows="5"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputTicketDue" class="text-white">Due Date</label>
                                            <input type="date" class="form-control" id="inputTicketDue"
                                                name="inputTicketDue" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputTicketCreatedBy" class="text-white">Created by</label>
                                            <input type="text" class="form-control" id="inputTicketCreatedBy"
                                                name="inputTicketCreatedBy" value="CREATOR-NAME" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputTicketCreatedOn" class="text-white">Created on</label>
                                            <input type="text" class="form-control" id="inputTicketCreatedOn"
                                                name="inputTicketCreatedOn" value="<?php echo date('d-m-Y'); ?>" disabled>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn button-submit"><i class="fa-solid fa-plus mr-1"></i>Create</button>
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