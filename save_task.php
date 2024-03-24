<?php
session_start();

// Database connection
$dbHost = 'localhost';
$dbUsername = 'root'; // Update with your database username
$dbPassword = ''; // Update with your database password
$dbName = 'taski';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the task details from the AJAX request
$data = json_decode(file_get_contents("php://input"));

// Assuming you have a session variable for username
$username = $_SESSION['username']; 

// Escape and sanitize input data
$title = $conn->real_escape_string($data->title);
$text = $conn->real_escape_string($data->text);
$checked = $data->checked ? 1 : 0;

// Insert the task details into the database
$sql = "INSERT INTO contenus (username, title, text, checki) VALUES ('$username', '$title', '$text', $checked)";
if ($conn->query($sql) === TRUE) {
    // Task saved successfully
    http_response_code(200);
    exit;
} else {
    http_response_code(500);
    echo "Error: " . $conn->error;
}

$conn->close();
?>
