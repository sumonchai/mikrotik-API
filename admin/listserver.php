<div class="row col-md-12">
    <table class="table table-striped">
    <thead>
    <a href="setup_server.php" class="btn btn-primary btn-sm pull-right"><b>+</b> เพิ่ม Server</a>
        <tr>
            <th>สถานะ</th>
            <th>IP / DNS</th>
            <th>UPDATE</th>
            <th class="text-center">Manage zone</th>
        </tr>
    </thead>
	<?
		$sql = mysql_query("select * from mt_config");
		
		while($result = mysql_fetch_array($sql)){
			$API = new routeros_api();				
			$API->debug = false;
	?>
            <tr>
                <td>
					<?
				if($API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'])){echo "<a class='btn btn-success btn-xs' >อุปกรณ์ ออนไลน์</a>";$conn="connect";}
				else{ echo "<a class='btn btn-danger btn-xs' >อุปกรณ์ ออฟไลน์</a>";$conn="disconnect"; }
				?>
				</td>
                <td><?=$result[mt_ip]?></td>
                <td><?=$result[date_update]?></td>
                <td class="text-center">
<a class='btn btn-info btn-xs' href="index.php?page=editserver&id=<?=$result[mt_id]?>"><span class="glyphicon glyphicon-edit"></span> แก้ไข  </a>
<a class='btn btn-default btn-xs' href="index.php?page=monitorserver&id=<?=$result[mt_id]?>"><span class="glyphicon glyphicon-tasks"></span> monitor </a>
<a class='btn btn-warning btn-xs' href="<? echo "//".$result[mt_ip].":".$result[port_web];?>" target="_blank"><span class="glyphicon glyphicon-globe"></span> webconfig </a>
<a onclick="return confirm('ต้องการจะลบ SERVER ID>  <?=$result[mt_id]?>   <จริงหรือไม่ ?') " href="index.php?page=deleteserver&id=<?=$result[mt_id]?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" ></span> ลบ</a>
<a class='btn btn-info2 btn-xs' href="../system/system_conn.php?page&id=<?=$result[mt_id]."&conn=$conn"?>"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ  </a></td>
            </tr>
<?}
?>
 
    </table>
	<div>

	   <div>
        </div><a  class="btn btn-info btn-block add-server" ></span> </a></td>
