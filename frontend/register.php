<?php
require 'config/db.php';
use MongoDB\BSON\ObjectId;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Insert user data into MongoDB
    $result = $collection->insertOne([
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    ]);

    if ($result->getInsertedCount() == 1) {
        echo "Registration successful!";
    } else {
        echo "Error registering user.";
    }
}
?>
