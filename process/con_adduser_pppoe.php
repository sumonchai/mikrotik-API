<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	//include_once('../phpqrcode/qrlib.php');
	include_once('../include/conn.php');
	echo "<meta charset='utf-8'>" ;
	
	$hotspot_server=$_REQUEST['server']; if($hotspot_server==""){$hotspot_server = "all";}
	$username=$_REQUEST['user'];
	$password=$_REQUEST['pass'];
	$limit_uptime=$_REQUEST['limit_uptime']; if($limit_uptime==""){$limit_uptime = "00:00:00";}
	$profiles=$_REQUEST['package_id'];
	$ip=$_REQUEST['ip']; if($ip==""){$ip = "0.0.0.0";}
	$mac=$_REQUEST['mac']; if($mac==""){$mac = "00:00:00:00:00:00";}
	$email=$_REQUEST['email']; if($email==""){$email = "";}
	$comments=$_REQUEST['comments']; if($comments==""){$comments = "";}
	$id=$_SESSION['id'];
	$date=date('Y-m-d H:i:s');
	// set.csv file 
	$filName = "../csv/org_csv/Gen".date("YmdHi").".csv";
	$csv=date("YmdHi");
    $objWrite = fopen($filName, "w");
	 //END .csv file
	if($username != ""){
		$ARRAY = $API->comm("/ip/hotspot/user/add", array(
									  "server" => $hotspot_server,	
									  "name"     => $username,
									  "password" => $password,	
									  "limit-uptime" => $limit_uptime,	
									  "profile"  => $profiles ,
			                          "mac-address"  => $mac ,
		                              "address"  => $ip ,
			                          "email"  => $email ,
			                          "comment"  => $comments ,
							));
		$file=$username.".png";
		///csv start
		fwrite($objWrite, "$username,$password,$limit_uptime \n");
	    ///csv end
		//QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$limit_uptime."','".$profiles."','".$hotspot_server."','".$mac."','".$ip."','".$email."','".$comments."','".$csv."','".$file."','".$date."','".$id."')");
		echo "<script>alert('เพิ่ม ".$username." สำเร็จแล้ว')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=listuser' />";
		exit();
	}
?>