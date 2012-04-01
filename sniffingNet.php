<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ListenNet</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
<center>
  <table width="600" border="1" cellspacing="0">

<?php
	$mysqli = new mysqli("localhost","root","","listenet");
	
	$mysqli->query("SET CHARACTER SET utf8");
	$mysqli->query("SET collation_connection = 'utf8_chinese_ci'");

	$result = $mysqli->query("select * from message order by id desc");
	
	$total_records=mysqli_num_rows($result);//取得執行結果總筆數
	$page_num = ceil($total_records/15);
	mysqli_data_seek($result, (($_GET['page']-1)*15)); //將記錄指標移至第n筆 (n為整數，第一筆為0)
	
	for($i=0;$i<15;$i++){
		if($row = $result->fetch_array()){
			echo "";
?>
	<tr><td width="200" align="center">
    <?=$row['time']?></td>
    <td><?=$row['message']?>

<?
			echo "</td></tr>";
		}
	}
	echo "<tr><td align=center colspan=2>";
	for($i=0;$i<$page_num;$i++){
		echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".($i+1)."\" >".($i+1)." "."</a>";
	}
	echo "</td></tr>";
	$mysqli->close();
?>
</table>
</center>
</form>
</body>
</html>