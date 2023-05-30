<?php
$channel = '-1001408233667';
//////////////////////////////////////////////////////////////////////////////////////////
if(!file_exists('madeline.php')) copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
include('madeline.php');
use \danog\MadelineProto\FastAPI as maker;
try {
$app = ['serialization' => ['cleanup_before_serialization' => true],'logger' => ['max_size' => 1*1024*1024]];
$self = new maker("TakPesar.session",$app);
if(isset($_GET['coin']) and is_numeric($_GET['coin']) and isset($_GET['id']) and is_numeric($_GET['id'])){
if($_GET['type'] == 'nitro'){
$self->messages->sendMessage(['peer' => 977348093,'message' => "💸 انتقال سکه"]);
sleep(2);
$self->messages->sendMessage(['peer' => 977348093,'message' => $_GET['coin']]);
sleep(2);
$message_id = $self->messages->sendMessage(['peer' => 977348093,'message' => $_GET['id']])['updates'][0]['id'] + 1;
sleep(3);
$self->messages->forwardMessages(['from_peer' => 977348093,'to_peer' => $channel,'id' => [$message_id]]);
}else{
die('error type');
}
}else{
$self->start();
}
}catch(\Throwable $bot){
print($bot->getMessage());
}
?>