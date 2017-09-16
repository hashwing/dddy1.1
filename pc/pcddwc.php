<?php
header("Content-Type: text/html;charset=utf-8"); 
include('../inc.php');
if(!empty($_POST['wid']))
{
$wid=$_POST['wid'];
$sql="UPDATE dy_wj SET zt='1' WHERE wid='$wid'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                } 
}
if(!empty($_POST['ddh']))
{
$ddh=$_POST['ddh'];
$sql="UPDATE dy_dd SET zt='1' WHERE ddh='$ddh'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                } 
}
?>