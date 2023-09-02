<?php

$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "patient_management";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}