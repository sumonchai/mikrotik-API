<?php
include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
$ARRAY1 = $API->comm("/ip/hotspot/print");
$ARRAY = $API->comm("/ip/hotspot/user/profile/print");
?>
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #990000; }
-->
</style>

<div class="col-xs-12 col-md-5" style="margin:0 auto;">

		<!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-black">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" ><span style="padding: 0px 0px 0px 1em;
font-size: 16px;"><i class="fa fa-user"></i>&nbsp;&nbsp;Add user - สร้างยูสเซอร์  </h3></span>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form name="login" action="index.php?page=con_adduser_process" method="post">
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
					      <option value="">ต้องเลือก Package</option>
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
                                        <input name="limit_uptime"  id="limit_uptime" placeholder="Ex.1d or 1h" class="form-control" >
						         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">Username</span></label>
                                   <input name="user" type="text" placeholder="Username" class="form-control" required>  
									
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardCVC"><span class="style1">Password</span></label>
                                    <input name="pass" type="text" placeholder="Password" class="form-control" required>  
									
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">เจาะจง IP Address</span></label>
                                   <input name="ip" type="text" placeholder="Ex.172.0.0.3"  class="form-control">  
									
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="cardCVC"><span class="style1">เจาะจง MAC Address</span></label>
                                    <input name="mac" type="text" placeholder="Ex.1A:2A:3A:4A:5A:6A"  class="form-control">  
									
                                </div>
                            </div>
                        </div>
							<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">E-mail</span></label>
                                   <input name="email" type="email" placeholder="Ex.123@hotmail.com"  class="form-control">  
							  </div>
                                </div>
                            </div>
							<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs style1">Comment - เพิ่มเติม</span></label>
                                   <input name="comments" type="text" class="form-control">  
							  </div>
                                </div>
                            </div>
            
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit">สร้างยูสเซอร์นี้</button>
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
		// $API->disconnect();
?>


 <div class="col-xs-12 col-md-7" style="font-size: 12pt; line-height: 2em;">
            <p><h1 class="style2">&nbsp;&nbsp;ข้อแนะนำการใช้งาน :</h1>
                <ul>
                    <li>เลือก Server , Package, และ จำนวนวันที่ใช้งาน</li>
                    <li>จำนวนวันใช้งานหรือ Limit-uptime จะกำหนด ชั่วโมงการใช้งานเช่น Profile 1วันกำหนดให้ใช้ได้ 4ชม.ให้กำหนดไว้ที่ 4h ถ้าแชร์ userไม่ต้องกำหนด </li>
                    <li>ตัวอย่าง การเจาะจง IP Address > <strong>192.168.1.20</strong></li>
                    <li>ตัวอย่าง การเจาะจง MAC Address > <strong>00:FD:AE:98:65:AA</strong></li>
                   
                    <li>ตัวเลือก ที่ไม่กำหนดจะเป็นค่า default .</li>
                </ul>
            </p>
     
            
            <!-- <p>Built upon: Bootstrap, jQuery, 
                <a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
                <a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
                and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
            </p> -->
</div>