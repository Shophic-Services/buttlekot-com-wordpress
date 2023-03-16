<?php
$to = "mohmadismile.mir9@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
echo $headers = "From: mohmadismile.mir9@gmail.com" . "\r\n" .
"CC: mohmadismile.mir9@gmail.com";

echo $mail = mail($to,$subject,$txt,$headers);

echo "test = ".$mail;
?>