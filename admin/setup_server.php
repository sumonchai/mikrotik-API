<?
if(!$_GET[cmd]){
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API Mikrotik By Bronze Ng</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
 <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Mikrotik Deviced</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-7">
                      <div class="well">
                          <form id="loginForm" method="POST" action="setup_server.php?cmd=addtoserver" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">IP Address / DNS </label>
                                  <input type="text" class="form-control" id="ip" name="ip" required title="Please enter you IP/DNS" placeholder="xxx.sn.mynetname.net">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="admin" required title="Please enter your username">
                                  <span class="help-block"></span>
                              </div>
							   <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                                <div class="form-group">
                                  <label for="password" class="control-label">Port API</label>
                                  <input type="text" class="form-control" id="portapi" name="portapi" value="8728" required title="Please enter your port-api">
                                  <span class="help-block"></span>
                              </div>
							   <div class="form-group">
                                  <label for="password" class="control-label">Port Web Config</label>
                                  <input type="text" class="form-control" id="portweb" name="portweb" value="80" required title="Please enter your port-web">
                                  <span class="help-block"></span>
                              </div>
                              <button type="button" class="btn btn-success btn-block test-btn">ทดสอบเชื่อมต่อ</button>
                        
                     
                      </div>
                  </div>
                  <div class="col-xs-5">
                      <p class="lead">Test Connection </p>
						<div class="test-connect"><div>
				  
              </div>
          </div>
		  <input type="submit" class="btn btn-info btn-block add-server" value="เพิ่ม">
		  

         <input type="button" class="btn btn-danger btn-block add-server" value="ยกเลิกและย้อนกลับ" onclick="window.location='index.php?page=server'">
      </div>
	   </form>
  </div>


<script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/action.js"></script>

</body>
<?}
if($_GET[cmd]=="testcon"){
	
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");
	$ip = $_POST[ip];
	$user = $_POST[username];
	$pass = $_POST[password];
	$papi = $_POST[portapi];
	$pweb = $_POST[portweb];
		
$wait = 1; // wait Timeout In Seconds
$host = $ip;
$ports = array($papi,$pweb);


echo "==== ping ip และ เช็ค port ====<br>";
foreach ($ports as $value) {
    $fp = @fsockopen($host, $value, $errCode, $errStr, $wait);
    if ($fp) {
		echo "Ping $host:$value => ";
        echo 'SUCCESS.<br>';
        fclose($fp);
    } else {
        echo "ERROR: $errCode - $errStr";
    }
    echo PHP_EOL;
}
echo "=========================";
mysql_close();
}
else if($_GET[cmd]=="addtoserver"){

	$ip = $_POST[ip];
	$user = $_POST[username];
	$pass = $_POST[password];
	$papi = $_POST[portapi];
	$pweb = $_POST[portweb];
	
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");
		
	$sql = mysql_query("select * from mt_config where mt_ip='$ip'");
	$num = mysql_num_rows($sql);
	if($num==0){
		$sql = mysql_query("insert into mt_config(mt_id,mt_user,mt_pass,mt_ip,port_api,port_web,date_update) values('','$user','$pass','$ip','$papi','$pweb','".date("Y-m-d H:i:s")."')")or die(mysql_error());
		if($sql){
			echo "<script>alert('เพิ่ม Server สำเร็จแล้ว');window.location='index.php?page=server';</script>";
		}
		else{
			echo "<script>alert('can not add server. please check data again.');</script>";
			echo "<script>window.history.back()</script>";
			exit();
		}
	}
	else{
			echo "<script>alert(' IP/DNS มีอยู่แล้วในระบบ.');</script>";
			echo "<script>window.history.back()</script>";
			exit();
	}
	mysql_close();
}
?>

</html>

