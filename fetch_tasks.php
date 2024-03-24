<?php
session_start();

// Database connection
$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'taski'; 

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get the username from the session
$username = $_SESSION['username'];

// Fetch tasks associated with the current user from the database
$sql = "SELECT * FROM contenus WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = [
        'title' => $row['title'],
        'text' => $row['text'],
        'checked' => (bool) $row['checki']
    ];
}
$stmt->close();

// Send the tasks as JSON response
header('Content-Type: application/json');
echo json_encode($tasks);
?>
