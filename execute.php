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
	$response = "Ciao , benvenuto! Vai con /help per elenco opzioni";
}
elseif($text=="/elenco")
{
	$response = "Daniele De Carli, Roberto Facchin, Francesco Faoro, Leonardo Gallo, Alessandro Montagner, Ruggero Mores,
	Alberto Sasso, Stefano Zanella, Fabiano Zucco";
}
elseif($text=="/help")
{
	$response = "/help per questo help, /elenco per l'elenco soci, /webcam per l'elenco webcam, /'cognome'  per l'indicativo ";
}
elseif($text=="/'cognome'")
{ 
	$response = "Non ci siamo!! Sostituire 'cognome' con un cognome reale: /berlusconi";
}
elseif($text=="/berlusconi")
{ 
	$response = "Spiritoso!! Silvio non è iscritto ad Ar Feltre!!  Prova con: /zanella";
}
elseif($text=="/zanella")
{ 
	$response = "IU3FCM";
}
elseif($text=="/sasso")
{
	$response = "I3XFY";
}
elseif($text=="/mores")
{
	$response = "IK3DVY";
}
elseif($text=="/gallo")
{
	$response = "IZ3ATV";
}
elseif($text=="/montagner")
{
	$response = "IW3GIM";
}
elseif($text=="/zucco")
{
	$response = "xxxx";
}
elseif($text=="/facchin")
{
	$response = "IZ3FLG";
}
elseif($text=="/faoro")
{
	$response = "IW3IJP";
}
elseif($text=="/de carli")
{
	$response = "IW3GAE";
}
elseif($text=="/webcam")
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
if($text=="/webcam")
{
	$parameters["reply_markup"] = json_encode($keyboard, true);
}
echo json_encode($parameters);
