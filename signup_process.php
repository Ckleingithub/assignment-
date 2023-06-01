<?php
// Retrieve signup form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Check if passwords match
if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
    exit;
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$database = "wiber";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert signup data into signup table
$sql = "INSERT INTO signup (fullname, email, gender, password) VALUES ('$fullname', '$email', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
