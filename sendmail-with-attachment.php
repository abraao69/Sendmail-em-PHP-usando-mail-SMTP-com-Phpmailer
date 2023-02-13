<?php
$file = "example.txt";

$to = 'recipient@email.com';
$subject = 'Mail sent from sendmail PHP script';

$content = file_get_contents($file);
$encodedContent = chunk_split(base64_encode($content));

$divider = md5(time());

$headers = "From: TestSupport <example@email.com>\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $divider . "\"\r\n";
$headers .= "Content-Transfer-Encoding: 7bit\r\n";

// prepare mail body with attachment
$message = "--" . $divider. "\r\n";
$message .= "Content-Type: application/octet-stream; name=\"" . $file . "\"\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n";
$message .= "Content-Disposition: attachment\r\n";
$message .= $encodedContent. "\r\n";
$message .= "--" . $divider . "--";

//sendmail with attachment
if (mail($to, $subject, $message, $headers)) {
    echo 'Mail sent successfully.';
} else {
    echo 'Unable to send mail. Please try again.';
}
?>