<?php
include "config.php"; // make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get user input safely
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === "" || $password === "") {
        echo "Username and password cannot be empty";
        exit;
    }

    // HMAC hashing using secret key
    $hashed_password = hash_hmac("sha256", $password, $secret_key);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Signup successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>