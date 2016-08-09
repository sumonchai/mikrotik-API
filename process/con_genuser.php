<?php
	include_once('../config/routeros_api.class.php');
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	//include_once('../phpqrcode/qrlib.php');
	include_once('ran.php');			
	include_once('../include/conn.php');
	
	set_time_limit(500);	
	$num=$_REQUEST['max_user'];
		
		$hotspot_server =$_REQUEST['server'];; if($hotspot_server==""){$hotspot_server = "all";}
	    $user = $_REQUEST['username'];
		$pass = $_REQUEST['password'];
		$profile=$_REQUEST['package_id'];
		$limit_uptime=$_REQUEST['limit_uptime'];; if($limit_uptime==""){$limit_uptime = "00:00:00";}
		$ip=$_REQUEST['ip']; if($ip==""){$ip = "0.0.0.0";}
	    $mac=$_REQUEST['mac']; if($mac==""){$mac = "00:00:00:00:00:00";}
	    $email=$_REQUEST['email']; if($email==""){$email = "";}
	    $comments=$_REQUEST['comments']; if($comments==""){$comments = "";}
		$date=date('Y-m-d H:i:s');
	    $id=$_SESSION['id'];
		///csv on
		$fileName = "../csv/org_csv/Gen".date("YmdHi").".csv";
		$csv=date("YmdHi");
		$objWrite = fopen($fileName, "w");
		///csv off
		$i=1;
		do{
		    $username=$_REQUEST['fix_user'].genUser();		
			$password=$_REQUEST['fix_pass'].genPass();
			$sql=mysql_query("SELECT * FROM mt_gen WHERE user='".$username."'");
			$row=mysql_num_rows($sql);
			
				
			if($row<=0){
				$ARRAY = $API->comm("/ip/hotspot/user/add", array(
									"server" => $hotspot_server,	
									"name"		=> $username,
									"password"	=> $password,
                                    "limit-uptime" => $limit_uptime,
									"profile"	=> $profile,
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
				$add=mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$limit_uptime."','".$profile."','".$hotspot_server."','".$mac."','".$ip."','".$email."','".$comment."','".$csv."','".$file."','".$date."','".$id."')");
				
				$i++;			
			}
		}while($i<=$num);
		
       
		
				
		echo "<script>alert('สร้างกลุ่มรายชื่อ สำเร็จแล้ว')</script>";
		echo "<meta http-equiv='refresh' content='0;url=../system/index.php?page=listuser' />";
		exit();
?>
