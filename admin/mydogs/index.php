

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dog Cards</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

#modern {
    /* Styles for the cards with ID 'modern' */
 background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin: 20px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Center the image vertically */
    align-items: center; 
}

#modern:hover {
    /* Hover styles for the cards with ID 'modern' */
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

#modern img {
    /* Styles for the images inside the cards with ID 'modern' */
    width: 80%;
    height: 50%;
    justify-content: center ;
    border-radius: 10px;
     object-fit: cover;
}
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 140%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        #add-dog-btn {
            margin: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #add-dog-btn:hover {
            background-color: #45a049;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

.edit-dog-btn {
   
    width: 80%;
    margin-top: 20px;
    
 
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.edit-dog-btn:hover {
    background-color: #45a049;
}

/* Success message style */
.success-message {
    color: #155724; /* Green text color */
    background-color: #d4edda; /* Green background color */
    border: 1px solid #c3e6cb; /* Green border color */
    padding: 10px; /* Padding around the message */
    margin-bottom: 10px; /* Bottom margin to separate messages */
}

/* Error message style */
.error-message {
    color: #721c24; /* Red text color */
    background-color: #f8d7da; /* Red background color */
    border: 1px solid #f5c6cb; /* Red border color */
    padding: 10px; /* Padding around the message */
    margin-bottom: 10px; /* Bottom margin to separate messages */
}


    </style>
</head>
<body>

    <button id="add-dog-btn">Add Dog</button>
<div class="container">
  <?php
if (isset($_SESSION['userdata']['id'])) {

    $auth_id = $_SESSION['userdata']['id'];

    // Create a new instance of the DBConnection class
    $dbConnection = new DBConnection();

    // Prepare the SQL statement to select dogs owned by the logged-in user
    $stmt = $dbConnection->conn->prepare("SELECT * FROM dogs WHERE owner = ?");
    $stmt->bind_param("i", $auth_id);

    // Execute the SQL statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through the rows and display dog information in cards
        while ($row = $result->fetch_assoc()) {
?>
            <div class='card' id='modern'>
                <h2><?= $row['name'] ?></h2>
                <p>Breed: <?= $row['breed'] ?></p>
                <p>Age: <?= $row['age'] ?> years old</p>
               <?php 
$imagePath = isset($row['images']) ? 'uploads/' . $row['images'] : 'default-image.png';
?>
<img src='<?php echo validate_image($imagePath); ?>' alt='<?php echo isset($row['name']) ? $row['name'] : "Default Name"; ?>' />
        <button class="edit-dog-btn" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-breed="<?= $row['breed'] ?>" data-age="<?= $row['age'] ?>" data-image="<?= $imagePath ?>">Edit</button>
            </div>
        
<?php
        }
    } else {
        echo "No dogs found for the logged-in user.";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $dbConnection->conn->close();
} else {
    echo "Error: User not logged in";
}
?>

</div>




   <div id="add-dog-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add a New Dog</h2>
            <form id="add-dog-form" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed"><br><br>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age"><br><br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br><br>
                <input type="submit" value="Add Dog">
                  <div id="add-dog-message"></div>
            </form>
        </div>
    </div>


    <div id="edit-dog-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Dog</h2>
        <form id="edit-dog-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="edit-dog-id" name="edit-dog-id"> <!-- Hidden input to store dog ID -->
            <label for="edit-name">Name:</label>
            <input type="text" id="edit-name" name="edit-name"><br><br>
            <label for="edit-breed">Breed:</label>
            <input type="text" id="edit-breed" name="edit-breed"><br><br>
            <label for="edit-age">Age:</label>
            <input type="number" id="edit-age" name="edit-age"><br><br>
            <label for="edit-image">Image:</label>
            <input type="file" id="edit-image" name="edit-image"><br><br>
            <input type="submit" value="Update Dog">
              <div id="edit-dog-message"></div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var modal = $("#add-dog-modal");
        var btn = $("#add-dog-btn");
        var span = $(".close");

        btn.on("click", function () {
            modal.css("display", "block");
        });

        span.on("click", function () {
            modal.css("display", "none");
        });

        $(window).on("click", function (event) {
            if (event.target == modal[0]) {
                modal.css("display", "none");
            }
        });

        $("#add-dog-form").on("submit", function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "../insert_dog.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle successful response

                    console.log(response);
                      $("#add-dog-message").html("<p style='color: green;'>Dog added successfully!</p>");
                   
                    // You can perform additional actions here, such as updating the UI
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                       $("#add-dog-message").html("<p style='color: red;'>Error adding dog. Please try again.</p>");
                }
            });

            modal.css("display", "none");
        });

$(".edit-dog-btn").on("click", function () {
    var modal = $("#edit-dog-modal");
    var id = $(this).data("id"); // You're trying to get the 'id' attribute, but it's not defined in the HTML
    var name = $(this).data("name");
    var breed = $(this).data("breed");
    var age = $(this).data("age");
    var image = $(this).data("image");

    // Populate the edit modal form with dog details
    $("#edit-dog-id").val(id); // This won't work because 'id' is not defined
    $("#edit-name").val(name);
    $("#edit-breed").val(breed);
    $("#edit-age").val(age);

    // Display the edit modal
    modal.css("display", "block");
});

// New event listener for the edit-dog-form submission
$("#edit-dog-form").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "../edit_dog.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle successful response
            console.log(response);
             $("#edit-dog-message").html("<p style='color: green;'>Dog updated successfully!</p>");
            // You can perform additional actions here, such as updating the UI
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
              $("#edit-dog-message").html("<p style='color: red;'>Error updating dog. Please try again.</p>");
            
        }
    });

    // Close the edit modal after submission
    $("#edit-dog-modal").css("display", "none");
});
    });
</script>


</body>
</html>




