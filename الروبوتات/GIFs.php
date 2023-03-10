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
$from = $message->from->id;
$text = $message->text; 
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$wel = "ترحيبك"; //ترحيب
$start = "'inline_keyboard'=>[
[['text'=>'نشاء بوت 🔗', 'callback_data'=>'create'],['text'=>'حذف بوت 📛', 'callback_data'=>'delete']],
[['text'=>'تابعنا 💭', 'url'=>'xnxx.com']]
]";
if($text=="/start"){
$user = file_get_contents('users.txt');
$mem = explode("\n",$user);
if (!in_array($from,$mem)){
$add_user = file_get_contents('users.txt');
$add_user .= $from."\n";
file_put_contents('users.txt',$add_user);
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$wel",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([$start])
]);
}
if($data=="back"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$message_id ,
'text'=>"$wel",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([$start])
]);
}
if($data=="create" and file_exists("bots/$from/bot.php")){
bot('editmessagetext',[
'chat_id'=>$chat_id2 , 
'message_id'=>$message_id ,
'text'=>"عذرا انت لديك بوت ",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع", 'callback_data'=>"back"]]
]
])
]);
}
if($data=="delete" and !file_exists("bots/$from/bot.php")){
bot('editmessagetext',[
'chat_id'=>$chat_id2 ,
'message_id'=>$message_id ,
'text'=>"ليس لديك بوت لحذفه"
]);
}
if($data=="delete" and file_exists("bots/$from/bot.php") ){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$message_id ,
'text'=>"هل انت متأكد",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اي", 'callback_data'=>"yes"],['text'=>"لاء", 'callback_data'=>"back"]
]
]
])
]);
}
if($data=="yes"){
rmdir("bots/$from");
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$message_id, 
'text'=>"تم حذف بوتج"
]);
bot('sendmessage',[
'chat_id'=>$chat_id2, 
'text'=>"$wel",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([$start])
]);
}
if($data=="create" and !file_exists("bots/$from/bot.php")){
mkdir("bots")
}