1<?php
header("Content-Type: text/html;charset=utf-8"); 
$wid=$_POST['wid'];
include('../inc.php');
$sql="select * from dy_wj where wid='$wid' ";
$result=mysql_query($sql);
$xh=1;
while($rows=mysql_fetch_array($result))
{
	echo "sturl".$rows['url']."endurl";
}

?>