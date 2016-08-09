<?php
	session_start();
	ob_start();
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");	
	if($_SESSION['APIUser'] == '' and $_SESSION['EmpUser']==''){
		echo "<meta http-equiv='refresh' content='0;url=../admin/logout.php' />";
		exit();		
	}else if($_SESSION['id'] == ''){
		echo "<meta http-equiv='refresh' content='0;url=../admin/index.php' />";
		exit();
	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API Mikrotik By Bronze Ng</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
	<!-- DataTables CSS -->
    <link href="../assets/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- Script แสดงวันเวลา --> 
    <script type="text/javascript" >
        function date_time(id) {
            date = new Date;
            year = date.getFullYear();
            month = date.getMonth();
            months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dev');
            d = date.getDate();
            day = date.getDay();
            days = new Array('sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
            h = date.getHours();
            if (h < 10) {
                h = "0" + h;
            }
            m = date.getMinutes();
            if (m < 10) {
                m = "0" + m;
            }
            s = date.getSeconds();
            if (s < 10) {
                s = "0" + s;
            }
            result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("' + id + '");', '1000');
            return true;
        }

      
    </script>
	<script>
function popup(url,name,windowWidth,windowHeight){      
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;   
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;     
    properties = "width="+windowWidth+",height="+windowHeight;  
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;     
    window.open(url,name,properties);  
}</script>

   

</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="btn btn-danger fa-2x" href="javascript:popup('index.php?page=#')">Admin API Mikrotik</a> 
            </div>
			<!-- Page Content -->
                      <?php
						include('../config/routeros_api.class.php');	
						include_once('../include/conn.php');
						$ARRAY = $API->comm("/system/resource/print");
						?>
  <div> <span style="color:#ffffff;
padding: 15px 15px 15px 15px;
float: left;
font-size: 18px;">Board Name : <?php echo " ".$ARRAY['0']['board-name'].""; ?> 
&nbsp;&nbsp;<!-- แสดงวันเวลา -->
&nbsp;&nbsp;<a style=" font-size: 14px; color:#ffffff; " class="up-time" ></a></a></span>
<span  style=" color:#ffffff;padding: 15px 50px 5px 50px; float: right; "><span id="date_time" style=" font-size: 18px;"></span>
<script type="text/javascript" > window.onload = date_time('date_time');</script>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="../admin/logout.php" class="btn btn-danger fa fa-power-off fa-1.5x"></a> </span>
			</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				     
					 
				 <li >
                  <a <?if(!$_GET[page]){ echo "class='active-menu'";}?>  href="index.php"><i class="fa fa-home fa-3x"></i> Dashboard</a>
                 </li>
                 <li >
				 <a ><i class="fa fa-wifi fa-3x"></i> Hotspot<span class="fa arrow"></a>
					         <ul class="nav nav-second-level">
						      <li >
                              <a ><i class="fa fa-user-plus fa-2x"></i> Add Accout<span class="fa arrow"></a>
						              <ul class="nav nav-third-level">
                                      <li>
								      <a <?if($_GET[page]=="manuser"){ echo "class='active-menu'";}?> href="index.php?page=manuser"><i class="fa fa-user fa-1x"></i> Add User Manual</a>
								      </li>
                                        <li>
								       <a <?if($_GET[page]=="genuser"){ echo "class='active-menu'";}?> href="index.php?page=genuser"><i class="fa fa-users fa-1x"></i> Gen User</a>
								       </li>
								       </ul>
						     </li>
						      <li>
						      <a ><i class="fa fa-folder-o fa-2x"></i> Profile<span class="fa arrow"></a>
						               <ul class="nav nav-third-level">
								       <li>
								      <a <?if($_GET[page]=="add_profile"){ echo "class='active-menu'";}?>     href="index.php?page=add_profile"><i class="fa fa-folder-open fa-1x"></i> Add Profile</a>
								       </li>
								       <li>
								       <a <?if($_GET[page]=="add_macprofile"){ echo "class='active-menu'";}?> href="index.php?page=add_macprofile"><i class="fa fa-folder-open fa-1x"></i> Add Profile (lock  mac)</a>
								       </li>
								       </ul>
						      </li>
							  <li>
							   <a ><i class="fa fa-file fa-2x"></i> Users List<span class="fa arrow"></a>
							           <ul class="nav nav-third-level">
									   <li>
									   <a <?if($_GET[page]=="listuser"){ echo "class='active-menu'";}?> href="index.php?page=listuser"><i class="fa fa-gear fa-1x"></i> Databases User</a>
									   </li>
								       <li>
									    <a <?if($_GET[page]=="mikrotikuser"){ echo "class='active-menu'";}?> href="index.php?page=mikrotikuser"><i class="fa fa-gear fa-1x"></i> Mikrotik User</a>
									   </li>
								       </ul>
						     </li>
							 <li>
							 <a <?if($_GET[page]=="profilelist"){ echo "class='active-menu'";}?> href="index.php?page=profilelist"><i class="fa fa-bar-chart-o fa-2x"></i> Profile List</a>
							 </li>
							 <li>
							 <a <?if($_GET[page]=="useronline"){ echo "class='active-menu'";}?> href="index.php?page=useronline"><i class="fa fa-flash fa-2x"></i> User Online</a>
							 </li>
                             </ul>
				   </li>
				  <li>
				   <a ><i class="fa fa-weibo fa-3x"></i> PPPOE<span class="fa arrow"></a>
					          <ul class="nav nav-second-level">
						      <li >
                              <a ><i class="fa fa-user-plus fa-2x"></i> Add Accout<span class="fa arrow"></a>
						               <ul class="nav nav-third-level">
									   <li>
									   <a <?if($_GET[page]=="add_pppoe"){ echo "class='active-menu'";}?> href="index.php?page=add_pppoe"><i class="fa fa-user fa-1x"></i> Add PPPOE Manual </a>
									   </li>
                                       <li>
									   <a <?if($_GET[page]=="gen_pppoe"){ echo "class='active-menu'";}?> href="index.php?page=gen_pppoe"><i class="fa fa-users fa-1x"></i> Gen PPPOE</a>
									   </li>
							           </ul>
						     </li>
						     <li>
						     <a <?if($_GET[page]=="add_pppoe_profile"){ echo "class='active-menu'";}?> href="index.php?page=add_pppoe_profile"><i class="fa fa-folder-o fa-2x"></i> Add Profile </a>
						     </li>
						     <li >
                             <a ><i class="fa fa-file fa-2x"></i> PPPOE User List<span class="fa arrow"></a>
                                       <ul class="nav nav-third-level">
									   <li>
									   <a <?if($_GET[page]=="pppoe_dtb_user"){ echo "class='active-menu'";}?> href="index.php?page=pppoe_dtb_user"><i class="fa fa-gear fa-1x"></i>  PPPOE Databases User </a>
									   </li>
                                       <li>
									   <a <?if($_GET[page]=="pppoe_mik_user"){ echo "class='active-menu'";}?> href="index.php?page=pppoe_mik_user"><i class="fa fa-gear fa-1x"></i> PPPOE Mikrotik User</a>
									   </li>
							           </ul>
						     </li>
						     </li>
						     <li>
						    <a <?if($_GET[page]=="pppoe_profile_list"){ echo "class='active-menu'";}?> href="index.php?page=pppoe_profile_list"><i class="fa fa-bar-chart-o fa-2x"></i> PPPOE Profile List </a>
						     </li>
							 <li>
						     <a <?if($_GET[page]=="pppoe_online"){ echo "class='active-menu'";}?> href="index.php?page=pppoe_online"><i class="fa fa-flash fa-2x"></i> PPPOE Online </a>
						     </li>
						     </ul>
				   </li>
				   <li>
                   <a <?if($_GET[page]=="menu"){ echo "class='active-menu'";}?> href="index.php?page=menu"><i class="fa fa-desktop fa-3x"></i> Monitor Adaptor</a>
                   </li>
                   <li  >
                   <a href="../admin/index.php?page=server"><i class="fa fa-edit fa-3x"></i> Router OS Config </a>
                   </li>				
				   <li>
                   <a href="#"><i class="fa fa-sitemap fa-3x"></i> Upload<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                           <li>
                            <a <?if($_GET[page]=="Import_Exel"){ echo "fa arrow";}?> href="index.php?page=Import_Exel">CSV & Excel</a>
                            </li>
                            <li>
                            <a <?if($_GET[page]=="upload_csv"){ echo "fa arrow";}?> href="index.php?page=upload_csv">CSV & Excel Fro Print</a>
                            </li>
                            <li>
                            <a href="#">empty<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                      <li>
                                      <a href="#">Third Level Link</a>
                                      </li>
                                       <li>
                                       <a href="#">Third Level Link</a>
                                      </li>
                                       <li>
                                       <a href="#">Third Level Link</a>
                                       </li>
                                      </ul>
                              </li>
                             </ul>
                     </li>  
                     <li  >
                     <a  href="#"><i class="fa fa-credit-card fa-3x"></i> Card & Template</a>
                     </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

<?
// zone add[from]
if($_GET[page]=="genuser"){include("gen_user.php");}
else if($_GET[page]=="manuser"){include("adduser.php");}
else if($_GET[page]=="add_profile"){include("add_profile.php");}
else if($_GET[page]=="add_macprofile"){include("add_macprofile.php");}
else if($_GET[page]=="upload_csv"){include("../csv/upload_csv.php");}
else if($_GET[page]=="Import_Exel"){include("Import_Exel.php");}
else if($_GET[page]=="add_pppoe"){include("pppoe/add_pppoe.php");}
else if($_GET[page]=="gen_pppoe"){include("pppoe/gen_pppoe.php");}
else if($_GET[page]=="add_pppoe_profile"){include("pppoe/add_pppoe_profile.php");}




// zone list
else if($_GET[page]=="listuser"){include("listuser.php");}
else if($_GET[page]=="mikrotikuser"){include("mikrotikuser.php");}
//else if($_GET[page]=="server"){include("listserver.php");}
else if($_GET[page]=="user"){include("user.php");}
else if($_GET[page]=="profilelist"){include("profile_list.php");}
else if($_GET[page]=="profileall"){include("profileall.php");}
else if($_GET[page]=="useronline"){include("useronline.php");}
else if($_GET[page]=="user_online"){include("user_online.php");}
else if($_GET[page]=="interface"){include("interface.php");}
else if($_GET[page]=="dhcp"){include("dhcp.php");}
else if($_GET[page]=="mikrotik_user"){include("mikrotikuserall.php");}
else if($_GET[page]=="Access_Points_online"){include("ap_online.php");}
else if($_GET[page]=="pppoe_dtb_user"){include("pppoe/pppoe_dtb_user.php");}
else if($_GET[page]=="pppoe_user"){include("pppoe/pppoe_user.php");}
else if($_GET[page]=="pppoe_mik_user"){include("pppoe/pppoe_mikrotikuser.php");}
else if($_GET[page]=="pppoe_profile_list"){include("pppoe/pppoe_profile_list.php");}
else if($_GET[page]=="pppoe_online"){include("pppoe/pppoe_online.php");}





// zone add[process]
else if($_GET[page]=="con_adduser_process"){include("../process/con_adduser.php");}
else if($_GET[page]=="con_genuser_process"){include("../process/con_genuser.php");}
else if($_GET[page]=="con_editprofile_process"){include("../process/con_editprofile.php");}
else if($_GET[page]=="con_addprofile_process"){include("../process/con_addprofile.php");}
else if($_GET[page]=="con_addmacprofile_process"){include("../process/con_addmacprofile.php");}
else if($_GET[page]=="con_addpppoe_process"){include("../process/con_addpppoe.php");}
else if($_GET[page]=="con_genuser_pppoe_process"){include("../process/con_genuser_pppoe.php");}
else if($_GET[page]=="con_addpppoe_profile_process"){include("../process/con_addpppoe_profile.php");}
else if($_GET[page]=="con_editpppoe_profile_process"){include("../process/con_editpppoe_profile.php");}
//else if($_GET[page]=="useronline_kick"){include("useronline_kick.php");}


// zone edit 
//else if($_GET[page]=="editserver"){include("edit_serv.php");}
else if($_GET[page]=="edituser"){include("edit_user.php");}
else if($_GET[page]=="editmikrotikuser"){include("edit_mikrotikuser.php");}
else if($_GET[page]=="editprofile"){include("edit_profile.php");}
else if($_GET[page]=="pppoe_edituser"){include("pppoe/pppoe_edit_user.php");}
else if($_GET[page]=="edit_pppoe_mik_user"){include("pppoe/edit_pppoe_mikrotikuser.php");}
else if($_GET[page]=="pppoe_edit_profile"){include("pppoe/pppoe_edit_profile.php");}


// zone delete
//else if($_GET[page]=="deleteuser"){include("../process/delete_user_ok.php");}
else if($_GET[page]=="user_del"){include("../process/user_del.php");}
else if($_GET[page]=="mikrotikuser_del"){include("../process/mikrotikuser_del.php");}
else if($_GET[page]=="pppoe_user_del"){include("../process/pppoe_user_del.php");}
else if($_GET[page]=="pppoe_mik_user_del"){include("../process/pppoe_mikrotikuser_del.php");}

// default not value get page or welcome login
else{include("dashboard.php");}
?><!-- end last else -->	 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/action.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
	<!-- jQuery Version 1.11.0 -->
    <script src="../assets/js/jquery-1.11.0.js"></script>
	

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/js/plugins/metisMenu/metisMenu.min.js"></script>

	 <!-- DataTables JavaScript -->
    <script src="../assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	
	<!-- Custom Theme JavaScript -->
    <script src="../assets/js/sb-admin-2.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>   

</body>
</html>
