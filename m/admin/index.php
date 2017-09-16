<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user'])){
    echo 0;
    exit();
}
$sid=$_SESSION['sid'];
include('../inc.php');
$sql="select * from dy_sj where sid='$sid' ";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $name=$rows['name'];
    $phone=$rows['phone'];
    $adr=$rows['adr'];
    } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>肇庆学院校园打印服务</title>
<!--可无视-->
<link href="css/global.css" rel="stylesheet">
<!--必要样式-->
<link type="text/css" href="css/style.css" rel="stylesheet">
<link href="css/component.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.dlmenu.js"></script>

</head>
<body>

<header class="header">
	<a href="#" class="logo"><img src="images/logo.png" alt=""></a>
	<a href="#" class="search"><span>目的地搜索</span></a>
	<a href="#" class="user-icon"><span>用户中心</span></a>
	<div id="dl-menu" class="dl-menuwrapper">
		<button id="dl-menu-button">Open Menu</button>
		<ul class="dl-menu">
			<li><a href="index.php">首页</a></li>
			
			<li>
				<a href="Line">订单</a>
				<ul class="dl-submenu">
					<li class="dl-back"><a href="#">返回上一级</a></li>
					<li><a href="dd.php">待打印订单</a></li>
					
				</ul>
			</li>
		</ul>
	</div>
</header>


<script type="text/javascript">
$(function(){
	$( '#dl-menu' ).dlmenu();
});
</script>
<div id="wrap"> 
<div id="main" class="clearfix"> 
 

 

<div id="content"> 
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>个人信息</p>

<p>姓名:<input type="text" name="name" value="<?php echo $name; ?>" style="width:220px; height:30px;" /></p><br/>
<p>电话:<input type="text" name="phone" value="<?php echo $phone; ?>" style="width:220px; height:30px;" /></p><br/>
<p>地址:<input type="text" name="adr" value="<?php echo $adr; ?>"  style="width:220px";height:30px;" /></p><br/>
<p>修改</p>
<br />
<h3>商户状态</h3>
<br />
<form action="xgsh.php" method="post">
<p>
接单
  <select name="zx" style="width:70px">
   <option value="1">接单</option>
   <option value="0">不接单</option>
   
  </select>
  在打印机旁：
  <select name="zdy" style="width:70px">
   <option value="1" style="width:200px">在</option>
   <option value="0" style="width:200px">不在</option>
   
  </select>
  
</p><br/>
<p>送货时间：<input type="text" name="time" style="width:180px"; height:30px;" /></p><br/>
<p><input type="submit" value="修改" style="width:180px"; height:30px;" /></p><br/>
<p>现在状态：<?php if($rows['zx']==1){echo "接单，<br/>".$rows['time'];}else{echo "不接单,<br/>".$rows['time']; }?></p>
</form>
</div>
</div>

</div> 
</div>
<div id="footer"> 
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>Copyright © 2015.肇庆学院校园打印服务团队 所有</p>
<p>备案号：粤ICP备15113762号-1</p>
</div>
</div>
</body>
</html>
