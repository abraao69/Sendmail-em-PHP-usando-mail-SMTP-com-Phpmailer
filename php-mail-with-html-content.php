<?php
$to = 'recipient@email.com';

$subject = 'Mail sent from sendmail PHP script';

$from = 'test@testmail.com';
$headers = "From: $from";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<p><strong>Sendmail in PHP with HTML content. </strong></p>';

if (mail($to, $subject, $message, $headers)) {
    echo 'Mail sent successfully.';
} else {
    echo 'Unable to send mail. Please try again.';
}
?>