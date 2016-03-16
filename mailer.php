<?php

// Get the form fields, remove html tags and whitespace
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);

// Check the data.
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: http://www.webdesigncourse.co/omnifood/index.php?success=-1#form");
    exit;
}

// Set the recipient e-mail. Update this to your desired e-mail address.
$recipient = "Joffrmann25@gmail.com";

// Set the e-mail subject.
$subject = "New contact from $name";

// Build the e-mail content.
$email_content = "Name: $name\n";
$email_content .= "E-mail: $email\n";
$email_content .= "Message: $message\n";

// Build the e-mail headers.
$email_headers = "From: $name <$email>";

// Send the e-mail.
mail($recipient, $subject, $email_content, $email_headers);

// Redirect to the index.html page with success code.
header("Location: http://www.webdesigncourse.co/omnifood/index.php?success=1#form");

?>