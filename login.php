<?php



function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "wiber";


    $conn = new mysqli($servername, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $conn = connectToDatabase();

    
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows == 1) {
        
        header("Location: welcome.html");
        exit();
    } else {
        
        echo '<script>document.getElementById("login-error").style.display = "block";</script>';
    }

    
    $stmt->close();
    $conn->close();
}
?>
