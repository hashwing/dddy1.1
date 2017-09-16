<?php
$user=$_POST['user'];
$psw=$_POST['psw'];
//echo $user;
include('../inc.php');
$sql="select * from dy_sj where user='$user' and pwd='$psw'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if($row)
{
    echo "s1ss".$row['sid']."s";
}
else{
    echo "s0s";
}

?>