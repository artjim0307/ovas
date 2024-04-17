<?php
require_once('config.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if token is valid and not expired
    $stmt = $pdo->prepare("SELECT * FROM password_reset WHERE token = ? AND expiry > NOW()");
    $stmt->execute([$token]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Token is valid, allow password reset
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST['new_password'];

            // Update user's password in database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->execute([$hashed_password, $row['email']]);

            // Delete token from database
            $stmt = $pdo->prepare("DELETE FROM password_reset WHERE token = ?");
            $stmt->execute([$token]);

            echo "Password reset successful!";
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "Token not provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="" method="post">
        <label for="new_password">Enter your new password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
