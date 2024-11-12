<?php
require 'vendor/autoload.php';

// MongoDB connection details
$uri = "mongodb://localhost:27017";  // MongoDB server URL (adjust if needed)
$client = new MongoDB\Client($uri);

// Select the database and collection
$database = $client->CourseHive;   // Your MongoDB database name
$collection = $database->courses;  // The collection where courses are stored

// Set the response header to indicate JSON output
header('Content-Type: application/json');

// Fetch all courses from the database
try {
    $courses = $collection->find();  // Get all documents in the collection

    // Convert MongoDB cursor to an array
    $courseArray = iterator_to_array($courses);

    // Prepare the response data (convert ObjectId and DateTime to strings for JSON)
    $response = array_map(function($course) {
        // Convert MongoDB's ObjectId and DateTime fields to strings
        $course['_id'] = (string)$course['_id'];
        if (isset($course['created_at'])) {
            $course['created_at'] = $course['created_at']->toDateTime()->format('Y-m-d H:i:s');
        }
        return $course;
    }, $courseArray);

    // Return the courses as a JSON response
    echo json_encode($response);

} catch (Exception $e) {
    // Handle any errors during the query or connection
    echo json_encode(['error' => 'Error fetching courses: ' . $e->getMessage()]);
}
?>
