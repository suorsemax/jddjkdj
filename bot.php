<?php
date_default_timezone_set("Asia/Baghdad");
error_reporting(0);
function bot($method, $datas = []) {
$token = file_get_contents("token");
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function curl_get($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/967.46 (KHTML, like Gecko) Chrome/90.0.1931.128 Safari/967.46');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	$ch_data = curl_exec($ch);
	if(curl_error($ch)){
	var_dump(curl_error($ch));
	}
	curl_close($ch);
	return $ch_data;
	}






function getupdates($up_id) {
$get = bot('getupdates', ['offset' => $up_id]);
return end($get['result']);
}
$botuser = "@" . bot('getme', ['bot']) ["result"]["username"];
file_put_contents("_ad.txt", $botuser);
function stats($nn) {
$st = "";
$x = shell_exec("pm2 show $nn");
if (preg_match("/online/", $x)) {
$st = "run";
}
else {
$st = "stop";
}
return $st;
}
function states($g) {
$st = "";
$x = shell_exec("pm2 show $g");
if(preg_match("/online/", $x)) {
$st = "run";
}else{
$st = "stop";
}
return $st;
}
function countUsers($u = "2", $t = "2") {
if ($t == "2") {
$users = explode("\n", file_get_contents("users"));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i  ➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
if ($t == "1") {
$users = explode("\n", $u);
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i  ➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
}
$step = "";
function run($update) {
global $step;
$nn = bot('getme', ['bot']) ["result"]["username"];
$message = $update['message'];
$userID = $message['from']['id'];
$chat_id = $message['chat']['id'];
$name = $message['from']['first_name'];
$text = $message['text'];
$date = $update['callback_query']['data'];
$cq = $update['callback_query'];
$data = $cq['data'];
$message_id = $cq['message']['message_id'];
$chat_id2 = $cq['message']['chat']['id'];
$group = file_get_contents("ID");
$url = "";
$g = file_get_contents($url);
$js = json_decode($g);
$da = $js->date;
$time = $js->time;
$day = $js->day;
$month = $js->month;
$ad = array("$group");
if($text == "/start" and !in_array($chat_id,$ad) and $chat_id != $group = null){
bot('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>" 
- 𝒘𝒆𝒍𝒄𝒐𝒎 𝒕𝒐 𝒉𝒆𝒍𝒍 [$name](tg://user?id=$chat_id) !
- 𝒊𝒏 𝒕𝒉𝒆 𝒄𝒉𝒆𝒄𝒌𝒆𝒓 𝒖𝒔𝒆𝒓 𝒏𝒂𝒎𝒆 𝒕𝒆𝒍𝒆𝒈𝒓𝒂𝒎 
- 𝒅𝒆𝒗𝒆𝒍𝒐𝒑𝒆𝒅 𝒃𝒚 𝓶𝓪𝔁 🇪🇬 @Turbo_ismax .
",'parse_mode' => "MarkDown", 'disable_web_page_preview' => true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "-𝓶𝓪𝔁'", 'url' => "https://t.me/muumu"]],
[['text' => "-𝒎𝒆 𝒄𝒉𝒂𝒏𝒏𝒆𝒍'", 'url' => "https://t.me/Turbo_ismax"]],
]]) 
]);
}

if ($chat_id == $group) {
if ($text) {
if($text == '/start' or $text == '->' or $text == "Back"){
bot('sendvideo', ['video' =>'https://t.me/jdbdjdbdndndn/4', 'chat_id' => file_get_contents("ID"), 'caption' => "• ➞ 𝐇𝐈 \n• ➞ 𝐓𝐇𝐄 𝐁𝐄𝐒𝐓 𝐂𝐇𝐄𝐂𝐊𝐄𝐑 𝐈𝐍 𝐓𝐄𝐋𝐄𝐆𝐑𝐀𝐌\n• ➞ 𝐁𝐲 : 𝐌𝐚𝐱",
'parse_mode' => "MarkDown", 
'disable_web_page_preview' => true,
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"↬Login or Rm Number"],["text" =>"↬Add or Rm User"]],
[["text" =>"↬Run or Stop Turbo"],["text" =>"↬Turbo Pin"]],
[["text" =>"↬Clear Data"],["text" =>"↬ Data"]],
[["text" =>"↬Time Rest"],["text" =>"↬to UpdaTe"]],
[["text" =>"↬Clicks"],["text" =>"↬ Status PM2"]],
[["text" =>"↬ Status Type"],["text" =>"↬ Ping"]],   
[["text" =>"↬ StoP Ali"],["text" =>"↬ Run Ali"]],] ]) ]);
}
}


if ($text == "↬ Ping") {

 $ping = shell_exec("ping -c 1 52.213.140.227 | grep -oP 'time=\K[^ ]+'");
 
 bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𝐏𝐢𝐧𝐠 𝐒𝐩𝐞𝐞𝐝 ➞ : $ping",]);
 }
	$info = json_decode(file_get_contents('info.json'),true);
	$number1 = file_get_contents('phone1');
	$number2 = file_get_contents('phone2');
	$number3 = file_get_contents('phone3');
	$number4 = file_get_contents('phone4');
	$number5 = file_get_contents('phone5');
	$number6 = file_get_contents('phone6');
	$number7 = file_get_contents('phone7');
	$number8 = file_get_contents('phone8');
	$number9 = file_get_contents('phone9');
	$number10 = file_get_contents('phone10');
	$number11 = file_get_contents('phone11');
	$number12 = file_get_contents('phone12');
	$number13 = file_get_contents('phone13');
	$number14 = file_get_contents('phone14');
	$number15 = file_get_contents('phone15');
	$num1 = $info["num1"];
	$num2 = $info["num2"];
	$num3 = $info["num3"];
	$num4 = $info["num4"];
	$num5 = $info["num5"];
	$num6 = $info["num6"];
	$num7 = $info["num7"];
	$num8 = $info["num8"];
	$num9 = $info["num9"];
	$num10 = $info["num10"];
	$num11 = $info["num11"];
	$num12 = $info["num12"];
	$num13 = $info["num13"];
	$num14 = $info["num14"];
	$num15 = $info["num15"];
	
	if ($chat_id == $group) {
		if($text == "𖠜 Numbers"){
		bot('sendMessage', ['chat_id' => $chat_id,
		'text'=>"⌁ info Numbers ♦️",
		'reply_markup'=>json_encode(['inline_keyboard'=>[
		[['text' => "1 ~> $number1",'callback_data' => "#Back"]],
		[['text' => "2 ~> $number2",'callback_data' => "#Back"]],
		[['text' => "3 ~> $number3",'callback_data' => "#Back"]],
		[['text' => "4 ~> $number4",'callback_data' => "#Back"]],
		[['text' => "5 ~> $number5",'callback_data' => "#Back"]],
		[['text' => "6 ~> $number6",'callback_data' => "#Back"]],
		[['text' => "7 ~> $number7",'callback_data' => "#Back"]],
		[['text' => "8 ~> $number8",'callback_data' => "#Back"]],
		[['text' => "9 ~> $number9",'callback_data' => "#Back"]],
		[['text' => "10 ~> $number10",'callback_data' => "#Back"]],
		[['text' => "11 ~> $number11",'callback_data' => "#Back"]],
		[['text' => "12 ~> $number12",'callback_data' => "#Back"]],
		[['text' => "13 ~> $number13",'callback_data' => "#Back"]],
		[['text' => "14 ~> $number14",'callback_data' => "#Back"]],
		[['text' => "15 ~> $number15",'callback_data' => "#Back"]],

		[['text'=>"->",'callback_data'=>"#Back"]],
		]])]);
		}}	
