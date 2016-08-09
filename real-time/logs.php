  <?


include_once('key.php');
$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;


if ($API->connect($mikrotik_ip, $mikrotik_username,$mikrotik_password)) {
						$log = $API->comm("/log/print");
						$clog = count($log);
						for($a=0;$a<=$clog;$a++){ 
						echo $log[$a]["message"]."<br>";
						  }
} ?>