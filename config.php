<?php
session_start();
$host = 'localhost'; // Your database host
$user = 'root'; // Your database user name
$password = ''; // Your database password
$dbname = 'acs'; // Your database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
