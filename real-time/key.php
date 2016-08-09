<?php
	
	
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");
	include('../config/routeros_api.class.php');

    $id=$_SESSION['id'];	
	$sql=mysql_query("SELECT * FROM mt_config WHERE mt_id='".$id."'");
    $result=mysql_fetch_array($sql);	
		$ip=$result['mt_ip'];
		$user=$result['mt_user'];
		$pass=$result['mt_pass'];
		
$API = new routeros_api();
?>