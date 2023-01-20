<?php
session_start();
require 'dbConnection.php';
if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $paymentMethod = $_POST['paymentMethod'];
    $paymentStatus = 'pending';
    $orderStatus = 'pending';
    $userId = $_SESSION['userId'];
    $sql_select = mysqli_query($connection, "SELECT * FROM products, cart WHERE cart.productId=products.productId and cart.userId='$userId'");
    if (mysqli_num_rows($sql_select) > 0) {
        $totalProductPrice = 0;
        while ($cartProduct = mysqli_fetch_assoc($sql_select)) {
            $totalPrice = $cartProduct['productQuantity'] * $cartProduct['productCurrentPrice'];
            $totalProductPrice +=$totalPrice;
        }
    }
    $addedOn = date('Y-m-d h:i:s');
    $insertQuery = "INSERT INTO `order`(`userId`, `address`, `phoneNumber`, `pincode`, `state`, `city`, `paymentType`, `totalProductPrice`, `paymentStatus`, `orderStatus`, `addedOn`) VALUES ('$userId','$address','$phoneNumber','$pincode','$state','$city','$paymentMethod','$totalProductPrice','$paymentStatus','$orderStatus','$addedOn')";
    $queryRun = mysqli_query($connection, $insertQuery);

    $_SESSION['orderId'] = mysqli_insert_id($connection);
    $orderId = $_SESSION['orderId'];

    $sql_select = mysqli_query($connection, "SELECT * FROM products, cart WHERE cart.productId=products.productId and cart.userId='$userId'");
    if (mysqli_num_rows($sql_select) > 0) {
        $totalProductPrice = 0;
        while ($cartData = mysqli_fetch_assoc($sql_select)) {
            $productId = $cartData['productId'];
            $productQuantity = $cartData['productQuantity'];
            $totalPrice = $cartData['productQuantity'] * $cartData['productCurrentPrice'];
            $insertQuery = "INSERT INTO `orderdetails`(`orderId`, `productId`, `productQuantity`, `totalPrice`) VALUES ('$orderId','$productId','$productQuantity','$totalPrice')";
            $queryRun = mysqli_query($connection, $insertQuery);
        }
    }
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("Order successful.");
        location.replace("cart.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Order Failed.");
        location.replace("checkout.php");</script>';
    }
    
    



}
?>