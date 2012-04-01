<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>store</title>
</head>

<body>
<?php
	$mysqli = new mysqli('localhost','root','','listenet');
	$mysqli->query("SET CHARACTER SET utf8");
	$mysqli->query("SET collation_connection = 'utf8_chinese_ci'");
	
	$sql = "INSERT INTO message(  `time` ,  `message`  ) values ('".$_GET['time']."','".$_GET['message']."')";
	
	$mysqli->query($sql);
	
?>
</body>
</html>