<?php
header("Content-Type: text/html;charset=utf-8"); 
$ddh=$_POST['ddh'];
$zt=$_POST['zt'];
include('../inc.php');
$sql="select * from dy_wj where ddh='$ddh' and zt='$zt' ";
$result=mysql_query($sql);
$xh=1;
while($rows=mysql_fetch_array($result))
{
    echo "aaacc".$xh."dd";
    echo "cc".iconv("UTF-8","GB2312",$rows['wid'])."dd";
    echo "cc".$rows['dsm']."dd";
	echo "cc".$rows['jb']."dd";
    echo "cc".$rows['sys']."-".$rows['mys']."dd"; 
    echo "cc".$rows['fs']."ddbbb";
	//echo "sturl".$rows['url']."endurl";
    $xh++;
}

?>