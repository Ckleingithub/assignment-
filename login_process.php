<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "wiber";

// Create a new connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database for the user with the given email and password
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        echo "Login successful";
    } else {
        // Login failed
        echo "Login failed";
    }
}

$conn->close();
?>
