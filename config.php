<?php
// config.php
$secret_key = "my_super_secret_key_123";

// Create database connection
$conn = new mysqli("localhost", "root", "", "hmac_demo");

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
