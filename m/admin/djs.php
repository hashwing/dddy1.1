<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['sid'])){
    echo 0;
    exit();
}

date_default_timezone_set('PRC');
$sid=$_SESSION['sid'];
include('../inc.php');
$sql="select * from dy_dd where sid='$sid'and zs='0'and zt='1'";
$result=mysql_query($sql);
$sum=0;
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
<script language="javascript"> 
function preview() 
{ 
bdhtml=window.document.body.innerHTML; 
sprnstr="<!--startprint-->"; 
eprnstr="<!--endprint-->"; 
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
window.document.body.innerHTML=prnhtml; 
window.print(); 
} 
</script>
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
					<li><a href="dd.php">订单</a></li>
					
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
<!--startprint--> 
<h2>帐单</h2><br/>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <th  bgcolor="#E3E3E3" scope="col">订单号</th>
    <th  bgcolor="#E3E3E3" scope="col">价格</th>
    <th  bgcolor="#E3E3E3" scope="col">付款</th>
    <th  bgcolor="#E3E3E3" scope="col">送货</th>
  </tr>
<?php
 
 while ($row=mysql_fetch_array($result)) {
?>
  <tr>
    <td bgcolor="#E0EEE0" height="25px"><div align="center">
      <?php echo $row['ddh']; $ddh=$row['ddh'];?>
    </div></td>
    <td bgcolor="#E0EEE0" height="25px"><div align="center">
      <?php echo $row['price'];$sum+=$row['price'];?>
    </div></td>
    <td bgcolor="#E0EEE"><div align="center">
      <?php if($row['zf']==1) echo "线付";else echo "到付";?>
    </div></td>
<td bgcolor="#E0EEE"><div align="center">
      <?php  if($row['sh']==1) echo "送货";else echo "自提"; ?>
    </div></td>
  </tr>
<?php 	
} ?>
</table>
<br />
结算：<?php

	echo $sum."元";


 ?>
<!--endprint-->
</div>

<input type="button" name="print" value="预览并打印" onclick="preview()">
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