##اضف رقم او حذف###
if ($chat_id == $group) {
if ($text == "↬Login or Rm Number") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Select Your Login",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"->"]],
[["text" =>"Login1"],["text" =>"Delete number1"]],
[["text" =>"Login2"],["text" =>"Delete number2"]],
[["text" =>"Login3"],["text" =>"Delete number3"]],
[["text" =>"Login4"],["text" =>"Delete number4"]],
[["text" =>"Login5"],["text" =>"Delete number5"]],
[["text" =>"Login6"],["text" =>"Delete number6"]],
[["text" =>"Login7"],["text" =>"Delete number7"]],
[["text" =>"Login8"],["text" =>"Delete number8"]],
[["text" =>"Login9"],["text" =>"Delete number9"]],
[["text" =>"Login10"],["text" =>"Delete number10"]],
[["text" =>"Login11"],["text" =>"Delete number11"]],
[["text" =>"Login12"],["text" =>"Delete number12"]],
[["text" =>"Login13"],["text" =>"Delete number13"]],
[["text" =>"Login14"],["text" =>"Delete number14"]],
[["text" =>"Login15"],["text" =>"Delete number15"]],],]) ]);
}}

if ($text == "↬ Status PM2") {
    $out = shell_exec("pm2 status");
    $lines = explode("\n", $out);
    $results = [];
    foreach ($lines as $line) {
        if (strpos($line, 'online') !== false) {
            $name = explode('│', $line)[2];
            $status = 'online ✅';
        } elseif (strpos($line, 'stopped') !== false) {
            $name = explode('│', $line)[2];
            $status = 'stopped ❌';
        } elseif (strpos($line, 'errored') !== false) {
            $name = explode('│', $line)[2];
            $status = 'errored 🤷';
        }
        if (isset($name) && isset($status)) {
            $results[] = "Name: $name\nStatus: $status";
            unset($name);
            unset($status);
        }
    }
    $resultText = implode("\n\n", $results);
    
    bot('sendMessage', ['chat_id' => $chat_id, 'text' => $resultText,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}

if ($text == "↬ Status Type") {
    $aorc1 = file_get_contents("type");
    $aorc2 = file_get_contents("type2");
    $aorc3 = file_get_contents("type3");
    $aorc4 = file_get_contents("type4");
    $aorc5 = file_get_contents("type5");
    $aorc6 = file_get_contents("type6");
    $aorc7 = file_get_contents("type7");
    $aorc8 = file_get_contents("type8");
    $aorc9 = file_get_contents("type9");
    $aorc10 = file_get_contents("type10");
    $aorc11 = file_get_contents("type11");
    $aorc12 = file_get_contents("type12");
    $aorc13 = file_get_contents("type13");
    $aorc14 = file_get_contents("type14");
    $aorc15 = file_get_contents("type15");

    $message = "type1 : " . $aorc1 . "\n";
    $message .= "type2 : " . $aorc2 . "\n";
    $message .= "type3 : " . $aorc3 . "\n";
    $message .= "type4 : " . $aorc4 . "\n";
    $message .= "type5 : " . $aorc5 . "\n";
    $message .= "type6 : " . $aorc6 . "\n";
    $message .= "type7 : " . $aorc7 . "\n";
    $message .= "type8 : " . $aorc8 . "\n";
	$message .= "type9 : " . $aorc9 . "\n";
    $message .= "type10 : " . $aorc10 . "\n";
    $message .= "type11 : " . $aorc11 . "\n";
    $message .= "type12 : " . $aorc12 . "\n";
    $message .= "type13 : " . $aorc13 . "\n";
    $message .= "type14 : " . $aorc14 . "\n";
    $message .= "type15 : " . $aorc15 . "\n";

    bot('sendMessage', ['chat_id' => $chat_id, 'text' => $message, 'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
    }

if ($text == "↬ StoP Ali") {
	shell_exec("pm2 stop 1.php");
	shell_exec("pm2 stop 2.php");
	shell_exec("pm2 stop 3.php");
	shell_exec("pm2 stop 4.php");
	shell_exec("pm2 stop 5.php");
	shell_exec("pm2 stop 6.php");
	shell_exec("pm2 stop 7.php");
	shell_exec("pm2 stop 8.php");
	shell_exec("pm2 stop 9.php");
	shell_exec("pm2 stop 10.php");
	shell_exec("pm2 stop 11.php");
	shell_exec("pm2 stop 12.php");
	shell_exec("pm2 stop 13.php");
	shell_exec("pm2 stop 14.php");
	shell_exec("pm2 stop 15.php");
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⌁ Done stop all checkers ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	$info = json_decode(file_get_contents('info.json'),true);
	$info["num1"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num2"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num3"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num4"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num5"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num6"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num7"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num8"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num9"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num10"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num11"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num12"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num13"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num14"] = "off";
	file_put_contents('info.json', json_encode($info));
	$info["num15"] = "off";
	file_put_contents('info.json', json_encode($info));
	}
	


if ($chat_id == $group) {
	if ($text == "↬to UpdaTe") {
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Select Your Login",
	'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
	[["text" =>"->"]],
	[["text" =>"↬ Update The Fishing"],["text" =>"↬ Update The Bot"]],
	[["text" =>"↬ Update Madeline"]]],]) ]);
	}}	
