<?php
date_default_timezone_set('PRC');
function trade_no() {
    list($usec, $sec) = explode(" ", microtime());
    $usec = substr(str_replace('0.', '', $usec), 0 ,4);
    $str  = rand(10,99);
    return date("YmdHis").$usec.$str;
}
$dsm=$_POST['dsm'];
$jb=$_POST['jb'];
$fs=$_POST['fs'];
$ys=$_POST['mys']-$_POST['sys']+1;
$sys=$_POST['sys'];
$mys=$_POST['mys'];
$url=$_POST['doc'];
$wjm=$_POST['ofilename'];
$wid=trade_no();
include 'inc.php';
$sql="INSERT INTO dy_wj (wid,dsm,jb,ys,fs,sys,mys,wjm,url,zt) VALUES ('$wid', '$dsm', '$jb','$ys','$fs','$sys','$mys','$wjm','$url','0')";
if(mysql_query($sql))
{
    
        echo $wid;
}
else {
    echo 0;
}
    