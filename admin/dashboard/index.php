<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 2500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex; /* Make container a flex container */
            flex-wrap: wrap; /* Allow cards to wrap */
        }

        .card {
           flex: 0 1 calc(20% - 20px); 
           
            margin-left: 50px;
            padding: 20px;
             /* Space between cards */
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card:last-child {
            margin-right: 0; /* Remove margin for the last card */
        }

        .card-icon {
            font-size: 36px;
            margin-right: 20px;
        }

        .card h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .info {
            margin-top: 10px;
            font-size: 18px;
            color: #666;
        }

        .appointment-container {
            margin-top: 40px;
            width: 100%; /* Ensure appointment container spans full width */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        .dog-card {
    background-color: #e2f0f7; /* Light blue */
}

.appointment-card {
    background-color: #e8f6e9; /* Light green */
}

.thead{
background-color: aquamarine;
}

    </style>
</head>
<body>
<div class="container">
   <div class="card dog-card">
        <div class="card-icon">
            <i class="fas fa-dog"></i>
        </div>
        <div>
            <h2>My Dogs</h2>
            <?php
          

            if (isset($_SESSION['userdata']['id'])) {
                // Get the user ID from the session
                $auth_id = $_SESSION['userdata']['id'];

                // Create a new instance of the DBConnection class
                $dbConnection = new DBConnection();

                // Prepare the SQL statement to select dogs owned by the logged-in user
                $stmt = $dbConnection->conn->prepare("SELECT COUNT(*) AS dog_count FROM dogs WHERE owner = ?");
                $stmt->bind_param("i", $auth_id);

                // Execute the SQL statement
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();

                // Fetch the row to get the count of dogs
                $row = $result->fetch_assoc();
                $dog_count = $row['dog_count'];

                // Display the count of dogs
                echo "<p>Number of Dogs: $dog_count</p>";
            }
            ?>

        </div>
    </div>

    <div class="card appointment-card">
        <div class="card-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div>
            <h2>My Appointments</h2>
           <?php
    // Assuming you already have session_start() at the beginning of your PHP script to start the session

    // Check if the user is logged in
    if (isset($_SESSION['userdata']['id'])) {
        // Get the user ID from the session
        $owners_id = $_SESSION['userdata']['id'];

        // Create a new instance of the DBConnection class
        $dbConnection = new DBConnection();

        // Query the appointment details from the database based on the owner's ID
        $stmt = $dbConnection->conn->prepare("SELECT * FROM appointment_list WHERE owners_id = ?");
        $stmt->bind_param("i", $owners_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Get the count of appointments
        $appointment_count = $result->num_rows;

        // Display the appointment count
        echo "<p>Number of Appointments: $appointment_count</p>";

        // Display the list of appointments
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
          
        }
        echo "</ul>";
    }
    ?>


        </div>
    </div>

    <div class="appointment-container">
        <h2>Appointment Details</h2>
        <table>
            <thead>
            <tr>
                <th>Code</th>
                <th>Schedule</th>
                <th>Owner Name</th>
                <th>Email</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Remarks</th>
                 <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Assuming you already have session_start() at the beginning of your PHP script to start the session

            // Check if the user is logged in
            if (isset($_SESSION['userdata']['id'])) {
                // Get the user ID from the session
                $owners_id = $_SESSION['userdata']['id'];

                // Create a new instance of the DBConnection class
                $dbConnection = new DBConnection();

                // Query the appointment details from the database based on the owner's ID
                $stmt = $dbConnection->conn->prepare("SELECT * FROM appointment_list WHERE owners_id = ?");
                $stmt->bind_param("i", $owners_id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Display the appointment details in the appointment list table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['code'] . "</td>";
                    echo "<td>" . $row['schedule'] . "</td>";
                    echo "<td>" . $row['owner_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['breed'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['remarks'] . "</td>";
                    echo "<td>";
if ($row['status'] == 0) {
    echo "Pending";
} elseif ($row['status'] == 1) {
    echo "Approved";
} else {
    // Handle other cases if needed
}
echo "</td>";
                    echo "</tr>";
                }
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
</body>
</html>
