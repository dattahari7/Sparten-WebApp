<?php
require 'dbConnection.php';
if (isset($_POST['wishlistProductId'])) {
    $wishlistProductId = $_POST['wishlistProductId'];
    $deleteQuery = "DELETE FROM `wishlist` WHERE wishlistProductId = $wishlistProductId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("Product remove from wishlist successfully.");
        location.replace("wishlist.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Product deletion Failed.");
        location.replace("wishlist.php");</script>';
    }
}
if (isset($_POST['btn_deleteAll'])) 
{
    $deleteAllQuery = "DELETE FROM `wishlist`";
    $queryRun = mysqli_query($connection, $deleteAllQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("All product remove from wishlist successfully.");
        location.replace("wishlist.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("All product deletion Failed.");
        location.replace("wishlist.php");</script>';
    }
}
?>
