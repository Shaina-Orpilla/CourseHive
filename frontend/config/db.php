<?php
require 'vendor/autoload.php'; 
$client = new MongoDB\Client("mongodb://localhost:27017/");
$database = $client->CourseHive;  
$collection = $database->users;
$collection = $database->courses;  

echo "MongoDB connected successfully!";
?>
