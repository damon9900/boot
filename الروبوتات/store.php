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
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id =  $update->callback_query->message->message_id;
$data = $update->callback_query->data;

if($text=="/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك 😃👋 \n في بوت البحث عن التطبيقات 🔎💡 \n كل ما عليك هو ارسال اسم التطبيقات وسأقوم بالبحث عنه 🎁",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قناتنا📱", 'url'=>"t.me/EvilApi"]]
]])
]);
}
if($text!="/start"){
	bot('sendMessage', [
	'chat_id'=>$chat_id,
	'text'=>"هل تريد البحث عن التطبيق 💭 :- $text",
	'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم ☑", 'callback_data'=>"yes"]],
]])
	]);
	}
	if($data=="yes"){
		bot('editMessageText',[
		'chat_id'=>$chat_id2,
		'message_id'=>$message_id,
		'text'=>"اليك نتائج البحث للتطبيق 🔎 :- $text",
		'reply_markup'=> json_encode([
		'inline_keyboard'=>[
		[
['text'=>"mobomarket", 'url'=>"http://www.mobomarket.net/search?keyword=$text"],
['text'=>"Mobogenie", 'url'=>"http://www.mobogenie.com/search.html?q=$text"]
],     
[
['text'=>"appsodo", 'url'=>"http://www.appsodo.com/searchpp_$text_1"],
['text'=>"apkmirror", 'url'=>"http://www.apkmirror.com/?s=$text"],
],
[['text'=>"قناتنا 💡 ", 'url'=>"t.me/EvilApi"]]
		]
		])
		]);
		}





