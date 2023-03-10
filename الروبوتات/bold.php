<?php 

ob_start();

$API_KEY = '5925264577:AAEqTzC0rl4zHJSY-02JGv9gAtssrhPrTqI'; ////////Your Token 
define('API_KEY',$API_KEY);
//////////// Methods 
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

	////////Head
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
	////////callback
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
	////////inline
$id = $update->inline_query->from->id; 
$inline_id = $update->inline_query->id; 
$inlineq = $update->inline_query->query;
	/////////anwser inline 
		//////bold
bot('answerInlineQuery',[
        'inline_query_id'=>$inline_id,
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'*bold*',
            'input_message_content'=>[
            'parse_mode'=>'markdown',
            'message_text'=>"*$inlineqt*"
            ],
            
        ]])
    ]);
bot('answerInlineQuery',[
        'inline_query_id'=>$inline_id,    
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'_italic_',
            'input_message_content'=>[
            'parse_mode'=>'markdown',
            'message_text'=>"_$inlineqt_"
            ],
            
        ]])
    ]);

bot('answerInlineQuery',[
        'inline_query_id'=>$inline_id,    
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'`strong`',
            'input_message_content'=>[
            'parse_mode'=>'markdown',
            'message_text'=>"`$inlineqt`"
            ],
            
        ]])
    ]);

if($text=="/start"){
bot('sendAction',[
'chat_id'=>$chat_id,
'action'=>"typing"
]);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"_مرحبا بك في بوت الماركدوان ☑ 
البوت شبيه بالبوت الرسمي @bold .💭
التغيير فيه انه يعمل باللغه العربيه 💡
كل ماعليك فعله هو لصق معرف البوت في المحادثه الذي تريد 🌟
وبجانبها ضع الكتابه الذي تريدها 🔠
وسيقوم البوت بأعطائك اقتراحات ✅
_",
'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->message_id,

]);
}