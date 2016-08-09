<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('../include/conn.php');
	echo "<meta charset='utf-8'>" ;
	$profile=$_REQUEST['profile'];
	$name=$_REQUEST['name'];
	$session=$_REQUEST['session'];; if($session==""){$session = "00:00:00";}
	$idle=$_REQUEST['idle']; if($idle==""){$idle = "none";}	
	$use=$_REQUEST['use']; if($use==""){$use = "0";}	
	$limit=$_REQUEST['limit']; if($limit==""){$limit = "";}	
	$keep=$_REQUEST['keep']; if($keep==""){$keep = "00:02:00";}
	$auto=$_REQUEST['auto']; if($auto==""){$auto = "00:01:00";}
//	$list=$_REQUEST['address'];
	if($name != ""){
		mysql_query("UPDATE mt_profile SET pro_name='".$_REQUEST['name']."', pro_session='".$_REQUEST['session']."', pro_idle='".$_REQUEST['idle']."', pro_limit='".$_REQUEST['limit']."', pro_users='".$_REQUEST['use']."', pro_keepalive='".$_REQUEST['keep']."', pro_autorefresh='".$_REQUEST['auto']."' WHERE pro_name='".$profile."'");
		
		$ARRAY = $API->comm("/ip/hotspot/user/profile/set", array(
								"name" => $name,
								"session-timeout" => $session,
								"idle-timeout" => $idle,
								"keepalive-timeout" => $keep,
								"status-autorefresh" => $auto,
								"shared-users" => $use,
								"rate-limit" => $limit,
								//"address-list" => $list,
								"numbers" => $profile
							));		
		echo "<script>alert('แก้ไข ".$profile." สำเร็จแล้ว')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=profilelist' />";
		exit;
	}
?>