<?php
include('inc.php');
$wid=$_POST['swid'];
$sql="select * from dy_wj where wid='$wid'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$aimUrl="../".$rows['url'];
echo  $rows['wjm'];
function unlinkFile($aimUrl) {
    if (file_exists($aimUrl)) {
        unlink($aimUrl);
        return true;
    } else {
        return false;
    }
}
if(mysql_query("DELETE FROM dy_wj WHERE wid='$wid'"))
{
    if(unlinkFile($aimUrl))
    {
        echo "删除成功";
    }
    else{
        echo "删除失败";
    }

}
else{
    echo "删除失败";
}

?>