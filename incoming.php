<?php


error_reporting(E_ALL);


/*
  Remove non-numeric characters from a string.
*/
function stripNonNumeric($str='') {
  return preg_replace('(\D+)', '', $str);
}

require "/path/to/Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "XXXXXXXX";
    $AuthToken = "XXXXXXXX";
 
    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
	
if (isset($_POST['to'])) {
	
$to_number = stripNonNumeric($_POST['to']); 

if($to_number >=99999999999 )
{
  
$to_number = substr($to_number, 0, 11);

if($to_number >=19999999999 )
{
	
$to_number = substr($to_number, 0, 10);

}

}
	
	} //end if post to 
	
	
if (isset($_POST['text'])) 

{

$message = strip_tags($_POST['text']);

$message = html_entity_decode($message);

$message = substr($message, 0, 160);

} elseif (isset($_POST['html'])) {
	
$message = strip_tags($_POST['html']);

$message = html_entity_decode($message);

$message = substr($message, 0, 160);

}else{
	
	$message = 'ERROR: NO TEXT OR HTML BODY SENT IN EMAIL';
	
	
	$to_number = '2015555555';
}

	

$sms = $client->account->messages->sendMessage('2015555555', $to_number, $message);

?>
