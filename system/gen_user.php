<?php
            include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
			$ARRAY1 = $API->comm("/ip/hotspot/print");
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #990000}
-->
</style>
</head>
<body>
<div class="col-xs-12 col-md-5" style="margin:0 auto;">

		<!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-black">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td "><span style="padding: 0px 0px 0px 1em;
                        font-size: 16px;"><i class="fa fa-users"></i>&nbsp;&nbsp;Gen user - สร้างบัตรอินเตอร์เน็ต</h3></span>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form name="login" action="index.php?page=con_genuser_process" method="post">
					 <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for=""><span class="style1">เลือก Servers</span></label>
                                    <div class="input-group">
                                        <select name="server"  id="server" class="form-control" >
					      <option value="">all</option>
						   <?php
													$num =count($ARRAY1);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY1[$i]['name'].$selected.'">'.$ARRAY1[$i]['name'].'</option>';
													}
												?>						 
							</select>
                                        <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber"><span class="style1">เลือก Package</span></label>
                                    <div class="input-group">
                                        <select name="package_id"  id="package_id" class="form-control" required>
					      <option value="">ต้องเลือก Packege</option>
						   <?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
												?>						 
							</select>
                                        <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber"><span class="style1">เลือกจำนวนวันที่ใช้งาน</span></label>
                                    <div class="input-group">
                                        <input name="limit_uptime"  id="limit_uptime" placeholder="Ex. 1d or 1h" class="form-control" >
						         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber"><span class="style1">Pattern Charactors</span></label>
                                    <div class="input-group">
                                       <select name="str_char"  id="str_char" class="form-control">
					                <option value="abcdefghijklmnpqrstuvwxyz">a-z</option>
									<option value="ABCDEFGHIJKLMNPQRSTUVWXYZ">A-Z</option>
									<option value="123456789">1-9</option>
									<option value="ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz">a-z,A-Z</option>
									<option value="abcdefghijkmnpqrstuvwxyz123456789">a-z,1-9</option>
									<option value="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789">A-Z,1-9</option>
									<option value="ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789">a-z,A-Z,1-9</option>
  		                            </select>
                                        <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">Prefix User</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="Ex. wifishop@  Gen ออกมาจะได้ wifishop@userบัตร"></label>
                                   <input name="fix_user" type="text" placeholder="นำหน้า user"  value="" maxlength="5" class="form-control">  
									
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC"><span class="style1">Prefix Password</span>&nbsp;<img src="../img/help.png" width="16" height="16"  class="no2" data-toggle="tooltip" data-placement="right" title="Ex. pass@ Gen ออกมาจะได้ pass@PassWordบัตร"></label>
                                    <input name="fix_pass" type="text"  placeholder="นำหน้า  password" value="" maxlength="5" class="form-control">  
									
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Username length</span></label>
                                    <select name="num_user" class="form-control">
									<option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6" selected="selected">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                               </div>
                            </div>                        
                        <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Password length</span></label>
                                    <select name="num_pass"  class="form-control">
									<option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6" selected="selected">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                </div>
                            </div>                        
                        </div>
						 <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Number of users</span></label>
                                    <input name="max_user" type="text"  placeholder="จำนวนuserที่ต้องการสร้าง" value="10" maxlength="3" required class="form-control">
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Generate Card</button>
                            </div>
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
            <p><h1 class="style2">ข้อแนะนำการใช้งาน :</h1>
               <ul>
                   <li>เลือก Server,Package, และรูปแบบตัวอักษร</li>
                   <li>เลือกจำนวนวันใช้งานตามจำนวนของแพ็คเก็จที่สร้าง เช่น &lt;แพ็คเกจภายใน 1 วันให้ใช้ได้ 4ชม.&gt;ให้กำหนดเป็น 4h (ถ้าเป็นเเพ็คเก็จ แชร์ userมากกว่า1 ไม่ต้องกำหนด) </li>
                   <li>รูปแบบตัวอักษรจะตัดตัว o(โอ) ออกไป เพือความง่ายต่อการกรอกระหว่าง 0(ศูนย์) กับ o(โอ)</li>
                 <li>Prefix user & password ใส่ได้ 5 ตัว เช่น  <u>wifi@</u>xxxxxxxx</li>
                 <li>length เป็นจำนวนหลักที่สร้างใบ เช่น ใส่ไป 9 จะได้ username ที่สร้าง 9 ตัวรวม prefix</li>
                 <li>การสร้าง user จำนวน 100 จะใช้เวลาประมาณ 30วินาที-1นาที
                    <!-- <p>Built upon: Bootstrap, jQuery, 
                <a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
                <a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
                and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
            </p> -->
</li>
               </ul>
</div>
