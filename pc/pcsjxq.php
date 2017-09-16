<?php
header("Content-Type: text/html;charset=utf-8"); 
$sid=$_POST['sid'];
include('../inc.php');
$sql="select * from dy_sj where sid='$sid' ";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result))
{
    echo "cc".$rows['name']."dd";
    echo "cc".$rows['phone']."dd";
    echo "cc".$rows['adr']."dd";
    if($rows['zx']==1){echo "cc接单，".$rows['time']."dd";}else{echo "cc不接单,".$rows['time']."dd";} 
}

?>