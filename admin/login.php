<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description 
 *
 * @author xeleniumz
 * 
 */
 include "../include/class.mysqldb.php";
 include "../include/config.inc.php";
 unset($_SESSION['EmpUser']);
 if(isset($_REQUEST['am_user'])){
	 $user = $_REQUEST['am_user'];
	 $pass = md5($_REQUEST['am_pass']);
	 $conn = new mysqldb();
	 $sql="SELECT * FROM am where am_user = '".$user."' and am_pass='".$pass."'";
	 $query = $conn ->query($sql);
	 $data = $conn->fetch($query);
	 
	 if($conn->num_rows()==0){
		 echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
	 }else{
		unset($_SESSION['EmpUser']);
		$_SESSION['APIUser']=$data->am_user;
		$_SESSION['APIID']=$data->am_id;
		echo "<meta http-equiv='refresh' content='0;url=index.php' />";
		exit(0);
	 }
 }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API Mikrotik </title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<style>
@charset "UTF-8";
/* CSS Document */

body {
    width:100px;
	height:100px;
  background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
  background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
  background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
  background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
  background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
font-family: 'Raleway', sans-serif;
}

p {
	color:#CCC;
}

.spacing {
	padding-top:7px;
	padding-bottom:7px;
}
.middlePage {
	width: 680px;
    height: 500px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.logo {
	color:#CCC;
}
</style>
<div class="middlePage">
<div class="page-header">
  <h2 class="logo">ยินดีต้อนรับเข้าสู่ระบบจัดการ Mikrotik </h2>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">กรุณาเข้าสู่ระบบ</h3>
  </div>
  <div class="panel-body">
  
  <div class="row">
  
<div class="col-md-5" >
<a href="https://www.facebook.com/eokhakjak.das"><img src="../images/fb.png" width="250" height="100"></a><br/>
<a href="https://plus.google.com/u/0/104582565949323396070/posts"><img src="../images/gplus.png" width="250" height="100"></a>
</div>

    <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
<form class="form-horizontal" action="" method="post" name="login">
<fieldset>
  <input id="textinput" name="am_user" type="text" placeholder="USERNAME" class="form-control input-md" required >
  <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> จดจำฉัน</small></div>
  <input id="textinput" name="am_pass" type="password" placeholder="PASSWORD" class="form-control input-md" required >
  <div class="spacing"><a href="#"><small> ลืมรหัสผ่าน ?</small></a><br/></div>
  <input id="singlebutton" type="submit" name="singlebutton" class="btn btn-info btn-sm pull-right" value="เข้าสู่ระบบ">


</fieldset>
</form>
</div>
    
</div>
    
</div>
</div>

<p>จัดทำโดย <a> Bronze Ng และทีมงาน api_mikrotik </a> Free Open Source API Mikrotik </p>

</div>
</body>
</html>

