<?session_start();
if(empty($_SESSION[authen])){
	echo "<script>window.location='login.php';</script>";
	exit();
}
if(empty($_POST)){
echo "<script>window.location='index.php?page=server';</script>";
	exit();
}
	include('../system/condb.ini.php');
	$id=$_POST[hide_id];
	$ip = $_POST[ip];
	$user = $_POST[username];
	$pass = $_POST[password];
	$papi = $_POST[portapi];
	$pweb = $_POST[portweb];
	

		$sql = mysql_query("update server set IP_SERVER='$ip', USER_SERVER='$user', PASS_SERVER='$pass', PORT_API='$papi', PORT_WEB='$pweb', DATE_UPDATE='".date("Y-m-d H:i:s")."' where ID_SERVER='$id'")or die(mysql_error());
		if($sql){
			echo "<script>alert('แก้ไข server สำเร็จแล้ว');window.location='index.php?page=server';</script>";
		}
		else{
			echo "<script>alert('can not edit server. please check data again.');</script>";
			exit();
		}
	
	mysql_close();

?>