<?php
require 'dbConnection.php';
if (isset($_POST['cartProductId'])) {
    $cartProductId = $_POST['cartProductId'];
    $deleteQuery = "DELETE FROM `cart` WHERE cartProductId = $cartProductId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("Product remove from cart successfully.");
        location.replace("cart.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Product deletion Failed.");
        location.replace("cart.php");</script>';
    }
}
if (isset($_POST['btn_deleteAll'])) 
{
    $deleteAllQuery = "DELETE FROM `cart`";
    $queryRun = mysqli_query($connection, $deleteAllQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("All product remove from cart successfully.");
        location.replace("cart.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("All product deletion Failed.");
        location.replace("cart.php");</script>';
    }
}
?>
