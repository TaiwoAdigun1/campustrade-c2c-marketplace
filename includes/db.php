<?php
// CampusTrade database connection
// For XAMPP local testing, use: host=localhost, user=root, password="", database=campustrade
// For online hosting, replace these values with the database details from your hosting control panel.
$host = "localhost";
$user = "root";
$password = "";
$database = "campustrade_db";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");
?>
