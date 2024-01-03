<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'twilio-php-main/src/Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC75ac9b5b69cb51b2a06375ddfd245e6d"; 
$token  = "75599283f584e22b93d8e6ce96eed286"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+5212941295233", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "TEXTO PRUEBA" 
                           ) 
                  ); 
 
print($message->sid);