<?php
		
			include_once("../config/routeros_api.class.php");			
			include_once("../include/conn.php");
																																
			       $ARRAY = $API->comm("/ip/hotspot/user/print");	
		
		
		if($_REQUEST['check']!=""){			
				for($i=0;$i < count($_REQUEST['check']);$i++){
					
					$user=$_REQUEST['check'][$i];
					
					mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
					$ARRAY = $API->comm("/ip/hotspot/user/remove", array(
											"numbers" => $user,));	
							
				}
				echo "<script>alert('ลบ สำเร็จแล้ว.')</script>";
				echo "<script>history.back();</script>";
				//echo "<meta http-equiv='refresh' content='0;url=index.php?page=mikrotikuser' />";
				exit();
						
		}
		
									   								
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
	</script>    
    <style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF0000}
-->
    </style>
</head>
<body>
		<form name="name" action="" method="post">
        <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading"><i class="fa fa-user"></i>
                            Mikrotik Users
							</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                        <tr>   
											<th width="10%"><center><input type="checkbox" id="selecctall"/></th>  
                                            <th><span class="style2">No.</span></th>                                                                         	
                                            <th><span class="style1">Server</span></th>                                           
                                            <th><span class="style1">Username</span></th>                                           
                                            <th><span class="style1">Password</span></th>
                                            <th><span class="style1">MAC Address</span></th>
                                            <th><span class="style1">Profile</span></th>
                                            <th><span class="style1">Limit Uptime</span></th>
                                            <th><span class="style1">Action</span></th>                                                                                        
                                        </tr>
                                  </thead>
                                    <tbody>
                                        
                                            
												<?php
													$i=0;
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$ARRAY[$i]['name']."></center></td>";		
													    echo "<td>".$no."</td>";																	echo "<td>".$ARRAY[$i]['server']."</td>";
														echo "<td>".$ARRAY[$i]['name']."</td>";														
														echo "<td>".$ARRAY[$i]['password']."</td>";
														echo "<td>".$ARRAY[$i]['mac-address']."</td>";
														echo "<td>".$ARRAY[$i]['profile']."</td>";
														echo "<td>".$ARRAY[$i]['limit-uptime']."</td>";
												  //  	echo "<td><center>
												//		<a href='index.php?page=editmikrotikuser&id=".$ARRAY[$i]['name']."'><img src='img/edit.png'         width=20px title='edit mikrotik user'></a></td>";
												       echo "<td><div class=\"btn-group\"><button type=\"button\" class=\"btn btn-warning btn-xs dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                                       เลือกดำเนินการ <span class=\"caret\"></span></button>
													   <ul class=\"dropdown-menu\">
                                                       <li><a href='index.php?page=editmikrotikuser&id=".$ARRAY[$i]['name']."'>แก้ไข</a></li>
                                                       <li><a href=\"index.php?page=mikrotikuser_del&id=".$ARRAY[$i]['name']."\" onclick=\"return confirm('ต้องการจะลบ  ".$ARRAY[$i]['name']."  จริงหรือไม่ ?');\">ลบ</a></td>";
													
													echo "</tr>";
													
													}
												?>
                                                                                                   
                                                                                
                                    </tbody>                                    
                                </table>
                            </div>
                           
        </div>
        <!-- /#page-wrapper -->
					  <div class="form-group input-group">                                        
                                       &nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="submit"><i class="fa fa-times"></i>&nbsp;Delete&nbsp;</button>
                      </div>
    </div>
    </div></div></div></form>
</body>
</html>
