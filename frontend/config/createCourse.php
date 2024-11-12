<?php
// createCourse.php
include 'config/db.php';
$collection = $database->courses;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $insertResult = $collection->insertOne([
        'title' => $title,
        'description' => $description,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($insertResult) {
        echo "Course created successfully!";
    } else {
        echo "Failed to create course.";
    }
}
?>
