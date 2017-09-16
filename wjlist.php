<?php
include('inc.php');
$count= json_decode($_POST['wid'],true);
if(count($count)!=0)
{
    echo"<table width='900'><tr><td>文件名</td><td>单双面</td><td>一页几版</td><td>打印范围</td><td>页数</td><td>份数</td></tr>";
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
        echo "<tr><td>".$rows['wjm']."</td><td>".$dsm."</td><td>".$rows['jb']."</td><td>".$rows['sys']."-".$rows['mys']."</td><td>".($rows['mys']-$rows['sys']+1)."</td><td>".$rows['fs']."</td><td><a href='#' onclick='clear1(\"".$wid."\")'>删除</a></td></tr>";
    
    }
   
}
if(count($count)!=0)
{
    echo"</table>";
}
