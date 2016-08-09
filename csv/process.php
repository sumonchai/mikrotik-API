
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload CSV</title> 
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
$objCSV = fopen($_FILES['csv']['tmp_name'], "r");
$cols1 = 0;
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
?>
<table align="left" cellspacing="0" cellpadding="0"> <tr>
<td colspan="2" align="center"><img border="0" src="http://upic.me/i/tl/dicon.png"></td></tr>
<tr>
<td colspan="2" align="center"><font color="#0000FF" size="3">Address : http://10.5.0.1</font></td></tr>
<tr><td align="right">Username :</td>
<td><font color="#FF0000"><b><?=$objArr[0]?></b></font></td></tr>
<tr><td align="right">Password :</td>
<td><font color="#FF0000"><b><?=$objArr[1]?></b></font></td>
</font>
</tr>
<tr>
<td colspan="2" align="center" height="30"><font size="1">Tel. : xxx-xxx-xxx <strong>|</strong> <strong>Mobile</strong> : 098-xxx-xxxx</font>
<br><strong><u>Notes</u></strong> : 1 user per 1 client
</td></tr>
</table>
<?$cols1++;
if($cols1==16){?>
<div class="page-break">&nbsp;</div> 
<?
$cols1 = 0;
}
}
fclose($objCSV);
?>
</body>
</html>