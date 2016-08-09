<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	
																																
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");	
		
		
		if($_REQUEST['check']!=""){			
				for($i=0;$i < count($_REQUEST['check']);$i++){
					
					$profile=$_REQUEST['check'][$i];
					
					mysql_query("DELETE FROM mt_profile WHERE pro_name = '".$profile."' ");
		$ARRAY = $API->comm("/ip/hotspot/user/profile/remove", array(
											"numbers" => $profile,
										));	
							
				}
				echo "<script>alert('ลบ สำเร็จแล้ว.')</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php?page=profilelist' />";
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
		<form name="name" action="" method="post">
        <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o"></i>
                            Hotspot User Profiles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>   
											<th width="10%"><center><input type="checkbox" id="selecctall"/></th>  
                                            <th><span class="style1">No.</span></th>                                                                         	
                                            <th><span class="style2">Name</span></th>
                                            <th><span class="style2">Rate Limit</span></th>                                            
                                            <th><span class="style2">Session Timeout</span></th>
                                            <th><span class="style2">Idle Timeout</span></th>
                                            <th><span class="style2">Shared Users</span></th>
                                            <th><span class="style2">Action</span></th>
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
													    echo "<td>".$no."</td>";																																							
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>";
															if($ARRAY[$i]['rate-limit']==""){
																echo "Unlimited";
															}else{
																echo $ARRAY[$i]['rate-limit'];
															}																
														echo "</td>";
														echo "<td>".$ARRAY[$i]['session-timeout']."</td>";
														echo "<td>".$ARRAY[$i]['idle-timeout']."</td>";
														echo "<td>".$ARRAY[$i]['shared-users']."</td>";
														//echo "<td><a href='index.php?page=editprofile&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\" title='Edit Profile'></i></button></a></td>";
														echo "<td><a class='btn btn-info btn-xs' href='index.php?page=editprofile&name=".$ARRAY[$i]['name']."'><span class=\"glyphicon glyphicon-edit\"></span> แก้ไข  </a></td>";
														
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
