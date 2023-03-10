<?php 

ob_start();

$API_KEY = "5925264577:AAEqTzC0rl4zHJSY-02JGv9gAtssrhPrTqI";
define("API_KEY",$API_KEY);
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

$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;


if($text == "/start"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"مرحبا بك عزيزي 😍 ⇦ .\n البوت يقوم بمعرفة نسبة 😝 جمال الصوره التي ترسلها له😋\nسيرسل لك بوت نسبة جمالها 😎\n\nملاحضة : البوت للمرح فقط🤡🐵",  
",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[
["text"=>"لنكتشف 🌈","callback_data"=>"evil"]
],
[
["text"=>"تابع 💎" , "url"=>"t.me/EvilApi"]
],
]])
]);
}
if($data=="evil"){
bot("editMessageText",[
"chat_id"=>$chat_id2,
"message_id"=>$message_id,
"text"=>"الان ارسل الصوره 💎"
]);
}
$aa = array("100%"=>"f", "95%"=>"f", "80%"=>"f", "85%"=>"f", "75%"=>"f", "70%"=>"f", "60%"=>"f", "65%"=>"f", "50%"=>"f", "55%"=>"f", "40%"=>"f", "45%"=>"f", "30%"=>"f", "35%"=>"f", "25%"=>"f", "20%"=>"f", "15%"=>"f");
$jmal = array_rand($aa, 1);
echo "rand : $jmal";
if($message->photo){
    sleep(2);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"هممم اوكف خلي اخذلي نظره… 🤔🤔",
]);
bot("sendChatAction",[
"chat_id"=>$chat_id,
"action"=>"upload_photo"
]);
sleep(3);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"نسبه جمال الصوره هي 😹👇",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[
["text"=>"$jmal", "url"=>"t.me/EvilApi"]
]
]])
]);
}