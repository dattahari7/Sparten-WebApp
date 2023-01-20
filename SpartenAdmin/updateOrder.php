<?php
require 'dbConnection.php';
if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    $paymentStatus = 'Completed';
    $orderStatus = 'Completed';
    $deleteQuery = "UPDATE `order` SET `paymentStatus`='$paymentStatus',`orderStatus`='$orderStatus' WHERE orderId='$orderId'";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("order status and payment status updated successfully.");
        location.replace("orders.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("order status and payment status updation Failed.");
        location.replace("orders.php");</script>';
    }
}
?>