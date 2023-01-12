<?php

include '../connections/root_connection.php';

$ticketType = htmlspecialchars($_REQUEST['inputTicketType']);
$ticketTitle = htmlspecialchars($_REQUEST['inputTicketTitle']);
$ticketPriority = htmlspecialchars($_REQUEST['inputTicketPriority']);
$ticketAssignedTo = htmlspecialchars($_REQUEST['inputTicketAssigned']);
$ticketDescription = htmlspecialchars($_REQUEST['inputTicketDescription']);
$ticketDueDate = htmlspecialchars($_REQUEST['inputTicketDueDate']);
$id = $_REQUEST['id'];

if (isset($_POST['submit']) && !empty($_REQUEST['inputTicketType']) && !empty($_REQUEST['inputTicketTitle']) && !empty($_REQUEST['inputTicketDescription']) && isset($_REQUEST['inputTicketPriority']) && isset($_REQUEST['inputTicketAssigned'])) {

$sql = "UPDATE tickets SET type='$ticketType', title='$ticketTitle', priority='$ticketPriority', assigned_to='$ticketAssignedTo', due_date='$ticketDueDate', description='$ticketDescription' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

    header("location: tickets.php");

} else {

    echo "<script>console.log(" . $conn->error . ")</script>";
    header("location: tickets.php");

}

} else {

    header("location: tickets.php");

}
?>