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
	$response = "Ruggero Mores, Alessandro Montagner, Roberto Facchin, Daniele De Carli, Alberto Sasso, Stefano Zanella, Fabiano Zucco, Leonardo, Francesco";
}
elseif($text=="/help")
{
	$response = "/help - questo help, /elenco per  elenco soci, /webcam elenco webcam, web nomewebcam per stato webcam, cognome  per avere indicativo";
}
elseif($text=="zanella")
{
	$response = "iu3fcm";
}
elseif($text=="mores")
{
	$response = "ik3dwy";
}
elseif($text=="/webcam")
{
	$response = "webcam avena, webcam tomatico, webcam fiere, webcam telva, webcam casere";
}
elseif($text=="web tomatico")
{
	$response = "spenta";
}
elseif($text=="web fiere")
{
	$response = "spenta";
}
elseif($text=="web casere")
{
	$response = "spenta";
}
elseif($text=="web avena")
{
	$response = "spenta";
}
elseif($text=="web telva")
{
	$response = "spenta";
}
else
{
	$response = "Non conosco altri";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
// imposto la keyboard
$parameters["reply_markup"] = '{ "keyboard": [["web avena], ["web tomatico"], ["web casere"], ["web telva"], ["web fiere"]], "one_time_keyboard": false}';
echo json_encode($parameters);
