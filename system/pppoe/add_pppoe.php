<?php
include_once('../config/routeros_api.class.php');			
			include_once('../include/conn.php');
$ARRAY = $API->comm("/ppp/profile/print");
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
font-size: 16px;"><i class="fa fa-user"></i>&nbsp;&nbsp;Add PPPOE User - สร้างยูสเซอร์</span></h3></span>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form id="add_pppoe" action="index.php?page=con_addpppoe_process" method="post">
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
                                    <label for="cardNumber"><span class="style1">Username</span></label>
                                    <div class="input-group">
                                        <input name="user"  id="user" placeholder="( Username )" class="form-control"  required>
						         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
						<div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber"><span class="style1">Password</span></label>
                                    <div class="input-group">
                                        <input name="pass"  id="pass" placeholder="( Password )" class="form-control"  required>
						         <span class="input-group-addon"><i class="fa fa-help"></i></span>
                                    </div>
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
            