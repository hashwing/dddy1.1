<?php
include('inc.php');
$count= json_decode($_POST['wid'],true);
if(count($count)!=0)
{
    echo"<table><tr><td>文件名</td></tr>";
}
for($i=0;$i<count($count);$i++)
{
    $wid=$count[$i];
    $sql="select *from dy_wj where wid='$wid'";
    $result=mysql_query($sql);
    
    if($rows=mysql_fetch_array($result))
    {
        if($rows['dsm']==1)
        {
            $dsm="单面";
             
        }
        else {
            $dsm="双面";
    
        }
        echo "<tr><td width='80%'>".$rows['wjm']."</td><td><a href='#' onclick='clear1(\"".$wid."\")'>删除</a></td></tr>";
    
    }
   
}
if(count($count)!=0)
{
    echo"</table>";
}
