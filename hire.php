<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "portfolio"; // Ensure this is the correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $project_type = $_POST['project_type'];
    $message = $_POST['message']; 

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM hire_me_requests WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: Email already registered.";
    } else {
        $insertQuery = "INSERT INTO hire_me_requests (name, email, project_type, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $name, $email, $project_type, $message);

        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>