<?php

include_once('../config/routeros_api.class.php');			
include_once('../include/conn.php');

$ARRAY1 = $API->comm("/ip/hotspot/print");
$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;
?>
<style type="text/css">
<!--
.style1 {color: #990000}
-->
</style>

<div class="col-xs-12 col-md-5" style="margin:0 auto;">

		<!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-black">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" ><span style="padding: 0px 0px 0px 1em;
font-size: 16px;"><i class="fa fa-user"></i>&nbsp;&nbsp;Import - Hotspot User   </h3></span>
                    </div>
					
                </div>
                <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data" name="form1">
					 <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="">เลือก Servers</label>
                                    <div class="input-group">
                                        <select name="server"  id="server" class="form-control" >
					      <option value="">all</option>
						   <?php
													$num =count($ARRAY1);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY1[$i]['name'].$selected.'">'.$ARRAY1[$i]['name'].'</option>';
													}
												?>						 
							</select>
                                        <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                      </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">เลือก Package</label>
                                    <div class="input-group">
                                        <select name="profile"  id="profile" class="form-control" required>
					      <option value="">ต้องเลือก Package</option>
						   <?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
											 	?>						 
							             </select>
                                         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
								</div>
								</div>
								</div>
								<div  class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">เลือกจำนวนวันที่ใช้งาน</label>
                                    <div class="input-group">
                                        <input name="limit_uptime"  id="limit_uptime" placeholder="Ex.1d or 1h" class="form-control" >
						         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
						<br>
                            
							<input name="fileCSV" type="file" id="fileCSV" />
									<br>
 
  
									<div class="form-group input-group">                                        
                                        <button name="submit" type="submit"  value="submit" class="btn btn-success" "><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
										<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>
                                    </div>
				
				</div>
				</div>          </div>

<?

if(isset($_POST['submit']) && $_POST['submit']=='submit'){
	$server=$_REQUEST['server'];


$objCSV = fopen($_FILES["fileCSV"]['tmp_name'], "r");
if (($objCSV)== ''){

echo "Error :กรุณาเลือกไฟล์ เพื่อ upload.";
exit;
}
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {


    $username_add=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password_add=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $server =$_REQUEST['server']; if($server==""){$server = "all";}
	$hotspot_profile = $_REQUEST['profile'];
    $limit_uptime=$_REQUEST['limit_uptime']; if($limit_uptime==""){$limit_uptime = "00:00:00";}
	$id=$_SESSION['id'];
	$date=date('Y-m-d H:i');
	$csv=date("YmdHi");
   	
	
    if($username_add  != '' ){
			$API = new routeros_api();
			$API->debug = true;
			
		$file=$username_add.".png";
		//QRcode::png('http://'.$ip.'/login?username='.$username_add.'&password='.$password_add.'', '../qrcode/'.$file.'');
mysql_query("SET NAMES TIS620");
$mysql_add=mysql_query("INSERT INTO mt_gen VALUE('".$username_add."','".$password_add."','".$limit_uptime."','".$_REQUEST['profile']."','".$server."','','','','','".$csv."','".$file."','".$date."','".$id."')");
//set mikrotik
if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
	echo "connect ok<br>";
    echo $date;
	          $username="=name=".$username_add;

		      $pass="=password=".$password_add;

		      $server="=server=".$server;

		      $limit_uptimes="=limit-uptime=".$limit_uptime;
				
		     $profile="=profile=".$hotspot_profile;
			
			 $API->write('/ip/hotspot/user/add',false);
	   	$API->write($server, false);
		$API->write($username, false);
	   	$API->write($pass, false);
	   	$API->write($limit_uptimes, false);
		$API->write($profile);
		$items = $API->read();
   	$API->disconnect();
   }  
 
	}
}
fclose($objCSV);
echo    "เวลา=".$date;
echo "Upload ข้อมูลสำเร็จ .";
echo "<script>alert('เพิ่ม สำเร็จแล้ว');window.location='index.php?page=Import_Exel';</script>";
}
?>


</form>

<div class="col-xs-12 col-md-7" style="font-size: 12pt; line-height: 2em;">
            <p><h1 class="style2">&nbsp;&nbsp;<span class="style1">ข้อแนะนำการใช้งาน :</span></h1>
                <ul>
                    <li>เลือก Server , Package, และ จำนวนวันใช้งาน</li>
                    <li>ระบบจะดึงมาแค่ user กับ password จำนวนวันใช้งานถ้าไม่กำหนดจะเป็นค่า default .</li>
                </ul>
            </p>
     
            
            <!-- <p>Built upon: Bootstrap, jQuery, 
                <a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
                <a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
                and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
            </p> -->
</div>