<?php
require 'vendor/autoload.php'; 

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017/");
$database = $client->CourseHive;  

// Access collections
$usersCollection = $database->users;
$coursesCollection = $database->courses;  

echo "MongoDB connected successfully!";
?>
