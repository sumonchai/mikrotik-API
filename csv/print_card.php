<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Print HOTSPOT User</title> 
	<style>
	table {
	width:250px;
	height:100px;
	border-collapse: collapse;
	border:1px dotted #000000;
	}
	td{padding:5px;margin:0px;}
	img{width:120;height:30px;}
	@media all  
{  
    .page-break { display:none; }  
    .page-break-no{ display:none; }  
}  
@media print  
{  
    .page-break { display:block;height:1px; page-break-before:always; }  
    .page-break-no{ display:block;height:1px; page-break-after:avoid; }   
}  
	</style>
</head>
<html>
<body>
<?
include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	 echo"<body onload=\"window.print();\"> ";
$sql = mysql_query("SELECT * FROM mt_gen WHERE csv_code='".$_GET['id']."'");
$intRows = 0;
while($result = mysql_fetch_array($sql)) {
?>
<table align="left" cellspacing="0" cellpadding="0"> <tr>
<td colspan="2" align="center"><img border="0" src="../img/icon.png"></td></tr>
<tr>
<td colspan="2" align="center"><font color="#0000FF" size="3">Address : http://10.5.0.1</font></td></tr>
<tr><td align="right">Username :</td>
<td><font color="#FF0000"><b><?=$result[user]?></b></font></td></tr>
<tr><td align="right">Password :</td>
<td><font color="#FF0000"><b><?=$result[pass]?></b></font></td>
</font>
</tr>
<tr>
<td colspan="2" align="center" height="30"><font size="1">Tel. : 037-xxx-xxx <strong>|</strong> <strong>Mobile</strong> : 098-xxx-xxxx</font>
<br><strong><u>Notes</u></strong> : 1 user per 1 client
</td></tr>
</table>
</body>
</html>

<?

} 
?>


