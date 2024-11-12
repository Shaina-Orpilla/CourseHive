<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Find user by email
    $user = $collection->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
        // You can start a session or generate a JWT here for authentication
    } else {
        echo "Invalid credentials.";
    }
}
?>
