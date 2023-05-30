<?php
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
error_reporting(E_ALL);
date_default_timezone_set('Asia/Tehran');
define('API_KEY',"5313655607:AAGB5S0HMQdBe1__HsxcwyXQ2irxVxsoe6M");
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
function SendMessage($chat_id,$text,$keyboard = null){
return bot('sendMessage',['chat_id'=>$chat_id,'text'=>$text,'parse_mode'=>"html",'disable_web_page_preview'=>true,'reply_markup'=>$keyboard]);
}
function rand_string($length){
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
function Url($file){
$url = explode('/',$_SERVER['SCRIPT_URI']);
unset($url[count($url) - 1]);
return implode('/',$url).'/'.$file;
}
$update = json_decode(file_get_contents("php://input"));
$time = date('H:i:s');
$date = date('Y/m/d');
$text = $update->message->text;
$from_id = $update->message->from->id;
$type = $update->message->chat->type;
$first_name = $update->message->from->first_name;
$username = $update->message->from->username;
$message_id = $update->message->message_id;
$data = $update->callback_query->data;
$fromid = $update->callback_query->from->id;
$messageid = $update->callback_query->message->message_id;
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if(strpos($data,"nitro-") !== false){
$coin = str_replace("nitro-",null,$data);
bot('EditMessageText',[
'chat_id'=>$fromid,
'message_id'=>$messageid,
'text'=>"
✅ درحال انتقال $coin سکه به حساب کاربری $fromid !
",
'parse_mode'=>'html'
]);
file_get_contents(Url('transfer.php')."?id=$fromid&coin=$coin&type=nitro");
exit();
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$channel = "@solton_php";//ایدی چنل یا 
$channel2 = "@solton_php";//ایدی چنل یا 
$shart = "solton_php";//ایدی چنل یا 
$addi = "1706648592"; // ای دی عددی مالک ربات
$admin = array("1139819509","1139819509","1139819509","1139819509"); // ای دی عددی ادمین ها
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$tch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=".$from_id))->result->status;
$tch2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel2&user_id=".$from_id))->result->status;
$get = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$botid = $get->result->username;
$contact = $update->message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$step = $datas['step'];
$datej = $datas['date'];
$timej = $datas['time'];
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$button = json_encode(['keyboard'=>[
[['text'=>"🎮شروع بازی"]],
[['text'=>"💸انتقال سکه"],['text'=>"👤حساب کاربری"]],
[['text'=>"🆘 پشتیبانی"],['text'=>"➕ افزایش موجودی"]],
[['text'=>"📖"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$button_admin = json_encode(['keyboard'=>[
[['text'=>"✅ آمار‌ گیری"]],
[['text'=>"ارسال همگانی ✨"],['text'=>"فوروارد همگانی ❄️"]],
[['text'=>"پیام به کاربر 📨"]],
[['text'=>"✅ آنبلاک کاربر"],['text'=>"❌ بلاک کاربر"]],
[['text'=>"کسر سکه 🥈"],['text'=>"افزایش سکه 🥇"]],
[['text'=>"🔙 بازگشت"]],
],
'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$soltanjang = json_encode(['keyboard'=>[
[['text'=>"👤 زیرمجموعه گیری"],['text'=>"💵 انتقال نیتروسین"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$mashin = json_encode(['keyboard'=>[
[['text'=>"شرط"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$tas = json_encode(['keyboard'=>[
[['text'=>"شرط روی زوج"],['text'=>"شرط روی فرد"]],
[['text'=>"1"],['text'=>"2"],['text'=>"3"],['text'=>"4"],['text'=>"5"],['text'=>"6"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$gol = json_encode(['keyboard'=>[
[['text'=>"گل نمیشود"],['text'=>"گل میشود"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$boling = json_encode(['keyboard'=>[
[['text'=>"صفر مانع"],['text'=>"یک مانع"]],
[['text'=>"سه مانع"],['text'=>"چهار مانع"]],
[['text'=>"پنج مانع"],['text'=>"شش مانع"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$dartbe = json_encode(['keyboard'=>[
[['text'=>"به هدف نمیخورد"],['text'=>"به هدف میخورد"]],
[['text'=>"قرمز"],['text'=>"سفید"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$button_b = json_encode(['keyboard'=>[
[['text'=>"🎲 تاس"],['text'=>"🎳 بولینگ"]],
[['text'=>"🏀 بسکتبال"],['text'=>"⚽️ فوتبال"]],
[['text'=>"🎯 دارت"],['text'=>"ماشین اسلات 🎰"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true]);
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($step =="ben" and !in_array($from_id,$admin)){
exit();
}
if(!file_exists("data")){
mkdir("data");
}
if(!file_exists("data/$from_id")){
mkdir("data/$from_id");
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
//// استارت ربات ! 
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if(preg_match('/^\/([Ss]tart)(.*)/',$text,$match) and $type == "private"){
$match[2] = str_replace(" ","",$match[2]);
$match[2] = str_replace("\n","",$match[2]);
if($match[2] != null and $match[2] != $from_id and $datas['id'] == false){
if($tch == 'left' and $type == "private"){
SendMessage($from_id,"کاربر $first_name عزیز

⚠️ جهت ادامه کار نیاز است در کانال نیتروسین بت عضو شوید.
@$shart

👈🏻 بعد از عضویت مجددا /start را ارسال نمایید.",json_encode(['inline_keyboard' => [[['text' => "$esmbot",'url' => "https://t.me/$channel"]],[['text' => "$esmbot",'url' => "https://t.me/$channel2"]],]]));
$datas["match"] = $match[2];
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
exit();
}else{
$dataM = json_decode(file_get_contents("data/{$match[2]}/{$match[2]}.json"),true);
$ez = $dataM['money']+300;
$ez2 = $dataM['subset']+1;
$dataM["money"] = "$ez";
$dataM["subset"] = "$ez2";
$outjson = json_encode($dataM,true);
file_put_contents("data/{$match[2]}/{$match[2]}.json",$outjson);
SendMessage($match[2],"🎈 تبریک، 300 سکه بابت زیرمجموعه جدید دریافت کردید..");
}
}
SendMessage($from_id,"سلام $first_name،به نیتروسین بت خوش آمدید 💫

👈🏻 با نیتروسین بت میتوانید سکه های نیتروسین خود را کاملا اتومات چند برابر کنید😍😍
برای ادامه یکی از دکمه های زیر را انتخاب نمایید:",$button);
exit();
}
if($tch == 'left' and $type == "private"){
SendMessage($from_id,"کاربر $first_name عزیز

⚠️ جهت ادامه کار نیاز است در کانال نیتروسین بت عضو شوید.
@$shart

👈🏻 بعد از عضویت مجددا /start را ارسال نمایید.",json_encode(['inline_keyboard' => [[['text' => "کانال نیترو سین بت",'url' => "https://t.me/$channel"]],[['text' => "$esmbot",'url' => "https://t.me/$channel2"]],]]));
exit();
}
if (!file_exists("data/$from_id/$from_id.json")) {
$myfile2 = fopen("data/datas.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$datas["money"] = "0";
$datas["step"] = "free";
$datas["subset"] = "0";
$datas["id"] = "$from_id";
$datas["date"] = $date;
$datas["time"] = $time;
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
}
if(isset($datas["match"])){
$match = $datas["match"];
unset($datas["match"]);
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$dataM = json_decode(file_get_contents("data/{$match}/{$match}.json"),true);
$ez = $dataM['money']+300;
$ez2 = $dataM['subset']+1;
$dataM["money"] = "$ez";
$dataM["subset"] = "$ez2";
$outjson = json_encode($dataM,true);
file_put_contents("data/{$match}/{$match}.json",$outjson);
SendMessage($match,"🎈 تبریک، 300 سکه بابت زیرمجموعه جدید دریافت کردید.");
}
if($text =="🔙 بازگشت" and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻 به منوی اصلی بازگشتید.",$button);
exit();
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
elseif($text == '💸انتقال سکه'){
$datas["step"] = "sjxjdkcldk";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"
❓ تعداد سکه موردنظر جهت انتقال را وارد نمایید:

💰 موجودی شما: {$datas['money']} سکه
",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
elseif($step == 'sjxjdkcldk' and $text != "🔙 بازگشت"){
$jdjcor = $datas['money'] - $text;
if (is_numeric($text)){
if($datas['money'] >= "$text"){
if($text >= 1000){
if($jdjcor >= 3000){
$datas["step"] = "xndkckdlcnd-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 $datas["step"] = "xndkckdlcnd-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 SendMessage($from_id,"💸 شما درخواست انتقال $text سکه را داده اید. 

👈🏻 اگر مورد تایید شما است شناسه کاربری فرد دریافت کننده را ارسال کنید.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}else{
SendMessage($from_id,"❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
👈🏻 همچنین حداقل مقدار انتقال 1000 سکه میباشد و بعد از انتقال باید 3000 سکه در حساب شما باقی بماند.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
}else{
SendMessage($from_id,"❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
👈🏻 همچنین حداقل مقدار انتقال 1000 سکه میباشد و بعد از انتقال باید 3000 سکه در حساب شما باقی بماند.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
}else{
SendMessage($from_id,"❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
👈🏻 همچنین حداقل مقدار انتقال 1000 سکه میباشد و بعد از انتقال باید 3000 سکه در حساب شما باقی بماند.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
}else{
SendMessage($from_id,"❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
👈🏻 همچنین حداقل مقدار انتقال 1000 سکه میباشد و بعد از انتقال باید 3000 سکه در حساب شما باقی بماند.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
}
if(strpos($step, "xndkckdlcnd-") !== false and $text != "🔙 بازگشت"){
if($from_id != $from_id){
$ssss = explode("-",$step);
$coin = $datas['money'] - $ssss[1];
$datas["money"] = "$coin";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"✅ تراکنش موفق ( ارسال )
 
‏👈🏻 تعداد $ssss[1] سکه به کاربر $text انتقال داده شد.",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
 $userdata = json_decode(file_get_contents("data/$text/$text.json"),true);
 $coin = $userdata['money'] + $ssss[1];
 SendMessage($text,"✅ تراکنش موفق ( دریافت )
 
‏👈🏻 تعداد $ssss[1] سکه از کاربر $text دریافت شد.",$button);
 $datas["money"] = "$coin";
$outjson = json_encode($datas,true);
file_put_contents("data/$text/$text.json",$outjson);
}else{
SendMessage($from_id,"❗️ انتقال سکه به خودتان امکان پذیر نیست",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="🎮شروع بازی" and $type == "private"){
SendMessage($from_id,"🎮روی کدوم بازی میخوای شرط ببندی؟👇",$button_b);
}
if($text =="➕ افزایش موجودی" and $type == "private"){
SendMessage($from_id,"یک بخش را جهت افزایش موجودی انتخاب کنید:",$soltanjang);
}
////// شروع بت ///////
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="⚽️ فوتبال" and $type == "private"){
$datas["step"] = "foot";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "foot" and is_numeric($text) and $type == "private"){ 
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button); 
}else{
$datas["step"] = "foot-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"⚽️بازی فوتبال:

1.دوتا توپ در کانال فرستاده میشه باید هر دو گل بشه..(ضریب: 2)

2.دوتا توپ در کانال فرستاده میشه نباید توپی وارد دروازه بشه.(ضریب: 2)",$gol);
}
}
}
if(strpos($step, "foot-") !== false and in_array($text,["گل میشود","گل نمیشود"]) and $type == "private"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
⚽️ نوع شرط : فوتبال
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]

╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice1 = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '⚽️']);
$value1 = $dice1->result->dice->value;
$dice2 = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '⚽️']);
$value2 = $dice2->result->dice->value;
if(($text == "گل نمیشود" and ($value1 == 1 or $value1 == 2) and ($value2 == 1 or $value2 == 2)) or ($text == "گل میشود" and ($value1 == 3 or $value1 == 4 or $value1 == 5 or $value1 == 6) and ($value2 == 3 or $value2 == 4 or $value2 == 5 or $value2 == 6))){
$g = $b[1] * 0.3;
$reply = SendMessage($from_id,"⚽️ football Bet :

 📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"
✅ he / she won
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "⚽ فوتبال",'url' => "https://telegram.me/share/url?url=⚽️%20فوتبال"]],]]));exit();
}else{
SendMessage($from_id,"⚽️ football Bet : 

 📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "⚽ فوتبال",'url' => "https://telegram.me/share/url?url=⚽️%20فوتبال"]],]]));exit();
}
}

if($text =="🏀 بسکتبال" and $type == "private"){
$datas["step"] = "bas";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "bas" and is_numeric($text) and $type == "private"){
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button);
}else{
$datas["step"] = "bask-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🏀بازی بسکتبال:

1.توپ شما وارد حلقه میشود و شرط را میبرید..(ضریب: 2)

2.دو تا توپ انداخته میشود و اگر هر دو گل نشد شما برنده هستید..(ضریب: 2)",$gol);
}
}
}
if(strpos($step, "bask-") !== false and in_array($text,["گل میشود","گل نمیشود"]) and $type == "private"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
🏀 نوع شرط : بسکتبال
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]

╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice1 = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🏀']);
$value1 = $dice1->result->dice->value;
$dice2 = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🏀']);
$value2 = $dice2->result->dice->value;
if(($text == "گل نمیشود" and ($value1 == 1 or $value1 == 2) and ($value2 == 1 or $value2 == 2)) or ($text == "گل میشود" and ($value1 == 3 or $value1 == 4 or $value1 == 5 or $value1 == 6) and ($value2 == 3 or $value2 == 4 or $value2 == 5 or $value2 == 6))){
$g = $b[1]*2;
$reply = SendMessage($from_id,"🏀 Basketball Bet :
   
📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"✅ he / she won
?? Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🏀 بسکتبال",'url' => "https://telegram.me/share/url?url=🏀%20بسکتبال"]],]]));exit();
}else{
SendMessage($from_id,"🏀 Basketball Bet :
   
📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🏀 بسکتبال",'url' => "https://telegram.me/share/url?url=🏀%20بسکتبال"]],]]));exit();
}
}
if($text =="🎳 بولینگ" and $type == "private"){
$datas["step"] = "boling";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "boling" and is_numeric($text) and $type == "private"){
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button);
}else{
$datas["step"] = "boling-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🎳بازی بولینگ:

1.تعداد مانع هایی که میوفتن؟.(ضریب: 4.5)",$boling);
}
}
}
if(strpos($step, "boling-") !== false and in_array($text,["صفر مانع","یک مانع","سه مانع","چهار مانع","پنج مانع","شش مانع"]) and $type == "private"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
🎳 نوع شرط : بولینگ
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]

╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🎳']);
$value = $dice->result->dice->value;
if($value == str_replace(["صفر مانع","یک مانع","سه مانع","چهار مانع","پنج مانع","شش مانع"],range(1,6),$text)){
$g = $b[1]*4.5;
$reply = SendMessage($from_id,"🎳 Bolling Bet :
   
📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"✅ he / she won
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎳 بولینگ",'url' => "https://telegram.me/share/url?url=🎳%20بولینگ"]],]]));exit();
}else{
SendMessage($from_id,"🎳 Bolling Bet :
   
📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎳 بولینگ",'url' => "https://telegram.me/share/url?url=🎳%20بولینگ"]],]]));exit();
}
}
if($text =="🎯 دارت" and $type == "private"){
$datas["step"] = "da";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "da" and is_numeric($text) and $type == "private"){
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button);
}else{
$datas["step"] = "dar-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🎯بازی دارت:

1.دارت به وسط هدف بخورد..(ضریب: 3.5)

2.دارت به هدف نخورد و به بیرون پرت شود..(ضریب: 3.5)

3.دارت به رنگ قرمز برخورد کند(قرمز وسط حساب نمیشه)..(ضریب: 2)

2.دارت به رنگ سفید برخورد کند..(ضریب: 2)",$dartbe);
}
}
}
if(strpos($step, "dar-") !== false and in_array($text,["قرمز","سفید","به هدف نمیخورد","به هدف میخورد"]) and $type == "private"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
🎯 نوع شرط : $text
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]

╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🎯']);
$value = $dice->result->dice->value;
if(($text == "قرمز" and ($value == 6 or $value == 4 or $value == 2)) or ($text == "سفید" and ($value == 5 or $value == 3)) or ($text == "به هدف نمیخورد" and ($value == 1)) or ($text == "به هدف میخورد" and ($value != 1))){
if($text == "به هدف میخورد" or $text == "به هدف نمیخورد"){
$zarib = 3.5;
}
if($text == "سفید" or $text == "قرمز"){
$zarib = 2;
}
$g = $b[1] * $zarib;
$reply = SendMessage($from_id,"🎯 Dart Bet :

📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"✅ he / she won
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎯 دارت",'url' => "https://telegram.me/share/url?url=🎯%20دارت"]],]]));exit();
}else{
SendMessage($from_id,"🎯 Dart Bet :

📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎯 دارت",'url' => "https://telegram.me/share/url?url=🎯%20دارت"]],]]));exit();
}
}
if($text =="🎲 تاس" and $type == "private"){
$datas["step"] = "do";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "do" and is_numeric($text) and $type == "private"){
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button);
}else{
$datas["step"] = "d-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"
🎲بازی تاس:

1.شما میتوانید روی زوج یا فرد آمادن شرط ببندید که در این صورت دوتاس انداخته میشود که باید هر دوتا با توجه به شرط یا زوج بیاید یا فرد.(ضریب: 2)

2.میتوانید روی اعداد شرط ببندید که یک تاس انداخته میشود اگر عدد شرط شما آمد شما برنده اید.(ضریب: 4)
",$tas);
}
}
}
if(strpos($step, "d-") !== false and $text != "🔙 بازگشت" and $type == "private"){
if((is_numeric($text) and $text <= 6 and $text >= 1) or $text == "شرط روی زوج" or $text == "شرط روی فرد"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
🎲 نوع شرط : $text
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]
╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🎲']);
$value = $dice->result->dice->value;
if(($text == "شرط روی زوج" and ($value == 2 or $value == 4 or $value == 6)) or ($text == "شرط روی فرد" and ($value == 1 or $value == 3 or $value == 5)) or (is_numeric($text) and $text == $value)){
if($text == "شرط روی زوج" or $text == "شرط روی فرد"){
$zarib = 2;
}
if(is_numeric($text)){
$zarib = 3;
}
$g = $b[1] * $zarib;
$reply = SendMessage($from_id,"🎲 Dice Bet :

📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"✅ he / she won
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' =>[[['text' => "🎲 تاس",'url' => "https://telegram.me/share/url?url=🎲%20تاس"]],]]));exit();
}else{
SendMessage($from_id,"🎲 Dice Bet :

📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' =>[[['text' => "🎲 تاس",'url' => "https://telegram.me/share/url?url=🎲%20تاس"]],]]));exit();
}
}else{
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❌",$button);
exit();
}
}
if($text =="ماشین اسلات 🎰" and $type == "private"){
$datas["step"] = "scat";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"👈🏻سر چقدر سکه شرط میبندی؟

• موجودی شما: {$datas['money']} سکه",json_encode(['keyboard'=>[[['text'=>"🔙 بازگشت"]],],'resize_keyboard'=>true]));
}
if($step == "scat" and is_numeric($text) and $type == "private"){
if($text < 100){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️ تعداد سکه انتخابی برای شرط باید بین 100 الی 10000 سکه باشد.",$button);exit();
}else{
if($text > $datas['money']){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"موجودی کافی نیست",$button);
}else{
$datas["step"] = "act-$text";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🎰ماشین اسلات:

1.همه شکل ها یکی باشند.(ضریب: 7)",$mashin);
}
}
}
if(strpos($step, "act-") !== false and $text == "شرط" and $type == "private"){
$b = explode("-",$step);
$msg_id = SendMessage('@'.$shart,"╔═══════════════════════════════╗
🎰 نوع شرط : اسکات
📄 نام : $first_name
🎈 آیدی عددی : <code>$from_id</code>
⏳ تاریخ و زمان : $date | $time
💣 مقدار شرط : $b[1]

╔═══════════════╣⫸
║ ID channel : @$shart
║ ID bot : $botid
╚═══════════════╣⫸")->result->message_id;
$dice = bot('sendDice',['chat_id' => '@'.$shart,'emoji'=> '🎰']);
$value = $dice->result->dice->value;
if($value == 64){
$g = $b[1]*7;
$reply = SendMessage($from_id,"🎰 Scat Bet :

📊 شما مبلغ $g سکه <a href ='https://t.me/$shart/$msg_id'>برنده شدید</a> ➛║ @$shart ║",$button)->result->message_id;
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"<b>سکه به چه صورت واریز شود ؟</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$reply,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"نیترو سین",'callback_data'=>"nitro-$g"]],
]
])]);
SendMessage('@'.$shart,"✅ he / she won
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin
🎊 Win amount : $g coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎰 ماشین اسکات",'url' => "https://telegram.me/share/url?url=🎰%20ماشین اسکات"]],]]));exit();
}else{
SendMessage($from_id,"🎰 Scat Bet :

📊 شما مبلغ $b[1] سکه <a href ='https://t.me/$shart/$msg_id'>باختید</a> ➛║ @$shart ║",$button);
$mo = $datas['money']-$b[1];
$datas["money"] = "$mo";
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage('@'.$shart,"❌ he / she lose
🎈 Bet amount :  $b[1] coin
📊 New Stock : $mo coin

🎉 channel : @$shart",json_encode(['inline_keyboard' => [[['text' => "🎰 ماشین اسکات",'url' => "https://telegram.me/share/url?url=🎰%20ماشین اسکات"]],]]));exit();
}
}
///// پایان بت //////
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="👤 زیرمجموعه گیری" and $type == "private"){
bot('SendPhoto',['chat_id'=>$from_id,'photo'=>"https://t.me/slokings/7842",
'caption'=>"⚡️ با نیتروسین بت به راحتی سکه های نیتروسین خود را چند برابر کنید!

🤯کاملا اتومات بعد از انتقال نیترو به کاربری مورد نظر حساب شما در ربات شارژ شده و بعد از بردن اتومات برای شما واریز میشود🤩

📌 همین حالا رایگان امتحان کن👇👇👇

https://t.me/$botid?start=$from_id",]);
bot('sendMessage',['chat_id'=>$from_id,'text'=>"💡 به ازای هر شخصی که برای اولین بار با لینک شما عضو ربات شود 300 سکه دریافت خواهید کرد.
برای شروع بنر بالا را به دوستان و آشنایان خود ارسال کنید.",'parse_mode'=>'html','reply_to_message_id'=>$update->message->message_id + 1]);
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="👤حساب کاربری" and $type == "private"){
SendMessage($from_id,"
👤 شناسه شما: $from_id
📅 تاریخ عضویت: $datej
⏰ ساعت عضویت: $timej
👥 زیرمجموعه: {$datas['subset']} نفر
💰 موجودی شما: {$datas['money']} سکه

NitroSeenBeti $date  $time
");
}
if($text =="📖" and $type == "private"){
SendMessage($from_id,"
👈🏻چگونه حساب خود را شارژ کنم؟
برای شارژ حساب خود کافیست سکه های نیتروسین خود را به کاربری 359840440 انتقال دهید و اتومات بعد از انتقال حساب شما شارژ میشود.

👈🏻بردم،چطور جایزه را دریافت کنم؟
ربات به صورت اتومات بین 1 تا 10 دقیقه بعد از برد شما،جایزه را به حساب کاربری شما انتقال میدهد و برای شما پیام انتقال را ارسال میکند.

👈🏻موجودی دارم چطور برداشت کنم؟
در حال حاضر فقط با بازی کردن و شرط بستن میتوانید سکه نیتروسین بگیرید.
");
}
if($text =="💵 انتقال نیتروسین" and $type == "private"){
SendMessage($from_id,"
برای شارژ حساب خود باید سکه ربات نیتروسین را برای کاربری 359840440 انتقال دهید😊

کاربری: 359840440

<b>‼️توجه: بعد از انتقال اتومات حسابی که با آن انتقال دادید شارژ میشه.</b>
");
}
if($text =="🆘 پشتیبانی" and $type == "private"){
SendMessage($from_id,"
🔰 تیم پشتیبانی نیتروسین بت با افتخار آماده پاسخگویی به شما عزیزان است:
@Zenrral
");
}
//// شروع پنل مدیریت ! 
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
elseif($text =="/panel" or $text == "🔄 بازگشت به پنل مدیریت" or $text == "سورس کده" ){
if(in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🌹 سلام مدیر عزیز به پنل مدیریت خوش آمدید ! 
✅ نویسندگان ربات :
@
@SOLTANJANG",$button_admin);
}
}
if($text =="✅ آمار‌ گیری" and in_array($from_id,$admin) and $type == "private"){
$allusers = count(explode("\n",file_get_contents("data/datas.txt")));
SendMessage($from_id,"
🌹 تعداد کاربران ربات 😉 : 
$allusers
");
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="♻️ ارسال پیام همگانی" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "rall";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"🌹 ادمین عزیز پیام خود را ارسال کنید :",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="rall" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"با موفقیت فرستادم💫👌");
$all_member = fopen( "data/datas.txt", 'r');
while(!feof($all_member)){
$user = fgets($all_member);
SendMessage($user,$text);
}
}
if($text =="♻️ فروارد همگانی" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "forall";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"دوست عزیز پیام خود را فروارد کنید : ",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="forall" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"با موفقیت فروارد شد !");
$all_member = fopen( "data/datas.txt", 'r');
while(!feof($all_member)){
$user = fgets($all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
}    
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="افزایش سکه 🥇" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "coinn";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"جهت افزایش موجودی مانند زیر عمل کنید:

مقدار مبلغ به تومان
آیدی عددی کاربر مورد نظر",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="coinn" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$text = explode("\n", $text);
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$dataM = json_decode(file_get_contents("data/{$text[1]}/{$text[1]}.json"),true);
$dataM["money"] += $text[0];
$outjson = json_encode($dataM,true);
file_put_contents("data/{$text[1]}/{$text[1]}.json",$outjson);
SendMessage($from_id," 
💥حساب کاربری $text[1] با موفقیت $text[0] سکه شارژ گردید💥 
",$button_admin);
SendMessage($text[1],"
💵 حساب کاربری شما مقدار $text[0] سکه شارژ شد.
");
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="کسر سکه 🥈" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "coinnn";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"جهت کاهش موجودی مانند زیر عمل کنید:

مقدار مبلغ به تومان
آیدی عددی کاربر مورد نظر",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="coinnn" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$text = explode("\n", $text);
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$dataM = json_decode(file_get_contents("data/{$text[1]}/{$text[1]}.json"),true);
$dataM["money"] -= $text[0];
$outjson = json_encode($dataM,true);
file_put_contents("data/{$text[1]}/{$text[1]}.json",$outjson);
SendMessage($from_id,"
⚡مقدار $text[0] سکه از کاربر $text[1] کسر گردید⚡
",$button_admin);
SendMessage($text[1],"
💵 حساب کاربری شما مقدار $text[0] سکه کسر شد.
");
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="پیام به کاربر 📨" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "tak";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"
📤 جهت ارسال پیام به کاربر مورد نظر بصورت زیر عمل کنید 
( ( پیام شما ) )
( ( آیدی عددی کاربر ) )
",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="tak" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$text = explode("\n", $text);
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"
✅ پیام شما با موفقیت به کابر tg://openmessage?user_id=$text[1] رسید
",$button_admin);
SendMessage($text[1],"
🎉 کاربر گرامی شما یک پیام از طرف مدیر دارید ❗️
📥 پیام :
_________________________
$text[0]
__________________________
");
}
if($text =="❌ بلاک کاربر" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "bl";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️آیدی عددی کاربر مورد نظر را ارسال نمایید :",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="bl" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$datas = json_decode(file_get_contents("data/$text/$text.json"),true);
$datas["step"] = "ben";
$outjson = json_encode($datas,true);
file_put_contents("data/$text/$text.json",$outjson);
SendMessage($from_id,"✅ با موفقیت بلاک شد",$button_admin);
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
if($text =="✅ آنبلاک کاربر" and in_array($from_id,$admin) and $type == "private"){
$datas["step"] = "obl";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
SendMessage($from_id,"❗️آیدی عددی کاربر مورد نظر را ارسال نمایید :",json_encode(['keyboard'=>[[['text'=>"🔄 بازگشت به پنل مدیریت"]],],'resize_keyboard'=>true]));
}
if($step =="obl" and $text !="🔄 بازگشت به پنل مدیریت" and $type == "private"){
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$datas = json_decode(file_get_contents("data/$text/$text.json"),true);
$datas["step"] = "none";
$outjson = json_encode($datas,true);
file_put_contents("data/$text/$text.json",$outjson);
SendMessage($from_id,"✅ با موفقیت انبلاک شد",$button_admin);
}
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
/// اوپن شده توسط سورس کده کص ننت اصکی بری منبع نزنی ! 
/// فروش این سورس حرام و اگر ما بفهمیم شما به گا میروید!
//// نویسندگان : @
/// @SOLTANJANG
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
?>