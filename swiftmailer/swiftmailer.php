<?php

require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$mailName = $_ENV['MAIL_USERNAME'];
$mailPassword = $_ENV['MAIL_PASSWORD'];



// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, "ssl"))
    ->setUsername($mailName)
    ->setPassword($mailPassword);



 //Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


 //Create a message
$message = (new Swift_Message('Wonderful Subject'))
   ->setFrom(['vladimirtest@bk.ru' => 'vladimirtest@bk.ru'])
    ->setTo(['valdemar345@bk.ru'])
    ->setBody('Here is the message itself');


// Send the message
$result = $mailer->send($message);