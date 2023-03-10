i<?php 

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
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;


if($text == "/start"){
    mkdir($chat_id);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*Welcome to the webhook bot*  💾 \n `You can use bot set and delete webhook as you can fetch information about it.`\n\n*Available commands: -*\n\n1- /setwebhook - _for webhook action_\n\n2- /deletewebook - _to delete the webhook_\n\n3- /webhookinfo - _to fetch information about webhook_\n4- /cancel - _to cancel the operation_\n\n\n By ~ @EvilApi",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'Join 💎' , 'url'=>"t.me/EvilApi"]
],
]])
]);
}
if($text=="/cancel" && file_exists("$chat_id/set/token.txt")){
rmdir("$chat_id/set");
unlink("$chat_id/set/token.txt");
unlink("$chat_id/set/url.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*Welcome to the webhook bot*  💾 \n `You can use bot set and delete webhook as you can fetch information about it.`\n\n*Available commands: -*\n\n1- /setwebhook - _for webhook action_\n\n2- /deletewebook - _to delete the webhook_\n\n3- /webhookinfo - _to fetch information about webhook_\n4- /cancel - _to cancel the operation_\n\n\n By ~ @EvilApi",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'Join 💎' , 'url'=>"t.me/EvilApi"]
],
]])
]);
}
if($text=="/setwebhook"){
mkdir("$chat_id/set");
file_put_contents("$chat_id/set/token.txt", "$tests");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"_In order to create a need token_\n*Now send me your access code but make sure it*",
'parse_mode'=>"markdown"
]);
}
if(!preg_match('/^([Hh]ttp|[Hh]ttps)(.*)/',$text) && $text!="/start" && $text!="/cancel" && $text!="/setwebhook" && file_exists("$chat_id/set/token.txt")){
file_put_contents("$chat_id/set/token.txt", "$text");
file_put_contents("$chat_id/set/url.txt", "$tests");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"`Your Token has been verified Now Send your link`",
'parse_mode'=>"markdown",
]);
}
if(preg_match('/^([Hh]ttp|[Hh]ttps)(.*)/',$text) && file_exists("$chat_id/set/url.txt")){
file_put_contents("$chat_id/set/url.txt", "$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"token :- $stoken \n Link :- $surl",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Yes", 'callback_data'=>"stm"]]
]
])
]);
}
if($data=="stm"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Check Access Token ... 🔄",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"20%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Check Access URL... 🆗",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"40%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"60%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"80%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"100%", 'callback_data'=>"wait"]]
]
])
]);
file_get_contents("https://api.telegram.org/bot$stoken/setwebhook?url=$surl");
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*webhook was set* 🔄",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Join 💡", 'url'=>"t.me/EvilApi"]]
]
])
]);
rmdir("$chat_id/set");
}
if($text=="/deletewebhook"){
mkdir("$chat_id/del");
file_put_contents("$chat_id/del/token.txt", "$tests");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*Now send me your access code but make sure it*",
'parse_mode'=>"markdown"
]);
}
if(!preg_match('/^([Hh]ttp|[Hh]ttps)(.*)/',$text) && $text!="/start" && $text!="/cancel" && $text!="/deletewebhook" && $text!="/setwebhook" && file_exists("$chat_id/del/token.txt")){
file_put_contents("$chat_id/del/token.txt", "$text");
file_put_contents("$chat_id/del/url.txt", "$tests");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"`Your Token has been verified Now Send your link`",
'parse_mode'=>"markdown",
]);
}
if(preg_match('/^([Hh]ttp|[Hh]ttps)(.*)/',$text) && file_exists("$chat_id/del/url.txt")){
file_put_contents("$chat_id/del/url.txt", "$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"token :- $stoken \n Link :- $surl",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Yes", 'callback_data'=>"stm"]]
]
])
]);
}
if($data=="stm"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Check Access Token ... 🔄",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"20%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Check Access URL... 🆗",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"40%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"60%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"80%", 'callback_data'=>"wait"]]
]
])
]);
sleep(2);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"Connect to the server ...↔",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"100%", 'callback_data'=>"wait"]]
]
])
]);
file_get_contents("https://api.telegram.org/bot$dtoken/deletewebhook?url=$durl");
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*webhook was delete* 🔄",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Join 💡", 'url'=>"t.me/EvilApi"]]
]
])
]);
rmdir("$chat_id/del");
}
$dtoken = file_get_contents("$chat_id/del/token.txt");
$durl = file_get_contents("$chat_id/del/url.txt");