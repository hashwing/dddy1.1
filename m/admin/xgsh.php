<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user'])){
    echo 0;
    exit();
}
header("Content-Type: text/html; charset=utf-8");
$sid=$_SESSION['sid']; 
$zx=$_POST['zx'];
$zdy=$_POST['zdy'];
$time=$_POST['time'];
echo $time;
if($zdy==1)
{
    $time="在打印机旁，随时可以上门自提，".$time."后开始统一送";
}
else{
    $time="不在打印机旁，".$time."后上门自提或统一送";
}
include('../inc.php');
$sql="UPDATE dy_sj SET zx='$zx',time='$time' WHERE sid='$sid'";
            if(mysql_query($sql))
            {
                echo "<script language=\"JavaScript\">alert(\"修改成功\");</script>";
   echo '<script>location.href="index.php"</script>';      
            }
            else{
                   echo "<script language=\"JavaScript\">alert(\"修改失败\");</script>";
   echo '<script>location.href="index.php"</script>';
                } 

?>