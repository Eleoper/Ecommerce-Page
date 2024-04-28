<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and sanitize input
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set up the recipient email address
    $to = "biswaskhadka10@gmail.com";

    // Set up the email subject
    $subject = "New Contact Form Submission";

    // Compose the email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Set up the email headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        // If the email is sent successfully, redirect to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        // If there's an error sending the email, display an error message
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
