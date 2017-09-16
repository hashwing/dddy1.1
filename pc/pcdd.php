1<?php
header("Content-Type: text/html;charset=utf-8"); 
$sid=$_POST['sid'];
$zt=$_POST['zt'];
include('../inc.php');
$sql="select * from dy_dd where sid='$sid' and zt='$zt' and zs='0'  and (zf='1' or zf='2')";
$result=mysql_query($sql);
$xh=1;
while($rows=mysql_fetch_array($result))
{
    echo "aaacc".$xh."dd";
    echo "cc".$rows['ddh']."dd";
    echo "cc".$rows['phone']."dd";
    echo "cc".iconv("UTF-8","GB2312",$rows['adr'])."dd"; 
    echo "cc".$rows['price']."dd";
    if($rows['sh']==1){echo "cc送货dd";}else{echo "cc自提dd";} 
    if($rows['zf']==1)echo "cc已付款ddbbb";else echo "cc未付款ddbbb";
    $xh++;
}

?>