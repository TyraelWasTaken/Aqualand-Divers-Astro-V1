<?php

$name    = htmlspecialchars($_POST["name"]);
$email   = htmlspecialchars($_POST["email"]);
$message = htmlspecialchars($_POST["message"]);

$to      = "contact@aqualanddivers.co.uk";
$subject = "New Contact Form Message";

$body = "You have received a new message:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message\n";

$headers = "From: contact@aqualanddivers.co.uk\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $body, $headers)) {
  $replySubject = "Thanks for contacting Aqualand Divers!";

  $replyBody = "Dear $name,\n\n";
  $replyBody .= "Thank you for reaching out to Aqualand Divers, we have received your message and will get back in touch shortly.\nUntil then, you can call us any time at 01245 477701.\n\n";
  $replyBody .= "Kind regards,\n";
  $replyBody .= "Aqualand Divers Team\n";
  $replyBody .= "https://aqualanddivers.co.uk\n";

  $replyHeaders = "From: Aqualand Divers <contact@aqualanddivers.co.uk>\r\n";
  $replyHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

  mail($email, $replySubject, $replyBody, $replyHeaders);
  header("Location: /thank-you");
  exit();
} else {
  echo "Error: message could not be sent.";
}
?>
