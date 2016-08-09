<?
if(!empty($_GET['id'])){
		mysql_query("DELETE FROM mt_config WHERE mt_id='".$_GET['id']."'");
		echo "<script>alert('ลบ SERVER  สำเร็จแล้ว.')</script>";
	    echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
		exit(0);
	}	
?>