<?php

include '../connections/root_connection.php';

$productName = htmlspecialchars($_REQUEST['inputProductName']);
$productPrice = htmlspecialchars($_REQUEST['inputProductPrice']);
$productStock = htmlspecialchars($_REQUEST['inputProductStock']);
$productCategory = htmlspecialchars($_REQUEST['inputProductCategory']);
$productVendor = htmlspecialchars($_REQUEST['inputProductVendor']);
$productDiscount = htmlspecialchars($_REQUEST['inputProductDiscount']);
$productDescription = htmlspecialchars($_REQUEST['inputProductDescription']);
$productSold = "0";

if (isset($_POST['submit']) && !empty($productName) && !empty($productPrice) && !empty($productCategory) && !empty($productVendor) && !empty($productDiscount) && !empty($productDescription)) {

    $sql = "INSERT INTO products (prod_name, prod_description, prod_price, prod_vendor, prod_stock, prod_picture, d_id, c_id, prod_sold) VALUES ('$productName', '$productDescription', '$productPrice', '$productVendor', '$productStock', 'default.png', '$productDiscount', '$productCategory', '$productSold')";

    if ($conn->query($sql) === TRUE) {
        header("location: products.php");
    } else {
        echo "<script>console.log(" . $conn->error . ")</script>";
        header("location: products.php");
    }
} else {
    header("location: products.php");
}
?>