if($text == "↬ Update The Fishing"){
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
	]);
	file_put_contents("1.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/1.php");
	file_put_contents("2.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/2.php");
	file_put_contents("3.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/3.php");
	file_put_contents("4.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/4.php");
	file_put_contents("5.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/5.php");
	file_put_contents("6.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/6.php");
	file_put_contents(",7.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/7.php");
	file_put_contents("8.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/8.php");
	file_put_contents("9.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/9.php");
	file_put_contents("10.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/10.php");
	file_put_contents("11.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/11.php");
	file_put_contents("12.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/12.php");
	file_put_contents("13.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/13.php");
	file_put_contents("14.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/14.php");
	file_put_contents("15.php",$up_file);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/15.php");
	shell_exec("pm2 stop 1.php");
	shell_exec("pm2 stop 2.php");
	shell_exec("pm2 stop 3.php");
	shell_exec("pm2 stop 4.php");
	shell_exec("pm2 stop 5.php");
	shell_exec("pm2 stop 6.php");
	shell_exec("pm2 stop 7.php");
	shell_exec("pm2 stop 8.php");
	shell_exec("pm2 stop 9.php");
	shell_exec("pm2 stop 10.php");
	shell_exec("pm2 stop 11.php");
	shell_exec("pm2 stop 12.php");
	shell_exec("pm2 stop 13.php");
	shell_exec("pm2 stop 14.php");
	shell_exec("pm2 stop 15.php");
	shell_exec("pm2 stop 1.php");
	shell_exec("pm2 start 1.php");
	shell_exec("pm2 start 2.php");
	shell_exec("pm2 start 3.php");
	shell_exec("pm2 start 4.php");
	shell_exec("pm2 start 5.php");
	shell_exec("pm2 start 6.php");
	shell_exec("pm2 start 7.php");
	shell_exec("pm2 start 8.php");
	shell_exec("pm2 start 9.php");
	shell_exec("pm2 start 10.php");
	shell_exec("pm2 stop 11.php");
	shell_exec("pm2 stop 12.php");
	shell_exec("pm2 stop 13.php");
	shell_exec("pm2 stop 14.php");
	shell_exec("pm2 stop 15.php");

}
if($text == "↬ Update Madeline"){
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
	]);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/madeline.php");
	file_put_contents("madeline.php",$up_file);
	}

