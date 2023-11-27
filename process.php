<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // You can add additional validation and sanitization here

    // Send the email
    $to = "your@email.com"; // Replace with your email address
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email";
    $message = "Name: $name\nEmail: $email\n\n$message";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for contacting us. We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
