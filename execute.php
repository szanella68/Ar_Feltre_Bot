<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit; 
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao, se ti serve il mio aiuto digita /help per elenco opzioni";
}
elseif(strpos($text, "/soci") === 0)
{
	$response = "/De_Carli, /Facchin Roberto, /Faoro Francesco, /Gallo Leonardo, /Montagner Alessandro, /Mores Ruggero,
	/Sasso Alberto, /Zanella Stefano, /Zucco Fabiano";
}
elseif(strpos($text, "/help") === 0)
{
	$response = "/help per questo help, /soci per l'elenco soci, /webcam per l'elenco webcam, /'cognome'  per l'indicativo ";
}
elseif(strpos($text, "/'cognome'") === 0)
{ 
	$response = "Non ci siamo!! Sostituire 'cognome' con un cognome reale: /berlusconi";
}
elseif(strpos($text, "/berlusconi") === 0)
{ 
	$response = "Spiritoso!! Silvio non è iscritto ad Ar Feltre!!  Prova con: /zanella";
}
elseif(strpos($text, "/zanella") === 0)
{ 
	$response = "IU3FCM";
}
elseif(strpos($text, "/sasso") === 0)
{
	$response = "I3XFY";
}
elseif(strpos($text, "/mores") === 0)
{
	$response = "IK3DVY";
}
elseif(strpos($text, "/gallo") === 0)
{
	$response = "IZ3ATV";
}
elseif(strpos($text, "/montagner") === 0)
{	
	$response = "IW3GIM";
}
elseif(strpos($text, "/zucco") === 0)
{
	$response = "xxxx";
}
elseif(strpos($text, "/facchin") === 0)
{
	$response = "IZ3FLG";
}
elseif(strpos($text, "/faoro") === 0)
{
	$response = "IW3IJP";
}
elseif(strpos($text, "/de_carli") === 0)
{
	$response = "IW3GAE";
}
elseif(strpos($text, "/webcam") === 0)
{
	$keyboard = ['inline_keyboard' => [[['text' =>  'telva', 'url' => 'http://www.arifeltre.it/Cam6/webcam.jpg'],
					    ['text' =>  'pedavena', 'url' => 'http://www.arifeltre.it/Cam/webcam.jpg'],
					    ['text' =>  'avena', 'url' => 'http://www.arifeltre.it/Cam8/webcam.jpg'],
					    ['text' =>  'piste avena', 'url' => 'http://www.arifeltre.it/webcam/avena.jpg'],
					    ['text' =>  'buse', 'url' => 'http://www.arifeltre.it/Cam9/webcam.jpg'],
					    ['text' =>  'tomatico', 'url' => 'http://www.arifeltre.it/Cam1/webcam.jpg'],
					    ['text' =>  'fiere', 'url' => 'http://www.arifeltre.it/Cam4/image/camera1.jpg']]]];
        $response = "scegli la webcam";
}
else 
{
	exit;
	//$response = "Comando non previsto. /help";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
// imposto la keyboard
//$parameters["reply_markup"] = '{ "keyboard": [["web avena], ["web tomatico"], ["web casere"], ["web telva"], ["web fiere"]], "one_time_keyboard": false}';
if(strpos($text, "/webcam") === 0)
{
	$parameters["reply_markup"] = json_encode($keyboard, true);
}
echo json_encode($parameters);
