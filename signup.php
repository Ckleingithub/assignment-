<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  
  if (empty($fullname) || empty($email) || empty($gender) || empty($password) || empty($confirmPassword)) {
    
    echo "Please fill in all the required fields.";
  } elseif ($password !== $confirmPassword) {
  
    echo "Password and Confirm Password do not match.";
  } else {
    

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wiber";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO signup (fullname, email, gender, password) VALUES ('$fullname', '$email', '$gender', '$password')";

    if ($conn->query($sql) === TRUE) {
      
      header("Location: welcome.php");
      exit();
    } else {
      
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>
