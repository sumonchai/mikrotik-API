<?php
	include_once('../config/routeros_api.class.php');			
	include_once('../include/conn.php');
	echo "<meta charset='utf-8'>" ;
	$user=$_GET['id'];
	mysql_query("DELETE FROM pppoe_gen WHERE user =  '".$user."'");
   $ARRAY = $API->comm("/ppp/secret/remove
						=.id=".$_GET['id']."");	
		
	echo "<script>alert('ลบ ".$user." สำเร็จแล้ว.')</script>";
	echo "<script>history.back();</script>";
	//echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=listuser' />";
	exit;

?>