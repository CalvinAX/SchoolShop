<?php

include '../connections/root_connection.php';

$ticketType = $_REQUEST['inputTicketType'];
$ticketTitle = $_REQUEST['inputTicketTitle'];
$ticketPriority = $_REQUEST['inputTicketPriority'];
$ticketAssignedTo = $_REQUEST['inputTicketAssigned'];
$ticketDescription = $_REQUEST['inputTicketDescription'];
$ticketDueDate = $_REQUEST['inputTicketDueDate'];
$id = $_REQUEST['id'];

echo $ticketType;
echo $ticketTitle;
echo $ticketPriority;
echo $ticketAssignedTo;
echo $ticketDescription;
echo $ticketDueDate;
echo $id;

if (isset($_POST['submit']) && !empty($_REQUEST['inputTicketType']) && !empty($_REQUEST['inputTicketTitle']) && !empty($_REQUEST['inputTicketDescription']) && isset($_REQUEST['inputTicketPriority']) && isset($_REQUEST['inputTicketAssigned'])) {

$sql = "UPDATE tickets SET type='$ticketType', title='$ticketTitle', priority='$ticketPriority', assigned_to='$ticketAssignedTo', due_date='$ticketDueDate', description='$ticketDescription' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

        echo "Put in DB";
    header("location: tickets.php");

} else {

    echo "<script>console.log(" . $conn->error . ")</script>";
    header("location: tickets.php");

}

} else {

    header("location: tickets.php");

}
?>