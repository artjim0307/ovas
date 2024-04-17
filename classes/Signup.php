<?php 
require_once('../config.php');

// Check if the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"]; // Remember to hash the password before storing it in the database

    // Call insertUser function to insert user into the database
    insertUser($username, $password, $firstname, $lastname, $email);
}

// Function to insert user into the database
function insertUser($username, $password, $firstname, $lastname, $email) {
    // Database connection parameters
    $servername = "localhost"; // Change this if your database is on a different server
    $db_username = "your_db_username"; // Change this to your database username
    $db_password = "your_db_password"; // Change this to your database password
    $database = "ovas_db"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare insert statement
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)");

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Bind parameters
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $hashed_password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo json_encode(["status" => "success"]); // Send success response as JSON
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]); // Send error response as JSON
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>