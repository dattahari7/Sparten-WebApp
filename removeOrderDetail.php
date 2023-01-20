<?php
require 'dbConnection.php';
if (isset($_POST['orderDetailsId'])) {
    $orderDetailsId = $_POST['orderDetailsId'];
    $deleteQuery = "DELETE FROM `orderdetails` WHERE orderDetailsId = $orderDetailsId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("order cancle successfully.");
        location.replace("orderHistory.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("order canclation Failed.");
        location.replace("orderHistory.php");</script>';
    }
}
?>