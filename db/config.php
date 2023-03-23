<?php
$servername = "sg2nlmysql33plsk.secureserver.net:3306 ";
$username = "hotel_krishana";
$password = "hotel_krishana";
$db = "hotel_krishana";/*
$servername = "localhost";
$username = "root";
$password = "";
$db = "hotel_krishana";
*/



$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>