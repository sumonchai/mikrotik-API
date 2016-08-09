<?
include_once('key.php');
$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;

if ($API->connect($mikrotik_ip, $mikrotik_username,$mikrotik_password)) {

$items = $API->comm("/system/resource/print");
echo round($items['0']['free-hdd-space']/1048576)." MB";
}
?>