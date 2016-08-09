<?php
				
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	
																																															
			$ARRAY = $API->comm("/ip/hotspot/active/print");						
									   								
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 300; URL=$url1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF0000}
-->
</style>
</head>
<body>
       <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            User Online
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th><span class="style2">No.</span></th>                                                                         	
                                            <th><span class="style1">Username</span></th>                                           
                                            <th><span class="style1">Address</span></th>
                                            <th><span class="style1">MAC Address</span></th>
                                            <th><span class="style1">Uptime</span></th>
                                            <th><span class="style1">Session Timeleft</span></th>
                                                                               
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td>".$no."</td>";																																							
														echo "<td>".$ARRAY[$i]['user']."</td>";														
														echo "<td>".$ARRAY[$i]['address']."</td>";
														echo "<td>".$ARRAY[$i]['mac-address']."</td>";
														echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td>".$ARRAY[$i]['session-time-left']."</td>";
														
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
