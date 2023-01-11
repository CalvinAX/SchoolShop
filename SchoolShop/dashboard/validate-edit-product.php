<?php

include '../connections/root_connection.php';

$productName = $_REQUEST['inputProductName'];
$productPrice = $_REQUEST['inputProductPrice'];
$productStock = $_REQUEST['inputProductStock'];
$productCategory = $_REQUEST['inputProductCategory'];
$productVendor = $_REQUEST['inputProductVendor'];
$productSold = $_REQUEST['inputProductSold'];
$productPicture = $_REQUEST['inputProductPicture'];
$productDiscount = $_REQUEST['inputProductDiscount'];
$productDescription = $_REQUEST['inputProductDescription'];
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