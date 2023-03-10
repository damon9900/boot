<?php
define('KEY','5925264577:AAEqTzC0rl4zHJSY-02JGv9gAtssrhPrTqI'); 
function evil($method,$datas=[]){
    $url = "https://api.telegram.org/bot".KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
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
if(isset($update->callback_query)){
    $callbackMessage = '';
    var_dump(evil('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;

}

if($text=="/start"){
   evil('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"مرحبا بك \n في بوت عمل منشورات ماركدون",
                  'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"ابدأ",'callback_data'=>"start"],
                        ]
                ]
            ])
]);
         }

if($data=="start"){
   evil('sendMessage',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
   'text'=>"اختر ما تود عمله",
         'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                   ['text'=>"نص عريض"],[text=>"نص رقيق"]
                ],

[
                   ['text'=>"روابط ونصوص"],['text'=>"معلومات"]
]
                
              ],
              'resize_keyboard'=>true
           ])
]);
         }
if($text=="معلومات"){
   evil('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"كليشه المعلومات",
   'reply_markup'=>json_encode([
       'keyboard'=>[
           ['text'=>"رجوع"]
           ],
           'resize_keyboard'=>true,
       ])
]);
         }
if($text=="نص عريض"){
evil('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك في عمل نص عليك كل ما عليك هو ارسال النص هكذا :- \n النص",
'reply_markup'=>json_encode([
       'keyboard'=>[
           ['text'=>"رجوع"]
           ],
           'resize_keyboard'=>true,
       ])
       ]);
}
if($text=="نص رقيق"){
evil('sendMessage',[
'chat_id'=>$chat_id
'text'=>"مرحبا بك في عمل نص رقيق كل ماعليك هو ارسل النص  هكذا :- \n _النص_ ",
'reply_markup'=>json_encode([
       'keyboard'=>[
           ['text'=>"رجوع"]
           ],
           'resize_keyboard'=>true,
       ]) 
       ]);

}
if($text=="روابط ونصوص"){
evil('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك في عمل نص مع رابط \n للإستخدام ارسل النص هكذا :- [channel](t.me/)",
'reply_markup'=>json_encode([
       'keyboard'=>[
           ['text'=>"رجوع"]
           ],
           'resize_keyboard'=>true,
       ]) 
    ]);
}
if($text!="روابط ونصوص" && $text!="/start" && $text!="رجوع" && $text!="نص رقيق" && $text!="نص عريض" ){
evil('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>"MARKDOWN",
    ]);
}
?>