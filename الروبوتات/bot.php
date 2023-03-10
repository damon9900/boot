<?php 
include "index.php";
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
$you_ = $info['result']['user']['id'];
$id   = $message->from->id; 
$user = $message->from->username; 
$name = $message->from->first_name; 
if($text=="موقعي" and $you == "creator"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"💡┇ انــت مــنــشــئ الــمــجــمــوعــﻫ 💯 
 💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name
"
]);
}
if($text=="موقعي" and  $you == "administrator"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"💡┇ انــت ادمــن الــمــجــمــوعــﻫ 💯 
💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name"
]);
}
if($text=="موقعي" and  $you != "administrator" or $you != "creator"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"💡┇ انــت عــضــو فــي الــمــجــمــوعــﻫ 💯 
💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name"
]);
}
 
$rnd = rand(1,999999999999999999);
if($text=="معلوماتي"){
$re = bot("getUserProfilePhotos",["user_id"=>$id,"limit"=>1,"offset"=>0]);
$res = $re->result->photos[0][2]->file_id;
$pa = bot("getFile",["file_id"=>$res]);
$path = $pa->result->file_path;
file_put_contents("$rnd.jpg",file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$path));
$uphoto = "http://sjadapi.000webhostapp.com/$rnd.jpg"; // رابط استضافتك
bot("sendPhoto",[
'chat_id'=>$chat_id,
"photo"=>$uphoto,
'caption'=>"💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name "
]);
unlink("$rnd.jpg");
}
