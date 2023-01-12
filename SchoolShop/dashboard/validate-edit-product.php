<?php

include '../connections/root_connection.php';

$productName = htmlspecialchars($_REQUEST['inputProductName']);
$productPrice = htmlspecialchars($_REQUEST['inputProductPrice']);
$productStock = htmlspecialchars($_REQUEST['inputProductStock']);
$productCategory = htmlspecialchars($_REQUEST['inputProductCategory']);
$productVendor = htmlspecialchars($_REQUEST['inputProductVendor']);
$productSold = htmlspecialchars($_REQUEST['inputProductSold']);
$productPicture = htmlspecialchars($_REQUEST['inputProductPicture']);
$productDiscount = htmlspecialchars($_REQUEST['inputProductDiscount']);
$productDescription = htmlspecialchars($_REQUEST['inputProductDescription']);
$id = $_REQUEST['id'];

if (isset($_POST['submit']) && !empty($productName) && !empty($productPrice) && !empty($productCategory) && !empty($productVendor) && !empty($productPicture) && !empty($productDiscount) && !empty($productDescription)) {

    $sql = "UPDATE products SET prod_name='$productName', prod_description='$productDescription', prod_price='$productPrice', prod_vendor='$productVendor', prod_stock='$productStock', prod_picture='$productPicture', d_id='$productDiscount', c_id='$productCategory', prod_sold='$productSold' WHERE prod_id='$id'";

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