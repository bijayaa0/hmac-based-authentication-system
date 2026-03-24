<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "hmac_demonstaration";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "CREATE TABLE users_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL )";

if (mysqli_query($conn, $sql)){
    echo "Table users_detail created successfully.";
}
else{
    echo "Error creating table: ".mysqli_error($conn);
}
mysqli_close($conn);
?>