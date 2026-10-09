<?php
$email = "jo</></>hn.doe@example.com";

// Remove illegal characters from email

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = $_POST['email'];
$email_clean = filter_var($email, FILTER_SANITIZE_EMAIL);




// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email is a valid email address");
} else {
    echo("$email is not a valid email address");
}




