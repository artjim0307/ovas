<?php
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate unique token
    $token = bin2hex(random_bytes(16));

    // Insert token into database
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $stmt = $pdo->prepare("INSERT INTO password_reset (email, token, expiry) VALUES (?, ?, ?)");
    $stmt->execute([$email, $token, $expiry]);

    // Send reset link via email
    $reset_link = "http://example.com/reset_password.php?token=$token";
    // Send email with reset link to $email
    // Example:
    // mail($email, 'Reset Your Password', "Click the link to reset your password: $reset_link");
    echo "Password reset link sent to your email.";
}
?>
