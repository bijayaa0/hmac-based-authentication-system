<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Recompute HMAC
    $hashed_input = hash_hmac("sha256", $password, $secret_key);

    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if ($hashed_input === $row["password_hash"]) {
            echo "Login successful";
        } else {
            echo "Invalid password";
        }

    } else {
        echo "User not found";
    }
}
?>