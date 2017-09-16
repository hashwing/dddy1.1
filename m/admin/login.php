<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
#接受提交过来的用户名及密码
$username = trim($_POST['user']); //用户名
$password = trim($_POST['pwd']); //密码
//$imgcode = strtolower($_POST['imgcode']);//接受从登陆输入框提交过来的验证码并转化为小写；
//$myimagecode  = strtolower($_SESSION['verfyCode']) ;//从session中取得验证码并转化为小写；
//if($imgcode!=$myimagecode){
//echo "<script language=\"JavaScript\">alert(\"请输入正确的验证码\");</script>";
// echo '<script>location.href="login.php"</script>';
// exit;
//}
#拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
include "../inc.php";
$sql = "select *from dy_sj where user = '$username'and pwd='$password' ";
$result = mysql_query($sql);
$rows = mysql_fetch_assoc($result);
if ($rows) {
    $_SESSION['sid'] = $rows['sid'];
    $_SESSION['user'] = $rows['user'];
    //echo "success";
    //echo 1;
   echo "<script language=\"JavaScript\">alert(\"登录成功\");</script>";
   echo '<script>location.href="index.php"</script>';


} else {
    $username = '';
    //echo "账号或密码错误！";
    echo"<script>alert('用户名或密码错误');history.go(-1);</script>";
}

?>