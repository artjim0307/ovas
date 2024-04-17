<?php
// Set SMTP server and port
$smtpServer = 'smtp-relay.brevo.com';
$smtpPort = 587;

// Set your Brevo login credentials
$username = 'aj.aragon2204@gmail.com';
$password = 'chicksniotit'; // Your SMTP key value

// Set sender and recipient email addresses
$from = 'sender@example.com';
$to = 'recipient@example.com';

// Set email subject and message
$subject = 'Test Email from PHP using Brevo SMTP';
$message = 'This is a test email sent from PHP using Brevo SMTP.';

// Set additional headers
$headers = [
    'From: ' . $from,
    'Reply-To: ' . $from,
    'X-Mailer: PHP/' . phpversion(),
];

// Send email
if (mail($to, $subject, $message, implode("\r\n", $headers), '-f' . $username)) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}
?>