if($text == "↬ Update The Bot"){
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The source has been updated ",
	]);
	$up_file = curl_get("https://github.com/Kdjdkdhdkdbdkdd/Maxphpbot/blob/main/bot.php");
	file_put_contents("bot.php",$up_file);
	shell_exec("killall screen && screen -dmS bot php7.4 bot.php");
}
if (preg_match('/Login\d+/',$text)){
$ex = explode('Login',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• تشيكر رقم ".$ex[1].".\n• ارسل رقم الحساب الان .\n•مثال \n+3387287822"]);
file_put_contents("TheN",$ex[1]);
unlink($ex[1].".madeline");
unlink($ex[1].".madeline.lock");
file_put_contents("step","2");
system('php Login.php');
}
if (preg_match('/Delete number\d+/',$text)){
$ex = explode('Delete number',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• التشيكر رقم ".$ex[1]." - \n• تم حذفه بنجاح ."]);
unlink("TheN");
unlink($ex[1].".madeline"); 
unlink($ex[1].".madeline.lock");
unlink($ex[1].".madeline.lightState.php");
unlink($ex[1].".madeline.lightState.php.lock");
unlink($ex[1].".madeline.safe.php");
unlink($ex[1].".madeline.safe.php.lock");
system('rm -rf '.$ex[1].'.madeline && rm -rf '.$ex[1].'.madeline.lock && rm -rf '.$ex[1].'.madeline.lightState.php && rm -rf '.$ex[1].'.madeline.lightState.php.lock && rm -rf '.$ex[1].'.madeline.safe.php && rm -rf '.$ex[1].'.madeline.safe.php.lock');
}

if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users'));
if(preg_match("/@+/", $text)){
if($mode == 'pinall'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users", "\n" . $user, FILE_APPEND);
file_put_contents("u2", "\n" . $user, FILE_APPEND);
file_put_contents("u3", "\n" . $user, FILE_APPEND);
file_put_contents("u4", "\n" . $user, FILE_APPEND);
file_put_contents("u5", "\n" . $user, FILE_APPEND);
file_put_contents("u6", "\n" . $user, FILE_APPEND);
file_put_contents("u7", "\n" . $user, FILE_APPEND);
file_put_contents("u8", "\n" . $user, FILE_APPEND);
file_put_contents("u9", "\n" . $user, FILE_APPEND);
file_put_contents("u10", "\n" . $user, FILE_APPEND);
file_put_contents("u11", "\n" . $user, FILE_APPEND);
file_put_contents("u12", "\n" . $user, FILE_APPEND);
file_put_contents("u13", "\n" . $user, FILE_APPEND);
file_put_contents("u14", "\n" . $user, FILE_APPEND);
file_put_contents("u15", "\n" . $user, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : ⌁ Done Pin All.🚀",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
shell_exec("pm2 start 1.php");
} else {
}
unlink('mode');
} elseif($mode == 'Unpin'){
echo 'unpin';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users"));
file_put_contents("users", $data);
file_put_contents("users",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 1 :@$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
} elseif($mode == 'addL'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$users = explode("\n", file_get_contents("users"));
 $user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 1 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('u2'));
if(preg_match("/@+/", $text)){
if($mode == 'Pi0n'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("u2", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"⌁ Done Delet User List 2 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
unlink('mode');
} elseif($mode == 'Unpin2'){
echo 'Unpin2';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("u2"));
file_put_contents("u2", $data);
file_put_contents("u2",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u2"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 2 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}elseif($mode == 'ad2'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$addL = explode("\n", file_get_contents("u2"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("u2", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 2 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('u3'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("u3", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
unlink('mode');
}elseif($mode == 'Unpin3'){
echo 'Unpin3';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("u3"));
file_put_contents("u3", $data);
file_put_contents("u3",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u3"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 3 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}elseif($mode == 'ad3'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$addL = explode("\n", file_get_contents("u3"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("u3", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 3 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
	$mode = file_get_contents('mode');
	$users = explode("\n", file_get_contents('u5'));
	if(preg_match("/@+/", $text)){
	if($mode == 'P0in'){
	$user = explode("@", $text) [1];
	if (!in_array($user, $users)) {
	file_put_contents("u5", "\n" . $user, FILE_APPEND);
	$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	} else {
	bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
	unlink('mode');
	}elseif($mode == 'Unpin5'){
	echo 'Unpin5';
	$user = explode("@", $text) [1];
	$data = str_replace("\n" . $user, "", file_get_contents("u5"));
	file_put_contents("u5", $data);
	file_put_contents("u5",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u5"))));
	bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 5 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	unlink('mode');
	}elseif($mode == 'ad5'){
	echo $mode;
	$ex = explode("\n", $text);
	$userT = "";
	$userN = "";
	foreach ($ex as $u) {
	$addL = explode("\n", file_get_contents("u5"));
	$user = explode("@", $u) [1];
	if (!in_array($user, $users)) {
	$userT = $userT . "\n" . $user;
	}
	else {
	$userN = $userN . "\n" . $user;
	}
	}
	file_put_contents("u5", $userT, FILE_APPEND);
	bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 5 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	unlink('mode');
	}
	}}
	if(file_exists('mode')){
		$mode = file_get_contents('mode');
		$users = explode("\n", file_get_contents('u6'));
		if(preg_match("/@+/", $text)){
		if($mode == 'P0in'){
		$user = explode("@", $text) [1];
		if (!in_array($user, $users)) {
		file_put_contents("u6", "\n" . $user, FILE_APPEND);
		$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		} else {
		bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
		unlink('mode');
		}elseif($mode == 'Unpin6'){
		echo 'Unpin6';
		$user = explode("@", $text) [1];
		$data = str_replace("\n" . $user, "", file_get_contents("u6"));
		file_put_contents("u6", $data);
		file_put_contents("u6",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u6"))));
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 6 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}elseif($mode == 'ad6'){
		echo $mode;
		$ex = explode("\n", $text);
		$userT = "";
		$userN = "";
		foreach ($ex as $u) {
		$addL = explode("\n", file_get_contents("u6"));
		$user = explode("@", $u) [1];
		if (!in_array($user, $users)) {
		$userT = $userT . "\n" . $user;
		}
		else {
		$userN = $userN . "\n" . $user;
		}
		}
		file_put_contents("u6", $userT, FILE_APPEND);
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 6 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}
		}}
	if(file_exists('mode')){
		$mode = file_get_contents('mode');
		$users = explode("\n", file_get_contents('u7'));
		if(preg_match("/@+/", $text)){
		if($mode == 'P0in'){
		$user = explode("@", $text) [1];
		if (!in_array($user, $users)) {
		file_put_contents("u7", "\n" . $user, FILE_APPEND);
		$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		} else {
		bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
		unlink('mode');
		}elseif($mode == 'Unpin7'){
		echo 'Unpin7';
		$user = explode("@", $text) [1];
		$data = str_replace("\n" . $user, "", file_get_contents("u7"));
		file_put_contents("u7", $data);
		file_put_contents("u7",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u7"))));
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 7 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}elseif($mode == 'ad7'){
		echo $mode;
		$ex = explode("\n", $text);
		$userT = "";
		$userN = "";
		foreach ($ex as $u) {
		$addL = explode("\n", file_get_contents("u7"));
		$user = explode("@", $u) [1];
		if (!in_array($user, $users)) {
		$userT = $userT . "\n" . $user;
		}
		else {
		$userN = $userN . "\n" . $user;
		}
		}
		file_put_contents("u7", $userT, FILE_APPEND);
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 7 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}
		}}

			if(file_exists('mode')){
		$mode = file_get_contents('mode');
		$users = explode("\n", file_get_contents('u9'));
		if(preg_match("/@+/", $text)){
		if($mode == 'P0in'){
		$user = explode("@", $text) [1];
		if (!in_array($user, $users)) {
		file_put_contents("u9", "\n" . $user, FILE_APPEND);
		$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		} else {
		bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
		unlink('mode');
		}elseif($mode == 'Unpin9'){
		echo 'Unpin9';
		$user = explode("@", $text) [1];
		$data = str_replace("\n" . $user, "", file_get_contents("u9"));
		file_put_contents("u9", $data);
		file_put_contents("u9",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u9"))));
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 9 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}elseif($mode == 'ad9'){
		echo $mode;
		$ex = explode("\n", $text);
		$userT = "";
		$userN = "";
		foreach ($ex as $u) {
		$addL = explode("\n", file_get_contents("u9"));
		$user = explode("@", $u) [1];
		if (!in_array($user, $users)) {
		$userT = $userT . "\n" . $user;
		}
		else {
		$userN = $userN . "\n" . $user;
		}
		}
		file_put_contents("u9", $userT, FILE_APPEND);
		bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 9 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		unlink('mode');
		}
		}}


		if(file_exists('mode')){
			$mode = file_get_contents('mode');
			$users = explode("\n", file_get_contents('u10'));
			if(preg_match("/@+/", $text)){
			if($mode == 'P0in'){
			$user = explode("@", $text) [1];
			if (!in_array($user, $users)) {
			file_put_contents("u10", "\n" . $user, FILE_APPEND);
			$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			} else {
			bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
			unlink('mode');
			}elseif($mode == 'Unpin10'){
			echo 'Unpin7';
			$user = explode("@", $text) [1];
			$data = str_replace("\n" . $user, "", file_get_contents("u10"));
			file_put_contents("u10", $data);
			file_put_contents("u10",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u10"))));
			bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 10 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			unlink('mode');
			}elseif($mode == 'ad10'){
			echo $mode;
			$ex = explode("\n", $text);
			$userT = "";
			$userN = "";
			foreach ($ex as $u) {
			$addL = explode("\n", file_get_contents("u10"));
			$user = explode("@", $u) [1];
			if (!in_array($user, $users)) {
			$userT = $userT . "\n" . $user;
			}
			else {
			$userN = $userN . "\n" . $user;
			}
			}
			file_put_contents("u10", $userT, FILE_APPEND);
			bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 10 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			unlink('mode');
			}
			}}
	

	if(file_exists('mode')){
	$mode = file_get_contents('mode');
	$users = explode("\n", file_get_contents('u8'));
	if(preg_match("/@+/", $text)){
	if($mode == 'P0in'){
	$user = explode("@", $text) [1];
	if (!in_array($user, $users)) {
	file_put_contents("u8", "\n" . $user, FILE_APPEND);
	$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	} else {
	bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);}
	unlink('mode');
	}elseif($mode == 'Unpin8'){
	echo 'Unpin8';
	$user = explode("@", $text) [1];
	$data = str_replace("\n" . $user, "", file_get_contents("u8"));
	file_put_contents("u8", $data);
	file_put_contents("u8",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u8"))));
	bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 8 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	unlink('mode');
	}elseif($mode == 'ad8'){
	echo $mode;
	$ex = explode("\n", $text);
	$userT = "";
	$userN = "";
	foreach ($ex as $u) {
	$addL = explode("\n", file_get_contents("u8"));
	$user = explode("@", $u) [1];
	if (!in_array($user, $users)) {
	$userT = $userT . "\n" . $user;
	}
	else {
	$userN = $userN . "\n" . $user;
	}
	}
	file_put_contents("u8", $userT, FILE_APPEND);
	bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 8 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	unlink('mode');
	}
	}}
	
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('u4'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("u4", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
unlink('mode');
} elseif($mode == 'Unpin4'){
echo 'Unpin4';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("u4"));
file_put_contents("u4", $data);
file_put_contents("u4",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("u4"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 4 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}elseif($mode == 'ad4'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$addL = explode("\n", file_get_contents("u4"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("u4", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 4 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
unlink('mode');
}
}}}
if ($text == "↬Turbo Pin") {
bot('sendMessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"➧ Send Username ➧ pin user ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'pinall');
shell_exec("pm2 stop 1.php");
shell_exec("pm2 stop 2.php");
shell_exec("pm2 stop 3.php");
shell_exec("pm2 stop 4.php");
shell_exec("pm2 stop 5.php");
shell_exec("pm2 stop 6.php");
shell_exec("pm2 stop 7.php");
shell_exec("pm2 stop 8.php");
shell_exec("pm2 stop 9.php");
shell_exec("pm2 stop 10.php");
shell_exec("pm2 stop 11.php");
shell_exec("pm2 stop 12.php");
shell_exec("pm2 stop 13.php");
shell_exec("pm2 stop 14.php");
shell_exec("pm2 stop 15.php");

unlink('users');
unlink('u2');
unlink('u3');
unlink('u4');
unlink('u5');
unlink('u6');
unlink('u7');
unlink('u8');
unlink('u9');
unlink('u10');
unlink('u11');
unlink('u12');
unlink('u13');
unlink('u14');
unlink('u15');
}
if ($chat_id == $group) {
if($text == "↬Clear Data"){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"⌁ Choose button ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏",'callback_data' => "CLEAR1"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟐",'callback_data' => "CLEAR2"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟑",'callback_data' => "CLEAR3"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟒",'callback_data' => "CLEAR4"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟓",'callback_data' => "CLEAR5"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟔",'callback_data' => "CLEAR6"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟕",'callback_data' => "CLEAR7"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟖",'callback_data' => "CLEAR8"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟗",'callback_data' => "CLEAR9"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟎",'callback_data' => "CLEAR10"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟏",'callback_data' => "CLEAR11"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟐",'callback_data' => "CLEAR12"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟑",'callback_data' => "CLEAR13"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟒",'callback_data' => "CLEAR14"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟓",'callback_data' => "CLEAR15"]],
]])]);
}}
if($data == "CLEAR1"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 1 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents("users", "");
}
if($data == "CLEAR2"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 2 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents("u2", "");
}
if($data == "CLEAR3"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 3 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents("u3", "");
}
if($data == "CLEAR4"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 4 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents("u4", "");
}
if($data == "CLEAR5"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 5 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u5", "");
   }
if($data == "CLEAR6"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 6 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents("u6", "");
}
if($data == "CLEAR7"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 7 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u7", "");
   }
if($data == "CLEAR8"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 8 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u8", "");
   }
   if($data == "CLEAR9"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 9 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u9", "");
   }
   if($data == "CLEAR10"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 10 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u10", "");
   }
   if($data == "CLEAR11"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 11 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u11", "");
   }
   if($data == "CLEAR12"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 12 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u12", "");
   }
   if($data == "CLEAR13"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 13 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u13", "");
   }
   if($data == "CLEAR14"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 14 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u14", "");
   }
   if($data == "CLEAR15"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"- Done Delete all Usernames List 15 🗑️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents("u15", "");
   }
if ($chat_id == $group) {
if($text == "↬ Data"){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"⌁ Select button ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏",'callback_data' => "1Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟐",'callback_data' => "2Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟑",'callback_data' => "3Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟒",'callback_data' => "4Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟓",'callback_data' => "5Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟔",'callback_data' => "6Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟕",'callback_data' => "7Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟖",'callback_data' => "8Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟗",'callback_data' => "9Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟎",'callback_data' => "10Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟏",'callback_data' => "11Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟐",'callback_data' => "12Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟑",'callback_data' => "13Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟒",'callback_data' => "14Show"]],
[['text' => "𝐒𝐡𝐨𝐰 𝐀𝐥𝐥 ~ 𝟏𝟓",'callback_data' => "15Show"]],

[['text'=>"->",'callback_data'=>"#Back"]],

]])]);
 
}}

if ($text == "↬Time Rest") {
	$type = file_get_contents("type");
	if($type == "c"){
	shell_exec("pm2 stop 1.php");
	shell_exec("pm2 start 1.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 1.php");
	shell_exec("pm2 start 1.php");
	}
	$type = file_get_contents("type2");
	if($type == "c"){
	shell_exec("pm2 stop 2.php");
	shell_exec("pm2 start 2.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 2.php");
	shell_exec("pm2 start 2.php");
	}
	$type = file_get_contents("type3");
	if($type == "c"){
	shell_exec("pm2 stop 3.php");
	shell_exec("pm2 start 3.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 3.php");
	shell_exec("pm2 start 3.php");
	}
	$type = file_get_contents("type4");
	if($type == "c"){
	shell_exec("pm2 stop 4.php");
	shell_exec("pm2 start 4.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 4.php");
	shell_exec("pm2 start 4.php");
	}
	$type = file_get_contents("type5");
	if($type == "c"){
	shell_exec("pm2 stop 5.php");
	shell_exec("pm2 start 5.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 5.php");
	shell_exec("pm2 start 5.php");
	}
	$type = file_get_contents("type6");
	if($type == "c"){
	shell_exec("pm2 stop 6.php");
	shell_exec("pm2 start 6.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 6.php");
	shell_exec("pm2 start 6.php");
	}
	$type = file_get_contents("type7");
	if($type == "c"){
	shell_exec("pm2 stop 7.php");
	shell_exec("pm2 start 7.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 7.php");
	shell_exec("pm2 start 7.php");
	}
	$type = file_get_contents("type8");
	if($type == "c"){
	shell_exec("pm2 stop 8.php");
	shell_exec("pm2 start 8.php");
	}
	if($type == "a"){
	shell_exec("pm2 stop 8.php");
	shell_exec("pm2 start 8.php");
	}
	$type = file_get_contents("type9");
	if($type == "a"){
		shell_exec("pm2 stop 9.php");
		shell_exec("pm2 start 9.php");
		}
		if($type == "a"){
			shell_exec("pm2 stop 9.php");
			shell_exec("pm2 start 9.php");
			}
			$type = file_get_contents("type10");
			if($type == "a"){
			shell_exec("pm2 stop 10.php");
			shell_exec("pm2 start 10.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 10.php");
			shell_exec("pm2 start 10.php");
			}
			$type = file_get_contents("type11");
			if($type == "a"){
			shell_exec("pm2 stop 11.php");
			shell_exec("pm2 start 11.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 11.php");
			shell_exec("pm2 start 11.php");
			}
			$type = file_get_contents("type12");
			if($type == "a"){
			shell_exec("pm2 stop 12.php");
			shell_exec("pm2 start 12.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 12.php");
			shell_exec("pm2 start 12.php");
			}
			$type = file_get_contents("type13");
			if($type == "a"){
			shell_exec("pm2 stop 13.php");
			shell_exec("pm2 start 13.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 13.php");
			shell_exec("pm2 start 13.php");
			}
			$type = file_get_contents("type14");
			if($type == "a"){
			shell_exec("pm2 stop 14.php");
			shell_exec("pm2 start 14.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 14.php");
			shell_exec("pm2 start 14.php");
			}
			$type = file_get_contents("type15");
			if($type == "a"){
			shell_exec("pm2 stop 15.php");
			shell_exec("pm2 start 15.php");
			}
			if($type == "a"){
			shell_exec("pm2 stop 15.php");
			shell_exec("pm2 start 15.php");
			}
	bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⌁ Done Rest all checkers 🐊",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	}




	if ($text == "↬ Run Ali") {
		$type = file_get_contents("type");
		if($type == "c"){
		shell_exec("pm2 start 1.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 1.php");
		}
		$type = file_get_contents("type2");
		if($type == "c"){
		shell_exec("pm2 start 2.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 2.php");
		}
		$type = file_get_contents("type3");
		if($type == "c"){
		shell_exec("pm2 start 3.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 3.php");
		}
		$type = file_get_contents("type4");
		if($type == "c"){
		shell_exec("pm2 start 4.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 4.php");
		}
		$type = file_get_contents("type5");
		if($type == "c"){
		shell_exec("pm2 start 5.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 5.php");
		}
		$type = file_get_contents("type6");
		if($type == "c"){
		shell_exec("pm2 start 6.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 6.php");
		}
		$type = file_get_contents("type7");
		if($type == "c"){
		shell_exec("pm2 start 7.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 7.php");
		}
		$type = file_get_contents("type8");
		if($type == "c"){
		shell_exec("pm2 start 8.php");
		}
		if($type == "a"){
		shell_exec("pm2 start 8.php");
		}
		$type = file_get_contents("type9");
		if($type == "a"){
			shell_exec("pm2 start 9.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 9.php");
				}
				$type = file_get_contents("type10");
		if($type == "a"){
			shell_exec("pm2 start 10.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 10.php");
				}
				$type = file_get_contents("type11");
		if($type == "a"){
			shell_exec("pm2 start 11.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 11.php");
				}
				$type = file_get_contents("type12");
		if($type == "a"){
			shell_exec("pm2 start 12.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 12.php");
				}
				$type = file_get_contents("type13");
		if($type == "a"){
			shell_exec("pm2 start 13.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 13.php");
				}
				$type = file_get_contents("type14");
		if($type == "a"){
			shell_exec("pm2 start 14.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 14.php");
				}
				$type = file_get_contents("type15");
		if($type == "a"){
			shell_exec("pm2 start 15.php");
			}
			if($type == "a"){
				shell_exec("pm2 start 15.php");
				}
				
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "⌁ Done Start all checkers 🐊",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		}

		
if($data == "1Show"){
if(file_exists("users")){
$users = explode("\n", file_get_contents("users"));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i  ➧ @$user";
$i++;}}
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 1 !  \n".$list,'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"Back",'callback_data'=>"#Back"]],
]])]);
$list = "";
}else{
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 1",'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"Back",'callback_data'=>"#Back"]],
]])]);
}}
if($data == "2Show"){
if(file_exists("u2")){
$users = explode("\n", file_get_contents("u2"));
$list2 = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list2 = $list2 . "\n$i  ➧ @$user";
$i++;}}
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 2  \n".$list2,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
$list2 = "";
}else{
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 2",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}}
if($data == "3Show"){
if(file_exists("u3")){
$users = explode("\n", file_get_contents("u3"));
$list3 = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list3 = $list3 . "\n$i  ➧ @$user";
$i++;}}
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 3   \n".$list3,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
$list3 = "";
}else{
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 3",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}}
if($data == "4Show"){
if(file_exists("u4")){
$users = explode("\n", file_get_contents("u4"));
$list4 = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list4 = $list4 . "\n$i  ➧ @$user";
$i++;}}
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 4 \n".$list4,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
$list4 = "";
}else{
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 4",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}}
if($data == "8Show"){
	if(file_exists("u8")){
	$users = explode("\n", file_get_contents("u8"));
	$list8 = "";
	$i = 1;
	foreach ($users as $user) {
	if ($user != "") {
	$list8 = $list8 . "\n$i  ➧ @$user";
	$i++;}}
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 8 \n".$list8,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	$list8 = "";
	}else{
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 8",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	}}

	if($data == "7Show"){
		if(file_exists("u7")){
		$users = explode("\n", file_get_contents("u7"));
		$list7 = "";
		$i = 1;
		foreach ($users as $user) {
		if ($user != "") {
		$list7 = $list7 . "\n$i  ➧ @$user";
		$i++;}}
		bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 7 \n".$list7,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		$list7 = "";
		}else{
		bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 7",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		}}
		if($data == "9Show"){
			if(file_exists("u9")){
			$users = explode("\n", file_get_contents("u9"));
			$list9 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list9 = $list9 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 9 \n".$list9,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list9 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 9",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			}}

			if($data == "10Show"){
				if(file_exists("u10")){
				$users = explode("\n", file_get_contents("u10"));
				$list10 = "";
				$i = 1;
				foreach ($users as $user) {
				if ($user != "") {
				$list10 = $list10 . "\n$i  ➧ @$user";
				$i++;}}
				bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 10 \n".$list7,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				$list10 = "";
				}else{
				bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 10",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				}}
		if($data == "6Show"){
			if(file_exists("u6")){
			$users = explode("\n", file_get_contents("u6"));
			$list6 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list6 = $list6 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 6 \n".$list6,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list6 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 6",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			}}

			if($data == "5Show"){
				if(file_exists("u5")){
				$users = explode("\n", file_get_contents("u5"));
				$list5 = "";
				$i = 1;
				foreach ($users as $user) {
				if ($user != "") {
				$list5 = $list5 . "\n$i  ➧ @$user";
				$i++;}}
				bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 5 \n".$list5,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				$list5 = "";
				}else{
				bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 5",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				if($data == "11Show"){
			if(file_exists("u11")){
			$users = explode("\n", file_get_contents("u11"));
			$list11 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list11 = $list9 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 11 \n".$list9,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list11 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 11",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			if($data == "12Show"){
			if(file_exists("u12")){
			$users = explode("\n", file_get_contents("u12"));
			$list12 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list12 = $list12 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 12 \n".$list12,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list12 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 12",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			if($data == "13Show"){
			if(file_exists("u13")){
			$users = explode("\n", file_get_contents("u13"));
			$list13 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list13 = $list13 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 13 \n".$list9,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list13 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 13",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			if($data == "14Show"){
			if(file_exists("u14")){
			$users = explode("\n", file_get_contents("u14"));
			$list14 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list14 = $list14 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 14 \n".$list14,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list14 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 14",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			if($data == "15Show"){
			if(file_exists("u15")){
			$users = explode("\n", file_get_contents("u15"));
			$list15 = "";
			$i = 1;
			foreach ($users as $user) {
			if ($user != "") {
			$list15 = $list15 . "\n$i  ➧ @$user";
			$i++;}}
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ The All Users List 15 \n".$list9,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			$list15 = "";
			}else{
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>" ⌁ No users in list 15",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				}}
if($data == "STOP1"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List 1 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
shell_exec("pm2 stop 1.php");
}
if($data == "STOP2"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker  \n⌁ Checker Stoped List  2 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
shell_exec("pm2 stop 2.php");
}
if($data == "STOP3"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker  \n⌁ Checker Stoped List  3 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
shell_exec("pm2 stop 3.php");
}
if($data == "STOP4"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  4 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
shell_exec("pm2 stop 4.php");
}
if($data == "STOP5"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  5 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
	shell_exec("pm2 stop 5.php");
	}
	if($data == "STOP6"){
		bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  6 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
		shell_exec("pm2 stop 6.php");
		}
		if($data == "STOP7"){
			bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  7 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
			shell_exec("pm2 stop 7.php");
			}
			if($data == "STOP8"){
				bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  8 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
				shell_exec("pm2 stop 8.php");
				}			if($data == "STOP9"){
					bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  9 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
					shell_exec("pm2 stop 9.php");
					}
					if($data == "STOP10"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  10 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 10.php");
						}
						if($data == "STOP11"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  11 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 11.php");
						}
						if($data == "STOP12"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  12 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 12.php");
						}
						if($data == "STOP13"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  13 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 13.php");
						}
						if($data == "STOP14"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  14 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 14.php");
						}
						if($data == "STOP15"){
						bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List  15 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
						shell_exec("pm2 stop 15.php");
						}
if ($chat_id == $group) {
if($text == "↬Run or Stop Turbo"){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"⌁ Select button",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "⌁ 𝐑𝐮𝐧 𝟏",'callback_data' => "1Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏",'callback_data' => "STOP1"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟐",'callback_data' => "2Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟐",'callback_data' => "STOP2"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟑",'callback_data' => "3Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟑",'callback_data' => "STOP3"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟒",'callback_data' => "4Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟒",'callback_data' => "STOP4"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟓",'callback_data' => "5Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟓",'callback_data' => "STOP5"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟔",'callback_data' => "6Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟔",'callback_data' => "STOP6"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟕",'callback_data' => "7Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟕",'callback_data' => "STOP7"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟖",'callback_data' => "8Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟖",'callback_data' => "STOP8"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟗",'callback_data' => "9Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟗",'callback_data' => "STOP9"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟎",'callback_data' => "10Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟎",'callback_data' => "STOP10"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟏",'callback_data' => "11Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟏",'callback_data' => "STOP11"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟐",'callback_data' => "12Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟐",'callback_data' => "STOP12"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟑",'callback_data' => "13Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟑",'callback_data' => "STOP13"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟒",'callback_data' => "14Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟒",'callback_data' => "STOP14"]],
[['text' => "⌁ 𝐑𝐮𝐧 𝟏𝟓",'callback_data' => "15Run"],['text' => "⌁ 𝐒𝐭𝐨𝐩 𝟏𝟓",'callback_data' => "STOP15"]],
]])]);
}}
if($data == "1Run"){
	unlink('xa');
	shell_exec("pm2 stop 1.php");
shell_exec("pm2 start 1.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 1 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "2Run"){
	unlink('xb');
shell_exec("pm2 stop 2.php");
shell_exec("pm2 start 2.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 2 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "3Run"){
	unlink('xc');
shell_exec("pm2 stop 3.php");
shell_exec("pm2 start 3.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 3 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "4Run"){
	unlink('xd');
shell_exec("pm2 stop 4.php");
shell_exec("pm2 start 4.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 4 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "5Run"){
	unlink('xe');
shell_exec("pm2 stop 5.php");
shell_exec("pm2 start 5.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 5 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "6Run"){
	unlink('xf');
shell_exec("pm2 stop 6.php");
shell_exec("pm2 start 6.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 6 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "7Run"){
	unlink('xg');
shell_exec("pm2 stop 7.php");
shell_exec("pm2 start 7.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 7 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "8Run"){
	unlink('xh');
shell_exec("pm2 stop 8.php");
shell_exec("pm2 start 8.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 8 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "9Run"){
	unlink('xm');
shell_exec("pm2 stop 9.php");
shell_exec("pm2 start 9.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 9 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if($data == "10Run"){
	unlink('xn');
shell_exec("pm2 stop 10.php");
shell_exec("pm2 start 10.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 10 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
 if($data == "11Run"){
	unlink('xn');
shell_exec("pm2 stop 11.php");
shell_exec("pm2 start 11.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 11 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
 if($data == "12Run"){
	unlink('xn');
shell_exec("pm2 stop 12.php");
shell_exec("pm2 start 12.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 12 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
 if($data == "13Run"){
	unlink('xn');
shell_exec("pm2 stop 13.php");
shell_exec("pm2 start 13.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 13 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
 if($data == "14Run"){
	unlink('xn');
shell_exec("pm2 stop 14.php");
shell_exec("pm2 start 14.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 14 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
 if($data == "15Run"){
	unlink('xn');
shell_exec("pm2 stop 15.php");
shell_exec("pm2 start 15.php");
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Run Turbo.... 15 . ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
}
if ($chat_id == $group) {
if($text == "↬Add or Rm User"){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"Select button",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏",'callback_data' => "#1"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏",'callback_data' => "1#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟐",'callback_data' => "#2"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟐",'callback_data' => "2#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟑",'callback_data' => "#3"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟑",'callback_data' => "3#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟒",'callback_data' => "#4"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟒",'callback_data' => "4#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟓",'callback_data' => "#5"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟓",'callback_data' => "5#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟔",'callback_data' => "#6"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟔",'callback_data' => "6#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟕",'callback_data' => "#7"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟕",'callback_data' => "7#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟖",'callback_data' => "#8"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟖",'callback_data' => "8#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟗",'callback_data' => "#9"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟗",'callback_data' => "9#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟎",'callback_data' => "#10"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟎",'callback_data' => "11#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟏",'callback_data' => "#11"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟏",'callback_data' => "11#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟐",'callback_data' => "#12"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟐",'callback_data' => "12#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟑",'callback_data' => "#13"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟑",'callback_data' => "13#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟒",'callback_data' => "#14"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟒",'callback_data' => "14#"]],
[['text' => "⌁ 𝐋𝐢𝐬𝐭 📜 𝟏𝟓",'callback_data' => "#15"],['text' => "⌁𝐃𝐞𝐥𝐞𝐭𝐞 𝐋𝐢𝐬𝐭 🗑 𝟏𝟓",'callback_data' => "15#"]],
]])]);
}}if ($chat_id == $group) {
if($text == "/Delet"){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"⌁ Done Delet all Lists",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"->",'callback_data'=>"#Back"]],
]])]);
unlink('type');
unlink('type2');
unlink('type3');
unlink('type4');
unlink('type5');
unlink('type6');
unlink('type7');
unlink('type8');
unlink('type9');
unlink('type10');
unlink('type11');
unlink('type12');
unlink('type13');
unlink('type14');
unlink('type15');
unlink('users');
unlink('u2');
unlink('u3');
unlink('u4');
unlink('u5');
unlink('u6');
unlink('u7');
unlink('u8');
unlink('u9');
unlink('u10');
unlink('u11');
unlink('u12');
unlink('u13');
unlink('u14');
unlink('u15');
}}
if($data == "#1"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 1 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'addL');
}
if($data == "#2"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 2 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad2');
}
if($data == "#3"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 3 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad3');
}
if($data == "#4"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 4 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad4');
}
if($data == "#5"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 5 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad5');
}
if($data == "#6"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 6 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad6');
}
if($data == "#7"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 7 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad7');
}
if($data == "#8"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 8 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
file_put_contents('mode', 'ad8');
}
if($data == "#9"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 9 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad9');
   }
   if($data == "#10"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 10 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad10');
   }
   if($data == "#11"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 11 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad11');
   }
   if($data == "#12"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 12 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad12');
   }
   if($data == "#13"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 13 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad13');
   }
   if($data == "#14"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 14 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad14');
   }
   if($data == "#15"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 15 ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#Back"]],]])]);
   file_put_contents('mode', 'ad15');
   }
$info = json_decode(file_get_contents('info.json'),true);
$S1 = explode("\n",file_get_contents("users"));
$S2 = explode("\n",file_get_contents("u2"));
$S3 = explode("\n",file_get_contents("u3"));
$S4 = explode("\n",file_get_contents("u4"));
$S5 = explode("\n",file_get_contents("u5"));
$S6 = explode("\n",file_get_contents("u6"));
$S7 = explode("\n",file_get_contents("u7"));
$S8 = explode("\n",file_get_contents("u8"));
$S9 = explode("\n",file_get_contents("u9"));
$S10 = explode("\n",file_get_contents("u10"));
$S11 = explode("\n",file_get_contents("u11"));
$S12 = explode("\n",file_get_contents("u12"));
$S13 = explode("\n",file_get_contents("u13"));
$S14 = explode("\n",file_get_contents("u14"));
$S15 = explode("\n",file_get_contents("u15"));
$Sum1 = count($S1)-1;
$Sum2 = count($S2)-1;
$Sum3 = count($S3)-1;
$Sum4 = count($S4)-1;
$Sum5 = count($S5)-1;
$Sum6 = count($S6)-1;
$Sum7 = count($S7)-1;
$Sum8 = count($S8)-1;
$Sum9 = count($S9)-1;
$Sum10 = count($S10)-1;
$Sum11 = count($S11)-1;
$Sum12 = count($S12)-1;
$Sum13 = count($S13)-1;
$Sum14 = count($S14)-1;
$Sum15 = count($S15)-1;
$F = $Sum1+$Sum2+$Sum3+$Sum4+$Sum5+$Sum6+$Sum7+$Sum8+$Sum9+$Sum10;+$Sum11;+$Sum12;+$Sum13;+$Sum14;+$Sum15;
$info["USERS"] = "$F";
file_put_contents('info.json', json_encode($info));
$sum = $info["USERS"];
$num1 = $info["num1"];
$num2 = $info["num2"];
$num3 = $info["num3"];
$num4 = $info["num4"];
$num5 = $info["num5"];
$num6 = $info["num6"];
$num7 = $info["num7"];
$num8 = $info["num8"];
$num9 = $info["num9"];
$num10 = $info["num10"];
$num10 = $info["num11"];
$num10 = $info["num12"];
$num10 = $info["num13"];
$num10 = $info["num14"];
$num10 = $info["num15"];
////////
if($data == "1#"){
bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 1.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH1"]],]])]);
file_put_contents('mode', 'Unpin');
}
if($data == "2#"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List 2 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH2"]],]])]);
file_put_contents('mode', 'Unpin2');
}
if($data == "3#"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  3 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH3"]],]])]);
file_put_contents('mode', 'Unpin3');
}
if($data == "4#"){
 bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  4 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH4"]],]])]);
file_put_contents('mode', 'Unpin4');
}
if($data == "5#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  5 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH5"]],]])]);
   file_put_contents('mode', 'Unpin5');
   }
   if($data == "6#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  6 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH6"]],]])]);
   file_put_contents('mode', 'Unpin6');
   }
   if($data == "7#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  7 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH7"]],]])]);
   file_put_contents('mode', 'Unpin7');
   }
   if($data == "8#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  8 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin8');
   }
   if($data == "9#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  9 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin9');
   }
   if($data == "10#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  10 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin10');
   }
   if($data == "11#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  11 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin11');
   }
   if($data == "12#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  12 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin12');
   }
   if($data == "13#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  13 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin13');
   }
   if($data == "14#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  14 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin14');
   }
   if($data == "15#"){
	bot('editMessagetext',['chat_id'=>$chat_id2,'message_id'=>$message_id,'text'=>"⌁ Send List  15 .",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"->",'callback_data'=>"#CH8"]],]])]);
   file_put_contents('mode', 'Unpin15');
   }
