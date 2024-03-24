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

// Handle file upload
if ($_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    // Get the username from the session
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        // Define the upload directory for the user
        $uploadDir = "uploads/$username/";
        // Create the user's directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        // Define the upload file path
        $uploadFile = $uploadDir . basename($_FILES['profile_image']['name']);
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadFile)) {
            $fileName = basename($_FILES['profile_image']['name']);
            // Update the profile image name in the database
            $sql = "UPDATE users SET profile_image = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $fileName, $username);
            if ($stmt->execute()) {
                echo "Profile image name inserted into the database successfully";
            } else {
                echo "Error updating profile image name: " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "Username not found in session";
    }
} else {
    echo "Error uploading file: " . $_FILES['profile_image']['error'];
}
?>
