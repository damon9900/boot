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
'text'=>"مرحبا بك 😄👋 \n فكره البوت هي استخراج بايو الاشخاص من خلال المعرف ✅ \n يمكنك البحث من خلال 🔍 :- ارسال معرف الشخص او لصق معرف البوت مع معرف الشخص في أي مكان 💻 \n اليك صوره توضيحيه 👇💡"
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"البحث 🔍", 'switch_inline_query'=>"@"]],
[['text'=>'تابعنا 💡', 'url'=>"t.me/team_am"]]
]])
]);
}

$marf = str_replace("@","$marf",$text);
if($text=="@$marf"){
	$url = "https://wathiq.us/api/getbio/$marf";
	$get = file_get_contents($url);
	$js = json_decode($get);
	$bio = $js->bio;
bot('sendMessage'[
'chat_id'=>$chat_id,
'text'=>"بايو الشخص 💡 :- $text \n\n $bio",

]);
}