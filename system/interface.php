<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	

			$ARRAY = $API->comm("/interface/print");			
									   								
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 300; URL=$url1");
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
                            Interface All
                        </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                        	<th><span class="style2">No.</th>                                                                     	
                                            <th><span class="style3">name</th>
                                            <th><span class="style3">comment</th>                                            
                                            <th><span class="style3">type</th>
                                            <th><span class="style3">status</th>
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
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>".$ARRAY[$i]['comment']."</td>";
													    echo "<td>".$ARRAY[$i]['type']."</td>";
														echo "<td>";
                                                            if($ARRAY[$i]['running']=="true"){
                                                            echo 
															"<span class=\"label label-success\">CONNECT</span>";
                                                            }else{
                                                            echo "<span class=\"label label-danger\">DISCONNECT</span>";
                                                            }
                                                            echo "</td>";
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
        <!-- /#page-wrapper -->
     </div>
    
</body>
</html>