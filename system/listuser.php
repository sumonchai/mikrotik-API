<?php
include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style2 {color: #FF0000}
.style3 {color: #0000FF}
-->
</style>
</head>
<body>
      <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading"><i class="fa fa-user"></i>
                            Databases User List   ( User ในฐานข้อมูล )
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th><span class="style2">No.</span></th>                                                                         	
                                            <th><span class="style3">Profile</span></th>
                                            <th><span class="style3">Date</span></th>
                                            <th><span class="style3">Total</span></th>                                            
                                            <th><span class="style3">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$id=$_SESSION['id'];
													$sql="SELECT * FROM mt_gen WHERE mt_id='".$id."' GROUP BY csv_code";
													$query=mysql_query($sql);	
													$no==1;
													While($result=mysql_fetch_array($query)){	
													$no++;
													echo "<tr>";
														echo "<td>".$no."</td>";								
														echo "<td>".$result['profile']."</td>";
														echo "<td>".$result['date']."</td>";
														echo "<td>";$count=mysql_fetch_array(mysql_query("SELECT COUNT(user) as total FROM `mt_gen` WHERE csv_code='".$result['csv_code']."'"));
														echo $count['total'];
														echo "<td><div class=\"btn-group\"><button type=\"button\" class=\"btn btn-warning btn-xs dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                                       เลือกดำเนินการ <span class=\"caret\"></span></button>
													   <ul class=\"dropdown-menu\">
                                                       <li><a href='index.php?page=user&id=".$result['csv_code']."'>ดูรายชื่อ</a></li>
                                                       <li><a href='../csv/print_card.php?id=".$result['csv_code']."' target=\"_blank \">พิมพ์บัตร</a></td>";
														//echo "<a href='index.php?page=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=25px></a>";
														//echo "&nbsp;&nbsp;&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=25px></a></td>";
														
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div>                           
        </div>
        <!-- /#page-wrapper -->

    </div>
    
</body>
</html>
