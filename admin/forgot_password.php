<?php
require_once('../config.php');

// Set SMTP configuration
ini_set('SMTP', 'smtp-relay.brevo.com');
ini_set('smtp_port', 587);
ini_set('sendmail_from', 'aj.aragon2204@gmail.com');

// Set your Brevo SMTP credentials
$smtpUsername = 'aj.aragon2204@gmail.com'; // Your SMTP username
$smtpPassword = 'ovas'; // Your SMTP password

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is set
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Validate email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check if the email exists in the database
            $user = getUserByEmail($email);

            if ($user) {
                // Generate a unique token
                $token = bin2hex(random_bytes(32));

                // Store the token in the database
                $success = storeResetToken($user['id'], $token);

                if ($success) {
                    // Send reset password email
                    $resetLink = base_url . "/reset_password.php?token=" . $token;
                    $subject = "Password Reset";
                    $message = "Please click the following link to reset your password: $resetLink";
                    $headers = "From: sender@example.com\r\n" .
                               "Content-type: text/html; charset=UTF-8\r\n" .
                               "X-Mailer: PHP/" . phpversion();

                    // Set additional SMTP headers for authentication
                    $additionalHeaders = "-f$smtpUsername";

                    if (mail($email, $subject, $message, $headers, $additionalHeaders)) {
                        echo "An email with instructions to reset your password has been sent to $email";
                    } else {
                        echo "Failed to send reset password email";
                    }
                } else {
                    echo "Failed to store reset token";
                }
            } else {
                echo "No user found with this email";
            }
        } else {
            echo "Invalid email format";
        }
    } else {
        echo "Email not set";
    }
}

// Function to get user by email
function getUserByEmail($email) {
    // Dummy function to retrieve user from database
    // Replace with your actual database query
    $users = array(
        array('id' => 1, 'email' => 'aj.aragon2204@gmail.com', 'password' => 'password1'),
        array('id' => 2, 'email' => 'artjimvillapana3@gmail.com', 'password' => 'password2'),
        array('id' => 3, 'email' => 'user3@example.com', 'password' => 'password3')
    );

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }

    return null;
}

// Function to store reset token in the database
function storeResetToken($userId, $token) {
    // Dummy function to store reset token in the database
    // Replace with your actual database query to insert the token
    return true; // Return true on success, false on failure
}
?>
