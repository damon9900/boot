<?php 

ob_start();

$API_KEY = '5925264577:AAEqTzC0rl4zHJSY-02JGv9gAtssrhPrTqI';
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
$chat_id = $message->chat->id;
$text = $message->text;
$from = $message->from->id;


if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شلونك 🌝😹"
]);
} 
$rep = $message->reply_to_message; 
$id = $rep->message_id;  
if($rep && $text=="اتفل"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خخخخخخختتتتتتففففو ",
'reply_to_message_id'=>$id
]);
} 
if($rep && $text=="بوسه"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"أاآامـــوؤوؤوؤاحححح 💋💋🤤❤️",
'reply_to_message_id'=>$id
]);
}