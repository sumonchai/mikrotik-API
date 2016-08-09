<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');																																			
			$ARRAY = $API->comm("/ip/pool/print");
				
			
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
                        <h3 class="panel-title display-td" ><span style="padding: 0px 0px 0px 1em;
                         font-size: 16px;"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;สร้าง PPPOE Profile</h3></span>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form name="pppoe" action="index.php?page=con_addpppoe_profile_process" method="post">
					 <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Profile Name</span></label>
                                    <input name="name" type="text" placeholder="Profile Name"  class="form-control" required >
                                </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Local Address</span></label>
                                    <input name="local" type="text" placeholder="กำหนดไอพี หรือไอพี pool Exe.10.0.0.1 ,pool1"  class="form-control" required >
                                </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber"><span class="style1">Remote Address</span></label>
                                    <div class="input-group">
                                        <select name="remote"  id="remote" class="form-control" required>
					      <option value="">ต้องเลือก กลุ่มไอพีที่ให้บริการ</option>
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
                                    <label for="couponCode"><span class="style1">Session Timeout</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดเวลา เชื่อมต่อสูงสุด"></label>
                                    <input name="session" type="text" placeholder="Exe.04:00:00" class="form-control" >
                               </div>
                            </div>
							</div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode"><span class="style1">Rate Limit (rx/tx)</span> <img src="../img/help.png" width="16" height="16"  class="no1" data-toggle="tooltip" data-placement="right" title="กำหนดค่าความเร็วอินเตอร์เน็ต ของแพ็คเกจ Ex.512K/5M"></label>
                                    <input name="limit" type="text"  placeholder="upload/download" class="form-control"  >
                               </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit">SAVE</button>
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
            <p><h1 class="style2">&nbsp;&nbsp;&nbsp;ข้อแนะนำการใช้งาน :</h1>
                <ul>
                    <li><strong>Local Address </strong>ให้กำหนดไอพี server หรือกำหนดไอพี pool</li>
                    <li><strong>Remote Address </strong>ให้กำหนดกลุ่มไอพี pool ที่จะให้ user ใช้งาน </li>
                </ul>
            <!-- <p>Built upon: Bootstrap, jQuery, 
                <a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
                <a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
                and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
            </p> -->
</div>