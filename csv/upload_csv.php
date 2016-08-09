<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Upload CSV</title> 
</head>
<html>
<body>
<form action="../csv/process.php" name="fcsv" method="post" enctype="multipart/form-data">
แพ็คเกจ <input type="text" name="package"><br>
เลือกไฟล์ CSV <input type="file" name="csv" href="javascript:popup('../system/index.php?page=dhcp','',500,500)"><br>
<input type="submit" value="ตกลง">
</form>
</body>
</html>