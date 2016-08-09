<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	

			$ARRAY = $API->comm('/ip/dhcp-server/lease/print');			
									   								
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
                        <div class="panel-heading">
                            DHCP Leases
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th><span class="style2">No.</th>                                                                     	
                                            <th><span class="style3">address</th>
                                            <th><span class="style3">macaddress</th>                                            
                                            <th><span class="style3">hostname</th>
											<th><span class="style3">comment</th>
                                        <!-- <th>แก้ไข / ลบ</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
																																																								echo "<td>".$ARRAY[$i]['.id']."</td>";	
														echo "<td>".$ARRAY[$i]['address']."</td>";
														echo "<td>".$ARRAY[$i]['mac-address']."</td>";
													    echo "<td>".$ARRAY[$i]['host-name']."</td>";
														 echo "<td>".$ARRAY[$i]['comment']."</td>";
														
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>
