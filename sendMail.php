<?php

$subject = 'Письмо з PHP';

echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";

$firstName = 'Євген';

$text1 = "Имя: {$firstName}" . "\n";
$text2 = "Hello, my friend";

$message = $text1 . $text2;

$headers = 'From: y.s.skiba@student.khai.edu';

$to = 'zhenyavagias@gmail.com';

mail($to, $subject, $message, $headers);

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Error sending email.";
}

?>