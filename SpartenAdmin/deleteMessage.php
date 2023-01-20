<?php
require 'dbConnection.php';
if (isset($_POST['delete_messageId'])) {
    $messageId = $_POST['delete_messageId'];
    $deleteQuery = "DELETE FROM `messages` WHERE messageId=$messageId";
    $queryRun = mysqli_query($connection, $deleteQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">
        alert("Message deleted successfully.");
        location.replace("messages.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Message deletion Failed.");
        location.replace("messages.php");</script>';
    }
}
if(isset($_POST['btn_deleteAll']))
{
    $deleteAllQuery = "DELETE FROM `messages`";
    $queryRun=mysqli_query($connection,$deleteAllQuery);
    if($queryRun){
        echo '<script type="text/javascript">
        alert("All message deleted successfully.");
        location.replace("messages.php");</script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("All message deletion Failed.");
        location.replace("messages.php");</script>';
    }
}
?>