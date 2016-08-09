<?php
				
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
																																															
			$ARRAY = $API->comm("/ppp/active/print");						
									   								
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #0000FF}
-->
    </style>
</head>
<body>
		<form name="name" action="" method="post">
        <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading"><i class="fa fa-flash"></i><i class="fa fa-user"></i>
                            PPPOE User Online
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th><span class="style1">No.</span></th>
                                            <th><span class="style2">Name.</span></th>
                                            <th><span class="style2">Service.</span></th>
                                            <th><span class="style2">IP Address.</span></th>
                                            <th><span class="style2">Mac Address.</span></th>
                                            <th><span class="style2">Uptime.</span></th>
                                            <th><span class="style2">Action.</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){
													$no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;
													echo "<tr>";
														echo "<td>".$no."</td>";
														echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['service']."</td>";
														echo "<td>".$ARRAY[$i]['address']."</td>";
														echo "<td>".$ARRAY[$i]['caller-id']."</td>";
														echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td><a href='../process/pppoe_online_kick.php?user=".$i."'><center><img src='../img/kick.png' width=20px title=Kick></a></td>";
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
