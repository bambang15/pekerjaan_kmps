<?php
$servername = "127.0.0.1";
$username = "admin";
$password = "admin";
$dbname = "db_onlineshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>