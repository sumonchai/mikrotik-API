<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once("../config/routeros_api.class.php");			
	include_once("../include/conn.php");
	echo "<meta charset='utf-8'>" ;
	
	$user = $_GET['id'];
		
	if($num=='0'){
		echo "<script>alert('Default user ".$user." can not be removed.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=mikrotikuser' />";
		exit;
	}else{		
		$ARRAY = $API->comm("/ip/hotspot/user/remove", array(
								"numbers" => $user,
							));	
		mysql_query("DELETE FROM mt_gen WHERE user = '".$user."' ");
		echo "<script>alert('ลบ ".$user." สำเร็จแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=mikrotikuser' />";
		exit;
	}
?>