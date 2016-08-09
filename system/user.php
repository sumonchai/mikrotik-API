<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	
			
			$ARRAY = $API->comm("/ip/hotspot/user/print");
			
			 $file = "../csv/org_csv/Gen".$_GET['id'].".csv";
		if($_REQUEST['check']!=""){			
				for($i=0;$i < count($_REQUEST['check']);$i++){
					
					$user=$_REQUEST['check'][$i];
					
					mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
					$ARRAY = $API->comm("/ip/hotspot/user/remove", array(
											"numbers" => $user,
										));	
							
					$img = $user.".png";
					//unlink("../qrcode/".$img);					
				}
				echo "<script>alert('ลบ  สำเร็จแล้ว.')</script>";
				echo "<script>history.back();</script>";
				//echo "<meta http-equiv='refresh' content='0;url=index.php?page=listuser' />";
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
.style1 {color: #FF0000}
.style2 {color: #0000FF}
-->
    </style>
</head>
<body>
		<form name="user" action="" method="post">
        <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading"><i class="fa fa-user"></i>
                            Databases User                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                        <tr>   
											<th width="10%"><center><input type="checkbox" id="selecctall"/></center></th>  
                                        	<th><span class="style1">No.</span></th>                                                                         	
                                            <th><span class="style2">Username</span></th>                                            
                                            <th><span class="style2">Profiles</span></th>
                                            <th><span class="style2">Action</span></th>                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$csv_code=$_GET['id'];
													
													$query=mysql_query("SELECT * FROM mt_gen WHERE csv_code='".$csv_code."'");
												/*
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td>".$no."</td>";								
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>".$ARRAY[$i]['password']."</td>";
														echo "<td>".$ARRAY[$i]['profile']."</td>";
														echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td><a href='user_del.php?user=".$ARRAY[$i]['name']."'>Delete</a></td>";
													echo "</tr>";
													}
													*/
													$i=0;
													while($result=mysql_fetch_array($query)){
														$i++;
														echo "<tr>";
															echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";		
															echo "<td>".$i."</td>";								
															echo "<td>".$result['user']."</td>";
															echo "<td>".$result['profile']."</td>";	
															echo "<td><div class=\"btn-group\"><button type=\"button\" class=\"btn btn-warning btn-xs dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                                       เลือกดำเนินการ <span class=\"caret\"></span></button>
													   <ul class=\"dropdown-menu\">
                                                       <li><a href='index.php?page=edituser&id=".$result['user']."'>แก้ไข</a></li>
                                                       <li><a href=\"index.php?page=user_del&id=".$result['user']."\" onclick=\"return confirm('ต้องการจะลบ  ".$result['user']."  จริงหรือไม่ ?');\">ลบ</a></td>";														
														echo "</tr>";
													
													}
												?>
                                                                                                   
                                                                                
                                    </tbody>                                    
                                </table>
                            </div>
                           
        </div>
        <!-- /#page-wrapper -->
								<div class="form-group input-group">                                        
                                       &nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="submit"><i class="fa fa-times"></i>&nbsp;Delete&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" onclick="window.open('<?=$file?>')">Download รายชื่อทั้งหมด .CSV</a></div>
                                    </div>
    </div>
    </div></div></div></form>
</body>
</html>
