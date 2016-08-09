<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('../include/conn.php');
	$name=$_REQUEST['name'];
	$session=$_REQUEST['session']; if($session==""){$session = "00:00:00";}
	$idle=$_REQUEST['idle']; if($idle==""){$idle = "none";}	
	$use=$_REQUEST['use']; if($use==""){$use = "0";}	
	$limit=$_REQUEST['limit']; if($limit==""){$limit = "";}	
	$keep=$_REQUEST['keep']; if($keep==""){$keep = "00:02:00";}	
	$auto=$_REQUEST['auto']; if($auto==""){$auto = "00:01:00";}
	$uptime=$_REQUEST['uptime'];
	$login="{:local date [/system clock get date ];:local time [/system clock get time ];:local uptime (".$uptime.");:if ( [/ip hotspot user get \$user comment ] = \"\" ) do={[/ip hotspot user set \$user comment=[[\$date];[\$time]]];[/system scheduler add disabled=no interval=\$uptime name=\$user on-event= \"[/ip hotspot user remove [find where name=\$user]];[/ip hotspot active remove [find where user=\$user]];[/sys sch re [find where name=\$user]]\" start-date=\$date start-time=\$time]; }}";


	
	
	if($name != ""){
		$sql="SELECT pro_name FROM mt_profile WHERE pro_name='".$name."'";
		$query=mysql_query($sql);
		$rows=mysql_num_rows($query);
		
		if($rows>0){
			echo "<script>alert('มีชื่อ ".$name." แล้วในฐานขื้อมูล กรุณาตั้งชื่อใหม่.')</script>";
			echo "<script>window.history.back()</script>";
		}else{
			mysql_query("INSERT INTO mt_profile VALUE('".$name."','".$session."','".$idle."','".$keep."','".$auto."','".$uptime."','".$use."','".$limit."',NOW())");
			$ARRAY = $API->comm("/ip/hotspot/user/profile/add", array(
									"name" => $name,
									"session-timeout" => $session,
									"idle-timeout" => $idle,
									"keepalive-timeout" => $keep,
									"shared-users" => $auto,
									"shared-users" => $use,
									"rate-limit" => $limit,
									"on-login" => $login
								));		
			echo "<script>alert('เพิ่ม Profile ".$name." สำเร็จแล้ว')</script>";
			echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=profilelist' />";
			exit;
		}
	}
?>