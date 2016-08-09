<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');	
			$profile=$_GET[name];		
			$Profile = $API->comm("/ip/hotspot/user/profile/print", array(
									"from" => $profile,
								));													
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div class="col-xs-12 col-md-5" style="margin:0 auto;">

		<!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-black">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" ><span style="padding: 0px 0px 0px 1em;
                         font-size: 16px;"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Edit Hotspot Profile</h3></span>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form name="login" action="index.php?page=con_editprofile_process" method="post">
					 <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Profile Name</span></label>
                                    <input name="name" type="text" placeholder="Profile Name"  class="form-control" value="<?php echo $Profile['0']['name'];?>" required >
									<input type="hidden" name="profile" value="<?php echo $_GET['name'];?>">
                              </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="couponCode"><label for="cardExpiry"><span class="hidden-xs style1">Session Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลาเชื่อมต่อสูงสุด"></label>
                                    <input name="session" type="text" placeholder="Ex.04:00:00" class="form-control" value="<?php echo $Profile['0']['session-timeout'];?>" >
                               </div>                            
                            </div>
                        <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="couponCode"><label for="cardExpiry"><span class="hidden-xs style1">Idle Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลา logout userออกจากระบบถ้าไม่ได้ใช้งาน"></label>
                                    <input name="idle" type="text"  placeholder="Ex.00:02:00"  class="form-control" value="<?php echo $Profile['0']['idle-timeout'];?>" >
                               </div>
							   </div>
                        </div>
						<div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="couponCode"><label for="cardExpiry"><span class="hidden-xs style1">Keepalive Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลา logout userออกจากระบบถ้าไม่ได้เชื่อมต่อ"></label>
                                    <input name="keep" type="text"  placeholder="Ex.00:02:00"  class="form-control" value="<?php echo $Profile['0']['keepalive-timeout'];?>" >
                               </div>
                            </div>
							<div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">Status Autorefresh</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="ตั้งเวลาอัพเดทสถานะ ของ user"></label>
                                   <input name="auto" type="text" placeholder="Ex.00:01:00"  class="form-control" value="<?php echo $Profile['0']['status-autorefresh'];?>" >  
								 </div>	
                                </div>
                            </div>
							<div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardCVC"><span class="style1">Shared Users</span><img src="../img/help.png" width="16" height="16"  class="no2" data-toggle="tooltip" data-placement="right" title="กำหนดจำนวนเครื่องที่สามารถใช้พร้อมกันได้ ต่อ 1user"></label>
                                    <input name="use" type="text"  placeholder="Ex.1"  class="form-control"  value="<?php echo $Profile['0']['shared-users'];?>" >  
								</div>
							   </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><label for="cardExpiry"><span class="hidden-xs style1">Rate Limit (rx/tx)</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดค่าความเร็วอินเตอร์เน็ต ของแพ็คเกจ Ex.512K/5M"></label>
                                    <input name="limit" type="text"  placeholder="upload/download" class="form-control" value="<?php echo $Profile['0']['rate-limit'];?>" >
                               </div>
                            </div>                        
                        </div>
                        <center><div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>        <button id="btnCancel" class="btn btn-danger" type="reset"  Onclick="javascript:history.back()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i>&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->   
		<?
		mysql_close();
		 $API->disconnect();
?>


 <div class="col-xs-12 col-md-7" style="font-size: 12pt; line-height: 2em;">
            <p><h1 class="style2">&nbsp;&nbsp;&nbsp;&nbsp;ข้อแนะนำการใช้งาน :</h1>
                <ul>
                  <li>การแก้ไข หรือปรับปรุง อาจจะทำให้ระบบการลบ user ไม่ทำงาน ...เเนะนำให้สร้างใหม่ </li>
                  <li>ตัวเลือก ที่ไม่กำหนดจะเป็นค่า default .</li>
                </ul>
            <!-- <p>Built upon: Bootstrap, jQuery, 
                <a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
                <a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
                and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
            </p> -->
</div>