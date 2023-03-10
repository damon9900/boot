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
function con($num, $from, $to){
$url = "http://apilayer.net/api/live?access_key=f0227be5429514e7b025b88f3bf5cb94&currencies=EUR&source=&format=$num";
$ch = curl_init();
$timeout = 0;
curl_setopt($ch, CURLOPT_URL, $url) ;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$rawdata = curl_exec($ch);
curl_close($ch);
$ex = explode("\n", $rawdata);
return $ex[7];
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id =  $update->callback_query->message->message_id;
$data = $update->callback_query->data;
if($text=="/start"){
bot('sendMessage',[
'chat_id'=>$chat_id , 
'text'=>"مرحبا بك في بوت تحويل يرجى ارسال العمله هكذا
العمله التي تريد تحويلها(من) الرقم العمله التي تريد التحويل اليها (الى) 
مثال: - 
IQD 1 USD
"
]);
}

$num = is_numeric($text);
if($text != "/start"){
$explode = explode(" ", $text);
$url = "http://apilayer.net/api/live?access_key=f0227be5429514e7b025b88f3bf5cb94&currencies=$explode[0]&source=$explode[2]&format=$explode[1]";
$ch = curl_init();
$timeout = 0;
curl_setopt($ch, CURLOPT_URL, $url) ;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$rawdata = curl_exec($ch);
curl_close($ch);
$ex = explode("\n", $rawdata);
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"الناتج = $ex[7]"

]);
}