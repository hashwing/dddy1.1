<?php 
$ddh=$_GET['ddh'];
$spxq=$_GET['spxq'];
$zongjia=$_GET['zongjia'];
$count=$_GET['count'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>校园打印</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<meta name ="keywords" content="肇庆学院,打印,校园,服务"/>
	<meta name="description" content="专属肇庆学院的校园打印服务,倾心为每位同学服务在线下单，在线付款/货到付款，送货上门无须拥挤，无须排队，10s完成注册，通通在线完成"/>
	<link rel=stylesheet href="css/dy.css"/>
	<script type="text/javascript" src="js/dy.js"></script>
	<style type="text/css">
	*{padding:0;margin:0;}
	img{max-width:100%;height: auto;}
	#weixin-tip{display:none; position: fixed; left:0; top:0; background: rgba(0,0,0,0.8); filter:alpha(opacity=80); width: 100%; height:100%; z-index: 100;} 
#weixin-tip p{text-align: center; margin-top: 10%; padding:0 5%; position: relative;}
#weixin-tip .close{
	color: #fff;
	padding: 5px;
	font: bold 20px/20px simsun;
	text-shadow: 0 1px 0 #ddd;
	position: absolute;
	top: 0; left: 5%;
}
	</style>
</head>
<body>

<div style="width:100%; background:blue;height:30px; text-align:center;color:#fff"><h3>肇庆学院校园打印</h3></div>
<div style="margin:0 auto;width:80%">
<div class="zfxq" >
<form method="post" action="pay/alipayapi.php">
        <input type="hidden" id="ddh" name="WIDout_trade_no" value="<?php echo $ddh;?>" />
        <input type="hidden" id="spxq" name="WIDsubject" value="<?php echo $spxq;?>"/>
        <input type="hidden" id="zongjia" name="WIDtotal_fee" value="<?php echo $zongjia;?>"/>
        <input type="hidden" value="打印文件" name="WIDbody"/>
        <input type="hidden" value="http://dy.ggproject.cn" name="WIDshow_url"/>
         <h2><?php echo $spxq;?></h2><br>
         <b style="font-size:15px;">合计</b>
         <p><b style="font-size:20px; color:red;"><?php echo $zongjia;?>元</b></p><br>
         <div style="width:80px; margin:0 auto;/*padding-left:60px; float:left; */" id="J_weixinb" ><input type="submit" style="width:80px;" value="支付宝支付" /></div>
         </form>
         </div>
         </div>
		 <div id="weixin-tip"><p><img src="images/live_weixin.png" alt="微信打开"/><span id="close" title="关闭" class="close">×</span></p></div>

	<script type="text/javascript">

	var is_weixin = (function() {

	    var ua = navigator.userAgent.toLowerCase();

	    if (ua.match(/MicroMessenger/i) == "micromessenger") {

	        return true;

	    } else {

	        return false;

	    }

	})();

	window.onload = function(){

		var winHeight = typeof window.innerHeight != 'undefined' ? window.innerHeight : document.documentElement.clientHeight;

		var btn = document.getElementById('J_weixin');
		var btn = document.getElementById('J_weixinb');
		var tip = document.getElementById('weixin-tip');
		var close = document.getElementById('close');

		if(is_weixin){

			btn.onclick = function(e){

				tip.style.height = winHeight + 'px';

				tip.style.display = 'block';

				return false;

			}

			close.onclick = function(){
			
				tip.style.display = 'none';

			}

		}

	}
</script>
		 
     </body>
     </html>