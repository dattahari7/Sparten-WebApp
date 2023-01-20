<?php
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName ="sparten";
$connection = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}