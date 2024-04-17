<?php

require_once('./classes/DBConnection.php');

// Create an instance of the DBConnection class
$dbConnection = new DBConnection();
// Check if the database connection is successful
if ($dbConnection->conn) {
    // Check if the form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assuming you have included the necessary database connection code
        if (isset($_POST['edit-dog-id'])) {
            $dog_id = $_POST['edit-dog-id'];
            $name = $_POST['edit-name'];
            $breed = $_POST['edit-breed'];
            $age = $_POST['edit-age'];
            // Handle image upload if necessary
            // Update the dog information in the database using UPDATE statement
            $stmt = $dbConnection->conn->prepare("UPDATE dogs SET name=?, breed=?, age=? WHERE id=?");
            $stmt->bind_param("ssii", $name, $breed, $age, $dog_id);
            if ($stmt->execute()) {
                // Dog updated successfully
                echo "Dog updated successfully.";
            } else {
                // Error updating dog
                echo "Error updating dog: " . $stmt->error;
            }
            $stmt->close();
        } else {
            // Handle if dog ID is not provided
            echo "Dog ID not provided.";
        }
    } else {
        // Handle if form data is not submitted
    }
} else {
    // Handle database connection error
    echo "Database connection failed.";
}
?>
