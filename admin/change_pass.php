<?php	
	if(!empty($_REQUEST['old'])){
		$id=$_SESSION['APIID'];
		$old=md5($_REQUEST['old']);
		$new=md5($_REQUEST['new']);
		$con=md5($_REQUEST['con']);		
		$sql=mysql_query("SELECT am_pass FROM am WHERE am_pass='".$old."'");
		$num=mysql_num_rows($sql);		
		if($num==0){
			echo "<script language='javascript'>alert('Bad Old Password.')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else if($new!=$con){
			echo "<script language='javascript'>alert('Password Not Match')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else{
			mysql_query("UPDATE am SET am_pass='".$new."' WHERE am_id='".$id."'");
			echo "<script language='javascript'>alert('Save Done')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
			exit(0);
		}
	}									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div id="login-overlay" class="modal-dialog" width="100%">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"onclick="window.location='index.php?page=server'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Change Password</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-7">
                      <div class="well">
					  
                          <form id="change_pass" method="POST" action="" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Old Password </label>
                                  <input type="password" class="form-control"  name="old"  placeholder="Please enter you old password"  required>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">New Password </label>
                                  <input type="password" class="form-control"  name="new"  placeholder="Please enter you new password"  required>
                                  <span class="help-block"></span>
                              </div>
							   <div class="form-group">
                                  <label for="username" class="control-label">Confirm New Password </label>
                                  <input type="password" class="form-control"  name="con"  placeholder="Please enter Confirm password"  required>
                                  <span class="help-block"></span>
                              </div>                                          
                                        
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
                                    </div> 
                                    </form>
		                        </div>		                        
                        </div>
                        
                    </div>
           </section>
            </div>
			
			<script src="../dist/js/demo.js"></script>
			<script src="../dist/js/app.min.js"></script>
</body>
</html>

                                