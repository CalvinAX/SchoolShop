<?php 

    //root login
    $database_host = 'localhost:3306';
    $database_user = 'root';
    $database_pass = '';
    $database_name = 'SchoolShop';

    $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to Database with Account: ROOT | Error: ' . mysqli_connect_error());
    }


        

    

?>