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
if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"مرحبا بك في بوت الطقس كل ماعليك هو ارسال اسم مدينتك بالانجليزيه او ارسال موقعك",
]);
}
$loca = $message->location; 
$lon = $loca->longitude; 
$lat = $loca->latitude; 
if($loca){
$url = "http://api.openweathermap.org/data/2.5/weather?q=$text&appid=de8f6f3e0b7f8a36a3e05f47418643bf";
$res = file_get_contents($url);
$weather = json_decode($res);
$city    = $weather->name; 
$country = $weather->sys->country; 
$desc    = $weather->weather->description; 
$min     = $weather->main->temp_min;
$max	   = $weather->main->temp_max; 
$wtemp	 = $weather->wind->deg; 
$wspeed	 = $weather->wind->speed; 
$long = $weather->coord->lon;  
$latt = $weather->coord->lat; 
bot('sendMessage',[
'chat_id'=>$chat_id ,
'text'=>"_البلد ✈ :- _$country 
_ المدينه 🏠 _:- $city
_درجة الحرارة الصغرى ⛅ _ :- $min 
_ درجه الحرارة العظمى ☀ _ :- $max
_ درجه حراره الهواء 🌌 :-_ $wtemp
_سرعه الهواء ♨ _ $wspeed
_ خط الطول 🌐 :-_ $long
_ دوائر العرض 🌀 :- _ $latt
",
'parse_mode'=>"markdown"
]);
}
if($text!="/start"){
$url = "http://api.openweathermap.org/data/2.5/weather?q=$text&appid=de8f6f3e0b7f8a36a3e05f47418643bf";
$res = file_get_contents($url);
$weather = json_decode($res);
$city    = $weather->name; 
$country = $weather->sys->country; 
$desc    = $weather->weather[1]->main;  
$min     = $weather->main->temp_min;
$max	 = $weather->main->temp_max; 
$wtemp	 = $weather->wind->deg; 
$wspeed	 = $weather->wind->speed; 
$long = $weather->coord->lon;  
$latt = $weather->coord->lat; 
bot('sendMessage',[
'chat_id'=>$chat_id ,
'text'=>"_البلد ✈ :- _$country 
_ المدينه 🏠 _:- $city
_درجة الحرارة الصغرى ⛅ _ :- $min 
_ درجه الحرارة العظمى ☀ _ :- $max
_ درجه حراره الهواء 🌌 :-_ $wtemp
_سرعه الهواء ♨ _ $wspeed
_ خط الطول 🌐 :-_ $long
_ دوائر العرض 🌀 :- _ $latt
",
'parse_mode'=>"markdown"
]);
}