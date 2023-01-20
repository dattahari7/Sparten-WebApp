<?php
require 'dbConnection.php';
if (isset($_POST['remove_productId'])) {
    $productId = $_POST['remove_productId'];
    $deleteQuery = "DELETE FROM `products` WHERE productId = $productId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("Product deleted successfully.");
        location.replace("products.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Product deletion Failed.");
        location.replace("products.php");</script>';
    }
}
?>