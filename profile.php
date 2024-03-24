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

$userId = $_SESSION['username']; 
$sql = "SELECT profile_image FROM users WHERE username = '$userId'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profileImage = $row['profile_image'];
} else {
    $profileImage = 'default.jpg'; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
     body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; 
      margin: 0; 
    }
    img {
      max-width: 100%; 
      max-height: 100%; 
    }
  </style>
</head>
<body>
  <img src="uploads/<?php echo $userId . '/' . $profileImage; ?>" alt="Profile Image">
</body>
</html>

