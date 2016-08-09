<?
session_start();
include('../system/condb.ini.php');
$id_server = $_GET[id_server];
$sql = mysql_query("update server set STATUS_USE='1' where ID_SERVER='$id_server'");
$remove = mysql_query("update server set STATUS_USE='0' where ID_SERVER!='$id_server'");
$obj = mysql_query("select * from server where ID_SERVER='$id_server'");
$serv = mysql_fetch_array($obj);
unset($_SESSION["IPSERVER"],$_SESSION["USERSERVER"],$_SESSION["PASSSERVER"]);
$_SESSION["IPSERVER"]=$serv[IP_SERVER];
$_SESSION["USERSERVER"]=$serv[USER_SERVER];
$_SESSION["PASSSERVER"]=$serv[PASS_SERVER];

if($sql && $remove && $obj){
 echo "<script>window.location='index.php?page=server';</script>";
}
else{
echo "<script>alert('Server Available..');window.location='index.php?page=server';</script>";
exit();
}mysql_close();
?>