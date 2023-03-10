<?php

ob_start();

$API_KEY = "5925264577:AAEqTzC0rl4zHJSY-02JGv9gAtssrhPrTqI";
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;

if($text=="/start"){
bot('sendMessage',[
'chat_id'=>$chat_id , 
'text'=>"send me word or anything ",
]);
}
if($text != "/start"){
$url = "http://service.afterthedeadline.com/info.slp?text=$text";
$ch = curl_init();
$timeout = 0;
curl_setopt($ch, CURLOPT_URL, $url) ;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$rawdata = curl_exec($ch);
curl_close($ch);
$res=strip_tags($rawdata, '<a>');
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"$res",

]);
}