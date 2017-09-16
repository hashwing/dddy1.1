<?php 
include 'inc.php';
$sql="select *from dy_sj where zx='1'";
$result=mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>肇庆学院校园打印服务</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<meta name ="keywords" content="肇庆学院,打印,校园,服务"/>
	<meta name="description" content="专属肇庆学院的校园打印服务,倾心为每位同学服务在线下单，在线付款/货到付款，送货上门无须拥挤，无须排队，10s完成注册，通通在线完成"/>
	
	<link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/dy.css">
	<link rel="stylesheet" href="css/common-header9.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="static/css/ui2.css"/>
	<script src="js/shouji.js" type="text/javascript"></script>
	<script type="text/javascript">uaredirect("m/index.php");</script>
	<script type="text/javascript" src="js/base-all.js"></script>
	<script type="text/javascript" src="js/base-all.js"></script>
	<script type="text/javascript" src="js/common-header.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/dy.js"></script>
</head>
<body onload="showwj()">
<div data-spm="2">
  <div class="ali-common-header">
    <div class="ali-common-header-inner common-header-clearfix">
      <div class="activity item pull-left">
        <div class="flash-wrap" id="J-ali-activity-img">
          <img src="images/TB1nHoRLXXXXXa3XVXXx1caHXXX-460-124.png"
          style="height: 55px;width: 210px;">
        </div>
        <div class="link logo">
          <a href="http://dy.ggproject.cn" data-spm-click="gostr=/aliyun;locaid=20160107">
          </a>
        </div>
        <div class="link activity-url" id="J-activity-url" ">
        </div>
      </div>
      <ul class="menu item pull-left" id="J_common_header_menu" data-spm="201">
        <li class="top-menu-item" has-dropdown="false" menu-type="" >
          <a class="menu-hd top-menu-item-link" data-spm-click="gostr=/aliyun;locaid=d20145"
          href="">
            配送打印
          </a>
        </li>
        <li class="top-menu-item" has-dropdown="false" menu-type="" >
          <a class="menu-hd top-menu-item-link" data-spm-click="gostr=/aliyun;locaid=d20145"
          >
            自助打印
          </a>
        </li>
        <li class="top-menu-item" has-dropdown="false" menu-type="" >
          <a class="menu-hd top-menu-item-link" data-spm-click="gostr=/aliyun;locaid=d20145"
          onclick="EV_modeAlert('wyjm')">
            我要加盟
          </a>
        </li>
	<li class="top-menu-item" has-dropdown="false" menu-type="" >
          <a class="menu-hd top-menu-item-link" data-spm-click="gostr=/aliyun;locaid=d20145"
          onclick="EV_modeAlert('wyjm')" style="float:right;">
            我要投诉
          </a>
        </li>
        
      </ul>
    </div>
  </div>
</div>
<div class="content">
<div class="jbxx">
<h1>基本信息</h1>
<form name="jbxxf">
<div class="adr">
  <span class="wz1">打印地点：</span>
    <span class="dropdown">
      <select name="one" id="dyadr" class="dropdown-select" onchange="price()" >
        <option value="0">请选择打印地点</option>
        <?php 
    while($rows=mysql_fetch_array($result))
    {
    ?>
      <option value="<?php echo $rows['sid'];?>"><?php echo $rows['adr'];?></option>
     <?php }?>
      </select>
    </span>
	<span class="wz1">是否配送：</span>
	<input type="checkbox" id="sh" value="1" name="sh" onchange="issh()"  />
	<span id="psdz" style="display:none;">
	<span class="wz1">配送地址：</span>
    <span class="dropdown">
      <select name="one" id="ssq" class="dropdown-select">
        <option value="0">请选择配送宿舍区</option>
        <?php 
        $sql="select *from dy_psadr";
        $result=mysql_query($sql);
    while($rows=mysql_fetch_array($result))
    {
    ?>
      <option value="<?php echo $rows['adr'];?>"><?php echo $rows['adr'];?></option>
     <?php }?>
      </select>
    </span>
	<span class="wz1">宿舍号：</span>
	<input id="ssh" type="text"/>
	</span>
	<br/>
	<span id="shtime"></span>

</div>
</form>
</div >
<div class="dywj" >
<h1>上传文件</h1>
<span id="wjlist" ></span>
<div class="upwj">
<a role="button" data-category="UserAccount" data-action="login" data-toggle="modal" href="#signup-modal">
		<div class="clean-button" >
		<span class="text">添加打印文件</span>
		</div>
		</div>
		</a>
		支持：doc、docx、jpg、pdf 格式
