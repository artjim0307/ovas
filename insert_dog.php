<?php
require_once('./classes/DBConnection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['tmp_name'] != '') {
        // Retrieve form data
        $name = $_POST["name"];
        $breed = $_POST["breed"];
        $age = $_POST["age"];

        // Retrieve the logged-in user's ID from the session
        session_start(); // Start the session
        if (isset($_SESSION['userdata']) && isset($_SESSION['userdata']['id'])) {
            $auth_id = $_SESSION['userdata']['id'];
        } else {
            // Handle the case where the user is not logged in
            echo "Error: User not logged in";
            exit; // Stop further execution
        }

        // Handle file upload
        $image = $_FILES["image"]["name"];
        $target_dir = "uploads/"; // Change this to your uploads folder
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Check if file is uploaded successfully
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Create a new instance of the DBConnection class
            $dbConnection = new DBConnection();

            // Check connection
            if ($dbConnection->conn->connect_error) {
                die("Connection failed: " . $dbConnection->conn->connect_error);
            }

            // Prepare the SQL statement
            $stmt = $dbConnection->conn->prepare("INSERT INTO dogs (name, breed, owner, images, age) VALUES (?, ?, ?, ?, ?)");

            // Bind parameters to the SQL statement
            $stmt->bind_param("ssisi", $name, $breed, $auth_id, $image, $age);

            // Execute the SQL statement
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $dbConnection->conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: No file uploaded.";
    }
}
?>
