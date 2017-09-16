<?php
$sid=$_POST['dyadr'];
include 'inc.php';
$sql="select *from dy_sj where sid='$sid'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    echo $rows['time']."<b>[电话：".$rows['phone']."]</b>";
}