</div>
<div  class="js">
<h1 style="text-align:center;">结算</h1>
<hr/>
<br/>
<div class="djxq">
<table>
<tr>
<td style="width:150px;">项目</td>
<td style="width:150px;">单价(元/张）</td>
<td style="width:150px;">数量（张）</td>
<td style="width:150px;">总价（元） </td>
</tr>
<tr>
<td>单面</td>
<td><span id="dprice"></span></td>
<td><span id="dsl"></span></td>
<td><span id="dtotal"></span></td>
</tr>
<tr>
<td>双面</td>
<td><span id="sprice"></span></td>
<td><span id="ssl"></span></td>
<td><span id="stotal"></span></td>
</tr>
</table>
</div>

<div class="tjbn">
<p style="font-size:18px; color:red;"> 合计：<span id="total"></span>元</p>
<br/>
<input type="button" onclick="ddtj()" class="btn btn-success btn-large" id="ddtj" value="提交订单" /><span id="ddtjtip"></span> 
</div>
<div style="clean:both;"></div>
<br/>
<br/>
<br/>
<br/>
<br/>
</div>
<div class="footer">
Copyright © 2015.肇庆学院校园打印服务团队 所有
备案号：粤ICP备15113762-1
</div>
</div>
<div class="modal in" id="signup-modal"  > <a class="close" data-dismiss="modal">×</a>
  <h1>添加打印文件</h1>
  <div id="wjxx">
  <form class="signup-form clearfix" name="ddf" id="ddf" >
    <p class="error"></p>
	<p>选择文件：<input name="wd" id="wd" type="file" /></p>
	<br/>
	<p>色彩大小：<select name="sc" id="sc">
              <option value="0" selected="">A4黑白</option>
         </select>
	</p>
	<br/>
	<p>单面双面：<select name="dsm" id="dsm">
              <option value="1" selected="">单面</option>
		<option value="2" >双面</option>
         </select>
	</p>
	<br/>
	<p>一页几版：<select name="jb" id="jb"">
              <option value="1" selected="">1页1版</option>
		<option value="2">1页2版</option>
         </select>
	</p>
	<br/>
    <p>打印范围：第<input name="sys" id="sys" type="number" min="1" value="1" style="width:50px;" onkeypress="return IsNum(event)" />页至第<input name="mys" id="mys" type="number" min="1" value="" style="width:50px;" onkeypress="return IsNum(event)"/ >页<span style="color:red;">（注意填写）</span></p>
    <br/>
	<p>打印份数：<input name="fs" id="fs" type="number" min="1" value="1" style="width:50px;" onkeypress="return IsNum(event)" /></p>
	</div>
	<div class="clearfix"></div>
<br/>
    <div style="width:100px; margin:0 auto;" ><span id="tjz" style="height:100px; font-size:20px; color:red;"></span></div>
    <br/>
    <div style="width:80px; margin:0 auto;" ><input type="button" onclick="UpladFile()" id="tj" class="button-blue reg" value="完成添加" /></div>
    <div style="width:80px; margin:0 auto;" ><input type="button" id="qd" data-dismiss="modal" onclick="qdb()" style="display:none;" class="button-blue reg" value="确定" /></div>
  </form>
</div>


    <!-- 下面这个div将会被弹出显示，其内容和样式自行编写 -->  
    <div id="envon" class="zfxq" style=" ">  
        <form method="post" action="pay/alipayapi.php">
        <input type="hidden" id="ddh" name="WIDout_trade_no"/>
        <input type="hidden" id="spxq" name="WIDsubject"/>
        <input type="hidden" id="zongjia" name="WIDtotal_fee"/>
        <input type="hidden" value="打印文件" name="WIDbody"/>
        <input type="hidden" value="http://dy.ggproject.cn" name="WIDshow_url"/>
         <h1>共<span id="wds"></span>份打印文件</h1><br>
         <b style="font-size:30px;">合计</b>
         <p><b style="font-size:60px; color:red;"><span id="zfprice"></span>元</b></p><br>
         <div style="width:80px; margin:0 auto;/*padding-left:60px; float:left; */" ><input type="submit" onclick="" id="zf" class="button-blue reg" value="支付宝支付" /></div></form>
         <!-- div style="width:80px; margin:0 auto;float:left;" > <input type="button" onclick="" id="zf" class="button-blue reg" value="货到付款" /></div-->
         <br/><!-- a href="javascript:EV_closeAlert()">关闭</a --> 
         
    </div> 
	<div id="wyjm" class="zfxq" >
<div style="padding:20px;">

		<h1>联系我们</h1>
		<p></p>
<br/>
		<br/>
		<p style="font-size:20px;">联系电话：15361710334 </p><p style="font-size:20px;">联系QQ： 617708958</p>
<br/>
<br/>
<br/>
	<div style="width:80px; margin:0 auto;/*padding-left:60px; float:left; */" ><input type="submit" onclick="EV_closeAlert()" id="zf" class="button-blue reg" value="关闭" /></div>
</div>
        
         
    </div> 
</body>
</html>
<script src="static/js/landing-min.js"></script>
	<script src="js/wjsq.js"></script>
