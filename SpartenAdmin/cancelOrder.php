<?php
require 'dbConnection.php';
if (isset($_POST['btn_cancel'])) {
    $userId = $_POST['userId'];
    $orderId = $_POST['orderId'];
    $deleteQuery1 = "DELETE FROM `orderdetails` WHERE orderId = '$orderId'";
    $queryRun1 = mysqli_query($connection, $deleteQuery1);
    $deleteQuery2 = "DELETE FROM `order` WHERE orderId = '$orderId' and userId = '$userId'";
    $queryRun2 = mysqli_query($connection, $deleteQuery2);
    if ($queryRun2) {
        echo '<script type="text/javascript">
        alert("order cancel successfully.");
        location.replace("orders.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("order cancellation Failed.");
        location.replace("orders.php");</script>';
    }
}
?>