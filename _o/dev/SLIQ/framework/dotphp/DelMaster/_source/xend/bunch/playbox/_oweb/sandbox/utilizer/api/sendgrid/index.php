<?php
require __DIR__ . '/vendor/autoload.php';
$from = new SendGrid\Email("BOT", "no-reply@bot.com");
$subject = "Re:Thank You";
$to = new SendGrid\Email("Eirvo", "allow@eirvo.ga");
$content = new SendGrid\Content("text/plain", "Hello ODAO, thank you for trying out SendGrid. It is fun and easy to do anywhere, even with PHP");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = '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';
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
#print_r($response->headers());
#echo $response->body();
?>