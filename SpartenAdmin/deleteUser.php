<?php
session_start();
require 'dbConnection.php';
if (isset($_POST['delete_userId'])) {
    $userId = $_POST['delete_userId'];
    $deleteQuery = "DELETE FROM `userlogin` WHERE userId=$userId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("User deleted successfully.");
        location.replace("users.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("User deletion Failed.");
        location.replace("users.php");</script>';
    }
}
if (isset($_POST['btn_deleteAllUser'])) 
{
    $deleteAllQuery = "DELETE FROM `userlogin`";
    $queryRun = mysqli_query($connection, $deleteAllQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("All users deleted successfully.");
        location.replace("users.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("All users deletion Failed.");
        location.replace("users.php");</script>';
    }
}
?>