<?php
$productName = $_POST['productName'];
$productBrand = $_POST['productBrand'];
$productCurrentPrice = $_POST['productCurrentPrice'];
$productLastPrice = $_POST['productLastPrice'];
$productImage = addslashes(file_get_contents($_FILES['productImage']['tmp_name'])) ;
$productRating = $_POST['productRating'];

$connection = mysqli_connect("localhost", "root", "", "sparten");
if (!$connection) {
    die("connection failed");
}
$sql_insert = "insert into shop (productName, productBrand, productCurrentPrice, productLastPrice, productImage, productRating) VALUES ('$productName', '$productBrand', '$productCurrentPrice', '$productLastPrice', '$productImage','$productRating')";
if (mysqli_query($connection, $sql_insert)) {
    echo "Product Added succesully";
} else {
    echo "Product Adding Failed";
}
mysqli_close($connection);
?>
