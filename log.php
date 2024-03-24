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


// User registration
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Hash the password using MD5
    $hashed_password = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Check 
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: index.html?success=1");
        exit;
    } else {
        if ($conn->errno == 1062) { 
            header("Location: index.html?success=0");
            exit;
        } else {
            header("Location: index.html?success=0");
            exit;
        }
    }
}


// User login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    // Fetch the hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if ($password === $hashed_password) {
            $_SESSION['username'] = $username;
            header("Location: account.html");
            exit; 
        } else {
            header("Location: index.html?success=0");
            exit; 
        }
    } else {
        header("Location: index.html?success=0");
        exit; 
    }
}


// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.html");
    exit;
}
?>