$in = json_decode(file_get_contents('in.json'),true);
$loop1 = $in["loop1"];
$loop2 = $in["loop2"];
$loop3 = $in["loop3"];
$loop4 = $in["loop4"];
$loop5 = $in["loop5"];
$loop6 = $in["loop6"];
$loop7 = $in["loop7"];
$loop8 = $in["loop8"];
$loop9 = $in["loop9"];
$loop10 = $in["loop10"];
$loop11 = $in["loop11"];
$loop12 = $in["loop12"];
$loop13 = $in["loop13"];
$loop14 = $in["loop14"];
$loop15 = $in["loop15"];

if ($chat_id == $group) {
if($text == '↬Clicks'){
bot('sendMessage', ['chat_id' => $chat_id,
'text'=>"~ All Clicks ~",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"1  { $loop1 }",'callback_data'=>"U"],['text'=>"2  { $loop2 }",'callback_data'=>"U"]],
[['text'=>"3  { $loop3 }",'callback_data'=>"U"],['text'=>"4  { $loop4 }",'callback_data'=>"U"]],
[['text'=>"5  { $loop5 }",'callback_data'=>"U"],['text'=>"6  { $loop6 }",'callback_data'=>"U"]],
[['text'=>"7  { $loop7 }",'callback_data'=>"U"],['text'=>"8  { $loop8 }",'callback_data'=>"U"]],
[['text'=>"9  { $loop9 }",'callback_data'=>"U"],['text'=>"10  { $loop10 }",'callback_data'=>"U"]],

[['text'=>"11  { $loop11 }",'callback_data'=>"U"],['text'=>"12  { $loop12 }",'callback_data'=>"U"]],

[['text'=>"13  { $loop13 }",'callback_data'=>"U"],['text'=>"14  { $loop14 }",'callback_data'=>"U"]],

[['text'=>"15  { $loop15 }",'callback_data'=>"U"]],

]])]);
}}
$lastupdid = $update['result'][0]['update_id'] + 1; 
}
while (true) {
global $last_up;
$get_up = getupdates($last_up + 1);
$last_up = $get_up['update_id'];
if ($get_up) {
run($get_up);
}
}
?>