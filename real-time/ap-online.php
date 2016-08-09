<?
include_once('key.php');
$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;

if ($API->connect($mikrotik_ip, $mikrotik_username,$mikrotik_password)) {

$items = $API->comm("/ip/neighbor/print");
echo count($items)." Clients";
}
?>