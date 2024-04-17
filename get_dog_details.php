<?php
require_once('./classes/DBConnection.php');

// Create an instance of the DBConnection class
$dbConnection = new DBConnection();

if(isset($_POST['dog_id']) && filter_var($_POST['dog_id'], FILTER_VALIDATE_INT)) {
    // Get the dog ID from the POST data and sanitize it
    $dog_id = $_POST['dog_id'];

    // Prepare the query to fetch dog details
    $query = "SELECT * FROM dogs WHERE id = ?";
    
    // Prepare the statement
    $stmt = $dbConnection->conn->prepare($query);
    
    if($stmt) {
        // Bind the parameters and execute the statement
        $stmt->bind_param("i", $dog_id);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the dog details
        $dog = $result->fetch_assoc();

        // Check if a dog was found with the provided ID
        if($dog) {
            // Prepare the response
            $response = array(
                'name' => $dog['name'],
                'breed' => $dog['breed'],
                'age' => $dog['age']
            );

            // Send the response as JSON
            echo json_encode($response);
        } else {
            // No dog found with the provided ID
            echo json_encode(array('error' => 'Dog not found'));
        }
    } else {
        // Error preparing the statement
        echo json_encode(array('error' => 'Database error'));
    }
} else {
    // Dog ID is missing or invalid
    echo json_encode(array('error' => 'Invalid dog ID'));
}

// Close the statement
$stmt->close();
?>
