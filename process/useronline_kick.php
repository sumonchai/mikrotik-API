<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../include/conn.php');
	echo "<meta charset='utf-8'>" ;
	$username=$_GET['user'];	
	$ARRAY = $API->comm("/ip/hotspot/active/remove
						=.id=".$_GET['user']."");
	echo "<script>alert('Kick ".$username." สำเร็จแล้ว.')</script>";
	echo "<script>history.back();</script>";
	//echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=useronline' />";
	exit;

?>