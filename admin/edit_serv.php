<?php	
	if(!empty($_REQUEST['ip'])){
		mysql_query("UPDATE mt_config SET mt_ip='".$_REQUEST['ip']."', mt_user='".$_REQUEST['username']."', mt_pass='".$_REQUEST['password']."', port_api='".$_REQUEST['portapi']."', port_web='".$_REQUEST['portweb']."' WHERE mt_id='".$_GET['id']."'");
		echo "<script language='javascript'>alert('Save Done')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
		exit(0);
	}									   								
?>
 <div id="login-overlay" class="modal-dialog" width="100%">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Mikrotik Deviced</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-7">
                      <div class="well">
					  <?php
										$sql=mysql_query("SELECT * FROM mt_config WHERE mt_id='".$_GET['id']."'");
										$result=mysql_fetch_array($sql);
									?>
                          <form id="loginForm" method="POST" action="" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">IP Address / DNS </label>
                                  <input type="text" class="form-control" id="ip" name="ip" required title="Please enter you IP/DNS" placeholder="xxx.sn.mynetname.net" value="<?=$result[mt_ip]?>">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" required title="Please enter your username" value="<?=$result[mt_user]?>">
                                  <span class="help-block"></span>
                              </div>
							   <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" required title="Please enter your password" value="<?=$result[mt_pass]?>">
                                  <span class="help-block"></span>
                              </div>
                                <div class="form-group">
                                  <label for="password" class="control-label">Port API</label>
                                  <input type="text" class="form-control" id="portapi" name="portapi" required title="Please enter your port-api" value="<?=$result[port_api]?>">
                                  <span class="help-block"></span>
                              </div>
							   <div class="form-group">
                                  <label for="password" class="control-label">Port Web Config</label>
                                  <input type="text" class="form-control" id="portweb" name="portweb" required title="Please enter your port-web" value="<?=$result[port_web]?>">
                                  <span class="help-block"></span>
                              </div>
                              <button type="button" class="btn btn-success btn-block test-btn">ทดสอบเชื่อมต่อ</button>
                        
                     
                      </div>
                  </div>
                  <div class="col-xs-5">
                      <p class="lead">Test Connection </p>
						<div class="test-connect"><div>
				  
              </div>
          </div>
		  <input type="hidden" value="<?=$result[mt_id]?>" name="hide_id">
		  <input type="submit" class="btn btn-info btn-block add-server" value="บันทึกการแก้ไข">
		  <input type="button" class="btn btn-danger btn-block add-server" value="ยกเลิกและย้อนกลับ" onclick="window.location='index.php?page=server'">
      </div>
	   </form>
  </div>
 