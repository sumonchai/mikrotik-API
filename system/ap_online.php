<?php

    include_once('../config/routeros_api.class.php');
    include_once('../include/conn.php');

        $ARRAY3 = $API->comm("/ip/hotspot/user/print");
        $ARRAY2 = $API->comm("/system/scheduler/print");
        $ARRAY = $API->comm("/ip/neighbor/print");                                                                                   
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 300; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
       <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            Access Points
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>เชื่อมต่อระหว่าง</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>ไอพีที่ใช้งาน</th>
                                            <th>เลขหมายเครื่อง</th>
                                            <th>เวอร์ชั่น</th>
											<th>รวมเวลาใช้งาน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                

                                                    $num =count($ARRAY);
                                                    $num2 =count($ARRAY2);
                                                    $num3 =count($ARRAY3);

                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;

                                                        echo "<tr>";
                                                            echo "<td>".$no."</td>";
                                                            echo "<td>".$ARRAY[$i]['interface']."</td>";                                                                                                                                                 
                                                            echo "<td>".$ARRAY[$i]['identity']."</td>";                                                     
                                                            echo "<td>".$ARRAY[$i]['address']."</td>";
                                                            echo "<td>".$ARRAY[$i]['mac-address']."</td>";
															echo "<td>".$ARRAY[$i]['version']."</td>";
															echo "<td>".$ARRAY[$i]['uptime']."</td>";
                                                            
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
        </div>
        <!-- /#page-wrapper -->
</body>
</html>
