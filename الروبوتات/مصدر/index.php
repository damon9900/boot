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
$chat_id = $message->chat->id;
$text = $message->text;
$uid = $message->from->id; 
$xml=simplexml_load_file('t.xml');
$usr = $xml->$uid;
$num = $usr->num; 
$hed = $usr->hed; 
$get = file_get_contents("users.txt"); 
$ex  = explode("\n", $get);
if($text=="/start" and !in_array($uid,$ex)){
file_put_contents("users.txt", "\n".$uid, FILE_APPEND); 
file_put_contents("xml.xml", "\n<$uid>
<num>1</num>
<hed>.</hed>
</$uid>", FILE_APPEND); 
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسل الكتابه التي تريد ان تظهر في الاعلى "
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي", 'callback_data'=>"hed"]]
]
]) 
]); 
}
if($text=="/start" and in_array($uid,$ex)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسل الكتابه التي تريد ان تظهر في الاعلى",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي", 'callback_data'=>"hed"]]
]
]) 
]); 
}
if($data=="hed"){
$usr->hed=$text; 
file_put_contents('xml.xml',$xml->asXML());
bot('sendmessage',[
'chat_id'=>$chat_id2,
'text'=>"ارسل عدد الكيبورد الحد الاقصى 15",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي", 'callback_data'=>"num"]]
]
]) 
]); 
}
if($data=="num" && $text == "1"){
$usr->num=1;
file_put_contents("xml.xml", $xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id2,
'text'=>"الان ارسل هكذا :- \n النص - الرابط",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تم", 'callback_data'=>"done"]]
]
]) 
]); 
}
$ex1 = explode("-", $text);
if($data=="done" and $num=="1"){

bot('sendmessage',[
'chat_id'=>$chat_id2,
'text'=>". $hed",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$ex[0]", 'callback_data'=>"$ex[1]"]]
]
]) 
]); 
}
if($data=="num" and $num=="2"){
$usr->num=2;
file_put_contents("xml.xml", $xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"الان ارسل :- 
النص 1 - الرابط 1
النص 2 - الرابط 2
مثل :- 
evil - t.me/evilapi
سجاد - t.me/evilapi"
]); 
}
$e = explode("\n", $text);
$key1 = explode("-", $e[0]);
$key2 = explode("-", $e[1]);
$key3 = explode("-", $e[2]);
$key4 = explode("-", $e[3]);
$key5 = explode("-", $e[4]);
$key6 = explode("-", $e[5]);
$key7 = explode("-", $e[6]);
$key8 = explode("-", $e[7]);
$key9 = explode("-", $e[8]);

if($data=="done" and $num=="2"){
bot('sendmessage',[
'chat_id'=>$chat_id2,
'text'=>". $hed",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$ex[0]", 'callback_data'=>"$ex[1]"]],
[['text'=>"$key[]"]]
]
]) 
]); 
}