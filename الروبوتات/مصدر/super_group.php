<?php
include "index.php";
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id); 
$user = $message->from->username; 

$xml=simplexml_load_file('t.xml'); 
$photo   = $xml->$chat_id->photo; 
$sticker = $xml->$chat_id->sticker; 
$video   = $xml->$chat_id->video; 
$doc     = $xml->$chat_id->doc; 
$fwd 	 = $xml->$chat_id->fwd; 
$con	 = $xml->$chat_id->con; 
$voice 	 = $xml->$chat_id->voice; 
$audio	 = $xml->$chat_id->audio; 
$link	 = $xml->$chat_id->link; 
$warn	 = $xml->$chat_id->warn; 
$tag	 = $xml->$chat_id->user;
$bots	 = $xml->$chat_id->bots; 
$chat	 = $xml->$chat_id->chat; 
$title = $message->chat->title; 
if($text=="تفعيل" && strpos($inch , '"status":"member"') == false){
$def = "<$chat_id>
<photo>no</photo>
<sticker>no</sticker>
<video>no</video>
<doc>no</doc>
<con>no</con>
<fwd>yes</fwd>
<audio>no</audio>
<voice>no</voice>
<user>no</user>
<link>yes</link>
<warn>yes</warn>
<bots>yes</bots>
<chat>no</chat>
</$chat_id>";
file_put_contents('t.xml', "\n$def", FILE_APPEND); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🌐 ┇ الــمــجــمــوعــھ ≪$title≫ \n تــم تــفــعــيلــها فــي الــبــوت ✅"
]);
}
if($text=="قفل التحذير"&& strpos($inch , '"status":"member"') == false){
$xml->$chat_id->warn="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــتــحــذيــر بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل التحذير" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->warn="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــتــحــذيــر بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح المعرف" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->user="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــمــعــرف بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل المعرف"&& strpos($inch , '"status":"member"') == false){
$xml->$chat_id->user="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــمــعــرف بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الصور"&& strpos($inch , '"status":"member"') == false){
$xml->$chat_id->photo="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــصــور بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل التوجيه" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->fwd="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الـتــوجــيه بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الملصقات"&& strpos($inch , '"status":"member"') == false){
$xml->$chat_id->sticker="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــمــلــصــقــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الفيديو" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->video="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــفــيديــو بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الملفات" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->doc="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــمــلــفــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}

if($text=="قفل الجهات" && strpos($inch , '"status":"member"') == false({
$xml->$chat_id->con="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــجــهــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل البصمات" && strpos($inch , '"status":"member"') == false){
$xml->$chat_id->voice="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــبــصــمات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
&& strpos($inch , '"status":"member"') == false
if($text=="قفل الروابط" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->link="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــروابــط بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الصور" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->photo="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــصــور بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح التوجيه" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->fwd="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الـتــوجــيه بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الملصقات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->sticker="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــمــلــصــقــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الفيديو" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->video="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــفــيديــو بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الملفات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->doc="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــمــلــفــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}

if($text=="فتح الجهات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->con="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــجــهــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح البصمات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->voice="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــبــصــمات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الروابط" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->link="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــروابــط بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الروابط" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->link="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــروابــط بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح البوتات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->bots="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــبــوتــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الدردشه" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->chat="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم فــتــح الــدردشــه بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل الدردشه" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->chat="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــدردشــه بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="فتح الدردشه" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->chat="no";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم  فــتــح الــدردشــه بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
if($text=="قفل البوتات" && $you == "creator" or $you == "administrator"){
$xml->$chat_id->bots="yes";
file_put_contents('t.xml',$xml->asXML()); 
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" 🔗 ┇ تــم قــفــل الــبــوتــات بــنــجــاح 💯 \n 
بــواســطه 🌐 :- @$user"
]);
}
$msg = $message->message_id; 
if($message->photo && $photo=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــصــور 💭"
]);
}
}
if($message->sticker && $sticker=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الـمــلــصــقــات 💭"
]);
}
}
if($message->forward_from && $fwd=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــتــوجــيه 💭"
]);
}
}
if($message->video && $video=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــفــيديــو 💭?"
]);
}
}
if($message->document && $doc=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــمــلــفــات 💭"
]);
}
}

if($message->contact && $con=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــجــهــات 💭"
]);
}
}
if($message->voice && $voice=="yes" && $you != "creator" && $you != "administrator"){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الــبــصــمات 💭"
]);
}
}
if(preg_match('/^(.*)@|@(.*)/',$text) && $tag=="yes" && $you != "creator" && $you != "administrator"){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الـــمــعــرف 💭"
]);
}
}
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text) && $user=="yes" && $you != "creator" && $you != "administrator"){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
if($warn=="yes"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع ارســال الـــروابــط 💭"
]);
}
}
$new = $message->new_chat_member;
$nuser = $new->username;
$nid = $new->id; 
if($new && preg_match('/^(.*)([Bb][Oo][Tt])/',$nuser) and $nid != $botid and && $you != "creator" && $you != "administrator" and $bots=="yes"){
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$nid
]);
if($warn=="yes"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📛 ┇ عــزيــزي ≪@$user≫ 
يــمــنــع اضــافــه الــبــوتــات 💡"
]);
}
}
if($message && $chat=="yes" && $you != "creator" && $you != "administrator" ){
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$msg
]);
}